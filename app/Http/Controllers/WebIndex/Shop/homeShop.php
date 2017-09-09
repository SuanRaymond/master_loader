<?php

namespace App\Http\Controllers\WebIndex\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Presenter\menu_presenter;

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
        $this->search();
        //放置目前位置
        session()->put('menu', Request()->path());
        $box = $this->box;
        return mSView('home.home', compact('box'));
    }

    public function search()
    {
        $menu_presenter = new menu_presenter();
        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'GetMenu';
        $this->box->sendApiUrl   = env('SHOP_DOMAIN');

        //放入資料區塊
        $this->box->sendParams             = [];
        $this->box->sendParams['MenuID']   = '';

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }
        /*----------------------------------與廠商溝通----------------------------------*/

        //組合Html
        $this->box->html->menuList = $menu_presenter->menuList($this->box->result->Menu);

        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'GetMenuCommodity';
        $this->box->sendApiUrl   = env('SHOP_DOMAIN');

        //放入資料區塊
        $this->box->sendParams             = [];
        $this->box->sendParams['MenuID']   = '';

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

        if($this->box->status != 0){
            return $this->reRrror($this->box->status);
        }
        /*----------------------------------與廠商溝通----------------------------------*/

        //組合Html
        $this->box->html->menuListCommodity = $menu_presenter->menuListMenuCommodity($this->box->result->MenuCommodity);
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
    }
}
