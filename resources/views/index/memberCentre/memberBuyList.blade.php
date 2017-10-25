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

        <script type="text/javascript" src="./js/memberBuyList.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                /** Alert **/
                {!! session()->get('msg', '') !!}
                {{ setMesage(null) }}
            });
        </script>

    </head>
    <body style="background-color: #f0f0f0;">
        <div>
            <div class="span12" style="text-align: center;"><h1>{{ trans('view.BuyList.BuyListTitle') }}</h1></div>
            <div class="span12" style=" padding: 5px;">
                <ul class="nav nav-pills" style="font-size: 4vw;">
                    <li role="presentation" data-toggle="tab" id="Buy99" class="buyClick active span2" style="padding: 0px;margin-left: 15px;"><a style="padding: 5px; text-align: center;">全&nbsp;&nbsp;部</a></li>
                    <li role="presentation" data-toggle="tab" id="Buy0" class="buyClick span3" style="padding: 0px;"><a style="padding: 5px; text-align: center;">待付款</a></li>
                    <li role="presentation" data-toggle="tab" id="Buy1" class="buyClick span3" style="padding: 0px;"><a style="padding: 5px; text-align: center;">待發貨</a></li>
                    <li role="presentation" data-toggle="tab" id="Buy2" class="buyClick span3" style="padding: 0px;"><a style="padding: 5px; text-align: center;">已出貨</a></li>
                </ul>
            </div>
            <div class="span12" style=" padding: 5px;">
                <table class="table table-bordered table-condensed" style="background-color: #ffffff;">
                    {!! $box->html->BuyList !!}
                    <!-- <tbody style="border-top: 10px solid #f0f0f0; font-size: 3.5vw;" class="List List2">
                        <tr>
                            <tr>
                                <td colspan="3" style="font-size: 6vw;">
                                    <input class="Check2" style="display: none;" type="checkbox" name="check" value="100">產品名稱2222
                                    <span class="Btn2" style="float: right; display: none;">
                                        <a class="button button-flat-primary" style="padding-left: 10px;padding-right: 10px;">付款</a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                            <td style="text-align: right; width: 30%;" rowspan="4">
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
                                    單價
                                </td>
                                <td>
                                    數量
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    總價
                                    <input type="text" class="TMoney2" value="100" style="display: none;">
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
        <nav class="navbar navbar-default navbar-fixed-bottom row" role="navigation" style="display: none;">
            <div class="span7 shopCarNavbarBottom">
                總金額：<span id="BottomMoney">0</span>
            </div>
            <a class="span5 button button-flat-caution shopCarNavbarBottom" role="button" id="buysend">
                合併付款
            </a>
        </nav>

        <form id="sendForm" name="sendForm" action="{!! env('SEND_CARD_URL') !!}" method="POST">
            <input type="hidden" name="web" value="{!! env('SEND_CARD_KEY') !!}" />             <!--01.*商店代號-->
            <input type="hidden" name="MN" value="0" />                                        <!--02.*交易金額-->
            <input type="hidden" name="OrderInfo" value="0" />                            <!--03.*交易內容-->
            <input type="hidden" name="Td" value="0" />                                   <!--04.商家訂單編號-->
            <input type="hidden" name="sna" value="0" />                                  <!--05.消費者姓名-->
            <input type="hidden" name="sdt" value="0" />                              <!--06.消費者電話-->
            <input type="hidden" name="email" value="" />                                       <!--07.消費者Email-->
            <input type="hidden" name="note1" value="" />                                       <!--08.備註-->
            <input type="hidden" name="note2" value="" />                                       <!--09.備註-->
            <input type="hidden" name="Card_Type" value="0" />                                  <!--10.交易類別-->
            <input type="hidden" name="Country_Type" value="" />                                <!--11.語言類別-->
            <input type="hidden" name="Term " value="" />                                       <!--12.分期期數-->
            <input type="hidden" name="ChkValue"
                   value="{{ strtoupper(sha1(env('SEND_CARD_KEY'). env('SEND_CARD_PAS'). '10'. '')) }}" /><!--13.*交易檢查碼-->
        </form>
    </body>
</html>