<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <title>{{ trans('view.home.title') }}-{{ trans('view.login.headerTitle') }}</title>

    <link type="text/css" href="./lib/css/bootstrap.css" rel="stylesheet"/>
    <link type="text/css" href="./lib/css/bootstrap-theme.css" rel="stylesheet"/>
    <link type="text/css" href="./lib/css/base.css" rel="stylesheet"/>
    <link type="text/css" href="./lib/css/buttons.css" rel="stylesheet" />
    <link type="text/css" href="./lib/css/sweetalert.css" rel="stylesheet" />

    <link type="text/css" href="./css/login.css" rel="stylesheet" />

    <script type="text/javascript" src="./lib/js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="./lib/js/bootstrap.js"></script>
    <script type="text/javascript" src="./lib/js/base.js"></script>
    <script type="text/javascript" src="./lib/js/buttons.js"></script>
    <script type="text/javascript" src="./lib/js/sweetalert.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#Login_Submit").click(function(){
                $("#Login_Form").submit();
            });

            /** Alert **/
            {!! session()->get('msg', '') !!}
            {{ setMesage(null) }}
        });
    </script>
</head>

<body>
    <div class="container" id="LoginBox">
        <form class="form-signin" role="form">
            <h2 class="title form-signin-heading">{{ trans('view.login.subTitle') }}</h2>

            <label for="account" class="sr-only"></label>
            <input type="text" name="account" id="account" class="form-control"
                   placeholder="{{ trans('view.plzenter'). trans('view.account') }}" required="" autofocus="">

            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control"
                   placeholder="{{ trans('view.plzenter'). trans('view.password') }}" required="">

            <a class="button button-flat-action button-lg button-block" id="Login_Submit">{{ trans('view.login.b.login') }}</a>
            <div align="center">{{ trans('view.and') }}</div>

            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="button button-flat button-lg button-block accordion-toggle"
                       data-toggle="collapse" data-parent="#accordion2" href="#Login_Other_From">
                        {{ trans('view.login.b.other') }}
                    </a>
                </div>
                <div id="Login_Other_From" class="accordion-body collapse">
                    <hr>
                    <div class="accordion-inner">
                        <a class="button button-flat-royal button-lg button-block" id="Forget_Submit">
                            {{ trans('view.login.b.forget') }}
                        </a>
                        <div align="center">{{ trans('view.and') }}</div>

                        <a href="/Registered" class="button button-flat-primary button-lg button-block" id="Create_Submit">
                            {{ trans('view.login.b.create') }}
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>