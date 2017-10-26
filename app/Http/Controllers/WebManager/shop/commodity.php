<?php

namespace App\Http\Controllers\WebManager\shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;

class commodity extends Controller
{
	public $box;

    public function __construct()
    {
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();

        $this->box->params->title       = Request()->get('title', null);
		$this->box->params->subTitle    = Request()->get('subTitle', null);
		$this->box->params->imagesTitle = Request()->get('imagesTitle', null);
		$this->box->params->imagesShow  = Request()->get('imagesShow', null);
		$this->box->params->menuID      = Request()->get('menuID', null);
		$this->box->params->price       = Request()->get('price', null);
		$this->box->params->points      = Request()->get('points', null);
		$this->box->params->transport   = Request()->get('transport', null);
		$this->box->params->quantity    = Request()->get('quantity', null);
		$this->box->params->chstyle     = Request()->get('chstyle', null);
		$this->box->params->detail      = Request()->get('detail', null);
		$this->box->params->norm        = Request()->get('norm', null);
		$this->box->params->memo        = Request()->get('memo', null);
    }

	public function index()
    {
    	$box = $this->box;
        return mMView('shop.insert', compact('box'));
    }

    public function insert()
    {
        //----------------------------------與廠商溝通----------------------------------
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'AddCommodity';
        $this->box->sendApiUrl = env('MANAGER_DOMAIN');

        //放入資料區塊
        $this->box->sendParams             = [];
        $this->box->sendParams['title'] = $this->box->params->title;
        $this->box->sendParams['subTitle']     = $this->box->params->subTitle;
        $this->box->sendParams['imagesTitle']     = $this->box->params->imagesTitle;
        $this->box->sendParams['imagesShow']     = $this->box->params->imagesShow;
        $this->box->sendParams['menuID']     = $this->box->params->menuID;
        $this->box->sendParams['price']     = $this->box->params->price;
        $this->box->sendParams['points']     = $this->box->params->points;
        $this->box->sendParams['transport']     = $this->box->params->transport;
        $this->box->sendParams['quantity']     = $this->box->params->quantity;
        $this->box->sendParams['style']     = $this->box->params->chstyle;
        $this->box->sendParams['detail']     = $this->box->params->detail;
        $this->box->sendParams['norm']     = $this->box->params->norm;
        $this->box->sendParams['memo']     = $this->box->params->memo;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;

        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }

        //輸出成功訊息
        setMesage([alert(trans('message.title.success'), trans('message.success.insertOK'), 1)]);

        //重新導向
        return redirect('/InsertShop');
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return redirect('logout');
    }
}

/*
"Title":"標題",
"SubTitle":"副標",
"MenuID":"商品類別ID",
"Price":"售價",
"Points":"積分",
"Transport":"運費",
"Quantity":"數量",
"Style":"風格",
"Detail":"商品說明",
"Norm":"規格",
"Memo":"備註"
 */
