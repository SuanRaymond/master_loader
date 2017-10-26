<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="apple-mobile-web-app-capable" content="yes" />

        <title>{{ trans('view.title') }}-{{ trans('view.registered.headerTitle') }}</title>
        <!-- 引入JS -->
        <link type="text/css" rel="stylesheet" href="./lib/css/bootstrap.css"/>
        <link type="text/css" rel="stylesheet" href="./lib/css/bootstrap-theme.css"/>
        <link type="text/css" rel="stylesheet" href="./lib/css/sweetalert.css">
        <link type="text/css" rel="stylesheet" href="./lib/css/buttons.css">
        <link type="text/css" rel="stylesheet" href="./lib/css/base.css"/>
        <!-- 引入CSS -->
        <script type="text/javascript" src="./lib/js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="./lib/js/bootstrap.js"></script>
        <script type="text/javascript" src="./lib/js/sweetalert.js"></script>
        <script type="text/javascript" src="./lib/js/buttons.js"></script>
        <script type="text/javascript" src="./lib/js/base.js"></script>
        <script type="text/javascript" src="./lib/js/gVerify.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                var verifyCode = new GVerify("v_container");
                $("#Registered_Submit").click(function(){
                    var res = verifyCode.validate($("#code_input").val());
                    if(res){
                        if($("#upmemberID").val() == ""){
                            swal({
                                title: "{{ trans('message.title.warning') }}",
                                text: "{!! trans('message.registered.checkRecommend') !!}",
                                type: "info",
                                confirmButtonText: "{{ trans('view.confirm') }}",
                                cancelButtonText: "{{ trans('view.cancel') }}",
                                html: true,
                                showCancelButton: true,
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true,
                            },
                            function(){
                                $("#Registered_Form").submit();
                            });
                        }
                        else{
                            $("#Registered_Form").submit();
                        }
                    }else{
                        swal("{{ trans('message.registered.checkError') }}", "", "error");
                    }
                });

                /** Alert **/
                {!! session()->get('msg', '') !!}
                {{ setMesage(null) }}
            });
        </script>
    </head>
    <body>
        <!-- 頁簽參數 -->
        <div class="span12">
            <div class="span12" style="text-align: center;">
                <h1>{{ trans('view.registered.headerTitle') }}</h1>
            </div>
            <br>
            <div id="myTabContent" class="tab-content">
                <br><br>
                <form method="post" id="Registered_Form">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <span class="input-group-addon">{{ trans('view.registered.recommendL') }}</span>
                        <input type="text" class="form-control" placeholder="{{ trans('view.registered.recommend') }}"
                               name="upmemberID" id="upmemberID" value="{{ $box->params->upmemberID }}">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-phone"></span>
                        <input type="text" class="form-control" placeholder="{{ trans('view.registered.phone') }}"
                               name="account" value="{{ $box->params->account }}">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-user"></span>
                        <input type="text" class="form-control" placeholder="{{ trans('view.registered.nickName') }}"
                               name="name" value="{{ $box->params->name }}">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                        <input type="text" class="form-control" placeholder="{{ trans('view.registered.mail') }}"
                               name="mail" value="{{ $box->params->mail }}">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-lock"></span>
                        <input type="password" class="form-control" placeholder="{{ trans('view.registered.passowrd') }}"
                               name="password">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-lock"></span>
                        <input type="password" class="form-control" placeholder="{{ trans('view.registered.passwordCheck') }}"
                               name="repassword">
                    </div><br>

                    <input type="hidden" class="form-control" name="groupID" value="200">

                    <div class="input-group" style="margin: 0 auto;">
                        <div id="v_container" style="width: 200px;height: 50px;"></div><br>
                        <input type="text" id="code_input" value="" placeholder="{{ trans('view.registered.check') }}"/>
                    </div><br>
                </form>
                <a id="Registered_Submit" class="button button-flat-primary button-large  button-block"
                   style="margin-bottom: 5px;">
                    {{ trans('view.registered.b.registered') }}
                </a>
                <a href="/Login" class="button button-flat-caution button-large  button-block" style="margin-bottom: 50px;">
                    {{ trans('view.cancel') }}
                </a>
            </div>
        </div>
    </body>
</html>