@extends('layout.layout')

@section('cssImport')
    <link type="text/css" rel="stylesheet" href="./lib/css/dmaku.css"/>
@stop

@section('jsImport')
    <script type="text/javascript" src="./lib/js/dmaku.js"></script>
    <script type="text/javascript" src="./js/task/sGame.js"></script>
@stop

@section('content')
<!--     <div class="span12" align="center">
        <div style="margin: 0 auto; height: 300px; width: 100%; position: relative;" align="center"> -->
            <!-- 富貴刮刮卡 -->
            <!-- <canvas id="bridge1" width="800" height="800"></canvas>
            <div id="openrebate">
                <div class="Awards Awards1">101%</div>
                <div class="Awards Awards2">102%</div>
                <div class="Awards Awards3">103%</div>
                <div class="Awards Awards4">104%</div>
                <div class="Awards Awards5">105%</div>
                <div class="Awards Awards6">106%</div>
                <div class="Awards Awards7">107%</div>
                <div class="Awards Awards8">108%</div>
            </div>
            <canvas id="bridge" width="800" height="800"></canvas> -->
            <!-- 富貴刮刮卡 -->

            <!-- 富貴刮刮卡 -->
            <!-- <canvas id="bridge1" width="800" height="800"></canvas>
            <div id="openrebate">
                <div class="EggAwards EggAwards1">101%</div>
                <div class="EggAwards EggAwards2">102%</div>
                <div class="EggAwards EggAwards3">103%</div>
                <div class="EggAwards EggAwards4">104%</div>
                <div class="EggAwards EggAwards5">105%</div>
                <div class="EggAwards EggAwards6">106%</div>
                <div class="EggAwards EggAwards7">107%</div>
                <div class="EggAwards EggAwards8">108%</div>
            </div>
            <canvas id="bridge" width="800" height="800"></canvas> -->
            <!-- 富貴刮刮卡 -->
<!--         </div>
    </div> -->
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






