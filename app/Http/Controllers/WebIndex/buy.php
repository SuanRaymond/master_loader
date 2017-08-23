<?php

namespace App\Http\Controllers\WebIndex;

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
        $this->box->html       = (object) array();

        $this->box->html->buydetailList   ='';
        $this->box->html->priceBox        ='';
        $this->box->html->buyNavbarBottom ='';
    }

    public function index()
    {
        if(empty(getSessionJson('SetShopID'))){
            return $this->reRrror('沒有商品無法付款');
        }
        $result = $this->search();
        if(!$result){
            return mIView('login');
        }
        // dd(session()->get('BuyShopID'));
        session()->put('menu', Request()->path());
        $box = $this->box;
        return mSView('shopCar.buy', compact('box'));
    }
    public function search()
    {
        $this->box = with(new web_judge_services($this->box))->check(['CMSS']);

        if(!$this->box->loginType){
            return false;
        }

        $encrypt_services     = new encrypt_services(env('APP_KEY'));

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
            return $this->reRrror($this->box->status);
        }
        if(empty(getSessionJson('GetShopltemCar'))){
            createSessionJson('GetShopltemCar');
        }
        addSessionJson('GetShopltemCar',$this->box->result->GetShopltemCar);
        $this->box->html->buydetailList   = with(new shopCar_presenter())->buydetailList($this->box->result->GetShopltemCar);
        $this->box->html->priceBox        = with(new shopCar_presenter())->priceBox($this->box->result->GetShopltemCar);
        $this->box->html->buyNavbarBottom = with(new shopCar_presenter())->buyNavbarBottom($this->box->result->GetShopltemCar);

        //放入資料區塊
        $this->box->postArray = [];
        $this->box->postArray['MemberID'] = $this->box->member->memberID;

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
        if($this->box->status != 0){
            return $this->reRrror($this->box->status);
        }

        return true;
    }
    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
}
