$(document).ready(function(){
    console.log("aaa");
    $("#buysend").click(function(){
        console.log("bbb");
        if($.trim($("#addressee").html()).length==0||
           $.trim($("#phone").html()).length==0||
           $.trim($("#address").html()).length==0){
            swal({
              title: "警告",
              text: "收货信息尚未填妥无法付款",
              type: "error",
              confirmButtonText: "好",
            });
        }
        else{
            console.log("ccc");
            doublecheck();
        }
    });
});
function doublecheck(){
    console.log("ddd");
    swal({
        title: "提醒！",
        text: "确认购买？",
        type:"info",
        confirmButtonText: "是",
        cancelButtonText: "否",
        closeOnConfirm: false,
        showCancelButton: true,
        showLoaderOnConfirm: true,
    },
    function(){
        console.log("eee");
        setTimeout(function(){
            swal({
                title: "是否确认购买？",
                text: "买了无法退换货",
                type:"warning",
                confirmButtonText: "确认",
                cancelButtonText: "取消",
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

