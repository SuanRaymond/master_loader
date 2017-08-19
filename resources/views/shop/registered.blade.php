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
        <script type="text/javascript" src="./lib/js/gVerify.js"></script>
        <script type="text/javascript" src="./js/registered.js"></script>
    </head>
    <body>
        <!-- 頁簽參數 -->
        <div class="span12">
            <div class="span12" style="text-align: center;"><h1>註冊</h1></div>
            <br><br>
            <div id="myTabContent" class="tab-content">
                <br><br>
                <form action="">
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-phone"></span>
                        <input type="text" class="form-control" placeholder="手機號" id="Account">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-user"></span>
                        <input type="text" class="form-control" placeholder="暱稱" id="Account">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-lock"></span>
                        <input type="password" class="form-control" placeholder="密碼" id="PassWord">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-lock"></span>
                        <input type="password" class="form-control" placeholder="密碼確認">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon">推薦碼</span>
                        <input type="text" class="form-control" placeholder="推薦碼" id="">
                    </div><br>
                    <div>
                        <div id="v_container" style="width: 200px;height: 50px;"></div><br>
                        <input type="text" id="code_input" value="" placeholder="請輸入驗證碼"/>
                    </div><br>
                    <br>
                </form>
                <a href="#" id="RegisteredClick" class="button button-flat-primary button-large  button-block">註冊</a>
            </div>
        </div>
    </body>
</html>