<?php

namespace App\Http\Controllers\WebManager\shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
use App\Services\Manager\ctrl_services;

class commodityUpdate extends Controller
{
	public $box;

    public function __construct()
    {
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();

        $this->box->baseImg = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTVlNTJiNDlkYWMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNWU1MmI0OWRhYyI+PHJlY3Qgd2lkdGg9IjE3MSIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI2MC4xODc1IiB5PSI5NC4zNjQwNjI1Ij4xNzF4MTgwPC90ZXh0PjwvZz48L2c+PC9zdmc+';

        $this->box->params->shopID      = Request()->get('shopID', null);
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
        return mMView('shop.update', compact('box'));
    }

    public function update()
    {
        //----------------------------------與廠商溝通----------------------------------
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'UpdateCommodity';
        $this->box->sendApiUrl = env('MANAGER_DOMAIN');

        //放入資料區塊
        $this->box->sendParams             = [];
        $this->box->sendParams['shopID'] = $this->box->params->shopID;
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
        setMesage([alert(trans('message.title.success'), trans('message.success.updateOK'), 1)]);

        //重新導向
        return redirect('/UpdateShop');
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return redirect('logout');
    }
}


