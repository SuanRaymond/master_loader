$(document).ready(function(){
	$('#Banner').slick();
    $("#ShopCarAdd").click(function(){
        RaySys.AJAX.Send({ShopID: $('#ShopID').val()}, '/ajax/ShopCarAdd', 'SuFun', 'ErFun');
    });
});
function SuFun(_obj){
    // console.log(_obj);
    swal("已加入購物車", "", "success");
}
function ErFun(_obj){
    // console.log(_obj);
    swal("失敗", "", "error");
}