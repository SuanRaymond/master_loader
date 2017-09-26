$(document).ready(function(){
    $("#buysend").click(function(){
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

