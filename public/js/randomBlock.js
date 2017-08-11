
var randomNum = 0;
var randomJson = {0:{0:{"w":10,"h":1.8},1:{"w":10,"h":1.8},2:{"w":10,"h":1.8},3:{"w":10,"h":1.8},4:{"w":10,"h":1.8}},
				  1:{0:{"w":4,"h":4},1:{"w":6,"h":3},2:{"w":10,"h":2},3:{"w":5,"h":3},4:{"w":5,"h":2}},
				  2:{0:{"w":2,"h":2},1:{"w":8,"h":4},2:{"w":10,"h":2},3:{"w":7,"h":3},4:{"w":3,"h":2}},};
var openOrderBlock = false;

$(document).ready(function(){
	$.scrollTo(0);

	$('#doSomethingBlockMenuButton').sidr({
		side: 'right',
		timing: 'ease-in-out',
		onOpenEnd: function(){
			$("#backGatePage").css({
				width: "100vw",
				height: $("body").height()
			}).fadeIn();
		}
  	});

	var maxNum = 0;
	var minNum = 0;
	randomNum = Math.floor(Math.random() * (maxNum - minNum + 1)) + minNum;

	reBanner();
	reOrderBlock();
	$(window).resize(function(){
		reBanner();
		reOrderBlock();
	});

	$('#doSomethingBlockBannerBody').cycle({
	    fx:      'scrollRight',
	    next:    '#doSomethingBlockBannerBody',
	    speed:    1000,
	    timeout:  2000,
	    easing:  'easeInOutBack'
	});

	$("#backGatePage, #closeMenu").click(function(){
  		$("#backGatePage").fadeOut();
  		$("#doSomethingBlockMenuButton").click();
  	});

	$("#doSomethingBlockBannerDown").click(function(){
		$.scrollTo('#doSomethingBlockBody', 500);
	});

	$("#doSomethingBlockBannerUp").click(function(){
		$.scrollTo(0, 500);
	});

	$(window).scroll(function() {
		if($(this).scrollTop() >= $("#doSomethingBlockBanner").height()){
			if(!openOrderBlock){
				openOrderBlock = true;
				$(".BlockBodyBox").show();
				reOrderBlock();
			}
		}
	});

});

function reOrderBlock(){
	if(!openOrderBlock){
		$(".BlockBodyBox").hide();
		return;
	}
	var randomAnimatedArray = [	"swing","bounceIn","bounceInDown","bounceInLeft","bounceInRight","bounceInUp","fadeIn","fadeInDown",
							"fadeInDownBig","fadeInLeft","fadeInLeftBig","fadeInRight","fadeInRightBig","fadeInUp","fadeInUpBig",
							"flipInX","flipInY","lightSpeedIn","rotateIn","rotateInDownLeft","rotateInDownRight","rotateInUpLeft",
							"rotateInUpRight","jackInTheBox","rollIn","zoomIn","zoomInDown","zoomInLeft","zoomInRight",
							"zoomInUp","slideInDown","slideInLeft","slideInRight","slideInUp",
							"bounce","flash","pulse","rubberBand","shake","headShake","swing","tada","wobble","jello"];

	for(var row in randomJson[randomNum]){
		$("#doSomethingBlockBodyBox_" + row).css({
			width: randomJson[randomNum][row]["w"] * 10 + "vw",
			height: randomJson[randomNum][row]["h"] * 10 + "vh",
		});
		$("#doSomethingBlockBodyBox_" + row).css({
			width:  $("#doSomethingBlockBodyBox_" + row).width() - 	50,
			height: $("#doSomethingBlockBodyBox_" + row).height() - 50,
		});

		$("#doSomethingBlockBodyBoxImg_" + row).css({
			"margin-top":  0 - $("#doSomethingBlockBodyBoxImg_" + row).height() / 2,
			"margin-left": 0 - ($("#doSomethingBlockBodyBoxImg_" + row).width() / 2)
		});

		var randomAnimated = Math.floor(Math.random() * (randomAnimatedArray.length - 0 + 1)) + 0;
		$("#doSomethingBlockBodyBox_" + row).addClass("animated " + randomAnimatedArray[randomAnimated]);
	}
}

function reBanner(){
	$("#doSomethingBlockBannerBody").css("margin-bottom", $("#doSomethingBlockBannerBody").css("margin-bottom") - 50 + "px");
	$("#doSomethingBlockBannerBody img").height("100%").width("100%");

	var SorF = "S";
	if($("body").width() > 900){
		SorF = "F";
	}
	for(var x=1; x<=3; x++){
		$("#banner_" + x).prop("src", "./images/" + SorF + "banner_" + x + ".jpg");
	}
}

