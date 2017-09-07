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
			<div class="caption"><i class="icon-cogs"></i>{{ trans('view.manager.insertShop.title') }}</div>
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
                            <label class="control-label" for="title">{{ trans('view.manager.insertShop.c.title') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="title" id="title"
                                       placeholder="{{ trans('view.manager.insertShop.c.title') }}"
                                       value="{{ $box->params->title }}">
                           </div>
                        </div>
                    </div>
                </div>
               	<div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="subTitle">{{ trans('view.manager.insertShop.c.subTitle') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="subTitle" id="subTitle"
                                       placeholder="{{ trans('view.manager.insertShop.c.subTitle') }}"
                                       value="{{ $box->params->subTitle }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="imagesTitle">{{ trans('view.manager.insertShop.c.imagesTitle') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="imagesTitle" id="imagesTitle"
                                       placeholder="{{ trans('view.manager.insertShop.c.imagesTitle') }}"
                                       value="{{ $box->params->imagesTitle }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="imagesShow">{{ trans('view.manager.insertShop.c.imagesShow') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="imagesShow" id="imagesShow"
                                       placeholder="{{ trans('view.manager.insertShop.c.imagesShow') }}"
                                       value="{{ $box->params->imagesShow }}">
                           </div>
                        </div>
                    </div>
                </div>
               	<div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="menuID">{{ trans('view.manager.insertShop.c.menuID') }} ：</label>
                            <div class="controls">
                                <select class="m-wrap span12" name="menuID" id="menuID">
									<option value="">{{ trans('view.manager.s.0') }}</option>
									<option value="1001" {!! $box->params->menuID == 1001 ? 'selected="true"' : '' !!}>
										{{ trans('menu.menu.1001') }}
									</option>
									<option value="2001" {!! $box->params->menuID == 2001 ? 'selected="true"' : '' !!}>
										{{ trans('menu.menu.2001') }}
									</option>
								</select>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="price">{{ trans('view.manager.insertShop.c.price') }} ：</label>
                            <div class="controls">
                                <input type="number" class="m-wrap span12" name="price" id="price"
                                       placeholder="{{ trans('view.manager.insertShop.c.price') }}"
                                       value="{{ $box->params->price }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="points">{{ trans('view.manager.insertShop.c.points') }} ：</label>
                            <div class="controls">
                                <input type="number" class="m-wrap span12" name="points" id="points"
                                       placeholder="{{ trans('view.manager.insertShop.c.points') }}"
                                       value="{{ $box->params->points }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="transport">{{ trans('view.manager.insertShop.c.transport') }} ：</label>
                            <div class="controls">
                                <input type="number" class="m-wrap span12" name="transport" id="transport"
                                       placeholder="{{ trans('view.manager.insertShop.c.transport') }}"
                                       value="{{ $box->params->transport }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="quantity">{{ trans('view.manager.insertShop.c.quantity') }} ：</label>
                            <div class="controls">
                                <input type="number" class="m-wrap span12" name="quantity" id="quantity"
                                       placeholder="{{ trans('view.manager.insertShop.c.quantity') }}"
                                       value="{{ $box->params->quantity }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="chstyle">{{ trans('view.manager.insertShop.c.chstyle') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="chstyle" id="chstyle"
                                       placeholder="{{ trans('view.manager.insertShop.c.chstyle') }}"
                                       value="{{ $box->params->chstyle }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="InsertDetailArea">{{ trans('view.manager.insertShop.c.detail') }} ：</label>
                            <div class="controls">
                            	<input type="hidden" name="detail" id="detail">
                                <div id="InsertDetailArea"></div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="norm">{{ trans('view.manager.insertShop.c.norm') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="norm" id="norm"
                                       placeholder="{{ trans('view.manager.insertShop.c.norm') }}"
                                       value="{{ $box->params->norm }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="InsertMemoArea">{{ trans('view.manager.insertShop.c.memo') }} ：</label>
                            <div class="controls">
                            	<input type="hidden" name="memo" id="memo">
                                <div id="InsertMemoArea"></div>
                           </div>
                        </div>
                    </div>
                </div>
               	<div class="row-fluid">
					<div class="span12 pull-right">
                        <button class="btn green pull-right" type="button" id="insertBtn">
                            <i class="icon-upload-alt"></i> {{trans('view.confirm') }}
                        </button>
                    </div>
				</div>
		    </form>
		</div>
	</div>
@stop





