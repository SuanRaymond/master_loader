<?php

namespace App\Http\Controllers\WebIndex\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Presenter\menu_presenter;
use App\Presenter\commodity_presenter;

use App\Services\encrypt_services;
use App\Services\connection_services;
use App\Services\web_judge_services;
class detail extends Controller
{
    public $box;

    public function __construct(){
        $this->box                        = (object) array();
        $this->box->result                = (object) array();
        $this->box->params                = (object) array();
        $this->box->html                  = (object) array();
        $this->box->html->menuList        = '';
        $this->box->html->commodityTitle  = '';
        $this->box->html->commodityDetail = '';
        $this->box->html->commodityNorm   = '';
        $this->box->html->commodityMemo   = '';
        $this->box->html->commodityDate   = '';
        $this->box->params->shopID        = Request()->get('ShopID', null);
    }

    public function index()
    {
        $result = $this->search();
        if($result == 1){
            return redirect('/Login');
        }
        else if($result == 2){
            return redirect('/Shop');
        }
        session()->put('menu', Request()->path(). '?ShopID='. $this->box->params->shopID);
        $box = $this->box;
        return mSView('item.detail', compact('box'));
    }

    public function search()
    {
        $this->box = with(new web_judge_services($this->box))->check(['CMSS']);

        $encrypt_services    = new encrypt_services(env('APP_KEY'));
        $commodity_presenter = new commodity_presenter();

        //是否開啟開發模式
        $this->box->deBugMode = false;
        if(config('app.debug') == true && env('USETYPE') == 'LOCAL'){
            $this->box->deBugMode = true;
        }

        $this->box->postArray = [];
        $this->box->postArray = ['ShopID' => $this->box->params->shopID];

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
                                ->sendHTTP(env('SHOP_DOMAIN'). '/GetMenu', $this->box->postArray);
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

        if($this->box->status != 0){
            $this->reRrror(trans('message.error.'.$this->box->status));
            return 1;
        }

        //組合Html
        $this->box->html->menuList = with(new menu_presenter())->menuList($this->box->result->Menu);

        //取得類別選單
        $this->box->result = with(new connection_services())
                                ->sendHTTP(env('SHOP_DOMAIN'). '/GetShopltemDetail', $this->box->postArray);

        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

        if($this->box->status != 0){
            $this->reRrror(trans('message.error.'.$this->box->status));
            return 2;
        }

        $this->box->html->commodityTitle  = $commodity_presenter->title($this->box->result->ShopltemDetail);
        $this->box->html->commodityDetail = $this->box->result->ShopltemDetail->detail;
        $this->box->html->commodityNorm   = $commodity_presenter->norm($this->box->result->ShopltemDetail);
        $this->box->html->commodityMemo   = $this->box->result->ShopltemDetail->memo;
        $this->box->html->commodityDate   = $this->box->result->ShopltemDetail->bDate;

        return 0;
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return false;
    }
}
