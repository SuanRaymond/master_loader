<?php

namespace App\Http\Controllers\WebManager\account;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\Presenter\Manager\page_presenter;
use App\Presenter\Manager\accountlist_presenter;

use App\Services\web_judge_services;
use App\Services\connection_services;
use App\Services\Manager\ctrl_services;

class createAccount extends Controller
{
    public $box;

    public function __construct()
    {
        $this->ctrl_services = new ctrl_services();

        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();

    }

    public function index()
    {

        dd(auth()->user->memberID);
        $box = $this->box;
        return mMView('account.createAccount', compact('box'));
    }

    public function reRrror($_msg)
    {
        setMesage([alert(trans('message.title.error'), $_msg, 2)]);
        return redirect('logout');
    }
}


