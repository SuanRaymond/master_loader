<?php

namespace App\Http\Controllers\WebIndex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class logout extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();
    }

    public function index()
    {
        //將資料寫入 session
        removeSessionJson('account');
        removeSessionJson('password');
        removeSessionJson('member');

        //輸出成功訊息
        setMesage([alert(trans('message.title.success'), trans('message.login.out'), 1)]);
    	return redirect('/');
    }
}