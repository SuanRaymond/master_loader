$(document).ready(function(){
    $("#sign").click(function(){
        RaySys.AJAX.Send({memberID: 45}, '/ajax/GameSend', 'SuFun', 'ErFun');
    });
});
function SuFun(_obj){
    // console.log(_obj);
    swal({
        title: "獲得加速"+_obj.ResultJSON.TaskOdds+"%",
        text: "獲得"+_obj.ResultJSON.MoneyBack+"金蛋",
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
    swal("抽獎失败", "", "error");
}