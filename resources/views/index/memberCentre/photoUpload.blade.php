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
        <style>
            /*body {
                margin: 0;
                text-align: center;
            }*/
            #clipArea {
                margin: 0 auto;
                height: 250px;
                width: 250px;
            }
            #file,
            #clipBtn {
                margin: 20px auto;
            }
            #view {
                margin: 20px; auto;
                width: 200px;
                height: 200px;
            }
            #photoSend{
                margin-bottom: 10vh;
            }
        </style>
        <!-- 引入CSS -->
        <script src="./lib/js/jquery-2.2.4.js"></script>

        <script type="text/javascript" src="./lib/js/bootstrap.js"></script>
        <script type="text/javascript" src="./lib/js/sweetalert.js"></script>
        <script type="text/javascript" src="./lib/js/buttons.js"></script>
        <script type="text/javascript" src="./lib/js/base.js"></script>

        <script src="./lib/js/iscroll-zoom.js"></script>
        <script src="./lib/js/hammer.js"></script>
        <script src="./lib/js/lrz.all.bundle.js"></script>
        <script src="./lib/js/jquery.photoClip.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var clipArea = new bjj.PhotoClip("#clipArea", {
                    size: [200, 200],
                    outputSize: [250, 250],
                    file: "#file",
                    view: "#view",
                    ok: "#clipBtn",
                    loadStart: function() {
                        // console.log("照片读取中");
                    },
                    loadComplete: function() {
                        // console.log("照片读取完成");
                    },
                    clipFinish: function(dataURL) {
                        // console.log(dataURL);
                        $('#photodata').val(dataURL);
                    }
                });
                $('#photoSend').click(function(){
                    RaySys.Alert.Fixet("{{ trans('message.onWaiting') }}", "{{ trans('message.onLoading') }}", 0);
                    RaySys.AJAX.Send({photo: $('#photodata').val()}, '/ajax/PhotoSend', 'SuFun', 'ErFun');
                })
            });
            function SuFun(_obj){
                // console.log(_obj);
                swal({
                    title: "上傳成功",
                    type:"success",
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                },
                function(){
                    document.location.href="/MFire";
                });
            }
            function ErFun(_obj){
                // console.log(_obj);
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                /** Alert **/
                {!! session()->get('msg', '') !!}
                {{ setMesage(null) }}
            });
        </script>

    </head>
    <body>
        <div class="span12" style="text-align: center;"><h1>頭像上傳</h1></div>
        <div class="span12" align="center">
            <input type="file" id="file" style="background-color: rgb(0, 161, 203);">
            <div id="clipArea"></div>
            <a class="button button-rounded button-flat-primary" id="clipBtn">截取</a>
            <div id="view"></div>
            <br>
            <div class="span6">
                <a class="button button-rounded button-flat-primary" id="photoSend">確認上傳</a>
            </div>
            <div class="span6">
                <a class="button button-rounded button-flat-primary" href="/MFire">返回取消</a>
            </div>
            <input type="hidden" id="photodata">
        </div>
    </body>
</html>






