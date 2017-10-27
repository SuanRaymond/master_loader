var clipboard;
$(document).ready(function(){
	$.scrollTo(0);

	$("#backGatePage, #closeMenu, .MenuWaitingBtn").click(function(){
  		$("#backGatePage").fadeOut();
  		$("#doSomethingBlockMenuButton").click();
  	});

	$('#doSomethingBlockMenuButton').sidr({
		side: 'right',
		timing: 'ease-in-out',
		onOpenEnd: function(){
			$("#backGatePage").css({
				width: "100vw",
				height: "100vh"
			}).fadeIn();
		}
  	});

  	$("#qrcode").qrcode({
		width:  100,
		height: 100,
		text: QRCodeStr
	});

	clipboard = new Clipboard('#SharCopyBtn');
	clipboard.on('success', function(e){
	    alert(lanPack.copySuccess);
	});
	clipboard.on('error', function(e){
	    alert(lanPack.copyError);
	});


  	$(window).resize(function(){
		reSize();
	});

  	reSize();

  	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function reSize(){
	var MenuButtonHeight 	= 25;
	var LoginButtonFontSize = $("#doSomethingBlockLoginButton").css("font-size");
	var MenuButtonFontSize  = $("#doSomethingBlockMenuButton").css("font-size");

	$("#doSomethingBlock header img").css("margin-top",
		($("#doSomethingBlock header").height() - $("#doSomethingBlock header img").height()) / 2
	);

	if($("body").width() < 600){
		MenuButtonHeight = 25;
		$("#doSomethingBlock header a i").removeClass("fa-2x").removeClass("fa-3x").removeClass("fa-4x").addClass("fa-2x");
	}
	else if($("body").width() > 600 && $("body").width() <= 1000){
		MenuButtonHeight = 30;
		$("#doSomethingBlock header a i").removeClass("fa-2x").removeClass("fa-3x").removeClass("fa-4x").addClass("fa-3x");
	}
	else if($("body").width() > 1000){
		MenuButtonHeight = 40;
		$("#doSomethingBlock header a i").removeClass("fa-2x").removeClass("fa-3x").removeClass("fa-4x").addClass("fa-4x");
	}

	$("#doSomethingBlockMenuButton").css("margin-top",
		($("#doSomethingBlock header").height() / 2) - MenuButtonHeight
	);
	$("#doSomethingBlockLoginButton").css("margin-top",
		($("#doSomethingBlock header").height() / 2) - MenuButtonHeight
	);


  	$("#doSomethingBlock header div h1").css("font-size", $("#doSomethingBlock header div").height() * 0.5);
  	$("#doSomethingBlock header div h1").css("margin-top",
		($("#doSomethingBlock header").height() - $("#doSomethingBlock header div h1").height()) / 2
	);
}


