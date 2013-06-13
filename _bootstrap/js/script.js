$('[data-typer-targets]').typer();

$('.comments').click(function(){
	event.preventDefault();
	var comment = $(this).parent().parent().parent().data('product');
	$('.product-block[data-product='+comment+'] .comment').toggle(100);
});

$('.delete-quest-link').popover({ html : true });