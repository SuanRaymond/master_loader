@extends('layout.layout')

@section('cssImport')
@stop

@section('jsImport')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#CPwd_Submit").click(function(){
                $("#CPwd_Form").submit();
            });
        });
    </script>
@stop

@section('content')

    <div class="span12" style="text-align: center;"><h1>{{ trans('view.CPwd.CPwdTitle') }}</h1></div>
    <div class="span12">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="PhoneAccount">
                <br><br>
                <form method="post" id="CPwd_Form">
                {{ csrf_field() }}
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-lock"></span>
                        <input type="password" class="form-control" placeholder="{{ trans('view.CPwd.ca.oldpwd') }}" name="PasswordO">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-lock"></span>
                        <input type="password" class="form-control" placeholder="{{ trans('view.CPwd.ca.newpwd') }}" name="PasswordN">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-lock"></span>
                        <input type="password" class="form-control" placeholder="{{ trans('view.CPwd.ca.renewpwd') }}" name="rePasswordN">
                    </div><br>
                    <br>
                </form>
                <div class="span6">
                    <a id="CPwd_Submit" class="button button-flat-primary button-large  button-block">{{ trans('view.confirm') }}</a>
                </div>
                <div class="span6">
                    <a href="/MFile" id="RegisteredClick" class="button button-flat-primary button-large  button-block">{{ trans('view.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('contentBottom')
@stop