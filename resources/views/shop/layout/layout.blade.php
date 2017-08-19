<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta content="" name="description">
    <meta content="" name="author">

    <link type="text/css" href="./lib/css/bootstrap.css" rel="stylesheet"/>
    <link type="text/css" href="./lib/css/bootstrap-theme.css" rel="stylesheet"/>
    <link type="text/css" href="./lib/css/base.css" rel="stylesheet"/>
    <link type="text/css" href="./lib/css/jquery.sidr.dark.min.css" rel="stylesheet"/>

    @yield('cssImport')

    <script type="text/javascript" src="./lib/js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="./lib/js/bootstrap.js"></script>
    <script type="text/javascript" src="./lib/js/base.js"></script>
    <script type="text/javascript" src="./lib/js/jquery.sidr.min.js"></script>

    @yield('jsImport')

    <title>{{ trans('view.title') }}</title>
</head>

<body>
    <!-- 搜尋 -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/"><img src="images/shop/logo.png"></a>
                <div class="input-group" style="margin-top: 10px;">
                    <input type="text" class="form-control" placeholder="搜索商品">
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-search"></span>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- 浮動底端 -->
    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
            <a class="btn navbar-brand span4" role="button" href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>首頁</a>
            <a class="btn navbar-brand span4" role="button" href="#sidr" id="simple-menu"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>分類</a>
            <a class="btn navbar-brand span4" role="button" href="/shopCar"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>購物車</a>
            <a class="btn navbar-brand span4" role="button" href="/login"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>我的</a>
        </div>
    </nav>
    <div id="sidr">
        <!-- Your content -->
        <a href="#" id="sidrclose">
            <div class="span12" style="margin-bottom: 10px; text-align: right;">
                <span class="glyphicon glyphicon-remove"></span>關閉
            </div>
        </a>
        <ul>
            <li><a href="/">3C</a></li>
            <li><a href="/">周邊</a></li>
            <li><a href="/">NB</a></li>
            <li><a href="/">通訊</a></li>
            <li><a href="/">數位</a></li>
            <li><a href="/">家電</a></li>
            <li><a href="/">日用</a></li>
            <li><a href="/">食品</a></li>
            <li><a href="/">生活</a></li>
            <li><a href="/">休閒</a></li>
            <li><a href="/">美妝保健</a></li>
            <li><a href="/">衣鞋包表</a></li>
            <li><a href="/">運動戶外</a></li>
            <li><a href="/">時尚</a></li>
        </ul>
    </div>
</body>

</html>