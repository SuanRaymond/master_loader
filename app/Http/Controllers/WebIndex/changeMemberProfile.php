<?php

namespace App\Http\Controllers\WebIndex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
use App\Services\connection_services;
class changeMemberProfile extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();

        $this->box->params->name         = Request()->get('name');
        $this->box->params->mail         = Request()->get('mail');
        $this->box->params->address      = Request()->get('address');
        $this->box->params->birthdayYear = Request()->get('birthdayYear');
        $this->box->params->Months       = Request()->get('Months');
        $this->box->params->Days         = Request()->get('Days');
        $this->box->params->gender       = Request()->get('gender');
        $this->box->params->language     = Request()->get('language');
        $this->box->params->cardID       = Request()->get('cardID');

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
        $this->box->sendApiUrl = env('INDEX_DOMAIN');

        $this->box->sessionmember = with(new web_judge_services($this->box))->check(['CMSS']);
        //放入資料區塊
        $this->box->sendParams             = [];
        $this->box->sendParams['memberID'] = auth()->user->memberID;

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
        $this->box->member->mail      = ($this->box->member->mail);
        $this->box->member->address   = ($this->box->member->address);
        $this->box->member->birthday  = empty($this->box->member->birthday)?'-0-0':$this->box->member->birthday;
        $this->box->member->gender    = ($this->box->member->gender);
        $this->box->member->cardID    = ($this->box->member->cardID);
        $this->box->member->languageID = ($this->box->member->languageID);

        return mIView('memberCentre.changeMemberProfile', compact('box'));
    }
    /**
     * 驗證登入資訊
     */
    public function check()
    {
        //資料是否空白
        if(empty($this->box->params->name)){
            return $this->rewarning(trans('message.warn.nameNull'));
        }
        if(empty($this->box->params->mail)){
            return $this->rewarning(trans('message.warn.mailNull'));
        }
        //----------------------------------與廠商溝通----------------------------------
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'DetailUpdate';
        $this->box->sendApiUrl = env('INDEX_DOMAIN');

        $this->box->sessionmember = with(new web_judge_services($this->box))->check(['CMSS']);
        //放入資料區塊
        $this->box->sendParams             = [];
        $this->box->sendParams['memberID'] = auth()->user->memberID;
        $this->box->sendParams['name']     = $this->box->params->name;
        $this->box->sendParams['mail']     = $this->box->params->mail;
        if(!empty($this->box->params->birthdayYear)){
            $this->box->sendParams['address']  = $this->box->params->address;
        }else{
            $this->box->sendParams['address']  = '';
        }
        if(!empty($this->box->params->birthdayYear) &&
            $this->box->params->Months != 0 &&
            $this->box->params->Days != 0)
        {
            $this->box->sendParams['birthday'] = $this->box->params->birthdayYear.'-'.$this->box->params->Months.'-'.$this->box->params->Days;
        }else{
            $this->box->sendParams['birthday'] = '';
        }
        $this->box->sendParams['gender']     = $this->box->params->gender;
        $this->box->sendParams['languageID'] = $this->box->params->language;
        if(!empty($this->box->params->birthdayYear)){
            $this->box->sendParams['cardID']  = $this->box->params->cardID;
        }else{
            $this->box->sendParams['cardID']  = '';
        }
        $this->box->sendParams1 = $this->box->sendParams;
        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reRrror($this->box->status);
        }

        //輸出成功訊息
        setMesage([alert(trans('message.title.success'), trans('message.success.CMFileOK'), 1)]);

        //重新導向
        return redirect('/MFire');
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
    public function rewarning($_msg)
    {
        setMesage([alert(trans('message.title.warning'), $_msg, 3)]);
        return back();
    }
}
