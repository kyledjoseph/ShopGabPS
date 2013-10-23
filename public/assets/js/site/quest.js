
	/**
	 * Shopgab Quest
	 */
	shopgab.quest = {

		/**
		 *
		 */
		url: function()
		{
			return $("#quest").attr('data-quest-url');
		},

		/**
		 *
		 */
		_init_interface: function()
		{
			shopgab.log('shopgab.quest._init_interface');

			shopgab.quest.purchase_within.init();
			//shopgab.quest.access.init();
			shopgab.quest.chat.init();

			
		},

		/**
		 *
		 */
		init: function()
		{
			shopgab.log('shopgab.quest.init');

			this._init_interface();
			shopgab.quest.facebook.init();
		}

	};



	/**
	 * Quest Facebook Actions
	 */
	 shopgab.quest.facebook = {

		init: function()
		{
			shopgab.log('shopgab.quest.facebook.init');

			$('#fb_invite').click(function() {

				FB.ui({
					method: 'send',
					link: $(this).attr('data-link'),
					}, function(response) {
					console.log('invites sent', friends, response);
				});

				return false;
			});


			$('#fb_share').click(function() {
				FB.ui({
					method: 'feed',
					link: $(this).attr('data-link'),
					picture: $(this).attr('data-picture'), //'http://fbrell.com/f8.jpg',
					name: $(this).attr('data-name'),
					caption: $(this).attr('data-caption'),
					description: $(this).attr('data-description')
				}, function(response) {})

				return false;
			});
		}
	};



	/**
	 *	
	 */
	shopgab.quest.purchase_within = {

		/**
		 *
		 */
		update: function()
		{
			shopgab.log('shopgab.quest.purchase_within.update');

			this.disable();
			this.text('');

			$.ajax({
				url: shopgab.quest.purchase_within.update_url(),
				type: 'POST',
				dataType: 'json',
				data: {
					purchase_within: shopgab.quest.purchase_within.value()
				},
				success: function(response) {
					if (response.success)
					{
						shopgab.quest.purchase_within.enable();
						shopgab.quest.purchase_within.text(response.text);
					}
				},
				error: function() {
					shopgab.log('ajax_error');
				}
			});
		},

		/**
		 *
		 */
		update_url: function()
		{
			return shopgab.url('quest/' + shopgab.quest.url() + '/within');
		},

		/**
		 *
		 */
		text: function(text)
		{
			return this.html.text.html(text);
		},

		/**
		 *
		 */
		value: function()
		{
			return this.html.select.val();
		},

		/**
		 *
		 */
		disable: function()
		{
			return this.html.form.prop('disabled', true);
		},

		/**
		 *
		 */
		enable: function()
		{
			return this.html.form.prop('disabled', false);
		},

		html: {
			form:   null,
			select: null,
			text:   null
		},

		/**
		 *
		 */
		_init_html: function()
		{
			this.html.form   = $("#purchase_within_form");
			this.html.select = $("#purchase_within_value");
			this.html.text   = $("#purchase_within_text");
		},

		/**
		 *
		 */
		_init_events: function()
		{
			this.html.form.change(function() {
				shopgab.quest.purchase_within.update();
			});
		},

		/**
		 *
		 */
		init: function()
		{
			shopgab.log('shopgab.quest.purchase_within.init');

			this._init_html();
			this._init_events();
		}

	};




	/**
	 *
	 */
	shopgab.quest.access = {

		/**
		 *
		 */
		update: function(access_type)
		{
			//shopgab.log('shopgab.quest.access.update', this.value());

			// 	this.disable();

			// 	$.ajax({
			// 		url: shopgab.quest.access.update_url(),
			// 		type: 'POST',
			// 		dataType: 'json',
			// 		success: function(response) {
			// 			if (response.success)
			// 			{
			// 				shopgab.quest.access.enable();
			// 			}
			// 		},
			// 		error: function() {
			// 			shopgab.log('ajax_error');
			// 		}
			// 	});
		},

		/**
		 *
		 */
		update_url: function()
		{
			return shopgab.url('quest/' + shopgab.quest.url() + '/acess/' + this.value());
		},

		/**
		 *
		 */
		value: function()
		{
			return $('input[name=access]:checked').val();
		},

		/**
		 *
		 */
		disable: function()
		{
			//return this.html.form.prop('disabled', true);
		},

		/**
		 *
		 */
		enable: function()
		{
			//return this.html.form.prop('disabled', false);
		},

		html: {
			access_public:  null,
			access_private: null
		},

		/**
		 *
		 */
		_init_html: function()
		{
			this.html.set_access_public  = $("#set_access_public");
			this.html.set_access_private = $("#set_access_private");
		},

		/**
		 *
		 */
		_init_events: function()
		{
			$("#quest_access").change(function() {
				return shopgab.quest.access.update() || false;
			});
		},

		/**
		 *
		 */
		init: function()
		{
			shopgab.log('shopgab.quest.access.init');

			this._init_html();
			this._init_events();
		}

	};







	/**
	 *
	 */
	shopgab.quest.chat = {

		/**
		 *
		 */
		update: function()
		{
			shopgab.log('shopgab.quest.chat.update');
			
			$.ajax({
				url: shopgab.url('quest/' + shopgab.quest.url() + '/message'),
				type: 'POST',
				dataType: 'json',
				data: {
					message: shopgab.quest.chat.html.text
				},
				success: function(response) {
					if (response.success)
					{
						shopgab.quest.chat.append_message(response.display_name, response.body);
					}
				},
				error: function() {
					shopgab.log('ajax_error');
				}
			});
		},

		/**
		 *
		 */
		append_message: function(display_name, body)
		{
			//
		},

		/**
		 *
		 */
		update_url: function()
		{
			// return shopgab.url('quest/' + shopgab.quest.url() + '/within');
		},

		/**
		 *
		 */
		disable: function()
		{
			// return this.html.form.prop('disabled', true);
		},

		/**
		 *
		 */
		enable: function()
		{
			// return this.html.form.prop('disabled', false);
		},

		html: {
			form: null,
			text: null,
		},

		/**
		 *
		 */
		_init_html: function()
		{
			this.html.form = $("#quest_message_form");
			this.html.text = $("#quest_message_text");
		},

		/**
		 *
		 */
		_init_events: function()
		{
			this.html.form.submit(function() {
				return shopgab.quest.chat.update() || false;
			});
		},

		/**
		 *
		 */
		init: function()
		{
			shopgab.log('shopgab.quest.chat.init');

			this._init_html();
			this._init_events();
		}

	};





























	$(document).ready(function() {

		shopgab.quest.init();

	});





