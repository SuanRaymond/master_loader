$(document).ready(function(){
    $("#sign").click(function(){
        RaySys.Alert.Loading();
        RaySys.AJAX.Send({memberID: 45}, '/ajax/GameSend', 'SuFun', 'ErFun');
    });

    // $("#bridge").css({top: $("#bridge1").css("top"), left: $("#bridge1").css("left")});
});
function SuFun(_obj){
    // console.log(_obj);
    swal({
        title: "获得加速"+_obj.ResultJSON.TaskOdds+"%",
        text: "获得"+_obj.ResultJSON.MoneyBack+"金蛋",
        type:"success",
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
    },
    function(){
        document.location.href="/Task";
    });
}
function ErFun(_obj){
    // console.log(_obj);
    swal("抽奖失败", "", "error");
}
