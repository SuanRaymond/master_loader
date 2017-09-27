<?php

namespace App\Http\Controllers\WebIndex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Presenter\address_presenter;

use App\Services\encrypt_services;
use App\Services\connection_services;
use App\Services\web_judge_services;
class addressManagement extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();
        $this->box->html   = (object) array();

        $this->box->params->indexnumber = Request()->get('indexnumber');
        $this->box->params->addressee   = Request()->get('addressee');
        $this->box->params->phone       = Request()->get('phone');
        $this->box->params->address     = Request()->get('address');
        $this->box->params->default     = Request()->get('default');

        $this->box->html->addressList   = '';
        $this->box->html->selectaddress = '';
    }
    // 地址管理
    public function index()
    {
        $result = $this->search();
        $box = $this->box;
        return mIView('memberCentre.memberAddressList', compact('box'));
    }
    public function search()
    {
        $address_presenter = new address_presenter();
        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'AddressList';
        $this->box->sendApiUrl   = env('INDEX_DOMAIN');

        //放入資料區塊
        $this->box->sendParams             = [];
        $this->box->sendParams['memberID'] = auth()->user->memberID;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        // dd($this->box->result->DefaultID);
        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }
        /*----------------------------------與廠商溝通----------------------------------*/
        $this->box->html->addressList = $address_presenter->addressList($this->box->result->List,$this->box->result->DefaultID);

        return true;
    }
    // 新增地址
    public function newdata()
    {
        $this->box->index     = '';
        $this->box->addressee = '';
        $this->box->phone     = '';
        $this->box->address   = '';
        $this->box->defaule   = '';
        $this->box->addressType = 0;
        $box = $this->box;
        return mIView('memberCentre.changeAddress', compact('box'));
    }
    // 修改地址
    public function change()
    {
        foreach(getSessionJson('index') as $row){
            $this->box->index = $row;
        }
        foreach(getSessionJson('addressee') as $row){
            $this->box->addressee = $row;
        }
        foreach(getSessionJson('phone') as $row){
            $this->box->phone = $row;
        }
        foreach(getSessionJson('address') as $row){
            $this->box->address = $row;
        }
        foreach(getSessionJson('defaule') as $row){
            $this->box->defaule = $row;
        }
        $this->box->addressType = 1;
        $box = $this->box;
        return mIView('memberCentre.changeAddress', compact('box'));
    }
    // 選擇地址
    public function select()
    {
        session()->put('menu', Request()->path());

        $address_presenter = new address_presenter();
        /*----------------------------------與廠商溝通----------------------------------*/
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'AddressList';
        $this->box->sendApiUrl   = env('INDEX_DOMAIN');

        //放入資料區塊
        $this->box->sendParams             = [];
        $this->box->sendParams['memberID'] = auth()->user->memberID;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        // dd($this->box->result->DefaultID);
        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }
        /*----------------------------------與廠商溝通----------------------------------*/
        $this->box->html->selectaddress = $address_presenter->selectaddress($this->box->result->List,$this->box->result->DefaultID);

        $box = $this->box;
        return mIView('memberCentre.selectAddress', compact('box'));
    }
    // 新增地址更變送出
    public function Ncheck()
    {
        //資料是否空白
        if(empty($this->box->params->addressee)){
            return $this->rewarning(trans('message.warn.addresseeNull'));
        }
        if(empty($this->box->params->phone)){
            return $this->rewarning(trans('message.warn.phoneNull'));
        }
        if(empty($this->box->params->address)){
            return $this->rewarning(trans('message.warn.addressNull'));
        }
        //----------------------------------與廠商溝通----------------------------------
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'AddressAdd';
        $this->box->sendApiUrl = env('INDEX_DOMAIN');

        //放入資料區塊
        $this->box->sendParams              = [];
        $this->box->sendParams['memberID']  = auth()->user->memberID;
        $this->box->sendParams['addressee'] = $this->box->params->addressee;
        $this->box->sendParams['phone']     = $this->box->params->phone;
        $this->box->sendParams['address']   = $this->box->params->address;
        $this->box->sendParams['default']   = $this->box->params->default;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }

        //輸出成功訊息
        setMesage([alert(trans('message.title.success'), trans('message.success.CMFileOK'), 1)]);

        //重新導向
        return redirect('/AddressList');
    }
    // 修改地址更變送出
    public function Ccheck()
    {
        //資料是否空白
        if(empty($this->box->params->addressee)){
            return $this->rewarning(trans('message.warn.nameNull'));
        }
        //----------------------------------與廠商溝通----------------------------------
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'AddressUpdate';
        $this->box->sendApiUrl = env('INDEX_DOMAIN');

        //放入資料區塊
        $this->box->sendParams              = [];
        $this->box->sendParams['memberID']  = auth()->user->memberID;
        $this->box->sendParams['index']     = $this->box->params->indexnumber;
        $this->box->sendParams['addressee'] = $this->box->params->addressee;
        $this->box->sendParams['phone']     = $this->box->params->phone;
        $this->box->sendParams['address']   = $this->box->params->address;
        $this->box->sendParams['default']   = $this->box->params->default;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }
        removeSessionJson('index');
        removeSessionJson('addressee');
        removeSessionJson('phone');
        removeSessionJson('address');
        removeSessionJson('defaule');
        //輸出成功訊息
        setMesage([alert(trans('message.title.success'), trans('message.success.CMFileOK'), 1)]);

        //重新導向
        return redirect('/AddressList');
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
