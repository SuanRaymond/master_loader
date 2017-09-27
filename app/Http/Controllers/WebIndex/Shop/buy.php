<?php

namespace App\Http\Controllers\WebIndex\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Presenter\shopCar_presenter;

use App\Services\encrypt_services;
use App\Services\connection_services;
use App\Services\web_judge_services;
class buy extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();
        $this->box->html   = (object) array();
        $this->box->price  = (object) array();

        $this->box->html->buydetailList   ='';
        $this->box->html->priceBox        ='';
        $this->box->html->buyNavbarBottom ='';
    }

    public function index()
    {
        session()->put('menu', Request()->path());
        if(empty(getSessionJson('SetShopID'))){
            return $this->rewarning(trans('message.warn.projectNull'));
        }
        $result = $this->search();
        if(!$result){
            return mIView('login');
        }
        $box = $this->box;
        return mSView('shopCar.buy', compact('box'));
    }
    public function search()
    {
        foreach(getSessionJson('SetShopID') as $row){
            $this->box->price->$row = 1;
            foreach(getSessionJson("quantityNumber") as $group){
                if(!is_null($group)){
                    foreach ($group as $key => $value) {
                        if($row == $key){
                            $this->box->price->$row = $value;
                        }
                    }
                }
            }
        }
        foreach(getSessionJson('totalprice') as $row){
            $this->box->price->totalprice = $row;
        }
        foreach(getSessionJson('totaltransport') as $row){
            $this->box->price->totaltransport = $row;
        }
        foreach(getSessionJson('totalPoint') as $row){
            $this->box->price->totalPoint = $row;
        }
        foreach(getSessionJson('totalMoney') as $row){
            $this->box->price->totalMoney = $row;
        }

        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'GetShopltemCar';
        $this->box->sendApiUrl   = env('SHOP_DOMAIN');

        //放入資料區塊
        $this->box->sendParams             = [];
        $this->box->sendParams['ShopID'] = getSessionJson('SetShopID');

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }
        /*----------------------------------與廠商溝通----------------------------------*/

        if(empty(getSessionJson('GetShopltemCar'))){
            createSessionJson('GetShopltemCar');
        }
        addSessionJson('GetShopltemCar',$this->box->result->GetShopltemCar);
        $this->box->html->buydetailList   = with(new shopCar_presenter())->buydetailList($this->box->result->GetShopltemCar,$this->box->price);
        // $this->box->html->priceBox        = with(new shopCar_presenter())->priceBox($this->box->result->GetShopltemCar);
        $this->box->html->buyNavbarBottom = with(new shopCar_presenter())->buyNavbarBottom($this->box->result->GetShopltemCar);
        // dd(getSessionJson('index'));
        if(empty(getSessionJson('index'))){
            /*----------------------------------與廠商溝通----------------------------------*/
            //放入連線區塊
            //需呼叫的功能
            $this->box->callFunction = 'DetailSimple';
            $this->box->sendApiUrl   = env('SHOP_DOMAIN');

            //放入資料區塊
            $this->box->sendParams             = [];
            $this->box->sendParams['MemberID'] = auth()->user->memberID;

            //送出資料
            $this->box->result    = with(new connection_services())->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

            if($this->box->status != 0){
                return $this->reRrror(trans('message.error.'.$this->box->status));
            }
            /*----------------------------------與廠商溝通----------------------------------*/
            // dd($this->box);
            if(empty(getSessionJson('addressee'))){
                createSessionJson('addressee');
            }
            if(empty(getSessionJson('phone'))){
                createSessionJson('phone');
            }
            if(empty(getSessionJson('address'))){
                createSessionJson('address');
            }
            addSessionJson('addressee', $this->box->result->Member->addressee);
            addSessionJson('phone', $this->box->result->Member->phone);
            addSessionJson('address', $this->box->result->Member->address);
        }else{
            $this->box->result->Member = (object) array();
            foreach(getSessionJson('addressee') as $row){
                $this->box->result->Member->addressee = $row;
            }
            foreach(getSessionJson('phone') as $row){
                $this->box->result->Member->phone = $row;
            }
            foreach(getSessionJson('address') as $row){
                $this->box->result->Member->address = $row;
            }
            // dd($this->box->result);
        }

        return true;
    }
    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
    public function rewarning($_msg)
    {
        setMesage([alert(trans('message.title.warning'), $_msg, 3)]);
        return back();
    }
}
