$(document).ready(function(){
    $("#buysend").click(function(){
        // swal("签到失败1", "", "error");
        doublecheck();
    });
});
function doublecheck(){
    swal({
        title: "提醒！",
        text: "确认购买？",
        type:"info",
        closeOnConfirm: false,
        showCancelButton: true,
        showLoaderOnConfirm: true,
    },
    function(){
        setTimeout(function(){
            swal({
                title: "是否确认购买？",
                text: "买了无法退换货",
                type:"warning",
                closeOnConfirm: false,
                showCancelButton: true,
                showLoaderOnConfirm: true,
            },
            function(){
                document.location.href="/Send";
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

