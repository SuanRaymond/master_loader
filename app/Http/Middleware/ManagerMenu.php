<?php

namespace App\Http\Middleware;

use App\Services\connection_services;
use App\Services\web_judge_services;

use Closure;
class ManagerMenu
{
    public $box;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!empty(auth()->user)){
            $this->box = (object) array();

            //執行取選單
            /*----------------------------------與廠商溝通----------------------------------*/
            //放入連線區塊
            //需呼叫的功能
            $this->box->callFunction = 'GetMenu';
            $this->box->sendApiUrl   = env('MANAGER_DOMAIN');

            //放入資料區塊
            $this->box->sendParams             = [];
            $this->box->sendParams['GroupID']  = auth()->user->groupID;

            //送出資料
            $this->box->result    = with(new connection_services())->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

            if($this->box->status != 0){
                return $this->reRrror($this->box->status);
            }
            /*----------------------------------與廠商溝通----------------------------------*/

            auth()->menu = '';
            $menuGroup   = false;
            foreach($this->box->result->Menu as $menuGroup => $row){
                if(count((array)$row) <= 1){
                    auth()->menu .= '<li@active>
                                        <a class="waitFrom" href="/profile">
                                            <i class="icon-home"></i>
                                            <span class="title">'. trans('menu.manager.'. $menuGroup). '</span>
                                            <span class="arrow "></span>
                                        </a>
                                    </li>';

                    foreach($row as $menuID => $path){
                        if(auth()->menuCheck == $path){
                            $menuGroup   = true;
                            auth()->menu = str_replace('@active', ' class="active start"', auth()->menu);
                        }
                    }
                }
                else{
                    auth()->menu .= '<li@active>
                                        <a href="javascript:;">
                                            <i class="@icon"></i>
                                            <span class="title">'. trans('menu.manager.'. $menuGroup). '</span>
                                            <span class="arrow "></span>
                                        </a>
                                        <ul class="sub-menu">';
                    switch($menuGroup){
                        case 20:
                            auth()->menu = str_replace('@icon', 'icon-user', auth()->menu);
                            break;
                        case 30:
                            auth()->menu = str_replace('@icon', 'icon-bar-chart', auth()->menu);
                            break;
                        case 80:
                            auth()->menu = str_replace('@icon', 'icon-book', auth()->menu);
                            break;
                    }
                    foreach($row as $menuID => $path){
                        auth()->menu .=     '<li';
                        if(auth()->menuCheck == $path){
                            $menuGroup    = true;
                            auth()->menu .=     ' class="active"';
                            auth()->menu  = str_replace('@active', ' class="active start"', auth()->menu);
                        }
                        auth()->menu .=     '>
                                                <a class="waitFrom" href="/'. $path. '">
                                                    '. trans('menu.manager.'. $menuID). '
                                                </a>
                                            </li>';
                    }
                    auth()->menu .=     '</ul>
                                    </li>';
                }

                auth()->menu = str_replace('@active', '', auth()->menu);
            }

            //沒有權限
            if(!$menuGroup && auth()->menuCheck != 'setLanguage'){
                dd(123);
                return $this->reRrror(trans('error.menuGrop'));
            }
        }
        return $next($request);
    }

    public function reRrror($_msg)
    {
        // session()->put('account', null);
        session()->put('password', null);
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return redirect('/');
    }
}
