<?php

namespace App\Http\Controllers\WebIndex\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class verificationReSend extends Controller
{
    public $box;

    public function __construct(){
        $this->box                 = (object) array();
        $this->box->result         = (object) array();
        $this->box->params         = (object) array();
        $this->box->shopIDs        = (object) array();
        $this->box->params->shopID = Request()->get('ShopID', null);

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
        if(!is_null($this->box->params->shopID)){
            $this->box->callFunction = 'VerificationReSend';
            $this->box->sendApiUrl   = [];
            $this->box->sendApiUrl[] = env('INDEX_DOMAIN');

            $this->box->sessionmember = with(new web_judge_services($this->box))->check(['CMSS']);
            //放入資料區塊
            $this->box->sendParams                 = [];
            $this->box->sendParams['MemberID']     = getSessionJson('memberID');

            //送出資料
            $this->box->result    = with(new connection_services())->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
            if($this->box->status != 0){
                return $this->reRrror($this->box->status);
            }


            $this->box->callFunction = 'VerificationDate';
            $this->box->sendApiUrl   = [];
            $this->box->sendApiUrl[] = env('INDEX_DOMAIN');

            // dd(getSessionJson('memberID'));
            //放入資料區塊
            $this->box->sendParams                 = [];
            $this->box->sendParams['MemberID']     = getSessionJson('memberID');

            //送出資料
            $this->box->result    = with(new connection_services())->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
            // dd($this->box);
            // dd($box->result->VerificationDate);
            if($this->box->status != 0){
                return $this->reRrror($this->box->status);
            }
            echo json_encode(array(
                'result' => 'SU',
                'msg'    => request('ID'),
                'reDate' => $box->result->VerificationDate,
            ));
        }
        else{
            echo json_encode(array(
                'result' => 'ER',
                'msg'    => request('ID'),
            ));
        }
        exit;
    }
    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }

}
