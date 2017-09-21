@extends('layout.layout')

@section('cssImport')
    <link type="text/css" rel="stylesheet" href="./css/shop/shopCar.css"/>
@stop

@section('jsImport')

    <script type="text/javascript" src="./js/shop/buy.js"></script>

@stop

@section('content')
        <!-- 購物車明細項 -->
        <div class="span12 shopCarBlockTitle">
            {{ trans('view.shopCar.productTitle') }}
        </div>
        <!-- 內容 -->
        {!! $box->html->buydetailList !!}
        <!-- 價格 -->
        {!! $box->html->priceBox !!}
        <!-- 其他資訊 -->
        <div class="span12 shopCarBlockTitle">
            {{ trans('view.shopBuy.memberTitle') }}
        </div>
        <div class="span12 shopCarItemBox">
            <div class="row shopCarItemTextBox">
                <div class="span4 shopCarListTitle">
                    {{ trans('view.shopBuy.memberName') }}
                </div>
                <div class="span8">
                    {{ $box->result->Member->name }}
                </div>
                <div class="span4 shopCarListTitle">
                    {{ trans('view.shopBuy.memberPhone') }}
                </div>
                <div class="span8">
                    {{ $box->result->Member->account }}
                </div>
                <div class="span4 shopCarListTitle">
                    {{ trans('view.shopBuy.memberAddress') }}
                </div>
                <div class="span8">
                    {{ $box->result->Member->address }}
                </div>
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
    {!! $box->html->buyNavbarBottom !!}
@stop



