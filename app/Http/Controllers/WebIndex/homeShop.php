<?php

namespace App\Http\Controllers\WebIndex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\encrypt_services;
use App\Services\connection_services;
use App\Services\www_judge_services;
use App\Services\www_respone_services;
class homeShop extends Controller
{
    public $box;

    public function __construct(){
		$this->box         = (object) array();
		$this->box->result = (object) array();
		$this->box->params = (object) array();
    }

    public function index()
    {
        //$this->search();
    	$box = $this->box;
    	return mSView('home.home', compact('box'));
    }

    public function search()
    {
        $encrypt_services     = new encrypt_services(env('APP_KEY'));

        //是否開啟開發模式
        $this->box->deBugMode = false;
        if(config('app.debug') == true && env('USETYPE') == 'LOCAL'){
            $this->box->deBugMode = true;
        }

        $this->box->postArray = [];

        foreach($this->box->params as $key => $value){
            if(isset($value)){
                if($value != ''){
                    $this->box->postArray[$key] = $value;
                }
            }
        }

        $Params = json_encode($this->box->postArray);
        $Sign   = $Params;
        if(!$this->box->deBugMode){
            $Params = $encrypt_services->LaravelEncode($Params);
            $Sign   = $encrypt_services->EnSign($Sign);
        }
        //資料加密與打包
        $this->box->postArray   = http_build_query(
            array(
                'Params' => $Params,
                'Sign'   => $Sign
        ));

        // dd($this->box);
        $this->box->result = with(new connection_services())
                                ->sendHTTP(env('API_SHOP_ADDRESS'). '/GetMenu', $this->box->postArray);
        $this->box = with(new www_judge_services($this->box))->check(['CAPI']);

        if($this->box->status != 0){
            with(new www_respone_services())->reAPI($this->box->status, $this->box);
        }

        //將資料空白去除
        $this->box = reSetKey($this->box);

        return;
    }
}
