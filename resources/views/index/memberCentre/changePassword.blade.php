<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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

        <script type="text/javascript">
            $(document).ready(function(){
                $("#CPwd_Submit").click(function(){
                    $("#CPwd_Form").submit();
                });

                /** Alert **/
                {!! session()->get('msg', '') !!}
                {{ setMesage(null) }}
            });
        </script>
    </head>
    <body>
        <div class="span12" style="text-align: center;"><h1>修改密碼</h1></div>
        <div class="span12">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="PhoneAccount">
                    <br><br>
                    <form method="post" id="CPwd_Form">
                    {{ csrf_field() }}
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-lock"></span>
                            <input type="password" class="form-control" placeholder="舊密碼" name="PasswordO">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-lock"></span>
                            <input type="password" class="form-control" placeholder="新密碼" name="PasswordN">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-lock"></span>
                            <input type="password" class="form-control" placeholder="新密碼確認" name="rePasswordN">
                        </div><br>
                        <br>
                    </form>
                    <div class="span6">
                        <a id="CPwd_Submit" class="button button-flat-primary button-large  button-block">確認</a>
                    </div>
                    <div class="span6">
                        <a href="/MFire" id="RegisteredClick" class="button button-flat-primary button-large  button-block">取消</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>