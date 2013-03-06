$(function() {

	/****
	* User Menu
	***/

	$("#user").click(function(){
		var disp=$(".user-menu").css("display");
		if(disp=="none"){$(".user-menu").show(); 
		$(this).addClass("current");}
		else{$(".user-menu").hide(); 
		$(this).removeClass("current");}
	});

	$('#main').click(function() {
		$('#user').removeClass('current');
		$('.user-menu').hide();
	});

	/****
	* Wishlist accordion
	***/

	$('#wish-cat').accordion();


	/****
	* Products modal
	***/

	$('#products .item-i').click(function () {
		$('#overlay, .dialog.product').show();
	});

	$('#overlay, .close').click(function () {
		$('#overlay, .dialog').hide();
	});


	$('#modal-tabs, #terms-tabs').tabs();
    
    
	/****
	* Filter in footer
	***/

    $('#filters').click(function () {
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