$(document).ready(function(){
    $("#sign").click(function(){
        RaySys.AJAX.Send({memberID: 0}, '/ajax/SignSend', 'SuFun', 'ErFun');
    });
});
function SuFun(_obj){
    // console.log(_obj);
    swal({
        title: "簽到完畢",
        text: "連續簽到天數：＋１",
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
    swal("簽到失败", "", "error");
}