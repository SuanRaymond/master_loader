<?php

namespace App\Http\Controllers\WebManager\report;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\Presenter\Manager\page_presenter;
use App\Presenter\Manager\rebateList_presenter;

use App\Services\web_judge_services;
use App\Services\connection_services;
use App\Services\Manager\ctrl_services;

class rebateList extends Controller
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

        $this->box->params->mineAccount      = null;
        $this->box->params->account          = Request()->get('account', null);
        $this->box->params->downtype         = Request()->get('adminDown', 1);
        $this->box->params->start            = Request()->get('startDate', date('Y-m-d 00:00', strtotime('first day of this month')));
        $this->box->params->end              = Request()->get('endDate', date('Y-m-d 23:59', strtotime('last day of this month')));
        $this->box->params->row              = Request()->get('row', 10);
        $this->box->params->page             = Request()->get('page', 1);
    }

	public function index()
    {
        $this->box->params->mineAccount = auth()->user->account;

        if(is_null($this->box->params->account)){
            $this->box->params->account = auth()->user->account;
        }
        $this->box->ctrlHtml = $this->ctrl_services->get(auth()->user->account, ['A', 'DT', 'ROW', 'BTN'], $this->box->params);

        $this->search();

    	$box = $this->box;
        return mMView('report.rebateList', compact('box'));
    }

    public function search()
    {
        //----------------------------------與廠商溝通----------------------------------
        //放入連線區塊
        //需呼叫的功能
        $this->box->callFunction = 'GetRebateList';
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
        $this->box->sendParams['start'] = $this->box->sendParams['start']. ':00';
        $this->box->sendParams['end']   = $this->box->sendParams['end']. ':59';

        //送出資料
        $this->box->result    = with(new connection_services())->callApi($this->box);
        $this->box->getResult = $this->box->result;

        //檢查廠商回傳資訊
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }

        // dd($this->box);

        $rebateList_presenter    = new rebateList_presenter();
        $page_presenter          = new page_presenter();

        $this->box->result = new LengthAwarePaginator($this->box->result->Data, $this->box->result->Data->count,
                                                      $this->box->params->row, $this->box->params->page, ['path' => request()->path()]);
        $this->box->result->forget('count');
        $html = $rebateList_presenter->combination($this->box->result);
        //購物清單 主體資訊 HTML組成
        $this->box->result->body = $html->htmlRow;
        //購物清單 詳細資訊 HTML組成
        $this->box->result->detail = $html->htmlDetail;
        //購物清單 分頁 HTML 組成上層
        $this->box->result->pageTop = $page_presenter->searchTop($this->box);
        //購物清單 分頁 HTML 組成下層
        $this->box->result->pageBottom = $page_presenter->searchBottom($this->box->result);

        return;
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return redirect('logout');
    }
}


