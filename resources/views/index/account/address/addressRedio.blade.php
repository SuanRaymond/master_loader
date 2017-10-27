@extends('layout.layout')

@section('cssImport')
@stop

@section('jsImport')
@stop

@section('content')
    <div class="panel panel-primary" style="font-size: 130%;">
        <div class="panel-heading">
            <h2 class="panel-title" align="center" style="font-size: 110%;">{{ trans('view.addressList.redioTitle') }}</h2>
        </div>
        <div class="panel-body">
            @if($box->html->addressList != '')
                {!! $box->html->addressList !!}
            @endif
        </div>
    </div>
    <div style="margin-bottom: 40px;">&nbsp;</div>
@stop

@section('contentBottom')
    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
            <a href="/AddressList" class="button button-flat-primary button-large button-block btn-group WaitingBtn span12">
                <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                 {{ trans('view.addressList.listTitle') }}
            </a>
            <a href="/Buy" class="btn button button-flat-caution button-large button-block btn-group btn-group-xs WaitingBtn span12">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                 {{ trans('view.b.cancel') }}
            </a>
        </div>
    </nav>
@stop






