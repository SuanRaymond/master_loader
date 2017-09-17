<?php

namespace App\Http\Controllers\WebManager\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class images extends Controller
{
    public $box;

    public function __construct(){
        $this->box                   = (object) array();
        $this->box->result           = (object) array();
        $this->box->params           = (object) array();

        $this->box->params->FileName = Request()->get('FileName', null);
        $this->box->params->File     = Request()->get('File', null);
    }

    public function index()
    {
        if(!is_null($this->box->params->FileName)){
            //需呼叫的功能
            $this->box->callFunction = 'GetImages';
            $this->box->sendApiUrl   = env('MANAGER_DOMAIN');

            //放入資料區塊
            $this->box->sendParams          = [];
            $this->box->sendParams['Title'] = $this->box->params->FileName;

            //送出資料
            $this->box->result    = with(new connection_services())->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

            if($this->box->status != 0){
                $this->reRrror($this->box->status);
            }
            echo json_encode(array(
                'result' => 'SU',
                'data'   => $this->box->result->Data,
            ));
        }
        else{
            $this->reRrror("error");
        }
        exit;
    }

    public function insert()
    {
        if(!is_null($this->box->params->FileName) && !is_null($this->box->params->File)){
            //需呼叫的功能
            $this->box->callFunction = 'InsertImages';
            $this->box->sendApiUrl   = env('MANAGER_DOMAIN');

            //放入資料區塊
            $this->box->sendParams           = [];
            $this->box->sendParams['Title']  = $this->box->params->FileName;
            $this->box->sendParams['Images'] = $this->box->params->File;

            //送出資料
            $this->box->result    = with(new connection_services())->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

            if($this->box->status != 0){
                $this->reRrror($this->box->status);
            }
            echo json_encode(array(
                'result' => 'SU',
                'data'   => $this->box->sendParams,
            ));
        }
        else{
            $this->reRrror("error");
        }
        exit;
    }


    public function reRrror($_msg)
    {
        echo json_encode(array(
            'result' => 'ER',
            'msg'    => $_msg,
        ));
        exit;
    }

}
