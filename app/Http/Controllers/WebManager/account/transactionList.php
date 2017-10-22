<?php

namespace App\Http\Controllers\WebManager\account;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\Presenter\Manager\page_presenter;
use App\Presenter\Manager\transactionlist_presenter;

use App\Services\web_judge_services;
use App\Services\connection_services;
use App\Services\Manager\ctrl_services;

class transactionList extends Controller
{
	public $box;

    public function __construct()
    {
        $this->ctrl_services = new ctrl_services();

        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();

        $this->box->result->pagetop    = null;
        $this->box->result->pagebottom = null;

        $this->box->params->mineAccount = null;
        $this->box->params->account     = Request()->get('account', null);
        $this->box->params->downtype    = Request()->get('adminDown', 1);
        $this->box->params->row         = Request()->get('row', 10);
        $this->box->params->page        = Request()->get('page', 1);
    }

	public function index()
    {
        $this->box->params->mineAccount = auth()->user->account;

        if(is_null($this->box->params->account)){
            $this->box->params->account = auth()->user->account;
        }
        $this->box->ctrlHtml = $this->ctrl_services->get(auth()->user->account, ['A', 'ROW', 'BTN'], $this->box->params);

        $this->search();

    	$box = $this->box;
        return mMView('account.transactionList', compact('box'));
    }

    public function search()
    {
        //----------------------------------與廠商溝通----------------------------------
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'GetAccountList';
        $this->box->sendApiUrl   = env('MANAGER_DOMAIN');

        //放入資料區塊
        $this->box->sendParams                = [];
        foreach($this->box->params as $key => $value){
            if(isset($value)){
                if($value != ''){
                    $this->box->sendParams[$key] = $value;
                }
            }
        }

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);

        $this->box->getResult = $this->box->result;

        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }

        // dd($this->box->result->Data);

        $transactionList_presenter = new transactionlist_presenter();
        $page_presenter            = new page_presenter();

        //組成分頁：自己 + 下線代理 + 下線會員
        foreach($this->box->result->Data as $key => $row){
            switch($key){
                case 'min':
                    unset($row->count);
                    $htmlPresenter                   = $transactionList_presenter->combination($row, false);
                    $this->box->result->bodyMineBody = $htmlPresenter->body;
                    $this->box->result->bodyMineMode = $htmlPresenter->mode;
                    break;
                case 'dow':
                    $row = new LengthAwarePaginator($row, $row->count, $this->box->params->row, $this->box->params->page,
                                                                                ['path' => request()->path()]);
                    $row->forget('count');
                    $htmlPresenter                      = $transactionList_presenter->combination($row, true);
                    //帳戶列表 下線代理資訊 主體HTML組成
                    $this->box->result->bodyDownBody    = $htmlPresenter->body;
                    //帳戶列表 下線代理資訊 點數更動彈出視窗HTML組成
                    $this->box->result->bodyDownMode    = $htmlPresenter->mode;
                    //帳戶列表 分頁 HTML 組成上層
                    $this->box->result->pageTop         = $page_presenter->searchTop($this->box);
                    //帳戶列表 分頁 HTML 組成下層
                    $this->box->result->pageBottom      = $page_presenter->searchBottom($row);
                    break;
                // case 'page':
                // case 'mpage':
                //     foreach($result->min->data as $minRow){
                //         $this->cup->params->adminAccount = $minRow->account;
                //     }
                //     $this->cup->params->$key             = $row;
                //     $this->cup->params->adminDown        = 1;
                //     $this->cup->params->memberAccount    = null;

                //     $this->cup->ctrlHtml->adminAccount  = $this->ctrl_services->get($this->cup->params->mineAdminAccount, ['A'], $this->cup->params)->adminAccount;
                //     $this->cup->ctrlHtml->memberAccount = $this->ctrl_services->get($this->cup->params->mineAdminAccount, ['M'], $this->cup->params)->memberAccount;
                //     Request()->merge(['adminAccount'    => $this->cup->params->adminAccount]);
                //     Request()->merge(['adminDown'       => $this->cup->params->adminDown]);
                //     Request()->merge(['memberAccount'   => $this->cup->params->memberAccount]);
                //     break;
            }
        }

        $this->box->result->bodyUpTree = $this->ctrl_services->getTreeUp($this->box->params->mineAccount, $this->box->params->account);

        return;
    }

    public function change()
    {
        $this->box->changeType          = 0;
        $this->box->params->mineAccount = auth()->user->account;
        $this->box->params->account     = Request()->get('account', '');
        $this->box->params->points      = Request()->get('points');
        $this->box->params->integral    = Request()->get('integral');
        $this->box->params->bonus       = Request()->get('bonus');
        $this->box->params->note        = Request()->get('note');

        //檢查接受帳號是否存在
        if($this->box->params->account == ''){
            return $this->reBack(2, trans('error.manager.teansactionList.nullAccount'));
        }

        //檢查是否空白並且標定使用哪一種轉帳判斷是否為零
        if(!is_null($this->box->params->points)){
            $this->box->changeType = 1;
            if($this->box->params->points == 0){
                return $this->reBack(2, trans('error.manager.teansactionList.zeroPoints'));
            }
        }
        if(!is_null($this->box->params->integral)){
            $this->box->changeType = 2;
            if($this->box->params->integral == 0){
                return $this->reBack(2, trans('error.manager.teansactionList.zeroIntegral'));
            }
        }
        if(!is_null($this->box->params->bonus)){
            $this->box->changeType = 3;
            if($this->box->params->bonus == 0){
                return $this->reBack(2, trans('error.manager.teansactionList.zeroBonus'));
            }
        }

        //所有都是空白的錯誤
        if($this->box->changeType == 0){
            return $this->reBack(2, trans('error.manager.teansactionList.nullPoints'));
        }

        //備註太長
        if(strlen($this->box->params->note) > 100){
            return $this->reBack(2, trans('error.manager.teansactionList.longNote'));
        }

        //----------------------------------與廠商溝通----------------------------------

        return $this->reBack(1, 'ok');
    }

    public function reBack($_status, $_msg)
    {
        if($_status == 1){
            setMesage([alert(trans('message.title.success'), $_msg, 1)]);
        }
        else{
            setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        }
        return back();
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return redirect('logout');
    }
}


