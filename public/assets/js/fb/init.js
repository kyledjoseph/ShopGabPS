
	$(document).ready(function() {
		
		$.ajaxSetup({ cache: true });
		$.getScript('//connect.facebook.net/en_UK/all.js', function(){
		
			console.log('fb init');
			
			FB.init({
				appId: '168874813262398',                            // App ID from the app dashboard
				channelUrl: '//' + shopgab.domain + '/channel.html', // Channel file for x-domain comms
				status     : true,                                   // Check Facebook Login status
				xfbml      : true                                    // Look for social plugins on the page
			});


			FB.getLoginStatus(function(response) {
				if (response.status === 'connected') {
					// the user is logged in and has authenticated your
					// app, and response.authResponse supplies
					// the user's ID, a valid access token, a signed
					// request, and the time the access token 
					// and signed request each expire
					var uid = response.authResponse.userID;
					var accessToken = response.authResponse.accessToken;
					console.log('user is logged in');
				} else if (response.status === 'not_authorized') {
					// the user is logged in to Facebook, 
					// but has not authenticated your app
					console.log('user is logged in, but not authenticated');
				} else {
					// the user isn't logged in to Facebook.
					console.log('user is not logged in');
				}
			});

			// FB.ui({method: 'apprequests',
			// 	message: 'My Great Request'
			// }, function() {});


		});
	});