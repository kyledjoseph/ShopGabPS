$(function(){
	
	// init comments
	//
	//
	$(".show-comments").click(function() {

		if ($(this).attr('data-total') > 0)
		{
			$(this).parent().find(".comment-display").show();
		}

		return false;
	});


	// init tooltip
	// docs: http://code.drewwilson.com/entry/tiptip-jquery-plugin
	// 
	$(".user_vote_list").tipTip({
		maxWidth: "auto", 
		edgeOffset: 0,
		defaultPosition: 'right'
	});



	// init product description read more
	// 
	// 
	$('.chat-product-description').expander({

		// the number of characters at which the contents will be sliced into two parts.
		slicePoint: 90,

		// whether to keep the last word of the summary whole (true) or let it slice in the middle of a word (false)
		preserveWords: true,

		// a threshold of sorts for whether to initially hide/collapse part of the element's contents.
		// If after slicing the contents in two there are fewer words in the second part than
		// the value set by widow, we won't bother hiding/collapsing anything.
		widow: 4,

		// text displayed in a link instead of the hidden part of the element.
		// clicking this will expand/show the hidden/collapsed text
		expandText: 'Learn more',
		expandPrefix: '&hellip; ',

		// class names for summary element and detail element
		summaryClass: 'summary',
		detailClass: 'details',

		// one or more space-separated class names for <span> around
		// "read-more" link and "read-less" link
		moreClass: 'read-more',
		lessClass: 'read-less',

		// number of milliseconds after text has been expanded at which to collapse the text again.
		// when 0, no auto-collapsing
		collapseTimer: 0,

		// effects for expanding and collapsing
		expandEffect: 'fadeIn',
		expandSpeed: 250,
		collapseEffect: 'fadeOut',
		collapseSpeed: 200,

		// allow the user to re-collapse the expanded text.
		userCollapse: false,

		// text to use for the link to re-collapse the text
		userCollapseText: 'read less',
		userCollapsePrefix: ' ',

		// all callback functions have the this keyword mapped to the element in the jQuery set when .expander() is called
		onSlice: null, // function() {},
		beforeExpand: null, // function() {},
		afterExpand: null, // function() {},
		onCollapse: null, // function(byUser) {},
		afterCollapse: null // function() {}
	});


});