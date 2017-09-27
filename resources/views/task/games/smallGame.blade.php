@extends('layout.layout')

@section('cssImport')
    @if($box->GameAns[0]->Type==0)
        <link type="text/css" rel="stylesheet" href="./lib/css/dmaku.css"/>
    @elseif($box->GameAns[0]->Type==1)
        <link type="text/css" rel="stylesheet" href="./lib/css/Eggdmaku.css"/>
    @endif
@stop

@section('jsImport')
    @if($box->GameAns[0]->Type==0)
        <script type="text/javascript" src="./lib/js/dmaku.js"></script>
    @elseif($box->GameAns[0]->Type==1)
        <script type="text/javascript" src="./lib/js/Eggdmaku.js"></script>
    @endif
    <script type="text/javascript" src="./js/task/sGame.js"></script>
@stop

@section('content')
    <div class="span12" align="center">
        <!-- 刮刮卡 -->
        <canvas id="bridge1" width="1000" height="1000"></canvas>
        {!! $box->html->OddsDetail !!}
        <canvas id="bridge" width="1000" height="1000"></canvas>
        <!-- 刮刮卡 -->
    </div>
    <input type="hidden" name="MoneyBack" id="MoneyBack" value="{{ $box->GameAns[0]->MoneyBack }}">
    <input type="hidden" name="TaskOdds" id="TaskOdds" value="{{ $box->GameAns[0]->TaskOdds }}">
    <div class="span12" style="text-align: center; margin-top: 350px;">
        <span class="button-wrap">
            <a href="#" class="button button-circle button-primary" id="sign" style="font-size: 50pt;">
                {{ trans('view.games.b.send') }}
            </a>
        </span>
    </div>
@stop

@section('contentBottom')
@stop






