<?php

namespace App\Http\Controllers\WebIndex\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Presenter\shopCar_presenter;

use App\Services\connection_services;
use App\Services\web_judge_services;
class buy extends Controller
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
        session()->put('menu', Request()->path());

        $this->box->params->shopCarList = Request()->get('sendData', json_encode(getSessionJson('SetBuyList')));
        if(!isJson($this->box->params->shopCarList)){
            return $this->rewarning(trans('message.warn.projectNull'));
        }
        $this->box->params->shopCarList = json_decode($this->box->params->shopCarList);
        $result = $this->search();
        if(!$result){
            return redirect('/Login');
        }
        $box = $this->box;
        return mSView('shopCar.buy', compact('box'));
    }

    public function search()
    {
        /*----------------------------------購物確認單放入 Session----------------------------------*/
        if(empty(getSessionJson('SetBuyList'))){
            createSessionJson('SetBuyList');
        }
        else{
            removeSessionJson('SetBuyList');
        }
        session()->put('SetBuyList', json_encode($this->box->params->shopCarList));
        session()->save();
        /*----------------------------------購物確認單放入 Session----------------------------------*/

        /*----------------------------------組成購物確認單----------------------------------*/
        $shopCar_presenter = new shopCar_presenter();

        $this->box->itemID = [];
        $this->box->itemNU = [];
        foreach($this->box->params->shopCarList as $shopID => $count){
            $this->box->itemID[] = $shopID;
            $this->box->itemNU[] = $count;
        }

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

        $this->box->html->detailList   = with(new shopCar_presenter())->detailList($this->box->result->GetShopltemCar, false);

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
        /*----------------------------------組成購物確認單----------------------------------*/


        /*----------------------------------組成個人資料確認單----------------------------------*/
        if(empty(getSessionJson('index'))){

            /*----------------------------------與廠商溝通----------------------------------*/
            //放入連線區塊
            //需呼叫的功能
            $this->box->callFunction = 'DetailSimple';
            $this->box->sendApiUrl   = env('SHOP_DOMAIN');

            //放入資料區塊
            $this->box->sendParams           = [];
            $this->box->sendParams['MemberID'] = auth()->user->memberID;

            //送出資料
            $this->box->result    = with(new connection_services())->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
            if($this->box->status != 0){
                return $this->reError(trans('message.error.'.$this->box->status));
            }
            /*----------------------------------與廠商溝通----------------------------------*/

            $this->box->member = $this->box->result->Member;

            if(empty(getSessionJson('addressee'))){
                createSessionJson('addressee');
            }
            if(empty(getSessionJson('phone'))){
                createSessionJson('phone');
            }
            if(empty(getSessionJson('address'))){
                createSessionJson('address');
            }
            addSessionJson('addressee', $this->box->member->addressee);
            addSessionJson('phone', $this->box->member->phone);
            addSessionJson('address', $this->box->member->address);
        }
        else{
            $this->box->member = (object) array();
            foreach(getSessionJson('addressee') as $row){
                $this->box->member->addressee = $row;
            }
            foreach(getSessionJson('phone') as $row){
                $this->box->member->phone = $row;
            }
            foreach(getSessionJson('address') as $row){
                $this->box->member->address = $row;
            }
        }

        return true;
    }
    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
    public function reWarning($_msg)
    {
        setMesage([alert(trans('message.title.warning'), $_msg, 3)]);
        return back();
    }
}