$(function(){

	// change purchase_within time
	// $(".submit-on-change").bind("change", function() {
	// 	$(this).submit();
	// });

	// 
	$('#open_url').click(function(){
		var url = $('#open_url_location').val();

		if (!/^(f|ht)tps?:\/\//i.test(url))
		{
			url = "http://" + url;
		}

		window.open(url);
		$('#open_url_location').val('');
		return false;
	});

	// product comments
	$('.comments').click(function(){
		event.preventDefault();
		var comment = $(this).parent().parent().data('product');
		$('.quest-item[data-product='+comment+'] .comment').toggle(100);
	});

	$('.quest-product-image-div').css('height', $('.quest-product-image-div').width());

	$( window ).resize(function() {
		$('.quest-product-image-div').css('height', $('.quest-product-image-div').width());
	});
	

	// init tooltip for product votes
	// docs: http://code.drewwilson.com/entry/tiptip-jquery-plugin
	// 
	$(".user_product_vote").tipTip({
		maxWidth: "auto", 
		edgeOffset: 0,
		defaultPosition: 'right'
	});



	// $(".invite-btn").click(function() {

	// 	facebook.add_callback(function() {

	// 		FB.api({ method: 'fql.query', query: 'SELECT uid,name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me()) ORDER BY name'}, 
	// 			function(response) {

	// 				$('#facebook-friends').empty();

	// 				$.each(response, function(index, friend) {

	// 					if (friend.name == 'Christian Bundy' || friend.name == 'Kyle Joseph' || friend.name == 'Tyler Matthews' || friend.name == 'Dinko Kecanovic')
	// 					{
	// 						c = '<label>';
	// 						c+= '	<div class="inline-block">';
	// 						c+= '		<input class="select_fb_friend inline-block auto-width" name="fb_friends[]" value="'+friend.uid+'" type="checkbox" />';
	// 						c+= '	</div>';
	// 						c+= '	<div class="inline-block">';
	// 						c+= '		<img style="width:32px;height:32px" src="https://graph.facebook.com/'+friend.uid+'/picture?width=32&height=32">';
	// 						c+= '		'+ friend.name;
	// 						c+= '	</div>';
	// 						c+= '</label>';
	// 						c+= '<br>';

	// 						$('#facebook-friends').append(c);
	// 					}


	// 				});
	// 			}
	// 		);
	// 	});

	// });



	// function selected_friends()
	// {
	// 	friends = [];

	// 	$( ".select_fb_friend:checked" ).each(function(index) {
	// 		friends.push($(this).val());
	// 	});

	// 	return friends;
	// }




	

	

	// message submit on enter
	// $('textarea[name=message]').keydown(function(e) {
	// 	if (e.keyCode == 13)
	// 	{
	// 		$(this).parent().submit();
	// 		return false;
	// 	}
	// });


	// init product description read more
	// 
	// 
	// $('.chat-product-description').expander({

	// 	// the number of characters at which the contents will be sliced into two parts.
	// 	slicePoint: 82,

	// 	// whether to keep the last word of the summary whole (true) or let it slice in the middle of a word (false)
	// 	preserveWords: true,

	// 	// a threshold of sorts for whether to initially hide/collapse part of the element's contents.
	// 	// If after slicing the contents in two there are fewer words in the second part than
	// 	// the value set by widow, we won't bother hiding/collapsing anything.
	// 	widow: 4,

	// 	// text displayed in a link instead of the hidden part of the element.
	// 	// clicking this will expand/show the hidden/collapsed text
	// 	expandText: 'Learn more',
	// 	expandPrefix: '&hellip; ',

	// 	// class names for summary element and detail element
	// 	summaryClass: 'summary',
	// 	detailClass: 'details',

	// 	// one or more space-separated class names for <span> around
	// 	// "read-more" link and "read-less" link
	// 	moreClass: 'read-more',
	// 	lessClass: 'read-less',

	// 	// number of milliseconds after text has been expanded at which to collapse the text again.
	// 	// when 0, no auto-collapsing
	// 	collapseTimer: 0,

	// 	// effects for expanding and collapsing
	// 	expandEffect: 'fadeIn',
	// 	expandSpeed: 250,
	// 	collapseEffect: 'fadeOut',
	// 	collapseSpeed: 200,

	// 	// allow the user to re-collapse the expanded text.
	// 	userCollapse: false,

	// 	// text to use for the link to re-collapse the text
	// 	userCollapseText: 'read less',
	// 	userCollapsePrefix: ' ',

	// 	// all callback functions have the this keyword mapped to the element in the jQuery set when .expander() is called
	// 	onSlice: null, // function() {},
	// 	beforeExpand: null, // function() {},
	// 	afterExpand: null, // function() {},
	// 	onCollapse: null, // function(byUser) {},
	// 	afterCollapse: null // function() {}
	// });


});