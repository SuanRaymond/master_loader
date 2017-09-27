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
                $("#CAddress_Submit").click(function(){
                    $("#CAddress_Form").submit();
                });
                /** Alert **/
                {!! session()->get('msg', '') !!}
                {{ setMesage(null) }}
            });
        </script>

    </head>
    <body style="background-color: #f0f0f0;">
        <div>
            <div class="span12" style="text-align: center;">
                <h1>
                    {{ $box->addressType == 0 ? trans('view.AddressList.NewAddressTitle') : trans('view.AddressList.UpdateAddressTitle') }}
                </h1>
            </div>
            <div class="span12" style=" padding: 5px;">
                <span class="fontred">{{ trans('view.AddressList.th.Prompt') }}</span>
                <form method="post" id="CAddress_Form">
                    {{ csrf_field() }}
                    <table class="table table-bordered table-condensed" style="background-color: #ffffff;">
                        <tbody style="border-top: 10px solid #f0f0f0;">
                            <tr>
                                <td style="text-align: right;">{{ trans('view.AddressList.th.addressee') }}</td>
                                <td>
                                    <input type="text" name="addressee" style="width: 100%;" value="{{ $box->addressee }}">
                                    <input type="hidden" name="indexnumber" value="{{ $box->index}}">
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;">{{ trans('view.AddressList.th.phone') }}</td>
                                <td><input type="text" name="phone" style="width: 100%;" value="{{ $box->phone }}"></td>
                            </tr>
                            <tr>
                                <td style="text-align: right; vertical-align: middle;">{{ trans('view.AddressList.th.address') }}</td>
                                <td><textarea rows="4" cols="20" name="address" style="width: 100%;">{{ $box->address }}</textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align: right;">{{ trans('view.AddressList.th.main') }}</td>
                                <td>
                                    <select id="default" name="default" style="width: 100%">
                                        <option value="1" {{ $box->defaule  == 1 ? " selected='true'" : ''  }}>{{ trans('view.AddressList.th.yes') }}</option>
                                        <option value="0" {{ $box->defaule  != 1 ? " selected='true'" : ''  }}>{{ trans('view.AddressList.th.no') }}</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="span6" style="background-color: #f0f0f0; padding-bottom: 20px;">
                <a id="CAddress_Submit" class="button button-flat-primary button-large  button-block">{{ trans('view.AddressList.b.confirm') }}</a>
            </div>
            <div class="span6" style="background-color: #f0f0f0; padding-bottom: 40px;">
                <a href="/AddressList" class="button button-flat-primary button-large  button-block">{{ trans('view.AddressList.b.cancel') }}</a>
            </div>
        </div>
    </body>
</html>