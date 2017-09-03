@extends('layout.layout')

@section('cssImport')
    <link type="text/css" rel="stylesheet" href="./css/task/sign.css"/>
@stop

@section('jsImport')
    <script type="text/javascript" src="./js/task/sign.js"></script>
@stop

@section('content')
    <div style="text-align: center; margin-top: 30vh;">
        <span class="button-wrap">
            <a class="button button-circle button-primary" id="sign">
                {{ trans('view.sign.b.send') }}
            </a>
        </span>
    </div>
@stop

@section('contentBottom')
@stop






