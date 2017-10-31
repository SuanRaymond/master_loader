<?php

namespace App\Http\Controllers\WebIndex\Account\Member;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class photoUpload extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();
    }

    public function index()
    {
        $box = $this->box;
        //重新導向
        return mIView('memberCentre.photoUpload', compact('box'));
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return back();
    }
}
