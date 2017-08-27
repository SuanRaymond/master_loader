@extends('layout.layout')

@section('cssImport')
    <style type="text/css" media="screen">
        body{
            overflow-y: hidden;
        }
    </style>
@stop

@section('jsImport')
@stop

@section('content')
    <div class="animated bounceInDown" id="doSomethingBlockBanner">
        <div id="doSomethingBlockBannerBody">
            <img src="images/banner1.jpg"/>
        </div>
    </div>

    <div id="doSomethingBlockBody" align="center" class="row">
        <div class="animated bounceInLeft span6">
            <a href="{{ $box->loginType ? '' : '/Login' }}">
                <img src="./images/Gift.png" width="100%">
                <div align="center">{{ trans('view.home.b.quickTask') }}</div>
            </a>
        </div>
        <div class="animated bounceInRight span6">
            <!-- <a href="{{ $box->loginType ? '/Shop' : '/Login' }}"> -->
            <a href="/Shop">
                <img src="./images/shop.png" width="100%">
                <div align="center">{{ trans('view.home.b.quickShop') }}</div>
            </a>
        </div>
    </div>
@stop

@section('contentBottom')

@stop
