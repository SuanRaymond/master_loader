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
	<script type="text/javascript">
		$(document).ready(function(){
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
				            cancelButtonText: "現金",
				            closeOnConfirm: false,
				            closeOnCancel: false,
				            showCancelButton: true,
				        },
				        function(isConfirm){
							if (isConfirm) {
								// $("#sendForm").submit();
								swal("送出", "執行信用卡流程","success");
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
	</script>
</head>
<body>
	<form id="sendForm" name="sendForm" action="{!! env('SEND_CARD_URL') !!}" method="POST">
		<input type="hidden" name="web" value="{!! env('SEND_CARD_KEY') !!}" /> 			<!--01.*商店代號-->
		<input type="hidden" name="MN" value="10" /> 										<!--02.*交易金額-->
		<input type="hidden" name="OrderInfo" value="test123" /> 							<!--03.*交易內容-->
		<input type="hidden" name="Td" value="S123456" /> 									<!--04.商家訂單編號-->
		<input type="hidden" name="sna" value="林昱呈" /> 									<!--05.消費者姓名-->
		<input type="hidden" name="sdt" value="13691641712" />                   			<!--06.消費者電話-->
		<input type="hidden" name="email" value="" />                           			<!--07.消費者Email-->
		<input type="hidden" name="note1" value="" />                           			<!--08.備註-->
		<input type="hidden" name="note2" value="" />                           			<!--09.備註-->
		<input type="hidden" name="Card_Type" value="0" />                       			<!--10.交易類別-->
		<input type="hidden" name="Country_Type" value="" />                    			<!--11.語言類別-->
		<input type="hidden" name="Term " value="" />                           			<!--12.分期期數-->
		<input type="hidden" name="ChkValue"
			   value="{{ strtoupper(sha1(env('SEND_CARD_KEY'). env('SEND_CARD_PAS'). '10'. '')) }}" /><!--13.*交易檢查碼-->
	</form>
</body>
</html>

