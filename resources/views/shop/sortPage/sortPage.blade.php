@extends('layout.layout')

@section('cssImport')
    <link type="text/css" href="./lib/css/slick.css" rel="stylesheet"/>
    <link type="text/css" href="./lib/css/slick-theme.css" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="./css/shop/shop.css"/>
    <link type="text/css" rel="stylesheet" href="./css/shop/shopSort.css"/>
@stop

@section('jsImport')
    <script type="text/javascript" src="./lib/js/slick.js"></script>
    <script type="text/javascript" src="./js/shop/shop.js"></script>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <!-- <a href="/ShopDetail?ShopID=4001">
                <div class="span5 sortListBox">
                    <img class="span12 sortImg" src="images/shop/pi1.png">
                    <div class="span12 sortListTextBox">
                        <div class="span12 sortListTextTitle">XXXXXX標題</div>
                        <div class="span6 sortListTextOther">$ 100</div>
                        <div class="span6 sortListTextOther">P 1000</div>
                    </div>
                </div>
            </a> -->
            {!! $box->html->sortList !!}
        </div>
    </div>
@stop







