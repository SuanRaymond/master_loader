$(document).ready(function(){
    $("#Pick1").click(function(){
        doublecheck(0);
    });
    $("#Pick2").click(function(){
        doublecheck(1);
    });
});
function doublecheck(Type){
    swal({
        title: "注意",
        text: "選擇後即使退出結果一樣會送出",
        type:"info",
        closeOnConfirm: false,
        showCancelButton: true,
        showLoaderOnConfirm: true,
    },
    function(){
        if(Type==0){
            setTimeout(function(){
                swal({
                    title: "富貴刮刮樂",
                    text: "8個數字3個相同即得該獎項",
                    type:"warning",
                    closeOnConfirm: false,
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                },
                function(){
                    RaySys.AJAX.Send({TypeID: Type}, '/ajax/GameSend', 'SuFun', 'ErFun');
                });
            },1000)
        }else if(Type==1){
            setTimeout(function(){
                swal({
                    title: "敲金蛋",
                    text: "錘子與金蛋數字相同即得該獎項",
                    type:"warning",
                    closeOnConfirm: false,
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                },
                function(){
                    RaySys.AJAX.Send({TypeID: Type}, '/ajax/GameSend', 'SuFun', 'ErFun');
                });
            },1000)
        }
    });
}function SuFun(_obj){
    document.location.href="/SGame";
}
function ErFun(_obj){
    // console.log(_obj);
    swal("失败", "", "error");
}