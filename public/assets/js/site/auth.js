
/**
 * User login and registration
 */
var Auth = {

	login: function()
	{
		$(".modal_error").text('');

		$.ajax({
			url: '/login',
			type: 'POST',
			dataType: 'json',
			data: {
				email:    $("#loginModal input[name='email']").val(),
				password: $("#loginModal input[name='password']").val(),
				redirect: $("#loginModal input[name='redirect']").val()
			},
			success: function(response) {
				if (! response.success)
				{
					$(response.field).text(response.message);
				}
				else
				{
					window.location.href = (response.redirect ? '/' + response.redirect : '/');
				}
			}
		});

		console.log('Auth.login');
	},

	register: function()
	{
		$(".modal_error").text('');

		$.ajax({
			url: '/register',
			type: 'POST',
			dataType: 'json',
			data: {
				name:             $("#registerModal input[name='name']").val(),
				email:            $("#registerModal input[name='email']").val(),
				password:         $("#registerModal input[name='password']").val(),
				confirm_password: $("#registerModal input[name='confirm_password']").val(),
				redirect:         $("#registerModal input[name='redirect']").val()
			},
			success: function(response) {
				if (! response.success)
				{
					$(response.field).text(response.message);
				}
				else
				{
					window.location.href = (response.redirect ? '/' + response.redirect : '/');
				}
			}
		});

		console.log('Auth.register');
	},

	
	init: function()
	{
		$("button[id='user_login']").click(function() {
			Auth.login();
			return false;
		});

		$("button[id='user_register']").click(function() {
			Auth.register();
			return false;
		});

		console.log('Auth.init');
	}

};


$(function(){

	Auth.init();

});