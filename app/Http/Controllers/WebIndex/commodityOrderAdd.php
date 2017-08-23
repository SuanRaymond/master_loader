<?php

namespace App\Http\Controllers\WebIndex;

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
        $this->box->MemberBuyToabl['MemberID'] = $this->box->member->memberID;
        foreach ($this->box->memberBuy as $rowID => $group) {
            foreach($group as $shopID => $row){
                $this->box->MemberBuyToabl['Item'][$row->shopID] =  $row->quantity;
            }
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
            return $this->reRrror($this->box->status);
        }
        removeSessionJson('SetShopID');
        removeSessionJson('GetShopltemCar');
        setMesage([alert(trans('message.title.success'), '購買成功', 1)]);
        $box = $this->box;
        return redirect('/Shop');
    }
    public function search()
    {
        $this->box = with(new web_judge_services($this->box))->check(['CMSS']);

        if(!$this->box->loginType){
            return false;
        }

        return true;
    }
    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
}
