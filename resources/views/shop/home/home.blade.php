@extends('layout.layout')

@section('cssImport')
    <link type="text/css" href="./lib/css/slick.css" rel="stylesheet"/>
    <link type="text/css" href="./lib/css/slick-theme.css" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="./css/shop/shop.css"/>
@stop

@section('jsImport')
    <script type="text/javascript" src="./lib/js/slick.js"></script>
    <script type="text/javascript" src="./js/shop/shop.js"></script>
@stop

@section('content')
    <!-- 萬元專區 -->
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="popular-search-div">
                <span class="popular">萬元專區</span>
                <span class="see-more">查看更多</span>
            </div>

            <div class="popular-search">
                <a href="/detail"><img src="images/shop/pi.png"  width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi1.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi2.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi3.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi4.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi5.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi6.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi7.png" width="100%" alt="" ></a>
            </div>
        </div>
    </div>

    <!-- 萬元專區 -->
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="popular-search-div">
                <span class="popular">萬元專區</span>
                <span class="see-more">查看更多</span>
            </div>

            <div class="popular-search">
                <a href="/detail"><img src="images/shop/pi.png"  width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi1.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi2.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi3.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi4.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi5.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi6.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi7.png" width="100%" alt="" ></a>
            </div>
        </div>
    </div>

    <!-- 萬元專區 -->
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="popular-search-div">
                <span class="popular">萬元專區</span>
                <span class="see-more">查看更多</span>
            </div>

            <div class="popular-search">
                <a href="/detail"><img src="images/shop/pi.png"  width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi1.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi2.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi3.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi4.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi5.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi6.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi7.png" width="100%" alt="" ></a>
            </div>
        </div>
    </div>

    <!-- 萬元專區 -->
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="popular-search-div">
                <span class="popular">萬元專區</span>
                <span class="see-more">查看更多</span>
            </div>

            <div class="popular-search">
                <a href="/detail"><img src="images/shop/pi.png"  width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi1.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi2.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi3.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi4.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi5.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi6.png" width="100%" alt="" ></a>
                <a href="/detail"><img src="images/shop/pi7.png" width="100%" alt="" ></a>
            </div>
        </div>
    </div>
@stop

@section('contentBottom')
    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
            <a class="btn navbar-brand span4" role="button" href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>首頁</a>
            <a class="btn navbar-brand span4" role="button" href="#sidr" id="simple-menu"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>分類</a>
            <a class="btn navbar-brand span4" role="button" href="/shopCar"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>購物車</a>
            <a class="btn navbar-brand span4" role="button" href="/login"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>我的</a>
        </div>
    </nav>
@stop
