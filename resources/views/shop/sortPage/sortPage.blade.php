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
            {!! $box->html->sortList !!}
        </div>
    </div>
    <div style="margin-bottom: 40px;">&nbsp;</div>
@stop
@section('contentBottom')
    @if(session()->get('menu')!='/')
        <div class="fly">
            <a href="javascript:history.back(1)">
                <span>
                    回上页
                </span>
            </a>
            <hr>
            <a href="#Top">
                <span>
                    TOP
                </span>
            </a>
        </div>
    @endif
    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
            <div class="span3">
                <a class="btn navbar-brand" role="button" href="/Shop" style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    {{ trans('view.shophome') }}
                </a>
            </div>
            <div class="dropup span3">
                <a class="btn navbar-brand" role="button" href=":javascript" id="simple-menu"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    {{ trans('view.sort') }}
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
                    {{ trans('view.shopcar') }}
                </a>
            </div>
            <div class="span3">
                <a class="btn navbar-brand" role="button" href="/MFire" style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    {{ trans('view.mfile') }}
                </a>
            </div>
        </div>
    </nav>
@stop






