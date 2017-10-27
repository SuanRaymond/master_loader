@extends('layout.layout')

@section('cssImport')
@stop

@section('jsImport')

    <script type="text/javascript" src="./js/shop/buy.js"></script>

@stop

@section('content')
    <!-- 其他資訊 -->
    <div class="panel panel-primary" style="font-size: 130%;">
        <div class="panel-heading">
            <h2 class="panel-title" align="center" style="font-size: 110%;">{{ trans('view.shopBuy.memberTitle') }}</h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="span4">
                    {{ trans('view.shopBuy.memberName') }}
                </div>
                <div class="span8" id="addressee">
                    {{ $box->member->addressee }}
                </div>
                <div class="span4">
                    {{ trans('view.shopBuy.memberPhone') }}
                </div>
                <div class="span8" id="phone">
                    {{ $box->member->phone }}
                </div>
                <div class="span4">
                    {{ trans('view.shopBuy.memberAddress') }}
                </div>
                <div class="span8" id="address">
                    {{ $box->member->address }}
                </div>
                <div class="span12">
                    <a href="/AddressListPic" class="button button-flat-primary button-large button-block WaitingBtn">
                        {{ trans('view.shopBuy.b.changeAddress') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
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
            <a href="#Top">
                <span>
                    TOP
                </span>
            </a>
        </div>
    @endif

    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
            <a href="/Shop" class="btn button button-flat-caution button-large button-block btn-group btn-group-xs WaitingBtn span12">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                {{ trans('view.b.home') }}
            </a>
            <a class="btn button button-flat button-large button-block btn-group btn-group-xs WaitingBtn span12">
                {{ trans('view.shopCar.totalMoney') }}：
                <span id="BottomMoney"> {{ $box->totalMoney }}</span>
            </a>
            <a href="javascript:;" id="buysend"
               class="btn button button-flat-action button-large button-block btn-group btn-group-xs span12">
                {{ trans('view.shopBuy.b.buy') }}
                <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
            </a>
        </div>
    </nav>
@stop



