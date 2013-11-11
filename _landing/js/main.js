function resizeBackground () {
	var newHeight = $(window).height();
	var headerHeight = $('.header').height();
	$('.background').css('height', newHeight);
	$('.foreground').css('height', newHeight*2/3);

	var productWidth = $('.product .box').first().width();
	$('.product .box').height(productWidth);
}

$(document).ready(function () {
	resizeBackground();
});

$(window).resize(function() {
  resizeBackground();
});