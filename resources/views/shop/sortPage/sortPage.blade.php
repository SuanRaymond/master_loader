@extends('layout.layout')

@section('cssImport')
    <link type="text/css" href="./lib/css/slick.css" rel="stylesheet"/>
    <link type="text/css" href="./lib/css/slick-theme.css" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="./css/shop/shop.css"/>
    <link type="text/css" rel="stylesheet" href="./css/shop/shopSort.css"/>
@stop

@section('jsImport')
    <script type="text/javascript" src="./lib/js/slick.js"></script>
    <script type="text/javascript" src="./js/shop/shop.js"></script>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <!-- <a href="/ShopDetail?ShopID=4001">
                <div class="span5 sortListBox">
                    <img class="span12 sortImg" src="images/shop/pi1.png">
                    <div class="span12 sortListTextBox">
                        <div class="span12 sortListTextTitle">XXXXXX標題</div>
                        <div class="span6 sortListTextOther">$ 100</div>
                        <div class="span6 sortListTextOther">P 1000</div>
                    </div>
                </div>
            </a> -->
            {!! $box->html->sortList !!}
        </div>
    </div>
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






