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
    },
    function(){
        document.location.href="/Task";
    });
}
function ErFun(_obj){
    // console.log(_obj);
    swal("签到失败", "", "error");
}
