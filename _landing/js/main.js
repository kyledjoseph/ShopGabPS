function resizeBackground () {
	var newHeight = $(window).height();
	$('.background').css('height', newHeight);

	var productWidth = $('.product .box').first().width();
	$('.product .box').height(productWidth);
}

$(document).ready(function () {
	resizeBackground();
});

$(window).resize(function() {
  resizeBackground();
});