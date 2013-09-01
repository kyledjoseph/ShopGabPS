if (!old_user) {
	$('.tour-quest-btn').popover('show')
	$('.tour-friends-tab').popover('show')
	$.cookie('old_user', 'true')
}