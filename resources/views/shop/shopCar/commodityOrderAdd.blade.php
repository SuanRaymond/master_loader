<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

	<title>{{ trans('view.title') }}-{{ trans('menu.pay') }}</title>

	<link type="text/css" rel="stylesheet" href="./lib/css/sweetalert.css">
	<script type="text/javascript" src="./lib/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="./lib/js/sweetalert.js"></script>
	<script type="text/javascript" src="./lib/js/base.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
			swal({
	            title: "訂購成功",
	            text: "是否立即付款",
	            type: "success",
	            confirmButtonText: "是",
	            cancelButtonText: "否",
	            closeOnConfirm: false,
	            closeOnCancel: false,
	            showCancelButton: true,
	            showLoaderOnConfirm: true,
	            showLoaderOnCancel: true,
	        },
	        function(isConfirm){
				if (isConfirm) {
					setTimeout(function(){
						swal({
				            title: "選擇付款方式",
				            text: "",
				            type: "success",
				            confirmButtonText: "信用卡",
				            cancelButtonText: "銀聯卡",
				            closeOnConfirm: false,
				            closeOnCancel: false,
				            showCancelButton: true,
				        },
				        function(isConfirm){
							if (isConfirm) {
								swal({
							        title: "請稍候．．．",
							        text: "頁面轉跳中．．．",
							        type:"",
							        closeOnConfirm: false,
							        showConfirmButton: false,
							        showLoaderOnConfirm: true,
							        timer: 500,
							    },
							    function(){
							        // $("#sendForm").submit();
							        RaySys.AJAX.Send({CardType: 0}, '/ajax/PayCardListSession', 'SuFun', 'ErFun');
							    });
								// swal("送出", "執行信用卡流程","success");
							}
							else {
								swal({
							        title: "請稍候．．．",
							        text: "頁面轉跳中．．．",
							        type:"",
							        closeOnConfirm: false,
							        showConfirmButton: false,
							        showLoaderOnConfirm: true,
							        timer: 500,
							    },
							    function(){
							        // document.location.href="/BuyList";
							        RaySys.AJAX.Send({CardType: 1}, '/ajax/PayCardListSession', 'SuFun', 'ErFun');
							    });
							}
				        });
					},1000);
				}
				else {
					swal({
				        title: "請稍候．．．",
				        text: "頁面轉跳中．．．",
				        type:"",
				        closeOnConfirm: false,
				        showConfirmButton: false,
				        showLoaderOnConfirm: true,
				        timer: 500,
				    },
				    function(){
				        document.location.href="/BuyList";
				    });
				}
	        });
		});
		function SuFun(_obj){
		    $('input[name="MN"]').val(_obj.ResultJSON.MN);
		    $('input[name="OrderInfo"]').val(_obj.ResultJSON.OrderInfo);
		    $('input[name="Td"]').val(_obj.ResultJSON.Td);
		    $('input[name="sna"]').val(_obj.ResultJSON.sna);
		    $('input[name="sdt"]').val(_obj.ResultJSON.sdt);
		    $('input[name="email"]').val(_obj.ResultJSON.email);
		    $('input[name="note1"]').val(_obj.ResultJSON.note1);
		    $('input[name="note2"]').val(_obj.ResultJSON.note2);
		    $('input[name="Card_Type"]').val(_obj.ResultJSON.Card_Type);
		    $('input[name="ChkValue"]').val(_obj.ResultJSON.ChkValue);
		    // swal("送出", "執行信用卡流程","success");
		    swal({
		        title: "請稍候．．．",
		        text: "轉跳頁面中．．．",
		        type:"success",
		        closeOnConfirm: false,
		        showConfirmButton: false,
		        showLoaderOnConfirm: true,
		        timer: 100,
		    },
		    function(){
		        $("#sendForm").submit();
		    });
		}
		function ErFun(_obj){
		    // console.log(_obj);
		    swal("付款失敗", _obj.ResultJSON.error, "error");
		    // swal({
		    //     title: "签到失败",
		    //     text: _obj.ResultJSON.error,
		    //     type:"error",
		    //     closeOnConfirm: false,
		    //     showLoaderOnConfirm: true,
		    //     confirmButtonText: "确认",
		    // },
		    // function(){
		    //     document.location.href="/Task";
		    // });
		}
	</script>
</head>
<body>
	<form id="sendForm" name="sendForm" action="{!! env('SEND_CARD_URL') !!}" method="POST">
        <input type="hidden" name="web" value="{!! env('SEND_CARD_KEY') !!}" />             <!--01.*商店代號-->
        <input type="hidden" name="MN" value="5" />                                        <!--02.*交易金額-->
        <input type="hidden" name="OrderInfo" value="0" />                            <!--03.*交易內容-->
        <input type="hidden" name="Td" value="0" />                                   <!--04.商家訂單編號-->
        <input type="hidden" name="sna" value="" />                                  <!--05.消費者姓名-->
        <input type="hidden" name="sdt" value="0" />                              <!--06.消費者電話-->
        <input type="hidden" name="email" value="" />                                       <!--07.消費者Email-->
        <input type="hidden" name="note1" value="" />                                       <!--08.備註-->
        <input type="hidden" name="note2" value="" />                                       <!--09.備註-->
        <input type="hidden" name="Card_Type" value="0" />                                  <!--10.交易類別-->
        <input type="hidden" name="Country_Type" value="" />                                <!--11.語言類別-->
        <input type="hidden" name="Term " value="" />                                       <!--12.分期期數-->
        <input type="hidden" name="ChkValue"
               value="{{ strtoupper(sha1(env('SEND_CARD_KEY'). env('SEND_CARD_PAS'). '5'. '')) }}" /><!--13.*交易檢查碼-->
    </form>
</body>
</html>

