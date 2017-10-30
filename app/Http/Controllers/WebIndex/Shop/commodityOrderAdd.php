<?php

namespace App\Http\Controllers\WebIndex\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Presenter\shopCar_presenter;

use App\Services\encrypt_services;
use App\Services\connection_services;
use App\Services\web_judge_services;
class commodityOrderAdd extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();
        $this->box->html       = (object) array();

        $this->box->html->buydetailList   ='';
        $this->box->html->priceBox        ='';
        $this->box->html->buyNavbarBottom ='';
    }

    public function index()
    {
        //清除購買的交易單號
        removeSessionJson('ShoporderID');
        $this->box->memberAddress = getSessionJson('address');

        //----------------------------------與廠商溝通----------------------------------
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'CommodityOrderAdd';
        $this->box->sendApiUrl = env('SHOP_DOMAIN');

        $this->box->sessionmember = with(new web_judge_services($this->box))->check(['CMSS']);
        //放入資料區塊
        $this->box->sendParams=[];
        $this->box->sendParams['MemberID']  = auth()->user->memberID;
        $this->box->sendParams['Item']      = getSessionJson('SetBuyList');
        $this->box->sendParams['Addressee'] = $this->box->memberAddress->addressee;
        $this->box->sendParams['Phone']     = $this->box->memberAddress->phone;
        $this->box->sendParams['Address']   = $this->box->memberAddress->address;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reError(trans('message.error.'.$this->box->status));
        }
        // $this->box->ShoporderID = $this->box->result->ShoporderID;
        // 收件人參數
        removeSessionJson('address');
        // 產品資料參數
        $buyList    = getSessionJson('SetBuyList');
        $carList    = getSessionJson('SetShopID');
        $carNumList = getSessionJson('SetShopNum');
        foreach($buyList as $shopID => $row){
            foreach($carList as $key => $shopRow){
                if($shopID == $shopRow){
                    unset($carNumList[$key]);
                    unset($carList[$key]);
                }
            }
        }

        removeSessionJson('SetBuyList');
        removeSessionJson('SetShopID');
        removeSessionJson('SetShopNum');

        createSessionJson('SetShopID');
        createSessionJson('SetShopNum');

        foreach($carList as $key => $shopID){
            addSessionJson('SetShopID', $shopID);
        }
        foreach($carNumList as $key => $num){
            addSessionJson('SetShopNum', $num);
        }
        //信用卡交易轉送－資料整理
        $this->box->ShoporderID = [];
        foreach($this->box->result->ShoporderID as $ShoporderID => $row){
            $this->box->ShoporderID[$row] = $row;
        }
        createSessionJson('ShoporderID');
        addSessionJson('ShoporderID',$this->box->ShoporderID);
        $box = $this->box;
        // dd(getSessionJson('ShoporderID')[0]);
        //進入購物轉跳頁面
        return mSView('shopCar.commodityOrderAdd', compact('box'));

        // return redirect('/Shop');
        // return redirect('/BuyList');
    }
    public function reError($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
}
