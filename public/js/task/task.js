$(document).ready(function(){
    $("#Buy1").click(function(){
        // swal("簽到失败1", "", "error");
        doublecheck(1);
    });
    $("#Buy2").click(function(){
        // swal("簽到失败2", "", "error");
        doublecheck(2);
    });
    $("#Buy3").click(function(){
        // swal("簽到失败3", "", "error");
        doublecheck(3);
    });
    $("#Buy4").click(function(){
        // swal("簽到失败4", "", "error");
        doublecheck(4);
    });
});
function doublecheck(Type){
    swal({
        title: "提醒！",
        text: "買了無法退換貨",
        type:"info",
        closeOnConfirm: false,
        showCancelButton: true,
        showLoaderOnConfirm: true,
    },
    function(){
        setTimeout(function(){
            swal({
                title: "是否確認購買？",
                text: "買了會扣積分",
                type:"warning",
                closeOnConfirm: false,
                showCancelButton: true,
                showLoaderOnConfirm: true,
            },
            function(){
                if(parseInt($("#points").val())<=parseInt($("#points"+Type).val())){
                    swal.showInputError("點數不足無法購買");
                    return false
                }else{
                    RaySys.AJAX.Send({TypeID: Type}, '/ajax/Rebate', 'SuFun', 'ErFun');
                }
            });
        },1000)
    });
}
function SuFun(_obj){
    // console.log(_obj);
    swal({
        title: "購買成功",
        text: "",
        type:"success",
        closeOnConfirm: false,
    },
    function(){
        document.location.href="/Task";
    });
}
function ErFun(_obj){
    // console.log(_obj);
    swal("購買失敗", "", "error");
}