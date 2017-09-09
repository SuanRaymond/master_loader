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
        <div style="margin: 0 auto; height: 300px; width: 100%; position: relative;" align="center">
            <!-- 刮刮卡 -->
            <canvas id="bridge1" width="800" height="800"></canvas>
            {!! $box->html->OddsDetail !!}
            <canvas id="bridge" width="800" height="800"></canvas>
            <!-- 刮刮卡 -->
        </div>
    </div>
    <input type="hidden" name="MoneyBack" id="MoneyBack" value="{{ $box->GameAns[0]->MoneyBack }}">
    <input type="hidden" name="TaskOdds" id="TaskOdds" value="{{ $box->GameAns[0]->TaskOdds }}">
    <div style="text-align: center; margin-top: 200px;">
        <span class="button-wrap">
            <a href="#" class="button button-circle button-primary" id="sign" style="font-size: 30pt;">
                {{ trans('view.games.b.send') }}
            </a>
        </span>
    </div>
@stop

@section('contentBottom')
@stop






