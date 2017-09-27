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

        //是否開啟開發模式
        $this->box->deBugMode = false;
        if(config('app.debug') == true && env('USETYPE') == 'LOCAL'){
            $this->box->deBugMode = true;
        }
        $this->box->postArray = [];
        $this->box->postArray = ['ShopID' => getSessionJson('SetShopID')];
        // dd($this->box);

        $Params = json_encode($this->box->postArray);
        $Sign   = $Params;
        if(!$this->box->deBugMode){
            $Params = $encrypt_services->LaravelEncode($Params);
            $Sign   = $encrypt_services->EnSign($Sign);
        }
        //資料加密與打包
        $this->box->postArray   = http_build_query(
            array(
                'Params' => $Params,
                'Sign'   => $Sign
        ));

        //取得類別選單
        $this->box->result = with(new connection_services())
                                ->sendHTTP(env('SHOP_DOMAIN'). '/GetShopltemCar', $this->box->postArray);
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }
        if(empty(getSessionJson('GetShopltemCar'))){
            createSessionJson('GetShopltemCar');
        }
        addSessionJson('GetShopltemCar',$this->box->result->GetShopltemCar);
        $this->box->html->buydetailList   = with(new shopCar_presenter())->buydetailList($this->box->result->GetShopltemCar,$this->box->price);
        // $this->box->html->priceBox        = with(new shopCar_presenter())->priceBox($this->box->result->GetShopltemCar);
        $this->box->html->buyNavbarBottom = with(new shopCar_presenter())->buyNavbarBottom($this->box->result->GetShopltemCar);

        if(empty(getSessionJson('index'))){
            //放入資料區塊
            $this->box->postArray = [];
            $this->box->postArray['MemberID'] = auth()->user->memberID;

            $Params = json_encode($this->box->postArray);
            $Sign   = $Params;
            if(!$this->box->deBugMode){
                $Params = $encrypt_services->LaravelEncode($Params);
                $Sign   = $encrypt_services->EnSign($Sign);
            }
            //資料加密與打包
            $this->box->postArray   = http_build_query(
                array(
                    'Params' => $Params,
                    'Sign'   => $Sign
            ));

            //取得類別選單
            $this->box->result = with(new connection_services())
                                    ->sendHTTP(env('SHOP_DOMAIN'). '/DetailSimple', $this->box->postArray);
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
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
            if($this->box->status != 0){
                return $this->reRrror(trans('message.error.'.$this->box->status));
            }
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
