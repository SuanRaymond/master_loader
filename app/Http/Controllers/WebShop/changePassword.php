<?php

namespace App\Http\Controllers\WebShop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class changePassword extends Controller
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
        return mSView('memberCentre.changePassword', compact('box'));
    }
}
