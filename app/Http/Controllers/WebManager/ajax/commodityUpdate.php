<?php

namespace App\Http\Controllers\WebManager\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class commodityUpdate extends Controller
{
    public $box;

    public function __construct(){
        $this->box                   = (object) array();
        $this->box->result           = (object) array();
        $this->box->params           = (object) array();

        $this->box->params->ShopID = Request()->get('ShopID', null);
    }

    public function index()
    {
        if(!is_null($this->box->params->ShopID)){
            //需呼叫的功能
            $this->box->callFunction = 'GetCommodity';
            $this->box->sendApiUrl   = env('MANAGER_DOMAIN');

            //放入資料區塊
            $this->box->sendParams          = [];
            $this->box->sendParams['ShopID'] = $this->box->params->ShopID;

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

    public function reRrror($_msg)
    {
        echo json_encode(array(
            'result' => 'ER',
            'msg'    => $_msg,
        ));
        exit;
    }

}
