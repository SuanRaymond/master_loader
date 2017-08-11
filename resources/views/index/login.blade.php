<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta content="" name="description">
    <meta content="" name="author">

    <link type="text/css" href="./lib/css/bootstrap.css" rel="stylesheet"/>
    <link type="text/css" href="./lib/css/bootstrap-theme.css" rel="stylesheet"/>
    <link type="text/css" href="./lib/css/base.css" rel="stylesheet"/>
    <link type="text/css" href="./lib/css/buttons.css" rel="stylesheet" />
    <link type="text/css" href="./lib/css/sweetalert.css" rel="stylesheet" />

    <link type="text/css" href="./css/login.css" rel="stylesheet" />

    <script type="text/javascript" src="./lib/js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="./lib/js/bootstrap.js"></script>
    <script type="text/javascript" src="./lib/js/base.js"></script>
    <script type="text/javascript" src="./lib/js/buttons.js"></script>
    <script type="text/javascript" src="./lib/js/sweetalert.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#Login_Submit").click(function(){
                $("#Login_Form").submit();
            });

            /** Alert **/
            {!! session()->get('msg', '') !!}
            {{ setMesage(null) }}
        });
    </script>
</head>

<body>
    <div class="login-box">
        <h3 class="title">登錄</h3>
        <div class="login-form">
            <form method="post" id="Login_Form">
                {{ csrf_field() }}
                <div class="user-name">
                    <label for="account"><i class="glyphicon glyphicon-user"></i></label>
                    <input type="text" name="account" id="account" placeholder="帳號" value="">
                </div>
                <div class="user-pass">
                    <label for="password"><i class="glyphicon glyphicon-lock"></i></label>
                    <input type="password" name="password" id="password" placeholder="密碼" value="">
                </div>
            </form>
        </div>
        <div class="login-links">
            <a href="#">忘記密碼</a>
        </div>
        <div class="login-button">
            <a class="button button-flat-primary button-lg button-block" style="margin-bottom: 10px;" id="Login_Submit">登 錄</a>
            <a href="/Registered" class="button button-flat-primary button-lg button-block">注 冊</a>
        </div>
    </div>
</body>

</html>