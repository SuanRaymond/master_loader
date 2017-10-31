<?php

namespace App\Http\Controllers\WebIndex\Account\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Presenter\buyList_presenter;

use App\Services\encrypt_services;
use App\Services\connection_services;
use App\Services\web_judge_services;
class memberBuyList extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();
        $this->box->html   = (object) array();
        $this->box->html->BuyList = '';
    }

    public function index()
    {
        $result = $this->search();
        $box = $this->box;
        return mIView('memberCentre.memberBuyList', compact('box'));
    }
    public function search()
    {
        $buylist_presenter = new buylist_presenter();
        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'CommodityOrderList';
        $this->box->sendApiUrl   = env('SHOP_DOMAIN');

        //放入資料區塊
        $this->box->sendParams             = [];
        $this->box->sendParams['memberID'] = auth()->user->memberID;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }
        /*----------------------------------與廠商溝通----------------------------------*/
        $this->box->html->BuyList = $buylist_presenter->buyList($this->box->result->List);

        return true;
    }
    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
}
