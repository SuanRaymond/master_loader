<?php

namespace App\Http\Controllers\WebIndex\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
class clearShopCarList extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();

        $this->box->params->shopID        = Request()->get('ShopID', null);
    }

    public function index()
    {
        $result = $this->search();
        if(!$result){
            return mIView('login');
        }
        masSessionJson('SetShopID', $this->box->params->shopID);
        if(empty(getSessionJson('SetShopID'))){
            removeSessionJson('SetShopID');
        }
        $box = $this->box;
        return redirect('/ShopCar');
    }
    public function search()
    {
        $this->box = with(new web_judge_services($this->box))->check(['CMSS']);

        if(!$this->box->loginType){
            return false;
        }

        return true;
    }
}
