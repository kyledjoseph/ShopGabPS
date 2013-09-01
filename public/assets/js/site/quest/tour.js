if ($.cookie('old_user') == false) {
	$('.quest-add-product').popover('show')
	$('#fb_share').popover('show')

	$('.quest-add-product').click(function() {
		$.cookie('old_user', 'true')
	});
}