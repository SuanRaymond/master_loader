$(document).ready(function(){
    $quantityNumber = {};
    $totalprice     = $("#totalprice").html();
    $totaltransport = $("#totaltransport").html();
    $totalPoint     = $("#totalPoint").html();
    $totalMoney     = $("#totalMoney").html();
    $(".daleteShop").click(function(){
        $ShopTitle = $("#"+$(this).prop("id")+" span").html();
        $ShopID = $(this).prop("id").replace("Shop","");
        swal({
            title: "是否刪除？",
            text: $ShopTitle,
            type:"info",
            closeOnConfirm: false,
            showCancelButton: true,
            showLoaderOnConfirm: true,
            html:true,
        },
        function(){
            document.location.href="/ClearBuy?ShopID="+ $ShopID;
        });
    });
    $("#Buy").click(function(){
        RaySys.AJAX.Send({quantityNumber: $quantityNumber,
                          totalprice:     $totalprice,
                          totaltransport: $totaltransport,
                          totalPoint:     $totalPoint,
                          totalMoney:     $totalMoney}, '/ajax/SCAS', 'SCASSuFun1', 'SCASErFun1');
    });
    // 按下＋－改變數量
    $(".btn").click(function(){
        if($(this).prop("name")=="minus"){
            $ShopID = $(this).prop("id").replace("minus","");
            $("#quantity"+$ShopID).val(parseInt($("#quantity"+$ShopID).val()) - 1);
            if($("#quantity"+$ShopID).val()<=1){
                $("#quantity"+$ShopID).val(1);
            }
        }else if($(this).prop("name")=="plus"){
            $ShopID = $(this).prop("id").replace("plus","");
            $("#quantity"+$ShopID).val(parseInt($("#quantity"+$ShopID).val()) + 1);
            if($("#quantity"+$ShopID).val()>=100){
                $("#quantity"+$ShopID).val(100);
            }
        }
        ListNumber($ShopID);
    });
    // 使用者自填數量
    $(".quantity").change(function(){
        $ShopID = $(this).prop("id").replace("quantity","");
        if($("#quantity"+$ShopID).val()=='' || $("#quantity"+$ShopID).val()== 0){
            $("#quantity"+$ShopID).val(1);
        }else if(parseInt($("#quantity"+$ShopID).val())>=100){
            $("#quantity"+$ShopID).val(100);
        }
        ListNumber($ShopID);
    });
    // 單品項總金額計算
    function ListNumber($_ShopID){
        $quantityNumber[String($_ShopID)] = $("#quantity"+$_ShopID).val();
        $(".ShopPrice"+$_ShopID).html(parseInt($("#price"+$_ShopID+" span").html()) * parseInt($("#quantity"+$_ShopID).val()));
        $(".ShopTransport"+$_ShopID).html(parseInt($("#transport"+$_ShopID+" span").html()) * parseInt($("#quantity"+$_ShopID).val()));
        $(".ShopPoints"+$_ShopID).html(parseInt($("#points"+$_ShopID+" span").html()) * parseInt($("#quantity"+$_ShopID).val()));
        TotalMoney();
    };
    // 購物車產品金額計算
    function TotalMoney(){
        $totalprice     = 0;
        $totaltransport = 0;
        $totalPoint     = 0;
        $totalMoney     = 0;
        for($i=0;$i<$("#dataLength").html();$i++){
            $totalprice += parseInt($("#dataPrice"+$i).html());
            $totaltransport += parseInt($("#dataTransport"+$i).html());
            $totalPoint += parseInt($("#dataPoints"+$i).html());
        }
        $totalMoney = parseInt($totalprice) + parseInt($totaltransport);
        $("#totalprice").html(comdify($totalprice));
        $("#totaltransport").html(comdify($totaltransport));
        $("#totalPoint").html(comdify($totalPoint));
        $("#totalMoney").html(comdify($totalMoney));
        $("#BottomMoney").html(comdify($totalMoney));
    };
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
});
function SCASSuFun1(_obj){
    console.log("1111111");
    document.location.href="/Buy";
};
function SCASErFun1(_obj){
    // console.log(_obj);
    swal("失败", "", "error");
};