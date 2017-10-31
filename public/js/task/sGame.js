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
        html: true,
        title: "获得加速"+$("#TaskOdds").val()+"%",
        text: "获得<br><span style='color:#FF0000; font-size: 25pt;'><b>"+$("#MoneyBack").val()+"</b></span><br>金蛋",
        type:"success",
        confirmButtonText: "确认",
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
    },
    function(){
        document.location.href="/Task";
    });
}
