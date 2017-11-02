<?php

namespace App\Http\Controllers\WebIndex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class forgetPassWord extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();

        $this->box->params->account   = Request()->get('account');
        $this->box->params->checkCode = Request()->get('checkCode');
        $this->box->params->PasswordN = Request()->get('PasswordN');

    }

    public function index()
    {
        $box = $this->box;
        return mIView('forgetPassWord', compact('box'));
    }
    /**
     * 驗證登入資訊
     */
    public function check()
    {

        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'ForgetPasswordChange';
        $this->box->sendApiUrl = config('app.urlAPIIndex');

        //放入資料區塊
        $this->box->sendParams                 = [];
        $this->box->sendParams['Account']      = $this->box->params->account;
        $this->box->sendParams['Password']     = $this->box->params->PasswordN;
        $this->box->sendParams['Verification'] = $this->box->params->checkCode;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }
        //輸出成功訊息
        setMesage([alert(trans('message.title.success'), trans('message.success.CpwdOK'), 1)]);

        //重新導向
        return redirect('/Login');
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
    public function rewarning($_msg)
    {
        setMesage([alert(trans('message.title.warning'), $_msg, 3)]);
        return back();
    }
}
