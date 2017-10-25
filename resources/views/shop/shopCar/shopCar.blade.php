@extends('layout.layout')

@section('cssImport')
    <link type="text/css" rel="stylesheet" href="./css/shop/shopCar.css"/>
@stop

@section('jsImport')
    <script type="text/javascript" src="./js/shop/shopCar.js"></script>
@stop

@section('content')
    <!-- 購物車 - 明細項 -->
    <div class="panel panel-info" style="font-size: 130%;">
        <div class="panel-heading">
            <h2 class="panel-title" align="center" style="font-size: 110%;">{{ trans('view.shopCar.productTitle') }}</h2>
        </div>
        <div class="panel-body">
            @if($box->html->detailList != '')
                {!! $box->html->detailList !!}
            @else
                {{ trans('message.shopCar.noSelect') }}
            @endif
        </div>
    </div>

    <!-- 購物車 - 總價格 -->
    <div class="panel panel-danger" style="font-size: 100%;">
        <div class="panel-heading">
            <h2 class="panel-title" align="center" style="font-size: 110%;">{{ trans('view.shopCar.priceTitle') }}</h2>
        </div>
        <div class="panel-body">
            <!-- 價格列表 -->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <span class="span2"></span>
                        <div class="span5">
                            {{ trans('view.shopCar.th.productTotalPoint') }}
                        </div>
                        <div class="span4" id="totalPoint">
                            {{ $box->totalPoint }}
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <span class="span2"></span>
                        <div class="span5">
                            {{ trans('view.shopCar.th.productMoney') }}
                        </div>
                        <div class="span5" id="totalprice">
                            <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                            US.
                            {{ $box->totalPrice }}
                        </div>
                        <span class="span2">+</span>
                        <div class="span5">
                            {{ trans('view.shopCar.th.productFare') }}
                        </div>
                        <div class="span5" id="totalTransport">
                            <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                            US.
                            {{ $box->totalTransport }}
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <span class="span2"></span>
                        <div class="span5">
                            {{ trans('view.shopCar.totalMoney') }}
                        </div>
                        <div class="span5" id="totalMoney">
                            <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                            US.
                            {{ $box->totalMoney }}
                        </div>
                    </div>
                </div>
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

    <form action="Buy" method="post" class="hidden" id="toBuyForm">
        {!! csrf_field() !!}
        <input type="text" value="" name="sendData" id="sendData">
    </form>

    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
            <div class="span3">
                <a class="btn navbar-brand span12" role="button" href="/Shop" style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    {{ trans('view.shophome') }}
                </a>
            </div>
            <div class="span5">
                <h4 class="navbar-text span12 text-center" style="padding-left: 0px; padding-right: 0px; font-size: 100%;">
                    {{ trans('view.shopCar.totalMoney') }}：
                    <span id="BottomMoney"> {{ $box->totalMoney }}</span>
                </h4>
            </div>
            <div class="span4">
                <a class="btn btn-danger navbar-brand span12 WaitingBtn" role="button" id="sendBuy"
                   tyle="padding-left: 0px; padding-right: 0px; color: white;">
                    {{ trans('view.shopCar.b.Checkout') }}
                    <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </nav>

@stop



