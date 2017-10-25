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
        //----------------------------------與廠商溝通----------------------------------
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'CommodityOrderAdd';
        $this->box->sendApiUrl = env('SHOP_DOMAIN');

        $this->box->sessionmember = with(new web_judge_services($this->box))->check(['CMSS']);
        //放入資料區塊
        $this->box->sendParams=[];
        $this->box->memberBuy = (object) array();
        $this->box->memberBuy = reSetKey(getSessionJson('GetShopltemCar'));
        $this->box->sendParams['MemberID'] = auth()->user->memberID;
        foreach ($this->box->memberBuy as $rowID => $group) {
            foreach($group as $shopID => $row){
                foreach(getSessionJson("quantityNumber") as $group){
                    if(!is_null($group)){
                        foreach ($group as $key => $value) {
                            if($shopID == $key){
                                $this->box->sendParams['Item'][$row->shopID] = $value;
                            }
                        }
                    }else{
                        $this->box->sendParams['Item'][$row->shopID] = 1;
                    }
                }
            }
        }
        foreach(getSessionJson('addressee') as $row){
            $this->box->sendParams['Addressee'] = $row;
        }
        foreach(getSessionJson('phone') as $row){
            $this->box->sendParams['phone'] = $row;
        }
        foreach(getSessionJson('address') as $row){
            $this->box->sendParams['address'] = $row;
        }

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }

        // 金額數量參數
        removeSessionJson('quantityNumber');
        removeSessionJson('totalprice');
        removeSessionJson('totaltransport');
        removeSessionJson('totalPoint');
        removeSessionJson('totalMoney');
        // 產品資料參數
        removeSessionJson('SetShopID');
        removeSessionJson('GetShopltemCar');
        // 收件人參數
        removeSessionJson('index');
        removeSessionJson('addressee');
        removeSessionJson('phone');
        removeSessionJson('address');
        removeSessionJson('defaule');
        setMesage([alert(trans('message.title.success'), trans('message.success.buyOK'), 1)]);

        //信用卡交易轉送－資料整理



        $box = $this->box;

        //進入購物轉跳頁面
        return mSView('shopCar.commodityOrderAdd', compact('box'));

        // return redirect('/Shop');
        // return redirect('/BuyList');
    }
    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
}
