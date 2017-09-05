@extends('manager.layout.layout')

@section('cssImport')
	<link href="./css/manager/profile.css" rel="stylesheet" type="text/css"/>
@stop

@section('jsImport')
	<script src="./js/manager/profile/profile.js" type="text/javascript"></script>
	{{-- <script type="text/javascript">
		var LanguageObj             = {};
		LanguageObj.confirm         = "{{ trans('view.b.confirm') }}";
		LanguageObj.cancel          = "{{ trans('view.b.cancel') }}";
		LanguageObj.changeSuccess   = "{{ trans('message.changeSuccess') }}";
		LanguageObj.passwordSuccess = "{{ trans('message.profile.passwordSuccess') }}";
		LanguageObj.edit            = "{{ trans('view.b.edit') }}";
		LanguageObj.delete          = "{{ trans('view.b.delete') }}";
		@foreach (trans('message.accountEdit') as $key => $value)
			LanguageObj.{{ $key }} = "{{ $value }}";
		@endforeach
		var mineAccount = "{!! $box->params->mineAdminAccountCrypt !!}";
	</script> --}}
@stop

@section('content')
	<div class="span12">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption"><i class="icon-reorder"></i>{{ trans('view.manager.profile.t.title') }}</div>
			</div>
			<div class="portlet-body">
				<div class="scroller" data-height="100%">
					<div class="tab-pane profile-classic row-fluid">
						<ul class="unstyled span12">
							<li><span>{{ trans('view.manager.profile.t.group') }}</span>
								{{ trans('group.'. $box->result->groupID) }}
							</li>
							<li><span>{{ trans('view.manager.profile.t.account') }}</span>
								{{ $box->result->account }}
							</li>
							<li><span>{{ trans('view.manager.profile.t.nickName') }}</span>
								<span id="A_nickName_{{ $box->result->account }}">{{ $box->result->name }}</span>
							</li>
							<li><span>{{ trans('view.manager.profile.t.points') }}</span>
								{{ $box->result->points }}
							</li>
							<li><span>{{ trans('view.manager.profile.t.points') }}</span>
								{{ $box->result->integral }}
							</li>
							<li><span>{{ trans('view.manager.profile.t.points') }}</span>
								{{ $box->result->bonus }}
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- <div id="ModeProfile" class="modal hide fade" tabindex="-1" data-replace="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h3 align="center"><span id="ModeAccountListEditTitle"></span>{{ trans('view.accountList.edit.title') }}</h3>
        </div>
        <div class="modal-body" style="max-height: 300px;">
			<form class="form-horizontal">
				<input id ="accountMode" name ="accountMode" type ="hidden" value ="">
				<div class="well">
					<div class="row-fluid">
						<h4>{{ trans('view.accountList.edit.nickName') }}</h4>
						<div class="span12">
                            <div class="control-group">
								<label class="control-label" for="nickName">{{ trans('view.c.nickName') }} ：</label>
		                        <div class="controls">
		                            <input type="text" class="m-wrap span12" name="nickName" id="nickName" placeholder="{{ trans('view.c.nickName') }}" value="">
		                       	</div>
		                    </div>
		                    <div class="alert">
								{{ trans('view.accountList.msg.nickname_seting') }}
							</div>
		                </div>
						<button class="btn green btn-block editSendBtn" type="button" id="nickNameBtn">
							{{ trans('view.b.send') }}<i class="icon-pencil pull-right"></i>
						</button>
					</div>
	            </div>
	            <div class="well">
					<div class="row-fluid">
						<h4>{{ trans('view.accountList.edit.passWord') }}</h4>
						<div class="span12">
                            <div class="control-group">
								<label class="control-label" for="passWord">{{ trans('view.accountList.edit.passWord') }} ：</label>
		                        <div class="controls">
		                            <input type="password" class="m-wrap span12" name="passWord" id="passWord"
		                            	   placeholder="{{ trans('view.accountList.edit.passWord') }}" value="">
		                       	</div>
		                    </div>
		                    <div class="control-group">
								<label class="control-label" for="passWordCheck">{{ trans('view.accountList.edit.passWordCheck') }} ：</label>
		                        <div class="controls">
		                            <input type="password" class="m-wrap span12" name="passWordCheck" id="passWordCheck"
		                            	   placeholder="{{ trans('view.accountList.edit.passWordCheck') }}" value="">
		                       	</div>
		                    </div>
                            <div class="alert">
								{{ trans('view.accountList.msg.password_seting') }}
							</div>
		                </div>
						<button class="btn green btn-block editSendBtn" type="button" id="passWordBtn">
							{{ trans('view.b.send') }}<i class="icon-pencil pull-right"></i>
						</button>
					</div>
	            </div>
	            <div class="well">
					<div class="row-fluid">
						<h4>{{ trans('view.accountList.edit.editIP') }}</h4>
						<div class="span12">
							<div class="control-group">
			                    <div class="input-append">
			                    	<label class="control-label" for="addIP">{{ trans('view.c.editIP') }} ：</label>
									<input type="text" class="m-wrap" name="addIP" id="addIP" placeholder="{{ trans('view.c.editIP') }}" value="">
									<button class="btn green" type="button" id="editIP_add_class">{{ trans('view.b.create') }}</button>
								</div>
							</div>
		                    <div class="alert">
								{{ trans('view.accountList.msg.editIP_seting') }}
							</div>
		                </div>
		                <div class="span12" id="editIPDiv">
		                	{!! $box->result->ipList !!}
		                </div>
					</div>
	            </div>
			</form>
		</div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn">{{ trans('view.b.close') }}</button>
        </div>
    </div>--}}
@stop

{{-- +"memberID": "65"
+"name": "Raymond"
+"account": "13691641712"
+"points": "0"
+"integral": "0"
+"bonus": "0"
+"languageID": "0"
+"photo": ""
+"groupID": "100"
+"mineAccount": "13691641712"
+"mineAccountCrypt": "eyJpdiI6ImxcL3V6UHk4M0E0TERqUXphZmZ3WGtRPT0iLCJ2YWx1ZSI6IjBSMmFNR09KbFBzWVFhNlFLVGhhV3RUNCtwRE1FaEhlMTV2QWRZZ2R1UlE9IiwibWFjIjoiODMyNDJmYmI2NzVlYzFhNjQwOGU4MDY1ZWJjNzI4N2Q5MDBlYTg2ZDAyNTMxMjFmNmVjNDEyZDk4ODUyM2ZhNyJ9 ◀" --}}

