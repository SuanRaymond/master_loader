<?php

namespace App\Http\Controllers\WebIndex\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Presenter\shopCar_presenter;

use App\Services\connection_services;
use App\Services\web_judge_services;
class shopCar extends Controller
{
    public $box;

    public function __construct(){
        $this->box             = (object) array();
        $this->box->result     = (object) array();
        $this->box->params     = (object) array();
        $this->box->html       = (object) array();
    }

    public function index()
    {
        $this->search();

        //放置目前位置
        session()->put('menu', Request()->path());

        removeSessionJson('quantityNumber');
        removeSessionJson('totalprice');
        removeSessionJson('totaltransport');
        removeSessionJson('totalPoint');
        removeSessionJson('totalMoney');

        removeSessionJson('SetBuyList');

        $box = $this->box;
        return mSView('shopCar.shopCar', compact('box'));
    }

    public function search()
    {
        $shopCar_presenter = new shopCar_presenter();

        $this->box->itemID = getSessionJson('SetShopID');
        $this->box->itemNU = getSessionJson('SetShopNum');

        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'GetShopltemCar';
        $this->box->sendApiUrl   = env('SHOP_DOMAIN');

        //放入資料區塊
        $this->box->sendParams           = [];
        $this->box->sendParams['ShopID'] = $this->box->itemID;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reError(trans('message.error.'.$this->box->status));
        }
        /*----------------------------------與廠商溝通----------------------------------*/
        foreach($this->box->itemID as $key => $shopID){
            $this->box->result->GetShopltemCar->$shopID->count = $this->box->itemNU[$key];
        }

        $this->box->html->detailList   = with(new shopCar_presenter())->detailList($this->box->result->GetShopltemCar);
        // $this->box->html->priceBox     = with(new shopCar_presenter())->priceBox($this->box->result->GetShopltemCar);
        // $this->box->html->NavbarBottom = with(new shopCar_presenter())->NavbarBottom($this->box->result->GetShopltemCar);

        $this->box->totalPoint     = 0;
        $this->box->totalPrice     = 0;
        $this->box->totalTransport = 0;
        $this->box->totalMoney     = 0;
        foreach($this->box->result->GetShopltemCar as $row){
            $this->box->totalPoint     += $row->points * $row->count;
            $this->box->totalPrice     += $row->price * $row->count;
            $this->box->totalTransport += $row->transport * $row->count;
        }
        $this->box->totalMoney     = pFormat($this->box->totalPrice + $this->box->totalTransport);
        $this->box->totalPoint     = pFormat($this->box->totalPoint);
        $this->box->totalPrice     = pFormat($this->box->totalPrice);
        $this->box->totalTransport = pFormat($this->box->totalTransport);
        return true;
    }

    public function reError($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
}
