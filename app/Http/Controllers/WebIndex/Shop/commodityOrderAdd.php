<?php

namespace App\Http\Controllers\WebIndex\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Presenter\shopCar_presenter;

use App\Services\encrypt_services;
use App\Services\connection_services;
use App\Services\web_judge_services;
class commodityOrderAdd extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();
        $this->box->html       = (object) array();

        $this->box->html->buydetailList   ='';
        $this->box->html->priceBox        ='';
        $this->box->html->buyNavbarBottom ='';
    }

    public function index()
    {
        $result = $this->search();
        if(!$result){
            return mIView('login');
        }

        $encrypt_services     = new encrypt_services(env('APP_KEY'));

        //是否開啟開發模式
        $this->box->deBugMode = false;
        if(config('app.debug') == true && env('USETYPE') == 'LOCAL'){
            $this->box->deBugMode = true;
        }

        $this->box->MemberBuyToabl=[];
        $this->box->memberBuy = (object) array();
        $this->box->memberBuy = reSetKey(getSessionJson('GetShopltemCar'));
        $this->box->MemberBuyToabl['MemberID'] = auth()->user->memberID;
        foreach ($this->box->memberBuy as $rowID => $group) {
            foreach($group as $shopID => $row){
                foreach(getSessionJson("quantityNumber")[0] as $key => $value){
                    if($shopID == $key){
                        $this->box->MemberBuyToabl['Item'][$row->shopID] =  $value;//$row->quantity;
                    }
                }
            }
        }
        foreach(getSessionJson('addressee') as $row){
            $this->box->MemberBuyToabl['Addressee'] = $row;
        }
        foreach(getSessionJson('phone') as $row){
            $this->box->MemberBuyToabl['phone'] = $row;
        }
        foreach(getSessionJson('address') as $row){
            $this->box->MemberBuyToabl['address'] = $row;
        }
        $Params = json_encode($this->box->MemberBuyToabl);
        $Sign   = $Params;
        if(!$this->box->deBugMode){
            $Params = $encrypt_services->LaravelEncode($Params);
            $Sign   = $encrypt_services->EnSign($Sign);
        }
        //資料加密與打包
        $this->box->MemberBuyToabl   = http_build_query(
            array(
                'Params' => $Params,
                'Sign'   => $Sign
        ));

        //取得類別選單
        $this->box->result = with(new connection_services())
                                ->sendHTTP(env('SHOP_DOMAIN'). '/CommodityOrderAdd', $this->box->MemberBuyToabl);
        $this->box = with(new web_judge_services($this->box))->check(['CAPI']);
        if($this->box->status != 0){
            return $this->reRrror(trans('message.error.'.$this->box->status));
        }
        // 金額數量參數
        removeSessionJson('quantityNumber');
        removeSessionJson('totalprice');
        removeSessionJson('totaltransport');
        removeSessionJson('totalPoint');
        removeSessionJson('totalMoney');
        // 產品資料參數
        removeSessionJson('SetShopID');
        removeSessionJson('GetShopltemCar');
        // 收件人參數
        removeSessionJson('index');
        removeSessionJson('addressee');
        removeSessionJson('phone');
        removeSessionJson('address');
        removeSessionJson('defaule');
        setMesage([alert(trans('message.title.success'), trans('message.success.buyOK'), 1)]);
        $box = $this->box;
        // return redirect('/Shop');
        return redirect('/BuyList');
    }
    public function search()
    {
        $this->box = with(new web_judge_services($this->box))->check(['CMSS']);

        return true;
    }
    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
}
