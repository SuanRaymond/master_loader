<?php

namespace App\Http\Controllers\WebIndex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class login extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();

        $this->box->params->account  = Request()->get('account');
        $this->box->params->password = Request()->get('password');
    }

    public function index()
    {
        removeSessionJson('account');
        removeSessionJson('password');
        removeSessionJson('member');

        return mIView('login');
    }

    /**
     * 驗證登入資訊
     */
    public function check()
    {
        //資料是否空白
        if(empty($this->box->params->account)){
            return $this->rewarning(trans('message.login.accountNull'));
        }
        if(empty($this->box->params->password)){
            return $this->rewarning(trans('message.login.passwordNull'));
        }

        session()->put('account', $this->box->params->account);
        session()->put('password', $this->box->params->password);

        //重新導向
        return redirect(session()->get('menu', '/'));
    }
    public function rewarning($_msg)
    {
        setMesage([alert(trans('message.title.warning'), $_msg, 3)]);
        return back();
    }
}