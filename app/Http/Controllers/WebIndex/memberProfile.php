<?php

namespace App\Http\Controllers\WebIndex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class memberProfile extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();

        $this->box->reKey    = config('app.key');

        //是否開啟開發模式
        $this->box->deBugMode = false;
        if(config('app.debug') == true && env('USETYPE') == 'LOCAL'){
            $this->box->deBugMode = true;
        }
    }

    public function index()
    {
        $box = $this->box;

        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'Detail';
        $this->box->sendApiUrl   = [];
        $this->box->sendApiUrl[] = env('INDEX_DOMAIN');

        $this->box->sessionmember = with(new web_judge_services($this->box))->check(['CMSS']);
        //放入資料區塊
        $this->box->sendParams             = [];
        $this->box->sendParams['memberID'] = $this->box->sessionmember->member->memberID;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;

        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

        if($this->box->status != 0){
            return $this->reRrror($this->box->status);
        }
        //整理資料
        $this->box->member            = $this->box->result->Member;
        $this->box->member->memberID  = ($this->box->member->memberID);
        $this->box->member->name      = ($this->box->member->name);
        $this->box->member->account   = ($this->box->member->account);
        $this->box->member->mail      = ($this->box->member->mail);
        $this->box->member->address   = ($this->box->member->address);
        $this->box->member->birthday  = ($this->box->member->birthday);
        $this->box->member->gender    = ($this->box->member->gender);
        $this->box->member->cardID    = ($this->box->member->cardID);
        $this->box->member->languageID = ($this->box->member->languageID);
        $this->box->member->points    = ($this->box->member->points);
        $this->box->member->integral  = ($this->box->member->integral);
        $this->box->member->bonus     = ($this->box->member->bonus);

        //重新導向
        return mIView('memberCentre.memberProfile', compact('box'));
    }
    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return redirect('memberCentre.memberProfile');
    }
}
