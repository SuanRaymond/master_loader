@extends('layout.layout')

@section('cssImport')
    <link type="text/css" rel="stylesheet" href="./lib/css/base.css"/>
@stop

@section('jsImport')

    <!-- <script type="text/javascript" src="js/shopCar.js"></script> -->

@stop

@section('content')
        <!-- 廣告橫幅-->
        <div id="slideshow-sec" style="margin-top: 10px;">
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
            <div class="span12 fontred" style="font-size: 7vw; text-align: justify; text-align-last: left; padding: 5px;">★for Apple 原廠旅充組 5W</div>

            <div class="span12 fontred" style="font-size: 5vw; text-align: justify; text-align-last: left; padding: 5px;">USB 電源轉換器+原廠30Pin規格/USB2.0 原廠傳輸線</div>

            <div class="span12" style="padding: 10px;">
                <div class="span4" style="font-size: 6vw; text-align: center; height: 40px; line-height: 40px;">價格</div>
                <div class="span4" style="font-size: 6vw; text-align: center; height: 40px; line-height: 40px;">運費</div>
                <div class="span4" style="font-size: 6vw; text-align: center; height: 40px; line-height: 40px;">積分</div>
                <div class="span4 fontred" style="font-size: 6vw; text-align: center; height: 40px; line-height: 40px;">$530</div>
                <div class="span4" style="font-size: 6vw; text-align: center; height: 40px; line-height: 40px;">$ 30</div>
                <div class="span4 fontred" style="font-size: 6vw; text-align: center; height: 40px; line-height: 40px;">10000</div>
            </div>
        </div>

        <div class="span12" style="padding: 15px;">
            <div class="span5">
                <a class="span12 button button-flat-caution" style="height: 40px;line-height: 40px; font-size: 3vw" role="button" href="/ShopCar">加入</a>
            </div>
            <div class="span1">&nbsp;</div>
            <div class="span5">
                <a class="span12 button button-flat-caution" style="height: 40px;line-height: 40px; font-size: 3vw" role="button" href="/Buy">即購</a>
            </div>
        </div>
        <!-- 頁簽參數 -->
        <div class="span12" style="margin-bottom: 100px;">
            <ul id="myTab" class="nav nav-tabs">
                <li class="active span4" style="font-size: 4.5vw; text-align: center;">
                    <a href="#detail" data-toggle="tab">
                        詳情
                    </a>
                </li>
                <li class="span4" style="font-size: 4.5vw; text-align: center;">
                    <a href="#format" data-toggle="tab">
                        規格
                    </a>
                </li>
                <li class="span4" style="font-size: 4.5vw; text-align: center;">
                    <a href="#remark" data-toggle="tab">
                        備註
                    </a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content" style="font-size: 4.5vw; text-align: justify; padding: 0px;">
                <br><br>

                <div class="tab-pane fade in active" id="detail">
                    <p>全新 Apple 原廠USB充電旅行組Apple 原廠30Pin規格 原廠傳輸/充電/數據線原廠USB 2.0 隨插即用,同時安全供電、傳輸,傳輸速度穩定無吊卡(原廠平行輸入)</p>
                </div>

                <div class="tab-pane fade" id="format">
                    <div class="span12 fontred" style="border-bottom : 1px groove red; padding: 5px;">產品參數：</div>
                    <div class="span5" style="padding: 5px;">直購價：</div>
                    <div class="span7" style="padding: 5px;">4,550</div>
                    <div class="span5" style="padding: 5px;">數量：</div>
                    <div class="span7" style="padding: 5px;">1</div>
                    <div class="span5" style="padding: 5px;">已賣數量：</div>
                    <div class="span7" style="padding: 5px;">17</div>
                    <div class="span5" style="padding: 5px;">付款方式：</div>
                    <div class="span7" style="padding: 5px;">7-11取貨付款、
                        銀行或郵局轉帳
                    </div>
                    <div class="span5" style="padding: 5px;">運送方式：</div>
                    <div class="span7" style="padding: 5px;">7-11取貨付款 65元、
                                       7-11取貨 65元、
                                       宅配/快遞 85元
                    </div>
                    <div class="span5" style="padding: 5px;">物品狀況：</div>
                    <div class="span7" style="padding: 5px;">全新</div>
                    <div class="span5" style="padding: 5px;">物品所在地：</div>
                    <div class="span7" style="padding: 5px;">台灣.台南市</div>
                    <div class="span5" style="padding: 5px;">上架時間：</div>
                    <div class="span7" style="padding: 5px;">2011-11-26 15:09:14</div>
                    <div class="span5" style="padding: 5px;">買家下標限制：</div>
                    <div class="span7" style="padding: 5px;">評價總分必須 ≧ 0分，
                                       其中差勁評價 ＜ 1 分，
                                       近半年棄標次數 ≦ 1 次</div>
                    <div class="span5" style="padding: 5px;">備註:</div>
                    <div class="span7" style="padding: 5px;">超商取付、
                                       郵局到付與宅急便
                                       「黑貓PAY貨到付款」
                                       買家結帳條件：
                                       交易未完成次數必須 ≦ 0次，
                                       評價總分必須 ≧ 2分，
                                       近半年棄標次數 ≦ 0 次</div>
                    <div class="span5" style="padding: 5px;">物品開始價格：</div>
                    <div class="span7" style="padding: 5px;">4550元<br><br></div>
                </div>

                <div class="tab-pane fade" id="remark">
                    <p>jMeter 是一款开源的测试软件。它是 100% 纯 Java 应用程序，用于负载和性能测试。</p>
                </div>
            </div>
        </div>
@stop


@section('contentBottom')
    <nav class="navbar navbar-default navbar-fixed-bottom row" role="navigation">
        <a class="span3 button button-flat" style="height: 50px;line-height: 50px; font-size: 4.5vw" href="/Shop" class="button button-flat"><span class="glyphicon glyphicon-home"></span></a>
        <div class="span5" style="text-align: right; height: 50px; line-height: 50px; font-size: 4.5vw">
            價格：530.00
        </div>
        <a class="span4 button button-flat-caution" style="height: 50px;line-height: 50px; font-size: 4.5vw" role="button" href="/ShopCar">購物車</a>
    </nav>
@stop


