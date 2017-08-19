@extends('shop.layout.ProductDetail')

@section('cssImport')
    <link type="text/css" rel="stylesheet" href="./lib/css/sweetalert.css">
    <link type="text/css" rel="stylesheet" href="./lib/css/buttons.css" />
@stop

@section('jsImport')
    <script type="text/javascript" src="./lib/js/sweetalert.js"></script>
    <script type="text/javascript" src="./lib/js/buttons.js"></script>
    <script type="text/javascript" src="./js/ProductDetail.js"></script>
@stop

@section('content')
        <!-- 廣告橫幅-->
        <div id="slideshow-sec" style="margin-top: 55px;">
            <div id="carousel-div" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="images/shop/item/999999/i010001.jpg" width="100%" alt="">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/shop/item/999999/i010002.jpg" width="100%" alt="">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/shop/item/999999/i010003.jpg" width="100%" alt="">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/shop/item/999999/i010002.jpg" width="100%" alt="">
                        <div class="carousel-caption">
                        </div>
                    </div>
                </div>
                <!--INDICATORS-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-div" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-div" data-slide-to="1"></li>
                    <li data-target="#carousel-div" data-slide-to="2"></li>
                    <li data-target="#carousel-div" data-slide-to="3"></li>
                </ol>
                <!--PREVIUS-NEXT BUTTONS-->
                <a class="left carousel-control" href="#carousel-div" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-div" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <!-- 產品項目 -->
        <div class="span12">
            <div class="span12"><h2 class="fontred">★for Apple 原廠旅充組 5W</h2></div>
            <div class="span12"><h3>USB 電源轉換器+原廠30Pin規格/USB2.0 原廠傳輸線</h3></div>
            <div class="span12">
                <div class="span4"><h4>促銷價</h4></div>
                <div class="span4"><h4>原價</h4></div>
                <div class="span4"><h4>運費</h4></div>
                <div class="span4"><h4><span class="fontred"><strong>$530</strong></span></h4></div>
                <div class="span4"><h4><span class="fontred"><s>&nbsp;$1000&nbsp;</s></span></h4></div>
                <div class="span4"><h4>$30</h4></div>
            </div>
        </div>
        <!-- 頁簽參數 -->
        <div class="span12" style="margin-bottom: 100px;">
            <ul id="myTab" class="nav nav-tabs">
                <li class="active span4">
                    <a href="#detail" data-toggle="tab">
                        詳情
                    </a>
                </li>
                <li class="span4">
                    <a href="#format" data-toggle="tab">
                        規格
                    </a>
                </li>
                <li class="span4">
                    <a href="#remark" data-toggle="tab">
                        備註
                    </a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="detail">
                    <p>全新 Apple 原廠USB充電旅行組<br>Apple 原廠30Pin規格 原廠傳輸/充電/數據線<br>原廠USB 2.0 隨插即用,同時安全供電、傳輸,傳輸速度穩定<br>無吊卡(原廠平行輸入)</p>
                </div>
                <div class="tab-pane fade" id="format">
                    <div class="span4 fontred" style="border-bottom : 1px groove red;">產品參數：</div>
                    <div class="span8">.</div>
                    <div class="span8">.</div>
                    <div class="span5">直購價：</div>
                    <div class="span7">4,550</div>
                    <div class="span5">數量：</div>
                    <div class="span7">1</div>
                    <div class="span5">已賣數量：</div>
                    <div class="span7">17</div>
                    <div class="span5">付款方式：</div>
                    <div class="span7">7-11取貨付款<br>
                        銀行或郵局轉帳
                    </div>
                    <div class="span5">運送方式：</div>
                    <div class="span7">7-11取貨付款 65元<br>
                                       7-11取貨 65元<br>
                                       宅配/快遞 85元
                    </div>
                    <div class="span5">物品狀況：</div>
                    <div class="span7">全新</div>
                    <div class="span5">物品所在地：</div>
                    <div class="span7">台灣.台南市</div>
                    <div class="span5">上架時間：</div>
                    <div class="span7">2011-11-26 15:09:14</div>
                    <div class="span5">買家下標限制：</div>
                    <div class="span7">評價總分必須 ≧ 0分，<br>
                                       其中差勁評價 ＜ 1 分，<br>
                                       近半年棄標次數 ≦ 1 次</div>
                    <div class="span5">備註:</div>
                    <div class="span7">超商取付、<br>
                                       郵局到付與宅急便<br>
                                       「黑貓PAY貨到付款」<br>
                                       買家結帳條件：<br>
                                       交易未完成次數必須 ≦ 0次，<br>
                                       評價總分必須 ≧ 2分，<br>
                                       近半年棄標次數 ≦ 0 次</div>
                    <div class="span5">物品開始價格：</div>
                    <div class="span7">4550元<br><br></div>
                </div>
                <div class="tab-pane fade" id="remark">
                    <p>jMeter 是一款开源的测试软件。它是 100% 纯 Java 应用程序，用于负载和性能测试。</p>
                </div>
            </div>
        </div>
        <!-- 商品細節 -->
{{--         <div>
            <div class="span4 fontred" style="border-bottom : 1px groove red;">商品細節：</div>
            <div class="span8">.</div>
            <div class="span8">.</div>
            <div>
                <img src="images/shop/item/999999/i010001.jpg" class="span12">
                <img src="images/shop/item/999999/i010002.jpg" class="span12">
                <img src="images/shop/item/999999/i010003.jpg" class="span12">
            </div>
        </div> --}}
@stop