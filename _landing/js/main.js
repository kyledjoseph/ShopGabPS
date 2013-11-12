function resizeBackground () {
	var size = {
		window: {
			width: $(window).width(),
			height: $(window).height()
		},
		header: {
			width: $('.header').width(),
			height: $('.header').height()
		},
		foreground: {
			width: $('.foreground').width(),
			height: $('.foreground').height(),
			scale: 1.76
		},
		product: {
			width: $('.product .box').first().width()
		}
	};

	// Background should stretch to entire window height
	$('.background').css('height', size.window.height);

	// Foreground should stretch to either half height or 120% width, whichever is larger.
	var newHeight = Math.min(size.window.height*0.5, size.window.width * 1.2 / size.foreground.scale);
	console.log(newHeight);
	$('.foreground').css('height', newHeight);
	$('.product .box').height(size.product.width);
}

$(document).ready(function () {
	resizeBackground();
});

$(window).resize(function() {
	resizeBackground();
});