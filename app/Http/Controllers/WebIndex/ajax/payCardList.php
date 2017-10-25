<?php

namespace App\Http\Controllers\WebIndex\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class payCardList extends Controller
{
    public $box;

    public function __construct(){
        $this->box                      = (object) array();
        $this->box->result              = (object) array();
        $this->box->params              = (object) array();
        $this->box->params->ShopOrderID = Request()->get('ShopOrderID', null);
        $this->box->params->CardType    = Request()->get('CardType', null);
    }
    // 取得信用卡交易單號
    public function index()
    {
        if(!is_null($this->box->params->ShopOrderID)){
            $this->box->callFunction = 'PayCard';
            $this->box->sendApiUrl = env('SHOP_DOMAIN');

            $this->box->sessionmember = with(new web_judge_services($this->box))->check(['CMSS']);
            //放入資料區塊
            $this->box->sendParams                = [];
            $this->box->sendParams['MemberID']    = auth()->user->memberID;
            $this->box->sendParams['ShopOrderID'] = $this->box->params->ShopOrderID;
            $this->box->sendParams['CardType'] = $this->box->params->CardType;

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
                'result'    => 'SU',
                'msg'       => request('ID'),
                /** 信用卡資訊 **/
                'MN'        => $this->box->result->PayDetail->MN,
                'OrderInfo' => $this->box->result->PayDetail->OrderInfo,
                'Td'        => $this->box->result->PayDetail->Td,
                'sna'       => $this->box->result->PayDetail->sna,
                'sdt'       => $this->box->result->PayDetail->sdt,
                'email'     => $this->box->result->PayDetail->email,
                'note1'     => $this->box->result->PayDetail->note1,
                'note2'     => $this->box->result->PayDetail->note2,
                'Card_Type' => $this->box->result->PayDetail->Card_Type,
                'ChkValue' => strtoupper(sha1(env('SEND_CARD_KEY'). env('SEND_CARD_PAS'). $this->box->result->PayDetail->MN. ''))
            ));
        }
        else{
            echo json_encode(array(
                'result' => 'ER',
                'msg'    => request('ID'),
                'error'  => '',
            ));
        }
        exit;
    }
}
