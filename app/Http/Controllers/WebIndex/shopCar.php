<?php

namespace App\Http\Controllers\WebIndex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Presenter\shopCar_presenter;

use App\Services\encrypt_services;
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

        $this->box->html->detailList   ='';
        $this->box->html->priceBox     ='';
        $this->box->html->NavbarBottom ='';
    }

    public function index()
    {
        $result = $this->search();
        if(!$result){
            return mIView('login');
        }
        // dd(session()->get('BuyShopID'));
        session()->put('menu', Request()->path());
        $box = $this->box;
        return mSView('shopCar.shopCar', compact('box'));
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
        // dd(getSessionJson('SetShopID'));
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
        // dd($this->box->result->GetShopltemCar);
        if($this->box->status != 0){
            return $this->reRrror($this->box->status);
        }

        $this->box->html->detailList   = with(new shopCar_presenter())->detailList($this->box->result->GetShopltemCar);
        $this->box->html->priceBox     = with(new shopCar_presenter())->priceBox($this->box->result->GetShopltemCar);
        $this->box->html->NavbarBottom = with(new shopCar_presenter())->NavbarBottom($this->box->result->GetShopltemCar);

        return true;
    }
}
