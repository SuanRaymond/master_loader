@extends('shop.layout.layout')

@section('cssImport')
@stop

@section('jsImport')

    <script type="text/javascript" src="js/shopCar.js"></script>

@stop

@section('content')
        <!-- 購物車明細項 -->
        <!-- 標頭 -->
        <div class="row" style="margin-top: 55px">
            <div class="span1">
                <input type="checkbox">
            </div>
            <div class="span3">
                商品
            </div>
            <div class="span2">
                單價
            </div>
            <div class="span2">
                數量
            </div>
            <div class="span2">
                總計
            </div>
            <div class="span2">
                詳情
            </div>
        </div><br>
        <!-- 內容 -->
        <div class="row"  style="border-top : 1px groove black;">
            <div class="span1">
                <input type="checkbox">
            </div>
            <div class="span3">
                <div>商品名稱</div>
                <div><img src="images/shop/1.jpg" class="span12"></div>
            </div>
            <div class="span2">
                250
            </div>
            <div class="span2">
                1
            </div>
            <div class="span2">
                250
            </div>
            <div class="span2">
                <a href="#" data-toggle="tooltip" data-placement="left" title={{ $box->memberName }}>詳情</a>
            </div>
        </div>
        <div class="row"  style="border-top : 1px groove black;">
            <div class="span1">
                <input type="checkbox">
            </div>
            <div class="span3">
                <div>商品名稱</div>
                <div><img src="images/shop/2.jpg" class="span12"></div>
            </div>
            <div class="span2">
                250
            </div>
            <div class="span2">
                1
            </div>
            <div class="span2">
                250
            </div>
            <div class="span2">
                <a href="#" data-toggle="tooltip" data-placement="left" title={{ $box->memberName }}>詳情</a>
            </div>
        </div>
        <div class="row"  style="border-top : 1px groove black;">
            <div class="span1">
                <input type="checkbox">
            </div>
            <div class="span3">
                <div>商品名稱</div>
                <div><img src="images/shop/1.jpg" class="span12"></div>
            </div>
            <div class="span2">
                250
            </div>
            <div class="span2">
                1
            </div>
            <div class="span2">
                250
            </div>
            <div class="span2">
                <a href="#" data-toggle="tooltip" data-placement="left" title={{ $box->memberName }}>詳情</a>
            </div>
        </div>
        <div class="row"  style="border-top : 1px groove black;">
            <div class="span1">
                <input type="checkbox">
            </div>
            <div class="span3">
                <div>商品名稱</div>
                <div><img src="images/shop/2.jpg" class="span12"></div>
            </div>
            <div class="span2">
                250
            </div>
            <div class="span2">
                1
            </div>
            <div class="span2">
                250
            </div>
            <div class="span2">
                <a href="#" title="商品標題"
                    data-container="body" data-toggle="popover" data-placement="left"
                    data-content={{ $box->memberName }}>
                    詳情
                </a>
            </div>
        </div>
        <div class="row"  style="border-top : 1px groove black;">
            <div class="span1">
                <input type="checkbox">
            </div>
            <div class="span3">
                <div>商品名稱</div>
                <div><img src="images/shop/1.jpg" class="span12"></div>
            </div>
            <div class="span2">
                250
            </div>
            <div class="span2">
                1
            </div>
            <div class="span2">
                250
            </div>
            <div class="span2">
                <a href="#" title="商品標題"
                    data-container="body" data-toggle="popover" data-placement="left"
                    data-content={{ $box->memberName }}>
                    詳情
                </a>
            </div>
        </div>
@stop