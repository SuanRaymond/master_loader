@extends('shop.layout.layout')

@section('shopCssImport')
    <link type="text/css" rel="stylesheet" href="./lib/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="./lib/css/slick-theme.css"/>
    <link type="text/css" rel="stylesheet" href="./css/shop/shop.css"/>
@stop

@section('shopJsImport')
    <script type="text/javascript" src="./lib/js/slick.js"></script>
    <script type="text/javascript" src="./js/shop/shop.js"></script>
@stop

@section('shopContent')
    <div id="LoadingPage">
        <div id="LoadingPageContent" class="well well-lg" align="center">
            <img src="./images/run.gif" width="100%" style="max-width: 400px;" alt="">
            <h2>{{ trans('message.onLoadPage') }}</h2>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <div id="Banner">
                <!-- <img src="images/shop/ad1.jpg" width="100%">
                <img src="images/shop/ad2.jpg" width="100%">
                <img src="images/shop/ad3.jpg" width="100%">
                <img src="images/shop/ad4.jpg" width="100%"> -->
                <img src="{{ $box->itemImg['da1'] }}" width="100%">
                <img src="{{ $box->itemImg['da2'] }}" width="100%">
            </div>
        </div>
    </div>

    {!! $box->html->menuListCommodity !!}

    <div style="height: 60px; width: 100%;"></div>
@stop

@section('shopContentBottom')
@stop






