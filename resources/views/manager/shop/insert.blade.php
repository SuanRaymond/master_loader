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
			<div class="caption"><i class="icon-cogs"></i>{{ trans('managerView.insertShop.title') }}</div>
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
                            <label class="control-label" for="title">{{ trans('managerView.insertShop.c.title') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="title" id="title"
                                       placeholder="{{ trans('managerView.insertShop.p.title') }}"
                                       value="{{ $box->params->title }}">
                           </div>
                        </div>
                    </div>
                </div>
               	<div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="subTitle">{{ trans('managerView.insertShop.c.subTitle') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="subTitle" id="subTitle"
                                       placeholder="{{ trans('managerView.insertShop.p.subTitle') }}"
                                       value="{{ $box->params->subTitle }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="imagesTitle">{{ trans('managerView.insertShop.c.imagesTitle') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="imagesTitle" id="imagesTitle"
                                       placeholder="{{ trans('managerView.insertShop.p.imagesTitle') }}"
                                       value="{{ $box->params->imagesTitle }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="imagesShow">{{ trans('managerView.insertShop.c.imagesShow') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="imagesShow" id="imagesShow"
                                       placeholder="{{ trans('managerView.insertShop.p.imagesShow') }}"
                                       value="{{ $box->params->imagesShow }}">
                           </div>
                        </div>
                    </div>
                </div>
               	<div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="menuID">{{ trans('managerView.insertShop.c.menuID') }} ：</label>
                            <div class="controls">
                                <select class="m-wrap span12" name="menuID" id="menuID">
									<option value="">{{ trans('managerView.s.0') }}</option>
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
                            <label class="control-label" for="price">{{ trans('managerView.insertShop.c.price') }} ：</label>
                            <div class="controls">
                                <input type="number" class="m-wrap span12" name="price" id="price"
                                       placeholder="{{ trans('managerView.insertShop.p.price') }}"
                                       value="{{ $box->params->price }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="points">{{ trans('managerView.insertShop.c.points') }} ：</label>
                            <div class="controls">
                                <input type="number" class="m-wrap span12" name="points" id="points"
                                       placeholder="{{ trans('managerView.insertShop.p.points') }}"
                                       value="{{ $box->params->points }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="transport">{{ trans('managerView.insertShop.c.transport') }} ：</label>
                            <div class="controls">
                                <input type="number" class="m-wrap span12" name="transport" id="transport"
                                       placeholder="{{ trans('managerView.insertShop.p.transport') }}"
                                       value="{{ $box->params->transport }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="quantity">{{ trans('managerView.insertShop.c.quantity') }} ：</label>
                            <div class="controls">
                                <input type="number" class="m-wrap span12" name="quantity" id="quantity"
                                       placeholder="{{ trans('managerView.insertShop.p.quantity') }}"
                                       value="{{ $box->params->quantity }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="chstyle">{{ trans('managerView.insertShop.c.chstyle') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="chstyle" id="chstyle"
                                       placeholder="{{ trans('managerView.insertShop.p.chstyle') }}"
                                       value="{{ $box->params->chstyle }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="InsertDetailArea">{{ trans('managerView.insertShop.c.detail') }} ：</label>
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
                            <label class="control-label" for="norm">{{ trans('managerView.insertShop.c.norm') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="norm" id="norm"
                                       placeholder="{{ trans('managerView.insertShop.p.norm') }}"
                                       value="{{ $box->params->norm }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="InsertMemoArea">{{ trans('managerView.insertShop.c.memo') }} ：</label>
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
                            <i class="icon-upload-alt"></i> {{trans('managerView.confirm') }}
                        </button>
                    </div>
				</div>
		    </form>
		</div>
	</div>
@stop





