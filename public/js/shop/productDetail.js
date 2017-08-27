$(document).ready(function(){
    $("#ShopCart").click(function(){
        RaySys.SL.Session.Set("name","999");
        swal("已加入购物车", "", "success");
    });
});
