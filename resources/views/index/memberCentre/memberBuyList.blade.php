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
        <link type="text/css" rel="stylesheet" href="./css/buyList.css"/>
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
            <div class="span12" style="text-align: center; background-color: #f0f0f0;"><h1>{{ trans('view.BuyList.BuyListTitle') }}</h1></div>
            <div class="span12" style="background-color: #f0f0f0; padding: 5px;">
                <table class="table table-bordered table-condensed" style="background-color: #ffffff;">
                    {!! $box->html->BuyList !!}
                    <!-- <tbody style="border-top: 10px solid #f0f0f0;">
                        <tr>
                            <tr>

                                <td colspan="3" style="font-size: 6vw;">
                                    產品名稱
                                </td>
                            </tr>
                            <tr>
                            <td style="text-align: right; width: 30%;" rowspan="3">
                                    圖片
                                    <div class="span12" style="padding: 0;">
                                        <img src="" alt="">
                                    </div>
                                </td>
                                <td style="width: 30%">
                                    訂單編號
                                </td>
                                <td class="statuscolor0">
                                    狀態
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    價格
                                </td>
                                <td>
                                    PP
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    購買日期
                                </td>
                            </tr>
                        </tr>
                    </tbody> -->
                </table>
            </div>
            <div class="span12" style="background-color: #f0f0f0; padding-bottom: 40px;">
                <a href="/" class="button button-flat-primary button-large  button-block">{{ trans('view.BuyList.b.back') }}</a>
            </div>
        </div>
    </body>
</html>