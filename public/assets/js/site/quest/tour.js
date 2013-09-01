if ($.cookie('old_user') == false) {
	$('.quest-add-product').popover('show')
	$('#fb_share').popover('show')
	
	$.cookie('old_user', 'true')
}