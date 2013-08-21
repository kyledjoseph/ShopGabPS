

	var facebook = {

		status: 'unknown',
		callbacks: [],

		add_callback: function(callback)
		{
			if (this.status !== 'connected')
			{
				this.callbacks.push(callback);
			}
			else
			{
				facebook.run_callback(callback);
			}
		},

		run_registered_callbacks: function()
		{
			$.each(this.callbacks, function(index, value) {
				facebook.run_callback(value);
			});
		},

		run_callback: function(callback)
		{
			callback();
		},


		update_status: function(response)
		{

			console.log('facebook.update_status', response);

			facebook.status = response.status;



			if (response.status === 'connected')
			{
				var uid         = response.authResponse.userID;
				var accessToken = response.authResponse.accessToken;

				facebook.run_registered_callbacks();

			}

			else if (response.status === 'not_authorized')
			{
				console.log('user is logged in, but not authenticated to app');
			}

			else
			{
				console.log('user is not logged in');
			}
		},


	


		init: function()
		{
			
			
			$.ajaxSetup({
				cache: true
			});

			$.getScript('//connect.facebook.net/en_US/all.js', function() {
			
				console.log('fb init');
				
				// init fb app
				FB.init({
					appId:      '168874813262398',                       // App ID from the app dashboard
					channelUrl: '//' + shopgab.domain + '/channel.html', // Channel file for x-domain comms
					status:     true,                                    // Check Facebook Login status
					xfbml:       true                                    // Look for social plugins on the page
				});

				// check user status
				//FB.getLoginStatus(facebook.update_status);
				FB.Event.subscribe('auth.statusChange', facebook.update_status);

			});


			
		}

	};



	$(document).ready(function() {

		facebook.init();


		


		function callback(response)
		{
			console.log('callback', response);
		}



		

	});