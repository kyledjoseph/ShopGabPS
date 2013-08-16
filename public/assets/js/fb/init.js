
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

			FB.ui({method: 'apprequests',
				message: 'My Great Request'
			}, function() {});

			//$('#loginbutton,#feedbutton').removeAttr('disabled');
			//FB.getLoginStatus(updateStatusCallback);


		});
	});