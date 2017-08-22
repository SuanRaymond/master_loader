<?php

namespace App\Http\Controllers\WebIndex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Presenter\menu_presenter;

use App\Services\encrypt_services;
use App\Services\connection_services;
use App\Services\web_judge_services;
class homeShop extends Controller
{
    public $box;

    public function __construct(){
		$this->box         = (object) array();
		$this->box->result = (object) array();
		$this->box->params = (object) array();
        $this->box->html   = (object) array();

        $this->box->html->menuList          = '';
        $this->box->html->menuListCommodity = '';
    }

    public function index()
    {
        $result = $this->search();
        if(!$result){
            return redirect('/Login');
        }
        session()->put('menu', Request()->path());
    	$box = $this->box;
    	return mSView('home.home', compact('box'));
    }

    public function search()
    {
        $this->box = with(new web_judge_services($this->box))->check(['CMSS']);

        if(!$this->box->loginType){
            return false;
        }

        $encrypt_services = new encrypt_services(env('APP_KEY'));
        $menu_presenter   = new menu_presenter();

        //是否開啟開發模式
        $this->box->deBugMode = false;
        if(config('app.debug') == true && env('USETYPE') == 'LOCAL'){
            $this->box->deBugMode = true;
        }

        $this->box->postArray = [];
        $this->box->postArray = ['MenuID' => ''];

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
            return $this->reRrror($this->box->status);
        }

        //組合Html
        $this->box->html->menuList = $menu_presenter->menuList($this->box->result->Menu);

        //取得商品選單
        $this->box->result = with(new connection_services())
                                ->sendHTTP(env('SHOP_DOMAIN'). '/GetMenuCommodity', $this->box->postArray);
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

        if($this->box->status != 0){
            return $this->reRrror($this->box->status);
        }

        //組合Html
        $this->box->html->menuListCommodity = $menu_presenter->menuListMenuCommodity($this->box->result->MenuCommodity);

        return true;
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return false;
    }
}
