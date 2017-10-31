<?php

namespace App\Http\Controllers\WebIndex\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Presenter\sGame_presenter;

use App\Services\connection_services;
use App\Services\web_judge_services;
class smallGame extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();
        $this->box->GameAns = (object) array();
        $this->box->html       = (object) array();

        $this->box->html->OddsDetail   ='';

    }

    public function index()
    {
        // removeSessionJson('SetGameANS');
        // dd(getSessionJson('SetGameANS'));
        //放置目前位置
        session()->put('menu', Request()->path());
        $this->box->GameAns = getSessionJson('SetGameANS');
        $this->box->GameAns[0]->MoneyBack = pFormat($this->box->GameAns[0]->MoneyBack);
        // dd($this->box->GameAns[0]);
        if($this->box->GameAns[0]->Type==0){
            $this->box->html->OddsDetail   = with(new sGame_presenter())->OddsDetail($this->box->GameAns[0]->OddsDetail);
        }elseif($this->box->GameAns[0]->Type==1){
            $this->box->html->OddsDetail   = with(new sGame_presenter())->OddsDetailEgg($this->box->GameAns[0]->OddsDetail);
        }
        $box = $this->box;
        return mTView('games.smallGame', compact('box'));
    }
    public function pick()
    {
        //放置目前位置
        session()->put('menu', Request()->path());
        $box = $this->box;
        return mTView('games.pickGames', compact('box'));
    }
}
