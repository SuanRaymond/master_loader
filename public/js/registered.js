$(document).ready(function(){
    var verifyCode = new GVerify("v_container");
    $("#Registered_Submit").click(function(){
        var res = verifyCode.validate($("#code_input").val());
        if(res){
            swal({
                title: "注意",
                text: "<span class='fontred'>若無輸入推薦碼以後則無法再次推薦<br />，是否確認註冊？</span>",
                type: "info",
                confirmButtonText: "確認",
                cancelButtonText: "取消",
                html: true,
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
            function(){
                $("#Registered_Form").submit();
                // setTimeout(function(){
                //     swal("註冊完成");
                // }, 1000);
            });
        }else{
            swal("驗證碼輸入錯誤", "", "error");
        }
    });
});