var MouseX = 0, MouseY = 0;

$(document).ready(function(){
	$("#shopCarBall").hide();
	$('#Banner').slick();
    $("#ShopCarAdd").click(function(e){
        RaySys.AJAX.Send({ShopID: $('#ShopID').val()}, '/ajax/ShopCarAdd', 'SuFun', 'ErFun');
		MouseX = e.pageX + document.documentElement.scrollTop - 50;
		MouseY = e.pageY + document.documentElement.scrollLeft - 50;

		$("#shopCarBall").css({
			top: MouseY,
			left: MouseX,
		});
    });
});

function SuFun(_obj){
	$("#shopCarBall").show();
	$("#shopCarBall").animate({
		top: MouseY - 200,
		left: MouseX - 20
	}, 50, function(){
		curr(10);
	});
}
function ErFun(_obj){
    // console.log(_obj);
    swal("失败", "", "error");
}

function curr(_deg){
	var x = "", y = "";
	if(_deg <= 90){
		x = "+=10px";
		y = "-=10px";
	}
	else if(_deg > 90){
		x = "+=10px";
		y = "+=10px";
	}

	$("#shopCarBall").css("transform", "rotate(" + _deg + "deg)").animate({
		top: y,
		left: x
	}, 1, function(){
		if(_deg <= 190){
			curr(_deg + 10);
		}
		else{
			$("#shopCarBall").animate({
				top: "100vh",
				left: "-=50px"
			}, 100, function(){
				$("#shopCarBall").hide();
				swal("已加入购物车", "", "success");
			});
		}
	});
}






