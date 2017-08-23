<?php

namespace App\Http\Controllers\WebIndex\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class shopCarAdd extends Controller
{
    public $box;

    public function __construct(){
		$this->box                 = (object) array();
		$this->box->result         = (object) array();
		$this->box->params         = (object) array();
        $this->box->shopIDs        = (object) array();
        $this->box->params->shopID = Request()->get('ShopID', null);

    }

    public function index()
    {
        if(!is_null($this->box->params->shopID)){
            if(empty(getSessionJson('SetShopID'))){
                createSessionJson('SetShopID');
            }
            if(!searchSessionJson('SetShopID',$this->box->params->shopID)){
                addSessionJson('SetShopID', $this->box->params->shopID);
            }
            session()->save();
            echo json_encode(array(
                'result' => 'SU',
                'msg'    => request('ID'),
            ));
        }
        else{
            echo json_encode(array(
                'result' => 'ER',
                'msg'    => request('ID'),
            ));
        }
        exit;
    }

}
