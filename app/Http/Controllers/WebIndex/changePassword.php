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
            return $this->reRrror(trans('message.registered.passwordNull'));
        }
        if(empty($this->box->params->PasswordN)){
            return $this->reRrror(trans('message.registered.passwordNull'));
        }
        if(empty($this->box->params->rePasswordN)){
            return $this->reRrror(trans('message.registered.repasswordNull'));
        }
        if($this->box->params->rePasswordN != $this->box->params->PasswordN){
            return $this->reRrror(trans('message.registered.repasswordError'));
        }

        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'PasswordUpdate';
        $this->box->sendApiUrl   = [];
        $this->box->sendApiUrl[] = env('INDEX_DOMAIN');

        $this->box->sessionmember = with(new web_judge_services($this->box))->check(['CMSS']);
        //放入資料區塊
        $this->box->sendParams              = [];
        $this->box->sendParams['MemberID']  = $this->box->sessionmember->member->memberID;
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

        //輸出成功訊息
        setMesage([alert(trans('message.title.success'), '密碼修改成功請重新登入', 1)]);

        //重新導向
        return redirect('/Logout');
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return mIView('/MFire');
    }
}
