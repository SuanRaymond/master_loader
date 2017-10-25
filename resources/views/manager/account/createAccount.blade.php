@extends('manager.layout.layout')

@section('cssImport')
<link href="./lib/css/manager/trumbowyg.min.css" rel="stylesheet" type="text/css"/>
@stop

@section('jsImport')
<script src="./lib/js/manager/trumbowyg.min.js" type="text/javascript"></script>
<script src="./lib/js/manager/zh_cn.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#InsertDetailArea").trumbowyg({
                lang: 'zh_cn'
            });
            $("#InsertMemoArea").trumbowyg({
                lang: 'zh_cn'
            });

            $("#insertBtn").click(function(){
                $("#detail").val($('#InsertDetailArea').trumbowyg('html'));
                $("#memo").val($('#InsertMemoArea').trumbowyg('html'));
                $("#InserForm").submit();
            });
        });
    </script>
@stop

@section('content')
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption"><i class="icon-cogs"></i>{{ trans('managerView.createAccount.title') }}</div>
            <div class="tools">
                <a href="javascript:;" class="collapse"></a>
            </div>
        </div>
        <div class="portlet-body">
            <form class="form-horizontal" action="InsertShop" method="post" id="InserForm">
                {{ csrf_field() }}
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="title">{{ trans('managerView.createAccount.c.title') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="title" id="title"
                                       placeholder="{{ trans('managerView.createAccount.p.title') }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="subTitle">{{ trans('managerView.createAccount.c.subTitle') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="subTitle" id="subTitle"
                                       placeholder="{{ trans('managerView.createAccount.p.subTitle') }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="imagesTitle">{{ trans('managerView.createAccount.c.imagesTitle') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="imagesTitle" id="imagesTitle"
                                       placeholder="{{ trans('managerView.createAccount.p.imagesTitle') }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="imagesShow">{{ trans('managerView.createAccount.c.imagesShow') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="imagesShow" id="imagesShow"
                                       placeholder="{{ trans('managerView.createAccount.p.imagesShow') }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12 pull-right">
                        <button class="btn green pull-right" type="button" id="insertBtn">
                            <i class="icon-upload-alt"></i> {{trans('managerView.confirm') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop





