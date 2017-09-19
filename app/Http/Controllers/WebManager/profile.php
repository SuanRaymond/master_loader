<?php

namespace App\Http\Controllers\WebManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\connection_services;

use Crypt;
class profile extends Controller
{
    public $box;

    public function __construct(){
        $this->box                           = (object) array();
        $this->box->result                   = (object) array();
        $this->box->params                   = (object) array();
    }

    public function index()
    {
      $this->box->result                   = auth()->user;
      $this->box->result->mineAccount      = $this->box->result->account;
      $this->box->result->mineAccountCrypt = Crypt::encrypt($this->box->result->mineAccount);
      $this->box->result->points           = $this->box->result->points;
      $this->box->result->integral         = $this->box->result->integral;
      $this->box->result->bonus            = $this->box->result->bonus;

      $box = $this->box;
      return mMView('profile.profile', compact('box'));
    }
}

/*
{#168 ▼
  +"memberID": "65"
  +"name": "Raymond"
  +"account": "13691641712"
  +"points": "0"
  +"integral": "0"
  +"bonus": "0"
  +"languageID": "0"
  +"photo": ""
  +"groupID": "100"
}
 */
