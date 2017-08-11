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
                $("#CMFrie_Submit").click(function(){
                    $("#CMFrie_Form").submit();
                });

                /** Alert **/
                {!! session()->get('msg', '') !!}
                {{ setMesage(null) }}
            });
        </script>
    </head>
    <body>
        <div class="span12" style="text-align: center;"><h1>修改會員資料</h1></div>
            <div class="span12">
                <div class="list-group">
                    <form method="post" id="CMFrie_Form">
                    {{ csrf_field() }}
                        <div class="list-group-item" style="background-color: #f0f0f0;">
                            <span style="text-align: right;">　　暱稱：</span>
                            <span style="padding-left: 20px;"><input type="text" name="name"></span>
                        </div>
                        <div class="list-group-item">
                            <span style="text-align: right;">電子郵箱：</span>
                            <span style="padding-left: 20px;"><input type="text" name="mail"></span>
                        </div>
                        <div class="list-group-item">
                            <span style="text-align: right;">　　地址：</span>
                            <span style="padding-left: 20px;"><input type="text" style="width: 300px;" name="address"></span>
                        </div>
                        <div class="list-group-item" style="background-color: #f0f0f0;">
                            <span style="text-align: right;">　　生日：</span>
                            <span style="padding-left: 20px;">
                                西元  <input type="text" style="width: 100px;" name="birthdayYear">  年
                                <select id="Months" name="Months">
                                    <option value="0" selected="true">請選擇</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                月
                                <select id="Days" name="Days">
                                    <option value="0" selected="true">請選擇</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                日
                            </span>
                        </div>
                        <div class="list-group-item">
                            <span style="text-align: right;">　　性別：</span>
                            <span style="padding-left: 20px;">
                                <input type="radio" name="gender" value="0" checked>  男
                                <input type="radio" name="gender" value="1">  女
                                {{-- @if($box->member->gender == '0')
                                    <input type="radio" name="gender" value="0" checked>  男
                                    <input type="radio" name="gender" value="1">  女
                                @else
                                    <input type="radio" name="gender" value="0">  男
                                    <input type="radio" name="gender" value="1" checked>  女
                                @endif --}}
                            </span>
                        </div>
                        <div class="list-group-item" style="background-color: #f0f0f0;">
                            <span style="text-align: right;">　　語言：</span>
                            <span style="padding-left: 20px;">
                                <select id="language" name="language">
                                    <option value="0">請選擇</option>
                                    <option value="1">English</option>
                                    <option value="2">簡體中文</option>
                                    <option value="3">繁體中文</option>
                                </select>
                            </span>
                        </div>
                        <div class="list-group-item">
                            <span style="text-align: right;">銀行卡號：</span>
                            <span style="padding-left: 20px;"><input type="text"name="cardID"></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="span6">
                <a id="CMFrie_Submit" class="button button-flat-primary button-large  button-block">修改資料</a>
            </div>
            <div class="span6">
                <a href="/MFire" class="button button-flat-primary button-large  button-block">取消</a>
            </div>
        </div>
    </body>
</html>