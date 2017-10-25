$(document).ready(function(){

    $(".checkBlock").height("100%").show().animate({left: ($(".checkBlock").width())}, 1000);
    $(".uncheckBlock").height("100%").show().animate({top: ($(".uncheckBlock").height())}, 1000);

    $(".uncheckBtn").click(function(){
        var $this = $(this);
        var shopID = $this.prop("id");
        shopID = shopID.replace("uncheckBtn_", "");

        $("#uncheckBtn_" + shopID).parent("div").hide();
        $("#checkBtn_" + shopID).parent("div").show();
        $("#check_" + shopID).hide();
        $("#uncheck_" + shopID).show();
        $("#uncheck_" + shopID + "_block").css({top: 0, left: 0}).animate({top: ($(".uncheckBlock").height())}, 1000);
        $("#select_" + shopID).val(0);
    });

    $(".checkBtn").click(function(){
        var $this = $(this);
        var shopID = $this.prop("id");
        shopID = shopID.replace("checkBtn_", "");

        $("#uncheckBtn_" + shopID).parent("div").show();
        $("#checkBtn_" + shopID).parent("div").hide();
        $("#uncheck_" + shopID).hide();
        $("#check_" + shopID).show();
        $("#check_" + shopID + "_block").css({top: 0, left: 0}).animate({left: ($(".checkBlock").width())}, 1000);
        $("#select_" + shopID).val(1);
    });

    $(".addItem").click(function(){
        var $this = $(this);
        var shopID = $this.prop("id");
        shopID = shopID.replace("addItem_", "");

        // RaySys.Alert.Fixet(MsgObj.onWaiting, "", 0);
        RaySys.AJAX.Send({ShopID: shopID}, '/ajax/ShopCarAdd', 'SuFun', 'ErFun');
    });

    $(".mnsItem").click(function(){
        var $this = $(this);
        var shopID = $this.prop("id");
        shopID = shopID.replace("mnsItem_", "");

        // RaySys.Alert.Fixet(MsgObj.onWaiting, "", 0);
        RaySys.AJAX.Send({ShopID: shopID}, '/ajax/ShopCarRem', 'SuFun', 'ErFun');
    });

    $(".deleteBtn").click(function(){
        var $this = $(this);
        var shopID = $this.prop("id");
        shopID = shopID.replace("deleteBtn_", "");

        // RaySys.Alert.Fixet(MsgObj.onWaiting, "", 0);
        RaySys.AJAX.Send({ShopID: shopID}, '/ajax/ShopCarDel', 'SuFun', 'ErFun');
    });

    $("#sendBuy").click(function(){
        var sendData = '{';

        $(".selectType").each(function(){
            var $this = $(this);
            var shopID = $this.prop("id");
            if($this.val() == 1){
                shopID = shopID.replace("select_", "");

                sendData = sendData + '"' + shopID + '":' + '"' + $("#quantity_" + shopID).html() + '",';
            }
        });
        sendData = sendData.substring(0, sendData.length - 1) + "}";

        $("#sendData").val(sendData);
        $("#toBuyForm").submit();
        // RaySys.Alert.Fixet(MsgObj.onWaiting, "", 0);
    });
});

function SuFun(_obj){
    window.location.reload();
}
function ErFun(_obj){
    // console.log(_obj);
    swal("失败", "", "error");
}
