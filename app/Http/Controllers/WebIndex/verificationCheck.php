<?php

namespace App\Http\Controllers\WebIndex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class verificationCheck extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();

        $this->box->params->verification   = Request()->get('verification');

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
        $this->box->callFunction = 'VerificationDate';
        $this->box->sendApiUrl = env('INDEX_DOMAIN');

        // dd(getSessionJson('memberID'));
        //放入資料區塊
        $this->box->sendParams                 = [];
        $this->box->sendParams['MemberID']     = getSessionJson('memberID');

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        // dd($box->result->VerificationDate);
        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }

        return mIView('verification', compact('box'));
    }
    /**
     * 驗證登入資訊
     */
    public function check()
    {
        //資料是否空白
        if(empty($this->box->params->verification)){
            return $this->reRrror(trans('message.warn.CheckCodeNull'));
        }

        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'VerificationCheck';
        $this->box->sendApiUrl = env('INDEX_DOMAIN');

        //放入資料區塊
        $this->box->sendParams                 = [];
        $this->box->sendParams['MemberID']     = getSessionJson('memberID');
        $this->box->sendParams['Verification'] = $this->box->params->verification;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
// dd($this->box);
        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }
        //輸出成功訊息
        setMesage([alert(trans('message.title.success'), trans('message.success.CheckCodeOK'), 1)]);

        //重新導向
        return redirect('/');
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
}
