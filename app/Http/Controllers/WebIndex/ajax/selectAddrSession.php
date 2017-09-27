<?php

namespace App\Http\Controllers\WebIndex\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class selectAddrSession extends Controller
{
    public $box;

    public function __construct(){
        $this->box                 = (object) array();
        $this->box->result         = (object) array();
        $this->box->params         = (object) array();

        $this->box->params->index     = Request()->get('index', null);
        $this->box->params->addressee = Request()->get('addressee', null);
        $this->box->params->phone     = Request()->get('phone', null);
        $this->box->params->address   = Request()->get('address', null);
        $this->box->params->defaule   = Request()->get('defaule', null);

    }

    public function index()
    {
        if(!is_null($this->box->params->index)){
            //判斷是否建立session
            if(empty(getSessionJson('index'))){
                createSessionJson('index');
            }
            if(empty(getSessionJson('addressee'))){
                createSessionJson('addressee');
            }
            if(empty(getSessionJson('phone'))){
                createSessionJson('phone');
            }
            if(empty(getSessionJson('address'))){
                createSessionJson('address');
            }
            //判斷是否存入session
            addSessionJson('index', $this->box->params->index);
            addSessionJson('addressee', $this->box->params->addressee);
            addSessionJson('phone', $this->box->params->phone);
            addSessionJson('address', $this->box->params->address);
            session()->save();
            // dd(getSessionJson('index'));
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
