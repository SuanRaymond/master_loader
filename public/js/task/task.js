$(document).ready(function(){
    $("#Buy1").click(function(){
        // swal("签到失败1", "", "error");
        doublecheck(1);
    });
    $("#Buy2").click(function(){
        // swal("签到失败2", "", "error");
        doublecheck(2);
    });
    $("#Buy3").click(function(){
        // swal("签到失败3", "", "error");
        doublecheck(3);
    });
    $("#Buy4").click(function(){
        // swal("签到失败4", "", "error");
        doublecheck(4);
    });
});
function doublecheck(Type){
    swal({
        title: "提醒！",
        text: "买了无法退换货",
        type:"info",
        closeOnConfirm: false,
        showCancelButton: true,
        showLoaderOnConfirm: true,
    },
    function(){
        setTimeout(function(){
            swal({
                title: "是否确认购买？",
                text: "买了会扣积分",
                type:"warning",
                closeOnConfirm: false,
                showCancelButton: true,
                showLoaderOnConfirm: true,
            },
            function(){
                if(parseInt($("#points").val())<parseInt($("#points"+Type).val())){
                    swal.showInputError("点数不足无法购买");
                    return false
                }else{
                    RaySys.AJAX.Send({TypeID: Type}, '/ajax/Rebate', 'SuFun', 'ErFun');
                }
            });
        },1000)
    });
}
function SuFun(_obj){
    // console.log(_obj);
    swal({
        title: "购买成功",
        text: "",
        type:"success",
        closeOnConfirm: false,
    },
    function(){
        document.location.href="/Task";
    });
}
function ErFun(_obj){
    // console.log(_obj);
    swal("购买失败", "", "error");
}

