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
        $this->box->html           = (object) array();
        $this->box->params->shopID = Request()->get('ShopID', null);

    }

    public function index()
    {
        if($this->box->params->shopID == 1){
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
