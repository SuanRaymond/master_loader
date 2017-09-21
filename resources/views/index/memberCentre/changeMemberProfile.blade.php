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
        <div class="span12" style="text-align: center;"><h1>{{ trans('view.CMFile.CMFileTitle') }}</h1></div>
            <div class="span12">
                <form method="post" id="CMFrie_Form">
                    {{ csrf_field() }}
                    <table class=" table table-striped table-bordered table-condensed">
                        <tbody>
                            <tr>
                                <td style="text-align: right; color: red;">
                                    {{ trans('view.CMFile.CMFileremark') }}
                                </td>
                                <td>
                                &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right; width: 30%;">
                                    <span style="color: red;">*</span>{{ trans('view.CMFile.th.name') }}
                                </td>
                                <td>
                                    <input type="text" name="name" value={{ $box->member->name }}>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;">
                                    <span style="color: red;">*</span>{{ trans('view.CMFile.th.mail') }}
                                </td>
                                <td>
                                    <input type="text" name="mail" value={{ $box->member->mail }}>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;">
                                    {{ trans('view.CMFile.th.address') }}
                                </td>
                                <td>
                                    <!-- <input type="text" name="address" value={{ $box->member->address }}> -->
                                    <textarea rows="4" cols="20" name="address">{{ $box->member->address }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;">
                                    {{ trans('view.CMFile.th.birthday') }}
                                </td>
                                <td>
                                    {{ trans('view.CMFile.th.year') }}  <input type="text" maxlength="4" size="4" name="birthdayYear" value={{ explode("-", $box->member->birthday)[0] }}>  {{ trans('view.CMFile.th.years') }}
                                    <br>
                                    <select id="Months" name="Months">
                                        <option value="0" {{ explode("-", $box->member->birthday)[1]  == '0' ? " selected='true'" : ''  }}>{{ trans('view.CMFile.cl.select') }}</option>
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
                                    </select>{{ trans('view.CMFile.th.month') }}
                                    <select id="Days" name="Days">
                                        <option value="0" {{ explode("-", $box->member->birthday)[2]  == '0' ? " selected='true'" : ''  }}>{{ trans('view.CMFile.cl.select') }}</option>
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
                                    {{ trans('view.CMFile.th.day') }}
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;">
                                    {{ trans('view.CMFile.th.gender') }}
                                </td>
                                <td>
                                    <select id="gender" name="gender">
                                        <option value="0" {{ $box->member->gender  == 0 ? " selected='true'" : ''  }}>{{ trans('view.CMFile.cl.select') }}</option>
                                        <option value="1" {{ $box->member->gender  == 1 ? " selected='true'" : ''  }}> 男 </option>
                                        <option value="2" {{ $box->member->gender  == 2 ? " selected='true'" : ''  }}> 女 </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;">
                                    {{ trans('view.CMFile.th.language') }}
                                </td>
                                <td>
                                    <select id="language" name="language">
                                        <option value="0" {{ $box->member->languageID  == 0 ? " selected='true'" : ''  }}>{{ trans('view.CMFile.cl.select') }}</option>
                                        <option value="1" {{ $box->member->languageID  == 1 ? " selected='true'" : ''  }}>{{ trans('view.CMFile.cl.ENUS') }}</option>
                                        <option value="2" {{ $box->member->languageID  == 2 ? " selected='true'" : ''  }}>{{ trans('view.CMFile.cl.ZHCN') }}</option>
                                        {{-- <option value="3" {{ $box->member->languageID  == 3 ? " selected='true'" : ''  }}>{{ trans('view.CMFile.cl.ZHTW') }}</option> --}}
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;">
                                    {{ trans('view.CMFile.th.cardnumber') }}
                                </td>
                                <td>
                                    <input type="text" name="cardID"  value={{ $box->member->cardID }}>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="span6">
                <a id="CMFrie_Submit" class="button button-flat-primary button-large  button-block">{{ trans('view.CMFile.b.save') }}</a>
            </div>
            <div class="span6">
                <a href="/MFire" class="button button-flat-primary button-large  button-block">{{ trans('view.CMFile.b.cancel') }}</a>
            </div>
        </div>
    </body>
</html>