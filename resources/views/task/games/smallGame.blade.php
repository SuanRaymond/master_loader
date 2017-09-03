@extends('layout.layout')

@section('cssImport')
@stop

@section('jsImport')
    <script type="text/javascript" src="./js/task/sGame.js"></script>
@stop

@section('content')
    <div style="text-align: center; margin-top: 30vh;">
        <span class="button-wrap">
            <a href="#" class="button button-circle button-primary" id="sign" style="font-size: 30pt;">
                {{ trans('view.games.b.send') }}
            </a>
        </span>
    </div>
@stop

@section('contentBottom')
@stop






