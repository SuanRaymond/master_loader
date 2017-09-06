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
                        <div class="span12 TextTitle">富貴刮刮樂</div>
                    </div>
                </div>
            </a>
            <a id="Pick2">
                <div class="span5 sortListBox">
                    <img class="span12 sortImg" src="./images/games/EggAwards1.jpg">
                    <div class="span12 sortListTextBox">
                        <div class="span12 TextTitle">敲金蛋</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@stop
@section('contentBottom')
@stop






