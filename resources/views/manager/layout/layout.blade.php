<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html> <!--<![endif]-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <title>{{ trans('menu.manager.title'). '-'. trans('menu.manager.'. auth()->menuCheck) }}</title>

    <link rel="shortcut icon" href="./favicon.ico" />
    <link rel="apple-touch-icon" href="./custom_icon.png">

    <link href="./lib/css/manager/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="./lib/css/manager/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="./lib/css/manager/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="./lib/css/manager/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="./lib/css/manager/style.css" rel="stylesheet" type="text/css"/>
    <link href="./lib/css/manager/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="./lib/css/manager/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="./lib/css/manager/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="./lib/css/manager/chosen.css" rel="stylesheet" type="text/css" />
    <link href="./lib/css/manager/bootstrap-tag.css" rel="stylesheet" type="text/css" />
    <link href="./lib/css/manager/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
    <link href="./lib/css/manager/datetimepicker.css" rel="stylesheet" type="text/css" />
    <link href="./lib/css/manager/jquery.fancybox.css" rel="stylesheet" />
    <link href="./lib/css/manager/jquery-ui-1.10.1.custom.min.css" type="text/css"/>
    <link href="./lib/css/manager/bootstrap-wysihtml5.css"  rel="stylesheet" type="text/css" />
    <link href="./lib/css/manager/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
    <link href="./lib/css/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="./lib/css/manager/jstree.min.css" rel="stylesheet" type="text/css" />
    <link href="./lib/css/manager/inbox.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        #MasterBox{
            min-height: 100vh;
        }
        #toolsBar{
            cursor: pointer;
        }
        .tableRowP{
            background-color: #E6E6FA;
        }
        .tableRowR{
            background-color: #FFC8B4;
        }
        .tableRowG{
            background-color: #98F898;
        }
        .tableRowB{
            background-color: #ADD8E6;
        }
    </style>

    @yield('cssImport')

    <script src="./lib/js/manager/jquery-1.10.1.min.js" type="text/javascript"></script>
    <script src="./lib/js/manager/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="./lib/js/manager/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="./lib/js/manager/bootstrap.min.js" type="text/javascript"></script>
    <script src="./lib/js/manager/breakpoints.min.js" type="text/javascript"></script>
    <script src="./lib/js/manager/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="./lib/js/manager/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="./lib/js/manager/jquery.cookie.min.js" type="text/javascript"></script>
    <script src="./lib/js/manager/jquery.uniform.min.js" type="text/javascript" ></script>
    <script src="./lib/js/manager/bootstrap-modal.js" type="text/javascript" ></script>
    <script src="./lib/js/manager/bootstrap-modalmanager.js" type="text/javascript" ></script>
    <script src="./lib/js/manager/bootstrap-tag.js" type="text/javascript" ></script>
    <script src="./lib/js/manager/jquery.fancybox.pack.js" type="text/javascript" ></script>
    <script src="./lib/js/manager/wysihtml5-0.3.0.js" type="text/javascript" ></script>
    <script src="./lib/js/manager/bootstrap-wysihtml5.js" type="text/javascript" ></script>
    <script src="./lib/js/manager/bootstrap-datetimepicker.js" type="text/javascript"></script>

    <script src="./lib/js/manager/bootstrap-datetimepicker.zh-CN.js" type="text/javascript"></script>
    <script src="./lib/js/manager/bootstrap-datetimepicker.zh-TW.js" type="text/javascript"></script>

    <script src="./lib/js/manager/jquery.ui.widget.js" type="text/javascript"></script>
    <script src="./lib/js/manager/tmpl.min.js" type="text/javascript"></script>
    <script src="./lib/js/manager/load-image.min.js" type="text/javascript"></script>
    <script src="./lib/js/manager/canvas-to-blob.min.js" type="text/javascript"></script>
    <script src="./lib/js/manager/jquery.iframe-transport.js" type="text/javascript"></script>
    <script src="./lib/js/sweetalert.js" type="text/javascript"></script>
    <script src="./lib/js/manager/chosen.jquery.min.js" type="text/javascript"></script>
    <script src="./lib/js/manager/jstree.min.js" type="text/javascript"></script>

    <script src="./lib/js/manager/app.js"></script>
    <script src="./lib/js/manager/base.js"></script>
    <script type="text/javascript">
        var datePicker           = [];
        datePicker['todayS']     = '{{date('Y-m-d 00:00')}}';
        datePicker['todayE']     = '{{date('Y-m-d 23:59')}}';
        datePicker['thisWeekS']  = '{{date('Y-m-d 00:00', strtotime('-1 sun'))}}';
        datePicker['thisWeekE']  = '{{date('Y-m-d 23:59', strtotime('0 sat'))}}';
        datePicker['thisMonthS'] = '{{date('Y-m-d 00:00', strtotime('first day of this month'))}}';
        datePicker['thisMonthE'] = '{{date('Y-m-d 23:59', strtotime('last day of this month'))}}';
        datePicker['lastDayS']   = '{{date('Y-m-d 00:00', strtotime('yesterday'))}}';
        datePicker['lastDayE']   = '{{date('Y-m-d 23:59', strtotime('yesterday'))}}';
        datePicker['lastWeekS']  = '{{date('Y-m-d 00:00', strtotime('-2 sun'))}}';
        datePicker['lastWeekE']  = '{{date('Y-m-d 23:59', strtotime('-1 sat'))}}';
        datePicker['lastMonthS'] = '{{date('Y-m-d 00:00', strtotime('first day of last month'))}}';
        datePicker['lastMonthE'] = '{{date('Y-m-d 23:59', strtotime('last day of last month'))}}';
        var toolsBarChange = false;
        $(document).ready(function(){
            /** Alert **/
            {!! session()->get('msg', '') !!}
            {{ setMesage(null) }}
            App.init();
            $(".form_datetime").datetimepicker({
                format: "yyyy-mm-dd hh:ii",
                autoclose: true,
                todayBtn: true,
                todayHighlight: true,
                language: "{{ Request()->get('setLanguage', 'ch') }}",
                pickerPosition: "bottom-left",
                minuteStep: 1
            });

            $("#dataMode").change(function(){
                var $this = $(this);
                if($this.val() != "0"){
                    $('#startDate').datetimepicker('update', datePicker[$this.val() + "S"]);
                    $('#endDate').datetimepicker('update', datePicker[$this.val() + "E"]);
                }
                $('#dataMode')[0].selectedIndex = 0;
            });

            $("#rowSelect").change(function(){
                RaySys.Alert.Fixet("{{ trans('message.onWaiting') }}", "{{ trans('message.onLoading') }}", 0);

                $('#row').val($(this).val());
                $("#searchForm").submit();
            });

            $("#m_rowSelect").change(function(){
                RaySys.Alert.Fixet("{{ trans('message.onWaiting') }}", "{{ trans('message.onLoading') }}", 0);
                $('#mrow').val($(this).val());
                $("#searchForm").submit();
            });

            $("#adminDown").change(function(){
                if($("#adminDown").prop('checked') == true){
                    $("#adminDownInput").val(1);
                }
                else{
                    $("#adminDownInput").val(0);
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            adminTreeDownAjax();
        });

        $(document).on("click", ".waitFrom, #searchBtn", function(){
            RaySys.Alert.Fixet("{{ trans('message.onWaiting') }}", "{{ trans('message.onLoading') }}", 0);
        });

        $(document).on("click", ".jstree-anchor", function(){
            // $("#adminAccount").val($(this).children("span").html());
            // $("#adminTreeDownBtn").click();
            // if($("#toolsClose").prop("class") == "expand"){
            //     $("#toolsClose").click();
            // }
        });

        $(document).on("click", "#toolsBar", function(){
            toolsBarChange = true;
            $("#toolsClose").click();
        });

        $(document).on("click", "#toolsClose", function(){
            toolsBarChange = false;
            if(toolsBarChange === true){
                return true;
            }
            return false;
        });

        function adminTreeDownAjax(){
            // $.ajax({
            //     type: 'POST',
            //     url: '/ajax/adminTreeDown',
            //     data: { account : "{{ auth()->user->account }}" },
            //     dataType: 'json',
            //     success: function(ResultJSON){
            //         // console.log(ResultJSON);
            //         if(ResultJSON != ""){
            //             $("#adminDownTree").css("align", "left");
            //             $('#adminDownTree').html("");
            //             // console.log(ResultJSON);
            //             $('#adminDownTree').jstree(ResultJSON).on("load_node.jstree",function(e, d){
            //                 $("a[id*='agent']>i").removeClass().addClass("icon-tag");
            //                 $(".jstree-themeicon").removeClass().addClass("icon-user");
            //             }).on("open_node.jstree",function(e, d){
            //                 $("a[id*='agent']>i").removeClass().addClass("icon-tag");
            //                 $(".jstree-themeicon").removeClass().addClass("icon-user");
            //             });
            //         }
            //     }
            // });
        }
    </script>
    @yield('jsImport')
</head>

<body class="page-header-fixed">
    <div class="header navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="brand" href="/"><img src="./images/manager/logo.png" alt="logo" width="35px" /></a>
                <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse"><img src="./images/manager/menu-toggler.png" alt="" /></a>
                <ul class="nav pull-right">
                    {{-- <li class="">
                        <a href="#adminTreeDownDiv" data-toggle="modal" id="adminTreeDownBtn">{{ trans('view.topBar.adminDownTree') }}</a>
                    </li>
                    <li class="dropdown user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('view.topBar.lang') }}<i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="/setLanguage?setLanguage=tw">繁體中文</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="/setLanguage?setLanguage=ch">简体中文</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="/setLanguage?setLanguage=en">English</a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="dropdown user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="username"> {!! auth()->user->name !!} </span><i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/logout"><i class="icon-key"></i> {!! trans('menu.manager.logout') !!}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="page-container row-fluid">
        <div class="page-sidebar nav-collapse collapse">
            <ul class="page-sidebar-menu" style="min-height:90vh;">
                <li>
                    <div class="sidebar-toggler hidden-phone"></div>
                </li>
                {!! auth()->menu !!}
            </ul>

        </div>

        <div id="MasterBox" class="page-content">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <h3 class="page-title">
                            {{ trans('menu.manager.'. auth()->menuCheck) }} <small></small>
                        </h3>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-inner">
            PG Web
        </div>
        <div class="footer-tools">
            <span class="go-top">
            <i class="icon-angle-up"></i>
            </span>
        </div>
    </div>

    <div id="adminTreeDownDiv" class="modal hide fade" tabindex="-1" data-replace="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h3>{{ trans('managerView.adminDownTree') }}</h3>
        </div>
        <div class="modal-body">
            <div id="adminDownTree">
                <img src="./images/manager/loader.gif">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn">{{ trans('managerView.b.close') }}</button>
        </div>
    </div>
</body>
</html>