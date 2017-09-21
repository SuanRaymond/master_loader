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
        <link type="text/css" rel="stylesheet" href="./css/MFile.css"/>
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
            <div class="span12" style="text-align: center;"><h1>{{ trans('view.MFile.MFileTitle') }}</h1></div>
            <div class="span12" align="center">
                <div id="MenuUserImg" style="background-image:
                            @if(auth()->loginType)
                                @if(auth()->user->photo != '')
                                    url(' {{ auth()->user->photo }} ')
                                @else
                                    url('data:image/jpeg;base64,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')
                                @endif
                            @endif
                        "></div>
                <a href="/PUpload" class="button button-flat-primary button-lg" style="margin: 20px;">上传头像</a>
            </div>
            <div class="span12">
                <table class=" table table-striped table-bordered table-condensed">
                    <tbody>
                        <tr>
                            <td style="text-align: right; width: 30%;">
                                {{ trans('view.MFile.th.memberid') }}
                            </td>
                            <td>
                                {{ $box->member->memberID }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">
                                {{ trans('view.MFile.th.account') }}
                            </td>
                            <td>
                                {{ $box->member->account }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">
                                {{ trans('view.MFile.th.pwd') }}
                            </td>
                            <td>
                                ****************<br>
                                <a href="/CPwd" class="button button-flat-primary button-lg">{{ trans('view.MFile.b.CPwd') }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">
                                {{ trans('view.MFile.th.name') }}
                            </td>
                            <td>
                                {{ $box->member->name }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">
                                {{ trans('view.MFile.th.points') }}
                            </td>
                            <td>
                                {{ $box->member->points }}<br>
                                <a href="/BuyList" class="button button-flat-primary button-lg">{{ trans('view.MFile.b.BuyList') }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">
                                {{ trans('view.MFile.th.integral') }}
                            </td>
                            <td>
                                {{ $box->member->integral }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">
                                {{ trans('view.MFile.th.bonus') }}
                            </td>
                            <td>
                                {{ $box->member->bonus }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">
                                {{ trans('view.MFile.th.mail') }}
                            </td>
                            <td>
                                {{ $box->member->mail }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">
                                {{ trans('view.MFile.th.address') }}
                            </td>
                            <td>
                                {{ $box->member->address }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">
                                {{ trans('view.MFile.th.birthday') }}
                            </td>
                            <td>
                                {{ $box->member->birthday }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">
                                {{ trans('view.MFile.th.gender') }}
                            </td>
                            <td>
                                @if($box->member->gender == 1)
                                    {{ trans('view.MFile.cl.man') }}
                                @elseif($box->member->gender == 2)
                                    {{ trans('view.MFile.cl.woman') }}
                                @else
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">
                                {{ trans('view.MFile.th.language') }}
                            </td>
                            <td>
                                @if($box->member->languageID==1)
                                    {{ trans('view.MFile.cl.ENUS') }}
                                @elseif($box->member->languageID==2)
                                    {{ trans('view.MFile.cl.ZHCN') }}
                                @elseif($box->member->languageID==3)
                                    {{ trans('view.MFile.cl.ZHTW') }}
                                @else
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">
                                {{ trans('view.MFile.th.cardnumber') }}
                            </td>
                            <td>
                                {{ $box->member->cardID }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">
                                {{ trans('view.MFile.th.upID') }}
                            </td>
                            <td>
                                @if($box->member->upID != 0)
                                    {{ $box->member->upID }}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="span6">
                <a href="/CMFire" class="button button-flat-primary button-large  button-block">{{ trans('view.MFile.b.CMFile') }}</a>
                <br><br>
            </div>
            <div class="span6">
                <a href="
                        @if(session()->get('menu')!='/')
                            /{{ session()->get('menu') }}
                        @else
                            /
                        @endif" class="button button-flat-primary button-large  button-block">{{ trans('view.MFile.b.cancel') }}</a>
            </div>
        </div>
    </body>
</html>