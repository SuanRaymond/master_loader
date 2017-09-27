<?php

namespace App\Http\Controllers\WebIndex\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class addressSession extends Controller
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
        // dd($this->box->params);
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
            if(empty(getSessionJson('defaule'))){
                createSessionJson('defaule');
            }
            //判斷是否存入session
            if(!searchSessionJson('index',$this->box->params->index)){
                addSessionJson('index', $this->box->params->index);
            }
            if(!searchSessionJson('addressee',pRFormat($this->box->params->addressee))){
                addSessionJson('addressee', pRFormat($this->box->params->addressee));
            }
            if(!searchSessionJson('phone',pRFormat($this->box->params->phone))){
                addSessionJson('phone', pRFormat($this->box->params->phone));
            }
            if(!searchSessionJson('address',pRFormat($this->box->params->address))){
                addSessionJson('address', pRFormat($this->box->params->address));
            }
            if(!searchSessionJson('defaule',pRFormat($this->box->params->defaule))){
                addSessionJson('defaule', pRFormat($this->box->params->defaule));
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
    public function deleteA()
    {
        if(!is_null($this->box->params->index)){
            //----------------------------------與廠商溝通----------------------------------
            //放入連線區塊
            //需呼叫的功能
            $this->box->callFunction = 'AddressUpdate';
            $this->box->sendApiUrl = env('INDEX_DOMAIN');

            //放入資料區塊
            $this->box->sendParams              = [];
            $this->box->sendParams['memberID']  = auth()->user->memberID;
            $this->box->sendParams['index']     = $this->box->params->index;
            $this->box->sendParams['addressee'] = '';
            $this->box->sendParams['phone']     = '';
            $this->box->sendParams['address']   = '';
            $this->box->sendParams['default']   = '';

            //送出資料
            $this->box->result    = with(new connection_services())->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
            if($this->box->status != 0){
                return $this->reRrror(trans('message.error.'.$this->box->status));
            }
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
