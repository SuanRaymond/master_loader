$(document).ready(function(){
    $(".daleteShop").click(function(){
        $ShopTitle = $("#"+$(this).prop("id")+" span").html();
        $ShopID = $(this).prop("id").replace("Shop","");
        swal({
            title: "是否刪除？",
            text: $ShopTitle,
            type:"info",
            closeOnConfirm: false,
            showCancelButton: true,
            showLoaderOnConfirm: true,
            html:true,
        },
        function(){
            document.location.href="/ClearBuy?ShopID="+ $ShopID;
        });
    });
});