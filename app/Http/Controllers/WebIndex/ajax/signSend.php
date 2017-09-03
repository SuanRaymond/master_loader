<?php

namespace App\Http\Controllers\WebIndex\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class signSend extends Controller
{
    public $box;

    public function __construct(){
        $this->box                 = (object) array();
        $this->box->result         = (object) array();
        $this->box->params         = (object) array();
        $this->box->shopIDs        = (object) array();
        $this->box->params->memberID = Request()->get('memberID', null);

    }
    // 每日簽到
    public function index()
    {
        if(!is_null($this->box->params->memberID)){
            $this->box->callFunction = 'CheckinRebateTask';
            $this->box->sendApiUrl = env('INDEX_DOMAIN');

            $this->box->sessionmember = with(new web_judge_services($this->box))->check(['CMSS']);
            //放入資料區塊
            $this->box->sendParams                 = [];
            $this->box->sendParams['MemberID']     = auth()->user->memberID;

            //送出資料
            $this->box->result    = with(new connection_services())->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
            if($this->box->status != 0){
                echo json_encode(array(
                    'result' => 'ER',
                    'msg'    => request('ID'),
                    'error'  => $this->box->status,
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
    // 每日小遊戲
    public function game()
    {
        if(!is_null($this->box->params->memberID)){
            $this->box->callFunction = 'GetRebateTaskScratchCard';
            $this->box->sendApiUrl = env('INDEX_DOMAIN');

            $this->box->sessionmember = with(new web_judge_services($this->box))->check(['CMSS']);
            //放入資料區塊
            $this->box->sendParams                 = [];
            $this->box->sendParams['MemberID']     = auth()->user->memberID;

            //送出資料
            $this->box->result    = with(new connection_services())->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
            if($this->box->status != 0){
                echo json_encode(array(
                    'result' => 'ER',
                    'msg'    => request('ID'),
                    'error'  => $this->box->status,
                ));
                exit;
            }
            echo json_encode(array(
                'result'    => 'SU',
                'msg'       => request('ID'),
                'MoneyBack' => $this->box->result->MoneyBack,
                'ScratchID' => $this->box->result->ScratchID,
                'TaskOdds'  => $this->box->result->TaskOdds,
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
