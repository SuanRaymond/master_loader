$(document).ready(function(){
	$('.popular-search').slick({
	arrows: false,
	slidesToShow: 4,
	slidesToScroll: 4
	});

	$('.popular-items').slick({
	arrows: false,
	slidesToShow: 4,
	slidesToScroll: 4
	});

	$('#simple-menu').sidr();
	$('#sidrclose').sidr('close','simple-menu');
});