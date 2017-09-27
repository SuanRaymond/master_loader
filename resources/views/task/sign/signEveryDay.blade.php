@extends('layout.layout')

@section('cssImport')
    <link type="text/css" rel="stylesheet" href="./lib/css/base.css"/>
    <link type="text/css" rel="stylesheet" href="./css/task/sign.css"/>
@stop

@section('jsImport')
    <script type="text/javascript" src="./js/task/sign.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#sign").click(function(){
                RaySys.Alert.Fixet("{{ trans('message.onWaiting') }}","", 0);
                RaySys.AJAX.Send({memberID: 0}, '/ajax/SignSend', 'SuFun', 'ErFun');
            });
        });
    </script>
@stop

@section('content')

    <div class="span12 text-justify" style="margin-top: 15vh; font-size: 4.5vw;">
        <div class="text-center" style="margin-bottom: 10px;">
            按下下方藍色  <strong style="font-size: 8vw;">簽</strong>  按鈕，可以每日簽到。
        </div>
        <ins>連續簽到每達200日</ins>
        可獲得額外加速，此加速可累積到此套餐結束後歸0，新套餐需重新累積。
    </div>
    <div class="span12" style="text-align: center;>
        <span class="button-wrap">
            <a class="button button-circle button-primary" id="sign">
                {{ trans('view.sign.b.send') }}
            </a>
        </span>
    </div>
    <br>
    <div class="span12 text-center">
        <h3 style="font-size: 7vw;">
            連續簽到&nbsp;
            <span class="fontred" style="font-size: 9vw;"><ins>{{ $box->params->Count }}</ins></span>&nbsp;
            天
        </h3>
    </div>
@stop

@section('contentBottom')
    <div class="fly">
        <a href="/Task">
            <span>
                回上页
            </span>
        </a>
        <hr>
        <a href="/">
            <span>
                首页
            </span>
        </a>
    </div>
@stop






