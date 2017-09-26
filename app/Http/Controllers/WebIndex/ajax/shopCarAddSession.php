<?php

namespace App\Http\Controllers\WebIndex\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class shopCarAddSession extends Controller
{
    public $box;

    public function __construct(){
        $this->box                 = (object) array();
        $this->box->result         = (object) array();
        $this->box->params         = (object) array();
        $this->box->shopIDs        = (object) array();
        $this->box->params->quantityNumber = Request()->get('quantityNumber', null);
        $this->box->params->totalprice     = Request()->get('totalprice', null);
        $this->box->params->totaltransport = Request()->get('totaltransport', null);
        $this->box->params->totalPoint     = Request()->get('totalPoint', null);
        $this->box->params->totalMoney     = Request()->get('totalMoney', null);

    }

    public function index()
    {
        if(!is_null($this->box->params->totalprice)&&
           !is_null($this->box->params->totaltransport)&&
           !is_null($this->box->params->totalPoint)&&
           !is_null($this->box->params->totalMoney)){
            //判斷是否建立session
            if(empty(getSessionJson('quantityNumber'))){
                createSessionJson('quantityNumber');
            }
            if(empty(getSessionJson('totalprice'))){
                createSessionJson('totalprice');
            }
            if(empty(getSessionJson('totaltransport'))){
                createSessionJson('totaltransport');
            }
            if(empty(getSessionJson('totalPoint'))){
                createSessionJson('totalPoint');
            }
            if(empty(getSessionJson('totalMoney'))){
                createSessionJson('totalMoney');
            }
            //判斷是否存入session
            if(!searchSessionJson('quantityNumber',$this->box->params->quantityNumber)){
                addSessionJson('quantityNumber', $this->box->params->quantityNumber);
            }
            if(!searchSessionJson('totalprice',$this->box->params->totalprice)){
                addSessionJson('totalprice', $this->box->params->totalprice);
            }
            if(!searchSessionJson('totaltransport',$this->box->params->totaltransport)){
                addSessionJson('totaltransport', $this->box->params->totaltransport);
            }
            if(!searchSessionJson('totalPoint',$this->box->params->totalPoint)){
                addSessionJson('totalPoint', $this->box->params->totalPoint);
            }
            if(!searchSessionJson('totalMoney',$this->box->params->totalMoney)){
                addSessionJson('totalMoney', $this->box->params->totalMoney);
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
