<?php

namespace App\Http\Controllers\WebManager\shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    	dd($this->box);
        return mMView('shop.insert');
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
