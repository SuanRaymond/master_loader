<?php

namespace App\Http\Controllers\WebIndex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\web_judge_services;
class sortPage extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();
    }

    public function index()
    {
        $result = $this->search();
        if(!$result){
            return mIView('login');
        }
        session()->put('menu', Request()->path());
        $box = $this->box;
        return mSView('sortPage.sortPage', compact('box'));
    }
    public function search()
    {
        $this->box = with(new web_judge_services($this->box))->check(['CMSS']);

        if(!$this->box->loginType){
            return false;
        }

        return true;
    }
}
