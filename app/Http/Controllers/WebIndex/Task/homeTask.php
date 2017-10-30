<?php

namespace App\Http\Controllers\WebIndex\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Presenter\bateList_presenter;

use App\Services\connection_services;
use App\Services\web_judge_services;
class homeTask extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();
        $this->box->html   = (object) array();


        $this->box->html->RebateList    = '';
        $this->box->html->contentBottom = '';
    }

    public function index()
    {
        $this->search();
        //放置目前位置
        session()->put('menu', Request()->path());
        $box = $this->box;
        return mTView('home.home', compact('box'));
    }

    public function search()
    {
        $bateList_presenter = new bateList_presenter();
        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'GetRebateTaskToday';
        $this->box->sendApiUrl   = config('app.urlAPIIndex');

        //放入資料區塊
        $this->box->sendParams             = [];
        $this->box->sendParams['memberID']   = auth()->user->memberID;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

        if($this->box->status != 0){
            return $this->reError(trans('message.error.'.$this->box->status));
        }
        /*----------------------------------與廠商溝通----------------------------------*/

        if($this->box->result->Status == 0){
            /*----------------------------------與廠商溝通----------------------------------*/
            //放入連線區塊
            //需呼叫的功能

            $this->box->callFunction = 'RebateList';
            $this->box->sendApiUrl   = config('app.urlAPIIndex');

            //放入資料區塊
            $this->box->sendParams             = [];
            $this->box->sendParams['memberID']   = auth()->user->memberID;
            //送出資料
            $this->box->result    = with(new connection_services())->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
            if($this->box->status != 0){
                return $this->reError(trans('message.error.'.$this->box->status));
            }
            /*----------------------------------與廠商溝通----------------------------------*/

            //組合Html
            $this->box->html->RebateList = $bateList_presenter->bateList($this->box->result->RebateList);
            $this->box->html->contentBottom = $bateList_presenter->contentBottom();
        }elseif ($this->box->result->Status == 1) {
            /*----------------------------------與廠商溝通----------------------------------*/
            //放入連線區塊
            //需呼叫的功能

            $this->box->callFunction = 'GetRebateTaskList';
            $this->box->sendApiUrl   = config('app.urlAPIIndex');

            //放入資料區塊
            $this->box->sendParams             = [];
            $this->box->sendParams['memberID']   = auth()->user->memberID;
            //送出資料
            $this->box->result    = with(new connection_services())->callApi($this->box);
            $this->box->getResult = $this->box->result;
            //檢查廠商回傳資訊
            $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
            if($this->box->status != 0){
                return $this->reError(trans('message.error.'.$this->box->status));
            }
            /*----------------------------------與廠商溝通----------------------------------*/

            //組合Html
            $this->box->html->RebateList = $bateList_presenter->taskList($this->box->result);
            $this->box->html->contentBottom = '';
        }
    }

    public function reError($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
}
