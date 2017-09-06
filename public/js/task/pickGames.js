$(document).ready(function(){
    $("#Pick1").click(function(){
        doublecheck(1);
    });
    $("#Pick2").click(function(){
        doublecheck(2);
    });
});
function doublecheck(Type){
    swal({
        title: "注意",
        text: "選擇後即使退出結果一樣會送出",
        type:"info",
        closeOnConfirm: false,
        showCancelButton: true,
        showLoaderOnConfirm: true,
    },
    function(){
        if(Type==1){
            setTimeout(function(){
                swal({
                    title: "富貴刮刮樂",
                    text: "8個數字3個相同即得該獎項",
                    type:"warning",
                    closeOnConfirm: false,
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                },
                function(){

                });
            },1000)
        }else if(Type==2){
            setTimeout(function(){
                swal({
                    title: "敲金蛋",
                    text: "錘子與金蛋數字相同即得該獎項",
                    type:"warning",
                    closeOnConfirm: false,
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                },
                function(){

                });
            },1000)
        }
    });
}