<?php

namespace App\Http\Controllers\WebIndex\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class getCheckCodeSend extends Controller
{
    public $box;

    public function __construct(){
        $this->box                 = (object) array();
        $this->box->result         = (object) array();
        $this->box->params         = (object) array();
        $this->box->shopIDs        = (object) array();
        $this->box->params->account = Request()->get('account', null);

    }

    public function index()
    {
        if(!is_null($this->box->params->account)){
            $this->box->callFunction = 'ForgetPasswordSend';
            $this->box->sendApiUrl = config('app.urlAPIIndex');

            $this->box->sessionmember = with(new web_judge_services($this->box))->check(['CMSS']);
            //放入資料區塊
            $this->box->sendParams                 = [];
            $this->box->sendParams['Account']     = $this->box->params->account;

            //送出資料
            $this->box->result    = with(new connection_services())->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
            if($this->box->status != 0){
                echo json_encode(array(
                    'result' => 'ER',
                    'msg'    => request('ID'),
                    'error'  => trans('message.error.'.$this->box->status),
                ));
                exit;
            }
            echo json_encode(array(
                'result' => 'SU',
                'msg'    => request('ID'),
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

}
