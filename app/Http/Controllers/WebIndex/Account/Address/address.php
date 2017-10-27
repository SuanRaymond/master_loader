<?php

namespace App\Http\Controllers\WebIndex\Account\Address;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Presenter\address_presenter;

use App\Services\connection_services;
use App\Services\web_judge_services;
class address extends Controller
{
	public $box;

    public function __construct(){
        $this->box             = (object) array();
        $this->box->result     = (object) array();
        $this->box->params     = (object) array();
        $this->box->html       = (object) array();

        $this->box->params->addressID = Request()->get('addressID', '');
        $this->box->params->name      = Request()->get('name', '');
        $this->box->params->phone     = Request()->get('phone', '');
        $this->box->params->address   = Request()->get('address', '');
        $this->box->params->master    = Request()->get('master', '');
    }

    /**
     * 主頁面
     */
	public function index()
	{
		$this->box->html->addressList = '';
		$this->search();

		//組成頁面
		$this->box->html->addressList = with(new address_presenter())->addressList($this->box->result->List, $this->box->result->DefaultID);

        $box = $this->box;
        return mIView('account.address.address', compact('box'));
	}

	/**
	 * 新增
	 */
	public function add()
	{
        //給勾選框預設資料
        if($this->box->params->master == ''){
        	$this->box->params->master = false;
        }
        else{
        	$this->box->params->master = true;
        }

        //判斷是否為第一次進入
        if($this->box->params->name == '' && $this->box->params->phone == '' &&
    	   $this->box->params->address == '' && !$this->box->params->master){
        	$box = $this->box;
        	return mIView('account.address.addressAdd', compact('box'));
        }

    	//寫入
    	$result = $this->insert();
    	if(!$result){
    		$box = $this->box;
        	return mIView('account.address.addressAdd', compact('box'));
    	}

    	//輸出成功訊息
        setMesage([alert(trans('message.title.success'), trans('message.onInsertSuc'), 1)]);
    	return redirect('/AddressList');
	}

	/**
	 * 修改
	 */
	public function change()
	{
		//給勾選框預設資料
        if($this->box->params->master == ''){
        	$this->box->params->master = false;
        }
        else{
        	$this->box->params->master = true;
        }

        //判斷是否為第一次進入
        if($this->box->params->name == '' && $this->box->params->phone == '' &&
    	   $this->box->params->address == '' && !$this->box->params->master){
        	//查詢
        	$this->search();

        	//放入資料
			$addressID                  = $this->box->params->addressID;
			$this->box->params->name    = $this->box->result->List->$addressID->addressee;
			$this->box->params->phone   = $this->box->result->List->$addressID->phone;
			$this->box->params->address = $this->box->result->List->$addressID->address;
			if($this->box->result->DefaultID == $addressID){
				$this->box->params->master = true;
			}

			$box = $this->box;
	        return mIView('account.address.addressChange', compact('box'));
        }

    	//寫入
    	$result = $this->update();
    	if(!$result){
    		$box = $this->box;
        	return mIView('account.address.addressChange', compact('box'));
    	}

    	//輸出成功訊息
        setMesage([alert(trans('message.title.success'), trans('message.onChangeSuc'), 1)]);
    	return redirect('/AddressList');
	}

	/**
	 * 刪除
	 */
	public function delete()
	{
		$this->box->params->name      = '';
        $this->box->params->phone     = '';
        $this->box->params->address   = '';
        $this->box->params->master    = '';

        if($this->box->params->addressID == ''){
    		return $this->reError(trans('error.addressList.nullAddressID'));
    	}

    	//刪除
    	$result = $this->setData(2);
    	if($result){
	    	//輸出成功訊息
	        setMesage([alert(trans('message.title.success'), trans('message.onChangeSuc'), 1)]);
    	}

    	return redirect('/AddressList');
	}

