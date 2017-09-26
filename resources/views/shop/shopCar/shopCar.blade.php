@extends('layout.layout')

@section('cssImport')
    <link type="text/css" rel="stylesheet" href="./css/shop/shopCar.css"/>
@stop

@section('jsImport')

    <script type="text/javascript" src="./js/shop/shopCar.js"></script>
@stop

@section('content')
        <!-- 購物車明細項 -->
        <div class="span12 shopCarBlockTitle">{{ trans('view.shopCar.productTitle') }}</div>
        <!-- 內容 -->
        {!! $box->html->detailList !!}


        <!-- 價格 -->
        {!! $box->html->priceBox !!}
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
    {!! $box->html->NavbarBottom !!}

@stop



