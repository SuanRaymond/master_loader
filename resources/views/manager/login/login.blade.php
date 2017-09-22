<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ trans('menu.manager.title'). '-'. trans('menu.manager.login') }}</title>
	<link rel="shortcut icon" href="./favicon.ico" />

	<link rel="stylesheet" type="text/css" href="./lib/css/manager/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="./lib/css/manager/bootstrap-responsive.min.css"/>
	<link rel="stylesheet" type="text/css" href="./lib/css/manager/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="./lib/css/manager/style-metro.css"/>
	<link rel="stylesheet" type="text/css" href="./lib/css/manager/style.css"/>
	<link rel="stylesheet" type="text/css" href="./lib/css/manager/style-responsive.css"/>
	<link rel="stylesheet" type="text/css" href="./lib/css/manager/default.css"/>
	<link rel="stylesheet" type="text/css" href="./lib/css/manager/uniform.default.css"/>
	<link rel="stylesheet" type="text/css" href="./lib/css/sweetalert.css"/>
	<link rel="stylesheet" type="text/css" href="./lib/css/manager/login.css"/>

	<script type="text/javascript" src="./lib/js/manager/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="./lib/js/manager/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="./lib/js/manager/jquery-ui-1.10.1.custom.min.js"></script>
	<script type="text/javascript" src="./lib/js/manager/bootstrap.min.js"></script>
	<script type="text/javascript" src="./lib/js/manager/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="./lib/js/manager/jquery.blockui.min.js"></script>
	<script type="text/javascript" src="./lib/js/manager/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="./lib/js/manager/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="./lib/js/manager/jquery.validate.min.js"></script>
	<script type="text/javascript" src="./lib/js/sweetalert.js"></script>
	<script type="text/javascript" src="./lib/js/manager/app.js"></script>
	<script>
		$(document).ready(function(){
			/** Alert **/
    		{!! session()->get('msg', '') !!}
    		{{ setMesage(null) }}
           	App.init();
        });
	</script>
</head>
<body class="login">
	<div class="logo">
		<img src="../../images/manager/logo-big.png" alt="" width="100px" />
	</div>

	<div class="content">
		<form class="form-vertical login-form" action="login" method="post">
			{{ csrf_field() }}
			<h3 class="form-title" align="center">{{ trans('menu.manager.title') }}<br>{{ trans('managerView.login.t.title') }}</h3>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">{{ trans('managerView.login.c.account') }}</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-user"></i>
						<input class="m-wrap placeholder-no-fix" type="text"
							   placeholder="{{ trans('managerView.login.c.account') }}" name="account"
							   value="{{ session()->get('account', 13691641712) }}" />
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">{{ trans('managerView.login.c.password') }}</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
						<input class="m-wrap placeholder-no-fix" type="password"
							   placeholder="{{ trans('managerView.login.c.password') }}" name="password"
							   value="123456"/>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn green pull-right">
					{{ trans('managerView.login.b.login') }} <i class="m-icon-swapright m-icon-white"></i>
				</button>
			</div>
		</form>

		{{-- <form id="languageForm" class="form-horizontal" action="setLanguage" method="post">
			{{ csrf_field() }}
			<div class="control-group">
				<label class="control-label" for="setLanguage">{{ trans('view.manager.login.t.lang') }}</label>
				<div class="controls">
					<select class="small m-wrap" name="setLanguage" tabindex="1" onchange="submit('languageForm');">
						<option value="tw" {!! session()->get('lang', 'tw') == 'tw' ? 'selected="true"' : '' !!}>繁體中文</option>
			            <option value="ch" {!! session()->get('lang', 'tw') == 'ch' ? 'selected="true"' : '' !!}>简体中文</option>
			            <option value="en" {!! session()->get('lang', 'tw') == 'en' ? 'selected="true"' : '' !!}>English</option>
					</select>
				</div>
			</div>
		</form> --}}
	</div>
	<div class="copyright">
		2017-08 SD Web Vo.1.0.0
	</div>
</body>
</html>