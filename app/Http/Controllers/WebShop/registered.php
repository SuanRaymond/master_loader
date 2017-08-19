<?php

namespace App\Http\Controllers\WebShop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class registered extends Controller
{
    public $box;

    public function __construct(){
        $this->box         = (object) array();
        $this->box->result = (object) array();
        $this->box->params = (object) array();
    }

    public function index()
    {

        $this->box->memberName = 'Raymond';
        $this->box->memberName .= '-php123';

        $box = $this->box;
        return mSView('registered', compact('box'));
    }
}
