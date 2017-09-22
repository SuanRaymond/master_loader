<?php
namespace App\Services\Manager;

use App\Presenter\Manager\ctrl_presenter;

use App\Services\connection_services;
use App\Services\web_judge_services;

class ctrl_services{

	public $box;
	public $ctrl_presenter;
	public $connection_services;

	public function __construct()
    {
    	$this->box                 = (object) array();
		$this->ctrl_presenter      = new ctrl_presenter();
		$this->connection_services = new connection_services();
    }

	/**
	 * 取得控制項
	 * @param  string 	$_account 代理帳號
	 * @param  aray 	$_mode    取得項目
	 */
	public function get($_account, $_mode, $_default)
	{
        //需呼叫的功能
        $this->box->callFunction = 'Ctrl';
        $this->box->sendApiUrl   = env('MANAGER_DOMAIN');

        //放入資料區塊
        $this->box->sendParams                 = [];
        $this->box->sendParams['adminAccount'] = $_account;
        $this->box->sendParams['mode']         = $_mode;

        //送出資料
        $this->box->result    = $this->connection_services->callApi($this->box);
        $this->box->getResult = $this->box->result;
        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

        if($this->box->status != 0){
            return '';
        }

        return $this->ctrl_presenter->combination($this->box->result->Data, $_mode, $_default);
	}

	public function getPass($_account, $_mode, $_default)
	{
		return $this->ctrl_presenter->combination('', $_mode, $_default);
	}

	public function getTreeUp($_mineAccount, $_account)
	{
        //需呼叫的功能
        $this->box->callFunction = 'TreeUp';
        $this->box->sendApiUrl   = env('MANAGER_DOMAIN');

        //放入資料區塊
        $this->box->sendParams                = [];
        $this->box->sendParams['mineAccount'] = $_mineAccount;
        $this->box->sendParams['account']     = $_account;

        //送出資料
        $this->box->result    = $this->connection_services->callApi($this->box);
        $this->box->getResult = $this->box->result;

        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);

        if($this->box->status != 0){
            return '';
        }

        return $this->ctrl_presenter->combination($this->box->result->Data, ['TU'], $_account)->treeUp;
	}
}
