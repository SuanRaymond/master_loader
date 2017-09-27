<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
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
        <script type="text/javascript" src="./js/verification.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#verification_Submit").click(function(){
                    $("#verification_Form").submit();
                });

                /** Alert **/
                {!! session()->get('msg', '') !!}
                {{ setMesage(null) }}
            });
        </script>
    </head>
    <body>
        <div class="span12" style="text-align: center;"><h1>{{ trans('view.CheckCode.Title') }}</h1></div>
        <div class="span12">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="PhoneAccount">
                    <br><br>
                    <form method="post" id="verification_Form">
                    {{ csrf_field() }}
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-lock"></span>
                            <input type="text" class="form-control" placeholder={{ trans('view.CheckCode.ca.Checkplaceholder') }} name="verification">
                        </div>
                        <div class="fontred">{{ trans('view.CheckCode.remark') }}<span id="ChDate">{{ $box->result->VerificationDate }}</span></div>
                        <br>
                        <br>
                    </form>
                    <div class="span6">
                        <a id="reverification_Submit" class="button button-flat-primary button-large  button-block" style="padding-left: 5px;padding-right: 5px;">{{ trans('view.CheckCode.b.resend') }}</a>
                    </div>
                    <div class="span6">
                        <a id="verification_Submit" class="button button-flat-primary button-large  button-block" style="padding-left: 5px;padding-right: 5px;">{{ trans('view.CheckCode.b.CheckOK') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>