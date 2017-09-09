<?php

namespace App\Http\Controllers\WebIndex\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class rebateAdd extends Controller
{
    public $box;

    public function __construct(){
        $this->box                 = (object) array();
        $this->box->result         = (object) array();
        $this->box->params         = (object) array();

        $this->box->params->TypeID = Request()->get('TypeID', null);

    }
    //購買藏蛋
    public function index()
    {
        if(!is_null($this->box->params->TypeID)){
            $this->box->callFunction = 'RebateAdd';
            $this->box->sendApiUrl   = env('INDEX_DOMAIN');

            //放入資料區塊
            $this->box->sendParams               = [];
            $this->box->sendParams['memberID']   = auth()->user->memberID;
            $this->box->sendParams['RebateType'] = $this->box->params->TypeID;

            //送出資料
            $this->box->result    = with(new connection_services())->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

            if($this->box->status != 0){
                return $this->reRrror(trans('message.error.'.$this->box->status));
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
    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }

}
