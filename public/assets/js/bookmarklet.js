(function(window, document, version, callback) {
	var j, d;
	var loaded = false;
	if (!(j = window.jQuery) || version > j.fn.jquery || callback(j, loaded)) {
		var script = document.createElement("script");
		script.type = "text/javascript";
		script.src = "http://code.jquery.com/jquery-1.9.1.min.js";
		script.onload = script.onreadystatechange = function() {
			if (!loaded && (!(d = this.readyState) || d == "loaded" || d == "complete")) {
				callback((j = window.jQuery).noConflict(1), loaded = true);
				j(script).remove();
			}
		};
		document.body.appendChild(script);
	}
})(window, document, "1.9.1", function($, jquery_loaded) {
	
	pullin = {
		details: {
			description: $('meta[name="description"]').attr('content').replace(/(<.*?>)/ig,''),
			domain:      document.domain,
			name:        document.title.substring(0,50),
			url:         document.URL
		},

		exit: function() {
			$('.itemnation-box').fadeOut(500)
		},

		prefill: function() {
			$('.title').val(pullin.details.name)
			$('.description').val(pullin.details.description)
			$('.itemnation-box').fadeIn(500)
		},

		send: function() {
			$.ajax({
				url: 'http://localhost/',
				data: pullin.details,
				type: 'GET',
				timeout: 30000,
				dataType: 'text',
				complete: function(data) {
					pullin.exit()
				}
			})
		},

		init: function() {
			console.log('pullin.init()');

			$('.add').click(function() {
				pullin.send()
			});

			$('.cancel').click(function() {
				pullin.exit()
			});
			
			pullin.prefill();
			$('.itemnation-box').fadeIn(500);
		}
	};

	pullin.init();

	console.log('details', details);

});