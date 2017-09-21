@extends('layout.layout')

@section('cssImport')
    <link type="text/css" rel="stylesheet" href="./css/task/task.css"/>
@stop

@section('jsImport')
    <script type="text/javascript" src="./js/task/task.js"></script>
@stop


@section('content')
    <div class="panel panel-default">
        {!! $box->html->RebateList !!}
    </div>

    <div style="height: 60px; width: 100%;"></div>
@stop


@section('contentBottom')
    <div class="fly">
        <a href="/">
            <span>
                首页
            </span>
        </a>
    </div>
    {!! $box->html->contentBottom !!}
@stop






