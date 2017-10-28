$(document).ready(function(){
    $("#Pick1").click(function(){
        doublecheck(0);
    });
    $("#Pick2").click(function(){
        doublecheck(1);
    });
});
function doublecheck(Type){
    if(Type==0){
        swal({
            title: "神秘宝箱",
            text: "8个数字3个相同即得该奖项",
            type: "warning",
            confirmButtonText: "确认",
            cancelButtonText: "取消",
            closeOnConfirm: false,
            showCancelButton: true,
            showLoaderOnConfirm: true,
        },
        function(){
            setTimeout(function(){
                swal({
                    title: "注意",
                    text: "选择后即使退出结果一样会送出",
                    type:"info",
                    confirmButtonText: "好",
                    cancelButtonText: "取消",
                    closeOnConfirm: false,
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                },
                function(){
                    RaySys.AJAX.Send({TypeID: Type}, '/ajax/GameSend', 'SuFunGame', 'ErFunGame');
                });
            },1000)
        });
    }else if(Type==1){
        swal({
            title: "敲金蛋",
            text: "锤子与金蛋数字相同即得该奖项",
            type:"warning",
            confirmButtonText: "确认",
            cancelButtonText: "取消",
            closeOnConfirm: false,
            showCancelButton: true,
            showLoaderOnConfirm: true,
        },
        function(){
            setTimeout(function(){
                swal({
                    title: "注意",
                    text: "选择后即使退出结果一样会送出",
                    type:"info",
                    confirmButtonText: "好",
                    cancelButtonText: "取消",
                    closeOnConfirm: false,
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                },
                function(){
                    RaySys.AJAX.Send({TypeID: Type}, '/ajax/GameSend', 'SuFunGame', 'ErFunGame');
                });
            },1000)
        });
    }
}
function SuFunGame(_obj){
    document.location.href="/SGame";
}
function ErFunGame(_obj){
    // console.log(_obj);
    swal("失败", "", "error");
}




