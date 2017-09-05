<?php

namespace App\Http\Controllers\WebManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class logout extends Controller
{
    public function index()
    {
        // session()->put('account', null);
        session()->put('password', null);
        setMesage([alert(trans('error.title.success'), trans('message.logout'), 1)]);
    	return redirect('/');
    }
}
