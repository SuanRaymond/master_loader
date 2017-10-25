$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /** hide&show **/
    $(".Btn0").show();
    $(".buyClick").click(function(){
        $buyStatus = $(this).prop("id").replace("Buy","");
        switch($buyStatus){
            case "1":
            case "2":
            case "3":
                $(".List").hide();
                $(".List"+$buyStatus).show();
                $(".Check0").hide();
                $(".navbar").hide();
            break;
            case "0":
                $(".List").hide();
                $(".List"+$buyStatus).show();
                $(".Check0").show();
                $(".navbar").show();
            break;
            default:
                $(".List").show();
                $(".Check0").hide();
                $(".navbar").hide();
            break;
        }
    });
    /** Total **/
    $checkTotalMoney = 0;
    $(".Check0").click(function(){
        if($(this).is(':checked')){
            $checkTotalMoney += parseInt($(this).val());
        }else{
            $checkTotalMoney -= parseInt($(this).val());
        }
        $("#BottomMoney").html(comdify($checkTotalMoney));
    });
    /** send **/
    $("#buysend").click(function(){
        $memberPayList = {};
        swal({
            title: "已勾選",
            text: "是否立即付款",
            type: "success",
            confirmButtonText: "是",
            cancelButtonText: "否",
            closeOnConfirm: false,
            showCancelButton: true,
            showLoaderOnConfirm: true,
        },
        function(){
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
                    showLoaderOnConfirm: true,
                    showLoaderOnCancel: true,
                },
                function(isConfirm){
                    if (isConfirm) {
                        $('input[name="check"]:checked').each(function() {
                            $memberPayList[this.id] = this.id;
                        });
                        if(Object.keys($memberPayList).length>0){
                            RaySys.AJAX.Send({ShopOrderID: $memberPayList, CardType: 0}, '/ajax/PayCardList', 'SuFun', 'ErFun');
                        }else{
                            swal({
                                title: "付款失敗",
                                text: "沒有勾選任何項目無法付款",
                                type: "error",
                                timer: 3000,
                                showConfirmButton: false
                            });
                        }
                    }
                    else {
                        // swal("成功", "請繳納現金後通知客服人員","success");
                        $('input[name="check"]:checked').each(function() {
                            $memberPayList[this.id] = this.id;
                        });
                        RaySys.AJAX.Send({ShopOrderID: $memberPayList, CardType: 1}, '/ajax/PayCardList', 'SuFun', 'ErFun');
                    }
                });
            },1000);
        });
    });
    $(".singlePay").click(function(){
        $singlePay = $(this).prop("id");
        $memberPayList = {};
        swal({
            title: "已選擇",
            text: "是否立即付款",
            type: "success",
            confirmButtonText: "是",
            cancelButtonText: "否",
            closeOnConfirm: false,
            showCancelButton: true,
            showLoaderOnConfirm: true,
        },
        function(){
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
                    showLoaderOnConfirm: true,
                    showLoaderOnCancel: true,
                },
                function(isConfirm){
                    if (isConfirm) {
                        $memberPayList[$singlePay] = $singlePay;
                        if(Object.keys($memberPayList).length>0){
                            RaySys.AJAX.Send({ShopOrderID: $memberPayList, CardType: 0}, '/ajax/PayCardList', 'SuFun', 'ErFun');
                        }else{
                            swal({
                                title: "付款失敗",
                                text: "沒有勾選任何項目無法付款",
                                type: "error",
                                timer: 3000,
                                showConfirmButton: false
                            });
                        }
                    }
                    else {
                        // swal("成功", "請繳納現金後通知客服人員","success");
                        $memberPayList[$singlePay] = $singlePay;
                        RaySys.AJAX.Send({ShopOrderID: $memberPayList, CardType: 1}, '/ajax/PayCardList', 'SuFun', 'ErFun');
                    }
                });
            },1000);
        });
    });
});
// 千分位轉換
function comdify(num){
    var result = '', counter = 0;
    num = (num || 0).toString();
    for (var i = num.length - 1; i >= 0; i--) {
        counter++;
        result = num.charAt(i) + result;
        if (!(counter % 3) && i != 0) { result = ',' + result; }
    }
    return result;
}
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