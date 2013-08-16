

	window.fbAsyncInit = function() {
		
		// init the FB JS SDK
		FB.init({
			appId      : '168874813262398',                        // App ID from the app dashboard
			channelUrl : '//' + shopgab.domain + '/channel.html',  // Channel file for x-domain comms
			status     : true,                                     // Check Facebook Login status
			xfbml      : true                                      // Look for social plugins on the page
		});

		// Additional initialization code such as adding Event Listeners goes here
		$(document).ready(function() {
			console.log('fb init');
			
			FB.ui({method: 'apprequests',
				message: 'My Great Request'
			}, function() {});

		});

	};

	// Load the SDK asynchronously
	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));