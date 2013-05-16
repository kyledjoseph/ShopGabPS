$(function() {

	/****
	* User Menu
	***/


$('.user-control').click(function(){
    var disp=$('.user-menu').css('display');
	if(disp=="none"){
		$(".user-menu").show(); 
	}
	else{$(".user-menu").hide(); 
	}
   	return false;
});

	var dontclose = 0;

	$('body').click(function() {
		$('.user-menu').hide();
	});

	/****
	* Wishlist accordion
	***/

	$('#wish-cat').accordion();


	/****
	* Products modal
	***/

	$('.feedback_clickable').click(function() {
		dontclose = 1;
		$('.feedback_modal.dialog, #overlay').fadeIn(300);
	});

	$('#products .item-i').click(function() {
		$('#overlay, .dialog.product').fadeIn(300);
	});

	$('#overlay, .close').click(function() {
		$('#overlay, .dialog, .view-comment').fadeOut(300);
	});


	$('#modal-tabs, #terms-tabs').tabs();

	$('.addnew-go').click(function() {
		$('#overlay, #addnew-product').fadeIn(300);
	});

	$('#addnew-product button').click(function() {
		$('#overlay, .dialog').fadeOut(300);
	});

	$('.friends-go').click(function() {
		$('#overlay, #invite-friends.dialog').fadeIn(300);
	});

 	// $('.comments span').click(function () {
	// 	$('#overlay').show();
	// 	$(this).parent('.comments').append('<div class="view-comment">comments go here</div>');
	// });   
    
	/****
	* Filter in footer
	***/

    $('#filters').click(function() {
    	$(this).parent('.inner').toggleClass("open");
    });

	$( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 500,
		values: [ 75, 300 ],
		slide: function( event, ui ) {
	    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
	  }
	});
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + 
    	" - $" + $( "#slider-range" ).slider( "values", 1 ) );


 });
