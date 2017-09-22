<?php

namespace App\Http\Controllers\WebManager\account;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\Presenter\Manager\page_presenter;
use App\Presenter\Manager\accountlist_presenter;

use App\Services\web_judge_services;
use App\Services\connection_services;
use App\Services\Manager\ctrl_services;

class accountList extends Controller
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

        $this->box->params->mineAdminAccount = null;
        $this->box->params->account          = Request()->get('account', null);
        $this->box->params->adminDown        = Request()->get('adminDown', 1);
        $this->box->params->row              = Request()->get('row', 10);
        $this->box->params->page             = Request()->get('page', 1);
    }

	public function index()
    {
        $this->box->params->mineAdminAccount = auth()->user->account;

        if(is_null($this->box->params->account)){
            $this->box->params->account = auth()->user->account;
        }
        $this->box->ctrlHtml = $this->ctrl_services->get(auth()->user->account, ['A', 'ROW', 'BTN'], $this->box->params);

        $this->search();

    	$box = $this->box;
        return mMView('account.accountList', compact('box'));
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
        $this->box->sendParams['MineAccount'] = $this->box->params->mineAdminAccount;
        $this->box->sendParams['Account']     = $this->box->params->account;
        $this->box->sendParams['DownType']    = $this->box->params->adminDown;
        $this->box->sendParams['Row']         = $this->box->params->row;
        $this->box->sendParams['Page']        = $this->box->params->page;

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);

        $this->box->getResult = $this->box->result;

        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }

        // dd($this->box->result->Data);

        $accountList_presenter = new accountlist_presenter();
        $page_presenter        = new page_presenter();

        //組成分頁：自己 + 下線代理 + 下線會員
        foreach($this->box->result->Data as $key => $row){
            switch($key){
                case 'min':
                    unset($row->count);
                    $html                        = $accountList_presenter->combination($row, false);
                    $this->box->result->bodyMine = $html;
                    break;
                case 'dow':
                    $row = new LengthAwarePaginator($row, $row->count, $this->box->params->row, $this->box->params->page,
                                                                                ['path' => request()->path()]);
                    $row->forget('count');
                    $html = $accountList_presenter->combination($row, true);
                    //帳戶列表 下線代理資訊 HTML組成
                    $this->box->result->bodyDown = $html;
                    //帳戶列表 分頁 HTML 組成上層
                    $this->box->result->pageTop = $page_presenter->searchTop($this->box);
                    //帳戶列表 分頁 HTML 組成下層
                    $this->box->result->pageBottom = $page_presenter->searchBottom($row);
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

        $this->box->result->bodyUpTree = $this->ctrl_services->getTreeUp($this->box->params->mineAdminAccount, $this->box->params->account);

        return;
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return redirect('logout');
    }
}


