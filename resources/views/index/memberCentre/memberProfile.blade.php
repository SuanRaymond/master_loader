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
            <div class="span12" style="text-align: center;"><h1>{{ trans('view.MFile.MFileTitle') }}</h1></div>
            <div class="span12">
                <div class="list-group">
                    <div class="list-group-item" style="background-color: #f0f0f0;">
                        <span style="text-align: right;">　{{ trans('view.MFile.th.memberid') }}</span>
                        <span style="padding-left: 20px;">{{ $box->member->memberID }}</span>
                    </div>
                    <div class="list-group-item">
                        <span style="text-align: right;">　　{{ trans('view.MFile.th.account') }}</span>
                        <span style="padding-left: 20px;">{{ $box->member->account }}</span>
                    </div>
                    <div class="list-group-item" style="background-color: #f0f0f0;">
                        <span style="text-align: right;">　　{{ trans('view.MFile.th.pwd') }}</span>
                        <span style="padding-left: 20px;">****************</span>
                        <a href="/CPwd" class="button button-flat-primary button-lg">{{ trans('view.MFile.b.CPwd') }}</a>
                    </div>
                    <div class="list-group-item">
                        <span style="text-align: right;">　　{{ trans('view.MFile.th.name') }}</span>
                        <span style="padding-left: 20px;">{{ $box->member->name }}</span>
                    </div>
                    <div class="list-group-item" style="background-color: #f0f0f0;">
                        <span style="text-align: right;">　　{{ trans('view.MFile.th.points') }}</span>
                        <span style="padding-left: 20px;">{{ pFormat($box->member->points) }}</span>
                    </div>
                    <div class="list-group-item">
                        <span style="text-align: right;">　{{ trans('view.MFile.th.integral') }}</span>
                        <span style="padding-left: 20px;">{{ pFormat($box->member->integral) }}</span>
                    </div>
                    <div class="list-group-item" style="background-color: #f0f0f0;">
                        <span style="text-align: right;">{{ trans('view.MFile.th.bonus') }}</span>
                        <span style="padding-left: 20px;">{{ pFormat($box->member->bonus) }}</span>
                    </div>
                    <div class="list-group-item">
                        <span style="text-align: right;">{{ trans('view.MFile.th.mail') }}</span>
                        <span style="padding-left: 20px;">{{ $box->member->mail }}</span>
                    </div>
                    <div class="list-group-item">
                        <span style="text-align: right;">　　{{ trans('view.MFile.th.address') }}</span>
                        <span style="padding-left: 20px;">{{ $box->member->address }}</span>
                    </div>
                    <div class="list-group-item" style="background-color: #f0f0f0;">
                        <span style="text-align: right;">　　{{ trans('view.MFile.th.birthday') }}</span>
                        <span style="padding-left: 20px;">{{ $box->member->birthday }}</span>
                    </div>
                    <div class="list-group-item">
                        <span style="text-align: right;">　　{{ trans('view.MFile.th.gender') }}</span>
                        <span style="padding-left: 20px;">
                            @if($box->member->gender == 0)
                                {{ trans('view.MFile.cl.man') }}
                            @else
                                {{ trans('view.MFile.cl.woman') }}
                            @endif
                        </span>
                    </div>
                    <div class="list-group-item" style="background-color: #f0f0f0;">
                        <span style="text-align: right;">　　{{ trans('view.MFile.th.language') }}</span>
                        <span style="padding-left: 20px;">
                            @if($box->member->languageID==1)
                                {{ trans('view.MFile.cl.ENUS') }}
                            @elseif($box->member->languageID==2)
                                {{ trans('view.MFile.cl.ZHCN') }}
                            @elseif($box->member->languageID==3)
                                {{ trans('view.MFile.cl.ZHTW') }}
                            @else
                            @endif
                        </span>
                    </div>
                    <div class="list-group-item">
                        <span style="text-align: right;">{{ trans('view.MFile.th.cardnumber') }}</span>
                        <span style="padding-left: 20px;">{{ $box->member->cardID }}</span>
                    </div>
                </div>
            </div>
            <div class="span6">
                <a href="/CMFire" class="button button-flat-primary button-large  button-block">{{ trans('view.MFile.b.CMFile') }}</a>
                <br><br>
            </div>
            <div class="span6">
                <a href="/{{ session()->get('menu') }}" class="button button-flat-primary button-large  button-block">{{ trans('view.MFile.b.cancel') }}</a>
            </div>
        </div>
    </body>
</html>