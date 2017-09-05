<?php

namespace App\Http\Controllers\WebManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class login extends Controller
{
    public function index()
    {
        return mMView('login.login');
    }

    public function check()
    {
    	//宣告變數
		$account  = Request()->get('account');
		$password = Request()->get('password');

		//資料是否空白
		if(empty($account)){
			return $this->reRrror(trans('error.login.accountNull'));
		}
		if(empty($password)){
			return $this->reRrror(trans('error.login.passwordNull'));
		}

		session()->put('account', $account);
		session()->put('password', $password);

		return redirect('/');
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return mMView('login.login');
    }
}
