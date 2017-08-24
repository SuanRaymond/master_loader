@extends('layout.layout')

@section('cssImport')
    <link type="text/css" rel="stylesheet" href="./lib/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="./lib/css/slick-theme.css"/>
    <link type="text/css" rel="stylesheet" href="./css/shop/detail.css"/>
@stop

@section('jsImport')
    <script type="text/javascript" src="./lib/js/slick.js"></script>
    <script type="text/javascript" src="./js/shop/detail.js"></script>
@stop

@section('content')
    {!! $box->html->commodityTitle !!}

    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#DetailDetail" data-toggle="tab">{{ trans('view.ShopDetail.b.detail') }}</a>
                </li>
                <li>
                    <a href="#DetailNorm" data-toggle="tab">{{ trans('view.ShopDetail.b.norm') }}</a>
                </li>
                <li>
                    <a href="#DetailMemo" data-toggle="tab">{{ trans('view.ShopDetail.b.memo') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="DetailDetail">
                    @if($box->html->commodityDetail != '')
                        {!! $box->html->commodityDetail !!}
                    @else
                        <div class="alert alert-warning" role="alert">{{ trans('view.nodata') }}</div>
                    @endif
                </div>
                <div class="tab-pane fade" id="DetailNorm">
                    @if($box->html->commodityNorm != '')
                        {!! $box->html->commodityNorm !!}
                    @else
                        <div class="alert alert-warning" role="alert">{{ trans('view.nodata') }}</div>
                    @endif
                </div>
                <div class="tab-pane fade" id="DetailMemo">
                @if($box->html->commodityMemo != '')
                        {!! $box->html->commodityMemo !!}
                    @else
                        <div class="alert alert-warning" role="alert">{{ trans('view.nodata') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            {{ trans('view.ShopDetail.bdate') }}：{!! $box->html->commodityDate !!}
        </div>
    </div>

    <div style="height: 60px; width: 100%;"></div>
@stop

@section('contentBottom')
    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
            <div class="span3">
                <a class="btn navbar-brand" role="button" href="/Shop"  style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    {{ trans('view.shophome') }}
                </a>
            </div>
            <div class="dropup span3">
                <a class="btn navbar-brand" role="button" href=":javascript" id="simple-menu"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="padding-left: 0px; padding-right: 0px;">
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
                <a class="btn navbar-brand" role="button" href="/ShopCar"  style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                    {{ trans('view.shopcar') }}
                </a>
            </div>
            <div class="span3">
                <a class="btn navbar-brand" role="button" href="/MFire"  style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    {{ trans('view.mfile') }}
                </a>
            </div>
        </div>
    </nav>

    <div id="shopCarBall"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></div>
@stop






