<?php

namespace App\Http\Controllers\WebIndex\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class shopCar extends Controller
{
    public $box;

    public function __construct(){
		$this->box                  = (object) array();
		$this->box->result          = (object) array();
		$this->box->params          = (object) array();
        $this->box->shopIDs         = (object) array();
        $this->box->params->shopID  = Request()->get('ShopID', null);
        $this->box->params->shopNum = 1;
        $this->box->json            = 0;
        $this->box->jsonKey         = 0;
    }

    public function add()
    {
        if(!is_null($this->box->params->shopID)){
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

    public function rem()
    {
        if(!is_null($this->box->params->shopID)){
            //判斷是否建立session
            if(empty(getSessionJson('SetShopID'))){
                createSessionJson('SetShopID');
            }
            if(empty(getSessionJson('SetShopNum'))){
                createSessionJson('SetShopNum');
            }
            //判斷是否存入session
            if(searchSessionJson('SetShopID', $this->box->params->shopID)){
                $this->box->json = getSessionJson('SetShopID');
                foreach($this->box->json as $key => $value){
                    if($this->box->params->shopID == $value){
                        $this->box->jsonKey = $key;
                    }
                }

                $this->box->json = getSessionJson('SetShopNum');
                $this->box->json[$this->box->jsonKey] = $this->box->json[$this->box->jsonKey] - 1;
                removeSessionJson('SetShopNum');
                session()->put('SetShopNum', json_encode($this->box->json));

                if($this->box->json[$this->box->jsonKey] == 0){
                    masSessionJson('SetShopNum', $this->box->jsonKey);
                    masSessionJson('SetShopID', $this->box->params->shopID);
                }
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

    public function del()
    {
        if(!is_null($this->box->params->shopID)){
            //判斷是否建立session
            if(empty(getSessionJson('SetShopID'))){
                createSessionJson('SetShopID');
            }
            if(empty(getSessionJson('SetShopNum'))){
                createSessionJson('SetShopNum');
            }
            //判斷是否存入session
            if(searchSessionJson('SetShopID', $this->box->params->shopID)){
                $this->box->json = getSessionJson('SetShopID');
                foreach($this->box->json as $key => $value){
                    if($this->box->params->shopID == $value){
                        $this->box->jsonKey = $key;
                    }
                }

                $this->box->json = getSessionJson('SetShopNum');
                $this->box->json[$this->box->jsonKey] = 0;
                removeSessionJson('SetShopNum');
                session()->put('SetShopNum', json_encode($this->box->json));

                if($this->box->json[$this->box->jsonKey] == 0){
                    masSessionJson('SetShopNum', $this->box->jsonKey);
                    masSessionJson('SetShopID', $this->box->params->shopID);
                }
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
