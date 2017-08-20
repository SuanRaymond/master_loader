<?php

namespace App\Http\Controllers\WebIndex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class login extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();

        $this->box->params->account     = Request()->get('account');
        $this->box->params->password    = Request()->get('password');
        //$this->box->params->languageID  = session()->get('lang', '0');
        $this->box->params->equipmentID = browser();
        $this->box->params->ip          = ip();

        $this->box->reKey    = config('app.key');

        //是否開啟開發模式
        $this->box->deBugMode = false;
        if(config('app.debug') == true && env('USETYPE') == 'LOCAL'){
            $this->box->deBugMode = true;
        }
    }

    public function index()
    {
        return mIView('login');
    }

    /**
     * 驗證登入資訊
     */
    public function check()
    {
        //資料是否空白
        if(empty($this->box->params->account)){
            return $this->reRrror(trans('message.login.accountNull'));
        }
        if(empty($this->box->params->password)){
            return $this->reRrror(trans('message.login.passwordNull'));
        }


        //執行登入
        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'Login';
        $this->box->sendApiUrl   = [];
        $this->box->sendApiUrl[] = env('INDEX_DOMAIN');

        //放入資料區塊
        $this->box->sendParams             = [];
        $this->box->sendParams['Account']  = $this->box->params->account;
        $this->box->sendParams['Password'] = $this->box->params->password;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
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
        $this->box->sendApiUrl   = [];
        $this->box->sendApiUrl[] = env('INDEX_DOMAIN');
        //放入資料區塊
        $this->box->sendParams                = [];
        $this->box->sendParams['MemberID']    = $this->box->member->memberID;
        $this->box->sendParams['LanguageID']  = $this->box->params->languageID;
        $this->box->sendParams['EquipmentID'] = $this->box->params->equipmentID;
        $this->box->sendParams['Ip']          = $this->box->params->ip;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reRrror($this->box->status);
        }
        /*----------------------------------與廠商溝通----------------------------------*/

        //整理資料
        $this->box->member->token = $this->box->result->Token;

        //將資料寫入 session
        session()->put('member', json_encode($this->box->member));

        //輸出成功訊息
        setMesage([alert(trans('message.title.success'), trans('message.login.pass'), 1)]);
        //重新導向
        return redirect('/');
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
}