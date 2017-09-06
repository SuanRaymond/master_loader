<?php

namespace App\Http\Controllers\WebManager\shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class commodity extends Controller
{
    public function insert()
    {
        return mMView('shop.insert');
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return redirect('logout');
    }
}
