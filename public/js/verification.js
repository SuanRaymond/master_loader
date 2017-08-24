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
    console.log(_obj);
}