	/**
	 * 修改預設
	 */
	public function setMaster()
	{
		//查詢
    	$this->search();

    	//放入資料
		$addressID                  = $this->box->params->addressID;
		$this->box->params->name    = $this->box->result->List->$addressID->addressee;
		$this->box->params->phone   = $this->box->result->List->$addressID->phone;
		$this->box->params->address = $this->box->result->List->$addressID->address;
		$this->box->params->master  = true;
		$result = $this->update();
    	if($result){
    		//輸出成功訊息
    		setMesage([alert(trans('message.title.success'), trans('message.onChangeSuc'), 1)]);
    	}
    	else{
    		//輸出失敗訊息
        	setMesage([alert(trans('message.title.error'), trans('message.onChangeErr'), 2)]);
    	}

    	return redirect('/AddressList');
	}

	/**
	 * 選擇
	 */
	public function pick()
	{
		//判斷是否為第一次進入
        if($this->box->params->name == '' && $this->box->params->phone == '' &&
    	   $this->box->params->address == ''){
        	//查詢
        	$this->box->html->addressList = '';
			$this->search();

			//組成頁面
			$this->box->html->addressList =
				with(new address_presenter())->addressList($this->box->result->List, $this->box->result->DefaultID, false);

	        $box = $this->box;
	        return mIView('account.address.addressRedio', compact('box'));
        }
		//送出選取
		//將資料存入 Session
        if(empty(getSessionJson('address'))){
            createSessionJson('address');
        }
        else{
        	removeSessionJson('address');
        }
        session()->save();
        $this->box->address            = (object) array();
        $this->box->address->addressee = $this->box->params->name;
        $this->box->address->phone     = $this->box->params->phone;
        $this->box->address->address   = $this->box->params->address;

		session()->put('address', json_encode($this->box->address));
		session()->save();
        return redirect('/Buy');
	}

	/***** 共用函數 ******/

	/**
	 * 新增
	 */
	public function insert()
	{
		/****** 送出新增的流程 ******/
        //判斷資料是否存在
        if(!is_bool($this->box->params->master)){
        	return $this->reError(trans('error.addressList.typeMaster'));
        }
    	if($this->box->params->name == ''){
    		return $this->reError(trans('error.addressList.nullName'));
    	}
    	if($this->box->params->phone == ''){
    		return $this->reError(trans('error.addressList.nullPhone'));
    	}
    	if($this->box->params->address == ''){
    		return $this->reError(trans('error.addressList.nullAddress'));
    	}

		return $this->setData(0);
	}

	/**
	 * 修改
	 */
	public function update()
	{
		/****** 送出修改的流程 ******/
        //判斷資料是否存在
        if(!is_bool($this->box->params->master)){
        	return $this->reError(trans('error.addressList.typeMaster'));
        }
        if($this->box->params->addressID == ''){
    		return $this->reError(trans('error.addressList.nullAddressID'));
    	}
    	if($this->box->params->name == ''){
    		return $this->reError(trans('error.addressList.nullName'));
    	}
    	if($this->box->params->phone == ''){
    		return $this->reError(trans('error.addressList.nullPhone'));
    	}
    	if($this->box->params->address == ''){
    		return $this->reError(trans('error.addressList.nullAddress'));
    	}

		return $this->setData(1);
	}

	/**
	 * 查詢
	 */
	public function search()
    {
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
        if($this->box->status != 0){
            return $this->reError(trans('message.error.'. $this->box->status));
        }
        /*----------------------------------與廠商溝通----------------------------------*/
    }

    /**
     * 設定資料
     * @param int $_type ０、新增，１、修改，２、刪除
     */
    public function setData($_type)
    {
    	//----------------------------------與廠商溝通----------------------------------
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'AddressAdd';
        $this->box->sendApiUrl = env('INDEX_DOMAIN');

        //放入資料區塊
        $this->box->sendParams              = [];
        $this->box->sendParams['memberID']  = auth()->user->memberID;
        $this->box->sendParams['addressee'] = $this->box->params->name;
        $this->box->sendParams['phone']     = $this->box->params->phone;
        $this->box->sendParams['address']   = $this->box->params->address;
        $this->box->sendParams['default']   = $this->box->params->master;

        if($_type == 1 || $_type == 2){
        	//修改連線位置
        	$this->box->callFunction = 'AddressUpdate';
        	$this->box->sendParams['index'] = $this->box->params->addressID;
        }

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reError(trans('message.error.'.$this->box->status));
        }
        //----------------------------------與廠商溝通----------------------------------

        return true;
    }

	public function reError($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
    }
}