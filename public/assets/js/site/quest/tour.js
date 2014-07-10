/*!
 * jQuery Cookie Plugin v1.3.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as anonymous module.
        define(['jquery'], factory);
    } else {
        // Browser globals.
        factory(jQuery);
    }
}(function ($) {

    var pluses = /\+/g;

    function decode(s) {
        if (config.raw) {
            return s;
        }
        return decodeURIComponent(s.replace(pluses, ' '));
    }

    function decodeAndParse(s) {
        if (s.indexOf('"') === 0) {
            // This is a quoted cookie as according to RFC2068, unescape...
            s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
        }

        s = decode(s);

        try {
            return config.json ? JSON.parse(s) : s;
        } catch(e) {}
    }

    var config = $.cookie = function (key, value, options) {

        // Write
        if (value !== undefined) {
            options = $.extend({}, config.defaults, options);

            if (typeof options.expires === 'number') {
                var days = options.expires, t = options.expires = new Date();
                t.setDate(t.getDate() + days);
            }

            value = config.json ? JSON.stringify(value) : String(value);

            return (document.cookie = [
                config.raw ? key : encodeURIComponent(key),
                '=',
                config.raw ? value : encodeURIComponent(value),
                options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
                options.path    ? '; path=' + options.path : '',
                options.domain  ? '; domain=' + options.domain : '',
                options.secure  ? '; secure' : ''
            ].join(''));
        }

        // Read
        var cookies = document.cookie.split('; ');
        var result = key ? undefined : {};
        for (var i = 0, l = cookies.length; i < l; i++) {
            var parts = cookies[i].split('=');
            var name = decode(parts.shift());
            var cookie = parts.join('=');

            if (key && key === name) {
                result = decodeAndParse(cookie);
                break;
            }

            if (!key) {
                result[name] = decodeAndParse(cookie);
            }
        }

        return result;
    };

    config.defaults = {};

    $.removeCookie = function (key, options) {
        if ($.cookie(key) !== undefined) {
            // Must not alter options, thus extending a fresh object...
            $.cookie(key, '', $.extend({}, options, { expires: -1 }));
            return true;
        }
        return false;
    };

}));

if ($.cookie('old_user') == 'false' || $.cookie('old_user') == undefined) {
	$('.quest-add-product').popover('show')
	$('#fb_share').popover('show')

	$.cookie('old_user', 'true', { expires: 99999, path: '/' })
}

$(".chat").scrollTop($(".chat")[0].scrollHeight);
mixpanel.track("View Quest");

if (self_quest) {
    mixpanel.track("View Quest (self)");
}

var product_button = $('.tour-product-btn');
product_button.popover('show');
product_button.click(function() {
  product_button.popover('destroy');
});
