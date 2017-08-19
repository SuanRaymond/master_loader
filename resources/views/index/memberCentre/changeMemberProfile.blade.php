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
                            <span style="text-align: right; color: red;">*為必填</span>
                            <span style="padding-left: 20px;"></span>
                        </div>
                        <div class="list-group-item">
                            <span style="text-align: right;">　　暱稱：</span>
                            <span style="padding-left: 20px;"><input type="text" name="name" size="15" value={{ $box->member->name }}><span style="color: red;">*</span></span>
                        </div>
                        <div class="list-group-item" style="background-color: #f0f0f0;">
                            <span style="text-align: right;">電子郵箱：</span>
                            <span style="padding-left: 20px;"><input type="text" name="mail" value={{ $box->member->mail }}><span style="color: red;">*</span></span>
                        </div>
                        <div class="list-group-item">
                            <span style="text-align: right;">　　地址：</span>
                            <span style="padding-left: 20px;"><input type="text" size="50" name="address" value={{ $box->member->address }}></span>
                        </div>
                        <div class="list-group-item" style="background-color: #f0f0f0;">
                            <span style="text-align: right;">　　生日：</span>
                            <span style="padding-left: 20px;">
                                西元  <input type="text" maxlength="4" size="4" name="birthdayYear" value={{ explode("-", $box->member->birthday)[0] }}>  年
                                <select id="Months" name="Months">
                                    <option value="0" {{ explode("-", $box->member->birthday)[1]  == '0' ? " selected='true'" : ''  }}>請選擇</option>
                                    <option value="01" {{ explode("-", $box->member->birthday)[1]  == '01' ? " selected='true'" : ''  }}>1</option>
                                    <option value="02" {{ explode("-", $box->member->birthday)[1]  == '02' ? " selected='true'" : ''  }}>2</option>
                                    <option value="03" {{ explode("-", $box->member->birthday)[1]  == '03' ? " selected='true'" : ''  }}>3</option>
                                    <option value="04" {{ explode("-", $box->member->birthday)[1]  == '04' ? " selected='true'" : ''  }}>4</option>
                                    <option value="05" {{ explode("-", $box->member->birthday)[1]  == '05' ? " selected='true'" : ''  }}>5</option>
                                    <option value="06" {{ explode("-", $box->member->birthday)[1]  == '06' ? " selected='true'" : ''  }}>6</option>
                                    <option value="07" {{ explode("-", $box->member->birthday)[1]  == '07' ? " selected='true'" : ''  }}>7</option>
                                    <option value="08" {{ explode("-", $box->member->birthday)[1]  == '08' ? " selected='true'" : ''  }}>8</option>
                                    <option value="09" {{ explode("-", $box->member->birthday)[1]  == '09' ? " selected='true'" : ''  }}>9</option>
                                    <option value="10" {{ explode("-", $box->member->birthday)[1]  == '10' ? " selected='true'" : ''  }}>10</option>
                                    <option value="11" {{ explode("-", $box->member->birthday)[1]  == '11' ? " selected='true'" : ''  }}>11</option>
                                    <option value="12" {{ explode("-", $box->member->birthday)[1]  == '12' ? " selected='true'" : ''  }}>12</option>
                                </select>月
                                <select id="Days" name="Days">
                                    <option value="0" {{ explode("-", $box->member->birthday)[2]  == '0' ? " selected='true'" : ''  }}>請選擇</option>
                                    <option value="01" {{ explode("-", $box->member->birthday)[2]  == '01' ? " selected='true'" : ''  }}>1</option>
                                    <option value="02" {{ explode("-", $box->member->birthday)[2]  == '02' ? " selected='true'" : ''  }}>2</option>
                                    <option value="03" {{ explode("-", $box->member->birthday)[2]  == '03' ? " selected='true'" : ''  }}>3</option>
                                    <option value="04" {{ explode("-", $box->member->birthday)[2]  == '04' ? " selected='true'" : ''  }}>4</option>
                                    <option value="05" {{ explode("-", $box->member->birthday)[2]  == '05' ? " selected='true'" : ''  }}>5</option>
                                    <option value="06" {{ explode("-", $box->member->birthday)[2]  == '06' ? " selected='true'" : ''  }}>6</option>
                                    <option value="07" {{ explode("-", $box->member->birthday)[2]  == '07' ? " selected='true'" : ''  }}>7</option>
                                    <option value="08" {{ explode("-", $box->member->birthday)[2]  == '08' ? " selected='true'" : ''  }}>8</option>
                                    <option value="09" {{ explode("-", $box->member->birthday)[2]  == '09' ? " selected='true'" : ''  }}>9</option>
                                    <option value="10" {{ explode("-", $box->member->birthday)[2]  == '10' ? " selected='true'" : ''  }}>10</option>
                                    <option value="11" {{ explode("-", $box->member->birthday)[2]  == '11' ? " selected='true'" : ''  }}>11</option>
                                    <option value="12" {{ explode("-", $box->member->birthday)[2]  == '12' ? " selected='true'" : ''  }}>12</option>
                                    <option value="13" {{ explode("-", $box->member->birthday)[2]  == '13' ? " selected='true'" : ''  }}>13</option>
                                    <option value="14" {{ explode("-", $box->member->birthday)[2]  == '14' ? " selected='true'" : ''  }}>14</option>
                                    <option value="15" {{ explode("-", $box->member->birthday)[2]  == '15' ? " selected='true'" : ''  }}>15</option>
                                    <option value="16" {{ explode("-", $box->member->birthday)[2]  == '16' ? " selected='true'" : ''  }}>16</option>
                                    <option value="17" {{ explode("-", $box->member->birthday)[2]  == '17' ? " selected='true'" : ''  }}>17</option>
                                    <option value="18" {{ explode("-", $box->member->birthday)[2]  == '18' ? " selected='true'" : ''  }}>18</option>
                                    <option value="19" {{ explode("-", $box->member->birthday)[2]  == '19' ? " selected='true'" : ''  }}>19</option>
                                    <option value="20" {{ explode("-", $box->member->birthday)[2]  == '20' ? " selected='true'" : ''  }}>20</option>
                                    <option value="21" {{ explode("-", $box->member->birthday)[2]  == '21' ? " selected='true'" : ''  }}>21</option>
                                    <option value="22" {{ explode("-", $box->member->birthday)[2]  == '22' ? " selected='true'" : ''  }}>22</option>
                                    <option value="23" {{ explode("-", $box->member->birthday)[2]  == '23' ? " selected='true'" : ''  }}>23</option>
                                    <option value="24" {{ explode("-", $box->member->birthday)[2]  == '24' ? " selected='true'" : ''  }}>24</option>
                                    <option value="25" {{ explode("-", $box->member->birthday)[2]  == '25' ? " selected='true'" : ''  }}>25</option>
                                    <option value="26" {{ explode("-", $box->member->birthday)[2]  == '26' ? " selected='true'" : ''  }}>26</option>
                                    <option value="27" {{ explode("-", $box->member->birthday)[2]  == '27' ? " selected='true'" : ''  }}>27</option>
                                    <option value="28" {{ explode("-", $box->member->birthday)[2]  == '28' ? " selected='true'" : ''  }}>28</option>
                                    <option value="29" {{ explode("-", $box->member->birthday)[2]  == '29' ? " selected='true'" : ''  }}>29</option>
                                    <option value="30" {{ explode("-", $box->member->birthday)[2]  == '30' ? " selected='true'" : ''  }}>30</option>
                                    <option value="31" {{ explode("-", $box->member->birthday)[2]  == '31' ? " selected='true'" : ''  }}>31</option>
                                </select>
                                日
                            </span>
                        </div>
                        <div class="list-group-item">
                            <span style="text-align: right;">　　性別：</span>
                            <span style="padding-left: 20px;">
                                <input type="radio" name="gender" value="0" {{ $box->member->gender  != 1 ? " checked" : ''  }}>  男
                                <input type="radio" name="gender" value="1" {{ $box->member->gender  == 1 ? " checked" : ''  }}>  女
                            </span>
                        </div>
                        <div class="list-group-item" style="background-color: #f0f0f0;">
                            <span style="text-align: right;">　　語言：</span>
                            <span style="padding-left: 20px;">
                                <select id="language" name="language">
                                    <option value="0" {{ $box->member->languageID  == 0 ? " selected='true'" : ''  }}>請選擇</option>
                                    <option value="1" {{ $box->member->languageID  == 1 ? " selected='true'" : ''  }}>English</option>
                                    <option value="2" {{ $box->member->languageID  == 2 ? " selected='true'" : ''  }}>簡體中文</option>
                                    {{-- <option value="3" {{ $box->member->languageID  == 3 ? " selected='true'" : ''  }}>繁體中文</option> --}}
                                </select>
                            </span>
                        </div>
                        <div class="list-group-item">
                            <span style="text-align: right;">銀行卡號：</span>
                            <span style="padding-left: 20px;"><input type="text" name="cardID"  value={{ $box->member->cardID }}></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="span6">
                <a id="CMFrie_Submit" class="button button-flat-primary button-large  button-block">儲存</a>
            </div>
            <div class="span6">
                <a href="/MFire" class="button button-flat-primary button-large  button-block">取消</a>
            </div>
        </div>
    </body>
</html>