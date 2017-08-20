<?php

namespace App\Http\Controllers\WebIndex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class registered extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();

        $this->box->params->account    = Request()->get('account');
        $this->box->params->password   = Request()->get('password');
        $this->box->params->repassword = Request()->get('repassword');
        $this->box->params->name       = Request()->get('name');
        $this->box->params->mail       = Request()->get('mail');
        $this->box->params->groupID    = Request()->get('groupID');
        $this->box->params->upmemberID = Request()->get('upmemberID');

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
        return mIView('registered', compact('box'));
    }

    /**
     * 驗證登入資訊
     */
    public function check()
    {
        //資料是否空白
        if(empty($this->box->params->account)){
            return $this->reRrror(trans('message.registered.accountNull'));
        }
        if(empty($this->box->params->name)){
            return $this->reRrror(trans('message.registered.nameNull'));
        }
        if(empty($this->box->params->mail)){
            return $this->reRrror(trans('message.registered.mailNull'));
        }
        if(empty($this->box->params->password)){
            return $this->reRrror(trans('message.registered.passwordNull'));
        }
        if(empty($this->box->params->repassword)){
            return $this->reRrror(trans('message.registered.repasswordNull'));
        }
        if($this->box->params->repassword != $this->box->params->password){
            return $this->reRrror(trans('message.registered.repasswordError'));
        }
        if(empty($this->box->params->groupID)){
            return $this->reRrror(trans('message.registered.groupIDNull'));
        }

        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'Create';
        $this->box->sendApiUrl   = [];
        $this->box->sendApiUrl[] = env('INDEX_DOMAIN');

        //放入資料區塊
        $this->box->sendParams               = [];
        $this->box->sendParams['Account']    = $this->box->params->account;
        $this->box->sendParams['Password']   = $this->box->params->password;
        $this->box->sendParams['Name']       = $this->box->params->name;
        $this->box->sendParams['Mail']       = $this->box->params->mail;
        $this->box->sendParams['GroupID']    = $this->box->params->groupID;
        $this->box->sendParams['UpMemberID'] = $this->box->params->upmemberID;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;

        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
            // return $this->reRrror($this->box->status);
        }

        //輸出成功訊息
        setMesage([alert(trans('message.title.success'), trans('message.registered.pass'), 1)]);

        //重新導向
        return redirect('/Login');
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return $this->index();
    }
}
