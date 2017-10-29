<?php

namespace App\Http\Controllers\WebIndex\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
class passBuy extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();

        $this->box->params->shopID  = Request()->get('ShopID', null);
        $this->box->params->shopNum = 1;
    }

    public function index()
    {
        // $result = $this->search();
        // if(!$result){
        //     return mIView('login');
        // }
        // if(empty(getSessionJson('SetShopID'))){
        //     createSessionJson('SetShopID');
        // }
        // if(!searchSessionJson('SetShopID',$this->box->params->shopID)){
        //     addSessionJson('SetShopID', $this->box->params->shopID);
        // }
        //判斷是否建立session
        if(empty(getSessionJson('SetShopID'))){
            createSessionJson('SetShopID');
        }
        if(empty(getSessionJson('SetShopNum'))){
            createSessionJson('SetShopNum');
        }
        //判斷是否存入session
        if(!searchSessionJson('SetShopID', $this->box->params->shopID)){
            addSessionJson('SetShopID', $this->box->params->shopID);
            addSessionJson('SetShopNum', $this->box->params->shopNum);
        }
        else if($this->box->params->shopID != 10008 && $this->box->params->shopID != 10009){
            $this->box->json = getSessionJson('SetShopID');
            foreach($this->box->json as $key => $value){
                if($this->box->params->shopID == $value){
                    $this->box->jsonKey = $key;
                }
            }

            $this->box->json = getSessionJson('SetShopNum');
            $this->box->json[$this->box->jsonKey] = $this->box->json[$this->box->jsonKey] + 1;
            removeSessionJson('SetShopNum');
            session()->put('SetShopNum', json_encode($this->box->json));
        }
        $box = $this->box;
        return redirect('/ShopCar');
    }
    public function search()
    {
        $this->box = with(new web_judge_services($this->box))->check(['CMSS']);

        return true;
    }
}
