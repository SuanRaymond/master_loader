<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
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

        <script type="text/javascript">
            $(document).ready(function(){
                /** Alert **/
                {!! session()->get('msg', '') !!}
                {{ setMesage(null) }}
            });
        </script>

    </head>
    <body>
        <div>
            <div class="span12" style="text-align: center;"><h1>會員中心</h1></div>
            <div class="span12">
                <div class="list-group">
                    <div class="list-group-item" style="background-color: #f0f0f0;">
                        <span style="text-align: right;">　推薦碼：</span>
                        <span style="padding-left: 20px;">{{ $box->member->memberID }}</span>
                    </div>
                    <div class="list-group-item">
                        <span style="text-align: right;">　　帳號：</span>
                        <span style="padding-left: 20px;">{{ $box->member->account }}</span>
                    </div>
                    <div class="list-group-item" style="background-color: #f0f0f0;">
                        <span style="text-align: right;">　　密碼：</span>
                        <span style="padding-left: 20px;">****************</span>
                        <a href="/CPwd" class="button button-flat-primary button-lg">修改密碼</a>
                    </div>
                    <div class="list-group-item">
                        <span style="text-align: right;">　　暱稱：</span>
                        <span style="padding-left: 20px;">{{ $box->member->name }}</span>
                    </div>
                    <div class="list-group-item" style="background-color: #f0f0f0;">
                        <span style="text-align: right;">　　點數：</span>
                        <span style="padding-left: 20px;">{{ $box->member->points }}</span>
                    </div>
                    <div class="list-group-item">
                        <span style="text-align: right;">　　積分：</span>
                        <span style="padding-left: 20px;">{{ $box->member->integral }}</span>
                    </div>
                    <div class="list-group-item" style="background-color: #f0f0f0;">
                        <span style="text-align: right;">　　紅利：</span>
                        <span style="padding-left: 20px;">{{ $box->member->bonus }}</span>
                    </div>
                    <div class="list-group-item">
                        <span style="text-align: right;">電子郵箱：</span>
                        <span style="padding-left: 20px;">{{ $box->member->mail }}</span>
                    </div>
                    <div class="list-group-item">
                        <span style="text-align: right;">　　地址：</span>
                        <span style="padding-left: 20px;">{{ $box->member->address }}</span>
                    </div>
                    <div class="list-group-item" style="background-color: #f0f0f0;">
                        <span style="text-align: right;">　　生日：</span>
                        <span style="padding-left: 20px;">{{ $box->member->birthday }}</span>
                    </div>
                    <div class="list-group-item">
                        <span style="text-align: right;">　　性別：</span>
                        <span style="padding-left: 20px;">
                            @if($box->member->gender == 0)
                                男
                            @else
                                女
                            @endif
                        </span>
                    </div>
                    <div class="list-group-item" style="background-color: #f0f0f0;">
                        <span style="text-align: right;">　　語言：</span>
                        <span style="padding-left: 20px;">
                            @if($box->member->languageID==1)
                                English
                            @elseif($box->member->languageID==2)
                                簡體中文
                            @elseif($box->member->languageID==3)
                                繁體中文
                            @else
                            @endif
                        </span>
                    </div>
                    <div class="list-group-item">
                        <span style="text-align: right;">銀行卡號：</span>
                        <span style="padding-left: 20px;">{{ $box->member->cardID }}</span>
                    </div>
                </div>
            </div>
            <div class="span6">
                <a href="/CMFire" class="button button-flat-primary button-large  button-block">修改資料</a>
                <br><br>
            </div>
            <div class="span6">
                <a href="/" class="button button-flat-primary button-large  button-block">取消</a>
            </div>
        </div>
    </body>
</html>