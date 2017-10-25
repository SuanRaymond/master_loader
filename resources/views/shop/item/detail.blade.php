@extends('shop.layout.layout')

@section('shopCssImport')
    <link type="text/css" rel="stylesheet" href="./lib/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="./lib/css/slick-theme.css"/>
    <link type="text/css" rel="stylesheet" href="./css/shop/detail.css"/>
@stop

@section('shopJsImport')
    <script type="text/javascript" src="./lib/js/slick.js"></script>
    <script type="text/javascript" src="./js/shop/detail.js"></script>
@stop

@section('shopContent')
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

@section('shopContentBottom')
    <div id="shopCarBall"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></div>
@stop






