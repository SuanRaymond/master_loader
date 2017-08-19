<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta content="" name="description">
        <meta content="" name="author">

        <link type="text/css" rel="stylesheet" href="./lib/css/bootstrap.css"/>
        <link type="text/css" rel="stylesheet" href="./lib/css/bootstrap-theme.css"/>
        <link type="text/css" rel="stylesheet" href="./lib/css/base.css"/>


        @yield('cssImport')


        <script type="text/javascript" src="./lib/js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="./lib/js/bootstrap.js"></script>
        <script type="text/javascript" src="./lib/js/base.js"></script>

        @yield('jsImport')

    </head>
    <body>
        <!-- 浮動頂置 -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="span2"  style="margin-top: 15px;">
                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </div>
            <div class="span10">
                <div class="input-group" style="margin-top: 10px;">
                    <input type="text" class="form-control" placeholder="搜索商品">
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-search"></span>
                </div>
            </div>
        </nav>

        @yield('content')

        <!-- 浮動底端 -->
        <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
            <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
                <a class="btn navbar-brand span4" role="button" href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span><br>首頁</a>
                <a class="btn navbar-brand span4" role="button" href="/shopCar"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><h6>購物車</h6></a>
                <a class="btn navbar-brand span4" role="button"  id="ShopCart"><span aria-hidden="true"></span>加入<br>購物車</a>
                <a class="btn navbar-brand span4" role="button" href="#"><span aria-hidden="true"></span>直接<br>購買</a>
            </div>
        </nav>
    </body>
</html>