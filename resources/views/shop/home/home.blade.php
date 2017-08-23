@extends('layout.layout')

@section('cssImport')
    <link type="text/css" rel="stylesheet" href="./lib/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="./lib/css/slick-theme.css"/>
    <link type="text/css" rel="stylesheet" href="./css/shop/shop.css"/>
@stop

@section('jsImport')
    <script type="text/javascript" src="./lib/js/slick.js"></script>
    <script type="text/javascript" src="./js/shop/shop.js"></script>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div id="Banner">
                <img src="images/shop/ad1.jpg" width="100%">
                <img src="images/shop/ad2.jpg" width="100%">
                <img src="images/shop/ad3.jpg" width="100%">
                <img src="images/shop/ad4.jpg" width="100%">
            </div>
        </div>
    </div>

    {!! $box->html->menuListCommodity !!}

    <div style="height: 60px; width: 100%;"></div>
@stop

@section('contentBottom')
    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
            <div class="span3">
                <a class="btn navbar-brand" role="button" href="/Shop" style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    首頁
                </a>
            </div>
            <div class="dropup span3">
                <a class="btn navbar-brand" role="button" href=":javascript" id="simple-menu"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    分類
                </a>

                <ul class="dropdown-menu" aria-labelledby="simple-menu">
                    {!! $box->html->menuList !!}
                    <li role="separator" class="divider"></li>
                    <li><a href="/Shop">{{ trans('menu.menu.0') }}</a></li>
                </ul>
            </div>
            <div class="span3">
                <a class="btn navbar-brand" role="button" href="/ShopCar" style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                    購物車
                </a>
            </div>
            <div class="span3">
                <a class="btn navbar-brand" role="button" href="/MFire" style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    我的
                </a>
            </div>
        </div>
    </nav>
@stop






