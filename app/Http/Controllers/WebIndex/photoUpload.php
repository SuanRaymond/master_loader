<?php

namespace App\Http\Controllers\WebIndex;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use App\Services\web_judge_services;
// use App\Services\connection_services;
class photoUpload extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();
    }

    public function index()
    {
        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        // $this->box->callFunction = 'Detail';
        // $this->box->sendApiUrl   = env('INDEX_DOMAIN');

        // //放入資料區塊
        // $this->box->sendParams             = [];
        // $this->box->sendParams['memberID'] = auth()->user->memberID;

        // //送出資料
        // $this->box->result    = with(new connection_services())->callApi($this->box);
        // $this->box->getResult = $this->box->result;
        // //檢查廠商回傳資訊
        // $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

        // if($this->box->status != 0){
        //     return $this->reRrror(trans('message.error.'.$this->box->status));
        // }
        /*----------------------------------與廠商溝通----------------------------------*/

        $box = $this->box;
        //重新導向
        return mIView('memberCentre.photoUpload', compact('box'));
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
}
