@extends('layout.layout')

@section('cssImport')
@stop

@section('jsImport')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#SendBtn").click(function(){
                RaySys.Alert.Fixet("{{ trans('message.onWaiting') }}", "{{ trans('message.onInserting') }}", 0);
            });
        });
    </script>
@stop

@section('content')
    <div class="panel panel-primary" style="font-size: 130%;">
        <div class="panel-heading">
            <h2 class="panel-title" align="center" style="font-size: 110%;">{{ trans('view.addressList.addTitle') }}</h2>
        </div>
        <div class="panel-body">
            <form>
                <div class="form-group">
                    <label for="name">{{ trans('view.addressList.cl.name') }}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $box->params->name }}">
                </div>
                <div class="form-group">
                    <label for="phone">{{ trans('view.addressList.cl.phone') }}</label>
                    <input type="number" class="form-control" name="phone" id="phone" value="{{ $box->params->phone }}">
                </div>
                <div class="form-group">
                    <label for="address">{{ trans('view.addressList.cl.address') }}</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ $box->params->address }}">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="master" {{ $box->params->master ? 'checked' : ''}}>{{ trans('view.addressList.cl.master') }}
                    </label>
                </div>
                <div class="alert alert-danger" role="alert">{{ trans('view.addressList.cl.prompt') }}</div>
                <button type="submit" class="btn btn-default button button-flat-primary WaitingBtn span12" id="SendBtn">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                     {{ trans('view.b.confirm') }}
                </button>
            </form>
        </div>
    </div>
    <div style="margin-bottom: 40px;">&nbsp;</div>
@stop

@section('contentBottom')
    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
            <a href="/AddressList" class="btn button button-flat-caution button-large button-block btn-group btn-group-xs WaitingBtn span12">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                 {{ trans('view.b.cancel') }}
            </a>
        </div>
    </nav>
@stop