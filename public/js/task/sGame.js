$(document).ready(function(){
    $("#sign").click(function(){
        // RaySys.Alert.Loading();
        // RaySys.AJAX.Send({memberID: 45}, '/ajax/GameSend', 'SuFun', 'ErFun');
        SuFun();
    });

    // $("#bridge").css({top: $("#bridge1").css("top"), left: $("#bridge1").css("left")});
});
function SuFun(){
    // console.log("aaaaaa");
    swal({
        title: "获得加速"+$("#TaskOdds").val()+"%",
        text: "获得"+$("#MoneyBack").val()+"金蛋",
        type:"success",
        confirmButtonText: "确认",
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
    },
    function(){
        document.location.href="/Task";
    });
}
