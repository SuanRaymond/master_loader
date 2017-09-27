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
        text: "藏蛋后无法取消",
        type:"info",
        confirmButtonText: "好",
        cancelButtonText: "取消",
        closeOnConfirm: false,
        showCancelButton: true,
        showLoaderOnConfirm: true,
    },
    function(){
        setTimeout(function(){
            swal({
                title: "是否确认藏蛋？",
                text: "藏蛋后会扣PP",
                type:"warning",
                confirmButtonText: "确认",
                cancelButtonText: "取消",
                closeOnConfirm: false,
                showCancelButton: true,
                showLoaderOnConfirm: true,
            },
            function(){
                if(parseInt($("#points").val())<parseInt($("#points"+Type).val())){
                    swal.showInputError("PP不足无法藏蛋");
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
        title: "藏蛋成功",
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
    swal("藏蛋失败", "", "error");
}

