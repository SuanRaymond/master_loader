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
        <div class="span12 shopCarBlockTitle">
            {{trans('view.shopCar.priceTitle')}}
        </div>
        <div class="span12 shopCarPriceBox">
            <div class="row" style="width: 100%; margin: 0px;">
                <div class="span6" style="padding: 0px;">
                    {{trans('view.shopCar.th.productMoney')}}
                </div>
                <div class="span6" id="totalprice">
                    {{ pFormat($box->price->totalprice) }}
                </div>
                <div class="span6" style="padding: 0px;">
                    {{ trans('view.shopCar.th.productFare') }}
                </div>
                <div class="span6" id="totaltransport">
                    {{ pFormat($box->price->totaltransport) }}
                </div>
            </div>
        </div>
        <div class="span12" style="padding-bottom: 10px; background-color: #FFFFFF; font-size: 4.5vw;">
            <div class="span6" style="padding: 0px;">
                {{trans('view.shopCar.totalMoney')}}
            </div>
            <div class="span6" id="totalMoney">
                {{ pFormat($box->price->totalMoney) }}
            </div>
        </div>
        <div class="span12 shopCarTotalPointBox">
            <div class="span6" style="padding: 0px;">
                {{trans('view.shopCar.th.productTotalPoint')}}
            </div>
            <div class="span6" id="totalPoint">
                {{ pFormat($box->price->totalPoint) }}
            </div>
        </div>
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
    <!-- @if(session()->get('menu')!='/')
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
    @endif -->
    <nav class="navbar navbar-default navbar-fixed-bottom row" role="navigation">
        <a class="span3 button button-flat shopCarNavbarBottom" href="/Shop">
            <span class="glyphicon glyphicon-home"></span>
        </a>
        <div class="span5 shopCarNavbarBottom" style="text-align: right;">
            {{ trans('view.shopCar.totalMoney') }}：{{ pFormat($box->price->totalMoney) }}
        </div>
        <a class="span4 button button-flat-caution shopCarNavbarBottom" role="button" id="buysend">
            {{ trans('view.shopBuy.b.buy') }}
        </a>
    </nav>
@stop



