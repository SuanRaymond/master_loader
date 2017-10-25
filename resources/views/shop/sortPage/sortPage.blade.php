@extends('shop.layout.layout')

@section('shopCssImport')
    <link type="text/css" href="./lib/css/slick.css" rel="stylesheet"/>
    <link type="text/css" href="./lib/css/slick-theme.css" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="./css/shop/shop.css"/>
    <link type="text/css" rel="stylesheet" href="./css/shop/shopSort.css"/>

@stop

@section('shopJsImport')
    <script type="text/javascript" src="./lib/js/slick.js"></script>
    <script type="text/javascript" src="./js/shop/shop.js"></script>
@stop

@section('shopContent')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="span12" style="text-align: center;"><h1>{{ trans('menu.'. substr(session()->get('menu'), strpos(session()->get('menu'), '=')+1)) }}</h1></div>
            {!! $box->html->sortList !!}
        </div>
    </div>
    <div style="margin-bottom: 40px;">&nbsp;</div>
@stop

@section('shopContentBottom')
@stop






