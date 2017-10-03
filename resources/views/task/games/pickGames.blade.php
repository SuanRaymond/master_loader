@extends('layout.layout')

@section('cssImport')
    <link type="text/css" rel="stylesheet" href="./css/task/pickGames.css"/>

@stop

@section('jsImport')
    <script type="text/javascript" src="./js/task/pickGames.js"></script>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <a id="Pick1">
                <div class="span5 sortListBox">
                    <img class="span12 sortImg" src="./images/games/Awards1.jpg">
                    <div class="span12 sortListTextBox">
                        <div class="span12 TextTitle">神秘宝箱</div>
                        <div class="span12 TextDetali">8个数字3个相同，<br>即得该奖项</div>
                    </div>
                </div>
            </a>
            <a id="Pick2">
                <div class="span5 sortListBox">
                    <img class="span12 sortImg" src="./images/games/EggAwards1.jpg">
                    <div class="span12 sortListTextBox">
                        <div class="span12 TextTitle">敲金蛋</div>
                        <div class="span12 TextDetali">锤子与金蛋数字相同，<br>即得该奖项</div>
                    </div>
                </div>
            </a>
            <a>
                <div class="span5 sortListBox">
                    <img class="span12 sortImg" src="./images/games/soon.jpg">
                    <div class="span12 sortListTextBox">
                        <div class="span12 TextTitle">Comming Soon</div>
                    </div>
                </div>
            </a>
            <a>
                <div class="span5 sortListBox">
                    <img class="span12 sortImg" src="./images/games/soon.jpg">
                    <div class="span12 sortListTextBox">
                        <div class="span12 TextTitle">Comming Soon</div>
                    </div>
                </div>
            </a>
        </div>
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






