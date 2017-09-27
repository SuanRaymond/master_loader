// $(document).ready(function(){
//     $("#sign").click(function(){
//         RaySys.Alert.Fixet("{{ trans('message.onWaiting') }}", "{{ trans('message.onLoading') }}", 0);
//         RaySys.AJAX.Send({memberID: 0}, '/ajax/SignSend', 'SuFun', 'ErFun');
//     });
// });
function SuFun(_obj){
    // console.log(_obj);
    swal({
        title: "签到完毕",
        text: "连续签到天数：＋１",
        type:"success",
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
        timer: 5000,
        confirmButtonText: "确认",
    },
    function(){
        document.location.href="/Task";
    });
}
function ErFun(_obj){
    // console.log(_obj);
    // swal("签到失败", _obj.ResultJSON.error, "error");
    swal({
        title: "签到失败",
        text: _obj.ResultJSON.error,
        type:"error",
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
        confirmButtonText: "确认",
    },
    function(){
        document.location.href="/Task";
    });
}
