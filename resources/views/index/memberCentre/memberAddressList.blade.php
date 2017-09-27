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
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                if($.trim($("#datalength").html()) >= 5){
                    $("#NAddress").hide();
                }else{
                    $("#NAddress").show();
                }
                $(".button").click(function(){
                    if($(this).prop("name") == "changeA"){
                        $typeID    = $("#typeID"   +($(this).prop("id").replace("index",""))).html();
                        $addressee = $("#addressee"+($(this).prop("id").replace("index",""))).html();
                        $phone     = $("#phone"    +($(this).prop("id").replace("index",""))).html();
                        $address   = $("#address"  +($(this).prop("id").replace("index",""))).html();
                        $Default   = $("#Default"  +($(this).prop("id").replace("index",""))).html();
                        RaySys.AJAX.Send({index:     $typeID,
                                          addressee: $addressee,
                                          phone:     $phone,
                                          address:   $address,
                                          defaule:   $Default}, '/ajax/CAddressS', 'SCASSuFun1', 'SCASErFun1');
                    }else if($(this).prop("name") == "delete"){
                        $typeID    = $("#typeID"   +($(this).prop("id").replace("delete",""))).html();
                        $addressee = $("#addressee"+($(this).prop("id").replace("delete",""))).html();
                        $phone     = $("#phone"    +($(this).prop("id").replace("delete",""))).html();
                        $address   = $("#address"  +($(this).prop("id").replace("delete",""))).html();
                        $Default   = $("#Default"  +($(this).prop("id").replace("delete",""))).html();
                        swal({
                            title: "是否刪除？",
                            type:"info",
                            confirmButtonText: "是",
                            cancelButtonText: "否",
                            closeOnConfirm: false,
                            showCancelButton: true,
                            showLoaderOnConfirm: true,
                            html:true,
                        },
                        function(){
                            RaySys.AJAX.Send({index:     $typeID,
                                              addressee: $addressee,
                                              phone:     $phone,
                                              address:   $address,
                                              defaule:   $Default}, '/ajax/CAddressD', 'SCASSuFun2', 'SCASErFun1');
                        });
                    }
                });
                /** Alert **/
                {!! session()->get('msg', '') !!}
                {{ setMesage(null) }}
            });
            function SCASSuFun1(_obj){
                console.log("1111111");
                document.location.href="/CAddress";
            };
            function SCASSuFun2(_obj){
                swal({
                    title: "数据已删除",
                    text: "",
                    type:"success",
                    confirmButtonText: "好",
                    closeOnConfirm: false,
                },
                function(){
                    document.location.href="/AddressList";
                });
            };
            function SCASErFun1(_obj){
                // console.log(_obj);
                swal("失败", "", "error");
            };
        </script>

    </head>
    <body style="background-color: #f0f0f0;">
        <div>
            <div class="span12" style="text-align: center;"><h1>{{ trans('view.AddressList.AddressListTitle') }}</h1></div>
            <div class="span12" style=" padding: 5px;">
                    {!! $box->html->addressList !!}
               <!--  <table class="table table-bordered table-condensed" style="background-color: #ffffff;">
                    <tbody style="border-top: 10px solid #f0f0f0; font-size: 4.5vw;">
                        <tr>
                            <td style="width: 25%;text-align: right;vertical-align: middle;">
                                收貨人
                            </td>
                            <td style="width: 25%;text-align: left;vertical-align: middle;">
                                ＸＸＸＸ
                            </td>
                            <td style="width: 20%;text-align: center;vertical-align: middle;">
                                聯繫<br>電話
                            </td>
                            <td style="text-align: left;vertical-align: middle;">
                                ０００
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;vertical-align: middle;">
                                送貨<br>地址
                            </td>
                            <td  style="text-align: left;vertical-align: middle;" colspan="3">ＺＺＺＺＺＺＺＺ</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="fontred" style="font-size: 6vw; text-align: center; vertical-align: middle;">默認地址</td>
                            <td><a href="/CAddress" class="button button-flat-primary button-large  button-block" style="padding: 0; font-size: 4vw;"><span class="glyphicon glyphicon-pencil"></span>編輯</a></td>
                            <td><a href="/" class="button button-flat-primary button-large  button-block" style="padding: 0px; font-size: 4vw;"><span class="glyphicon glyphicon-trash"></span>刪除</a></td>
                        </tr>
                    </tbody>
                </table> -->
            </div>
            <div class="span12" style="background-color: #f0f0f0; padding-bottom: 20px;">
                <a href="/NAddress" id="NAddress" class="button button-flat-primary button-large  button-block">{{ trans('view.AddressList.b.newaddress') }}</a>
            </div>
            <div class="span12" style="background-color: #f0f0f0; padding-bottom: 40px;">
                <a href="
                    @if(session()->get('menu')!='/')
                        /{{ session()->get('menu') }}
                    @else
                        /MFire
                    @endif" class="button button-flat-primary button-large  button-block">{{ trans('view.AddressList.b.cancel') }}</a>
            </div>
        </div>
    </body>
</html>