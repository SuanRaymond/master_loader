<?php

namespace App\Http\Controllers\WebIndex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class changePassword extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();

        $this->box->params->PasswordO   = Request()->get('PasswordO');
        $this->box->params->PasswordN   = Request()->get('PasswordN');
        $this->box->params->rePasswordN = Request()->get('rePasswordN');

        $this->box->reKey    = config('app.key');

        //是否開啟開發模式
        $this->box->deBugMode = false;
        if(config('app.debug') == true && env('USETYPE') == 'LOCAL'){
            $this->box->deBugMode = true;
        }
    }

    public function index()
    {
        $box = $this->box;
        return mIView('memberCentre.changePassword', compact('box'));
    }
    /**
     * 驗證登入資訊
     */
    public function check()
    {
        //資料是否空白
        if(empty($this->box->params->PasswordO)){
            return $this->rewarning(trans('message.warn.oldPwdNull'));
        }
        if(empty($this->box->params->PasswordN)){
            return $this->rewarning(trans('message.warn.newPwdNull'));
        }
        if(empty($this->box->params->rePasswordN)){
            return $this->rewarning(trans('message.warn.rePwdNull'));
        }
        if($this->box->params->rePasswordN != $this->box->params->PasswordN){
            return $this->rewarning(trans('message.warn.CheckPwdNull'));
        }

        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'PasswordUpdate';
        $this->box->sendApiUrl = env('INDEX_DOMAIN');

        //放入資料區塊
        $this->box->sendParams              = [];
        $this->box->sendParams['MemberID']  = auth()->user->memberID;
        $this->box->sendParams['PasswordO'] = $this->box->params->PasswordO;
        $this->box->sendParams['PasswordN'] = $this->box->params->PasswordN;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

        if($this->box->status != 0){
            return $this->reRrror($this->box->status);
        }
        removeSessionJson('account');
        removeSessionJson('password');
        removeSessionJson('member');
        //輸出成功訊息
        setMesage([alert(trans('message.title.success'), trans('message.success.CpwdOK'), 1)]);

        //重新導向
        return redirect('/');
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
