<?php

namespace App\Http\Controllers\WebIndex\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Services\connection_services;
use App\Services\web_judge_services;
class smallGame extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();
    }

    public function index()
    {
        //放置目前位置
        session()->put('menu', Request()->path());
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
