$(document).ready(function(){
	$(".popular-search").slick({
		arrows: false,
		infinite: true,
		speed: 300,
		slidesToShow: 2,
		centerMode: true,
		variableWidth: true
	});

	$('#Banner').cycle({
		fx: 'scrollRight',
		next: '#right',
		delay: -5000,
		easing: 'easeInOutBack'
	});
});