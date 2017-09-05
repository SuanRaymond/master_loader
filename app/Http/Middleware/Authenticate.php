<?php

namespace App\Http\Middleware;

use App\Services\connection_services;
use App\Services\web_judge_services;

use Closure;
class Authenticate
{
    public $box;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //設定語言
        // app()->setLocale(session()->get('lang', 'tw'));

        $this->box                   = (object) array();
        $this->box->params           = (object) array();
        $this->box->params->account  = session()->get('account', null);
        $this->box->params->password = session()->get('password', null);
        //$box->params->languageID  = session()->get('lang', '0');

        if(!is_null($this->box->params->account) && !is_null($this->box->params->password) && Request()->path() != 'logout'){
            $connection_services = new connection_services();

            $this->box->params->equipmentID = browser();
            $this->box->params->ip          = ip();

            //執行登入
            /*----------------------------------與廠商溝通----------------------------------*/
            //放入連線區塊
            //需呼叫的功能
            $this->box->callFunction = 'Login';
            $this->box->sendApiUrl   = env('MANAGER_DOMAIN');

            //放入資料區塊
            $this->box->sendParams             = [];
            $this->box->sendParams['Account']  = $this->box->params->account;
            $this->box->sendParams['Password'] = $this->box->params->password;

            //送出資料
            $this->box->result    = $connection_services->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

            if($this->box->status != 0){
                return $this->reRrror($this->box->status);
            }
            /*----------------------------------與廠商溝通----------------------------------*/

            //整理資料
            $this->box->member             = $this->box->result->Member;
            $this->box->member->points     = pFormat($this->box->member->points);
            $this->box->member->integral   = pFormat($this->box->member->integral);
            $this->box->member->bonus      = pFormat($this->box->member->bonus);
            $this->box->params->languageID = $this->box->member->languageID;

            //執行寫入登入資訊
             /*----------------------------------與廠商溝通----------------------------------*/
            //放入連線區塊
            //需呼叫的功能
            $this->box->callFunction = 'SetLoginInfo';
            $this->box->sendApiUrl   = env('INDEX_DOMAIN');
            //放入資料區塊
            $this->box->sendParams                = [];
            $this->box->sendParams['MemberID']    = $this->box->member->memberID;
            $this->box->sendParams['LanguageID']  = $this->box->params->languageID;
            $this->box->sendParams['EquipmentID'] = $this->box->params->equipmentID;
            $this->box->sendParams['Ip']          = $this->box->params->ip;

            //送出資料
            $this->box->result    = $connection_services->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
            if($this->box->status != 0){
                return $this->reRrror($this->box->status);
            }
            /*----------------------------------與廠商溝通----------------------------------*/

            auth()->user = $this->box->member;
            auth()->menuCheck = Request()->path() == '/' ? 'Profile' : Request()->path();

            if(Request()->path() == 'login'){
                return redirect('/');
            }
            else if(Request()->path() == '/'){
                return redirect('Profile');
            }
            else{
                return $next($request);
            }
        }

        if(Request()->path() == 'login' || Request()->path() == 'logout'/* || Request()->path() == 'setLanguage'*/){
            return $next($request);
        }


        return redirect('login');
    }

    public function reRrror($_msg)
    {
        // session()->put('account', null);
        session()->put('password', null);
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return redirect('/');
    }
}
