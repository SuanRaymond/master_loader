$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#reverification_Submit").click(function(){
        RaySys.AJAX.Send({ShopID: 101}, '/ajax/VerificationReSend', 'SuFun', 'ErFun');
    });
});

function SuFun(_obj){
    $("#ChDate").html(_obj.ResultJSON.reDate);
    console.log(_obj.ResultJSON.reDate);
}
function ErFun(_obj){
    if(_obj.ResultJSON.error == 520){
        swal("失敗", "重新發送驗證碼時間未到", "error");
    }
    console.log(_obj);
}