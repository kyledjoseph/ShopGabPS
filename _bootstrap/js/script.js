$('[data-typer-targets]').typer();

$('.comments').click(function(){
	var comment = $(this).parent().parent().data('product');
	$('.product-block[data-product='+comment+'] .comment').toggle(100);
});