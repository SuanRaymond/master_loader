<?php

namespace App\Http\Middleware;

use App\Services\connection_services;
use App\Services\web_judge_services;

use Closure;
class ShopAuthenticate
{
    public $box;

    public function __construct(){
        $this->box             = (object) array();
        $this->box->result     = (object) array();
        $this->box->params     = (object) array();
        $this->box->notInArray =
        [
            '/',
            'Login',
            'Logout',
            'Registered',
            'Shop',
            'ShopCar',
            'ClearBuy',
            'Sort',
            'ShopDetail',
            'PassBuy',
            'ajax/ShopCarAdd',

            // 'Task',
            // 'Sign',
            // 'ajax/SignSend',
            // 'SGame',
        ];
        $this->box->passInArray          =
        [
            'Check',
            'ajax/VerificationReSend'
        ];
        $this->box->path                 = Request()->path();
        $this->box->params->equipmentID  = browser();
        $this->box->params->ip           = ip();
    }

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
        //設定登入狀態
        auth()->loginType = false;

        $this->box->params->account      = session()->get('account', null);
        $this->box->params->password     = session()->get('password', null);
        //$this->box->params->languageID = session()->get('lang', '0');

        //設定語言
        // app()->setLocale(session()->get('lang', 'tw'));

        //是否允許未登入進入
        if((in_array($this->box->path, $this->box->notInArray) &&
          (is_null($this->box->params->account) && is_null($this->box->params->password))) ||
          (in_array($this->box->path, $this->box->passInArray))){
            return $next($request);
        }

        if(!is_null($this->box->params->account) && !is_null($this->box->params->password)){
            $connection_services = new connection_services();
            $web_judge_services  = new web_judge_services($this->box);

            //執行登入
            /*----------------------------------與廠商溝通----------------------------------*/
            //放入連線區塊
            //需呼叫的功能
            $this->box->callFunction = 'Login';
            $this->box->sendApiUrl   = env('INDEX_DOMAIN');

            //放入資料區塊
            $this->box->sendParams             = [];
            $this->box->sendParams['Account']  = $this->box->params->account;
            $this->box->sendParams['Password'] = $this->box->params->password;

            //送出資料
            $this->box->result    = $connection_services->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = $web_judge_services->check(['CAPI']);
            if($this->box->status == 13){
                session()->put('memberID', json_encode($this->box->result->Member->memberID));
            // dd($this->box);
                return redirect('Check');
            }
            if($this->box->status != 0){
                return $this->reRrror(trans('message.error.'.$this->box->status));
            }
            /*----------------------------------與廠商溝通----------------------------------*/

            //整理資料
            $this->box->member             = $this->box->result->Member;
            $this->box->member->points     = pFormat($this->box->member->points);
            $this->box->member->integral   = pFormat($this->box->member->integral);
            $this->box->member->bonus      = pFormat($this->box->member->bonus);
            $this->box->params->languageID = $this->box->member->languageID;

            //執行寫入登入資訊
            if($this->box->path == 'Login'){
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
                $this->box = $web_judge_services($this->box)->check(['CAPI']);
                if($this->box->status != 0){
                    return $this->reRrror(trans('message.error.'.$this->box->status));
                }
                /*----------------------------------與廠商溝通----------------------------------*/
            }
            auth()->loginType = true;
            auth()->user      = $this->box->member;

            return $next($request);
        }

        if($this->box->path == 'Login'){
            return $next($request);
        }else{
            return redirect('Login');
        }
    }

    public function reRrror($_msg)
    {
        // session()->put('account', null);
        session()->put('password', null);
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return redirect('Login');
    }
}
