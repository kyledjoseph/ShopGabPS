(function (window, document, version, callback) {
    var j, d;
    var loaded = false;
    if (!(j = window.jQuery) || version > j.fn.jquery || callback(j, loaded)) {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = "http://code.jquery.com/jquery-1.9.1.min.js";
        script.onload = script.onreadystatechange = function () {
            if (!loaded && (!(d = this.readyState) || d === "loaded" || d === "complete")) {
                callback((j = window.jQuery).noConflict(1), loaded = true);
                j(script).remove();
            }
        };

        document.body.appendChild(script);
    }
})(window, document, "1.9.1", function ($) {
    var inline = {
        info: {
            description: '',
            domain: '',
            images: [],
            name: '',
            url: ''
        },

        iframe: null,

        /** Open child iframe. */
        open: function () {

            console.log('inline.open()');

            //
            if (!document.getElementById('itemnation-frame')) {
                inline.iframe = document.createElement('iframe');
                $(inline.iframe).attr({
                    id: 'itemnation-frame',
                    src: 'http://itemnation.dev/bookmark/view?inline=' + encodeURIComponent(inline.info.url) + '&cacheblock=' + Math.floor(Math.random() * 99999999999999999999999)
                }).css({
                    width: '290px !important',
                    height: '760px !important',
                    position: 'fixed !important',
                    top: '10px !important',
                    right: '20px !important',
                    border: '0 !important',
                    zIndex: 99999999999999999999
                });

                document.getElementsByTagName('body')[0].appendChild(inline.iframe);

                window.addEventListener("message", function (e) {
                    console.log('child: \"' + e.data + '\"');
                    switch (e.data) {
                    case 'ready':
                        inline.report();
                        break;
                    case 'terminate':
                        inline.close();
                        break;
                    }
                });
            }
        },

        /** Observe page information. */
        observe: function () {
            console.log('inline.observe()');
            inline.info.price = $('body').text().match(/(\$[0-9,]+(\.[0-9]{2})?)/g);

            if (inline.info.price === null) {
                inline.info.price = [];
                inline.info.price[0] = '';
            }

            inline.info.description = $('meta[name="description"]').attr('content');
            if (typeof inline.info.description !== 'undefined') {
                inline.info.description = inline.info.description.replace(/(<.*?>)/ig, '');
            } else {
                inline.info.description = '';
            }

            $('img').each(function () {
                if (($(this).width() > '60') && ($(this).height() > '60')) {
                    if ((($(this).width() * 4) > $(this).height()) && (($(this).height() * 4) > $(this).width())) {
                        var image = {
                            height: $(this).height(),
                            src: $(this).prop('src'),
                            width: $(this).width()
                        };

                        inline.info.images.push(image);
                    }
                }
            });

            inline.info.domain = document.domain;
            inline.info.name = document.title.substring(0, 50);
            inline.info.url = document.URL;

            if (window.location.hostname === 'amazon.com') {
                console.log('amazon.com');
            }
        },

        /** Report page information to child. */
        report: function () {
            console.log('inline.report()');
            delete Array.prototype.toJSON;
            inline.talk(JSON.stringify(inline.info));
        },

        /** Close and terminate child. */
        close: function () {
            console.log('inline.close()');
            $(inline.iframe).fadeOut(500, function () {
                $(inline.iframe).remove();
            });
        },

        /** Send message to child */
        talk: function (message) {
            document.getElementById('itemnation-frame').contentWindow.postMessage(
                message,
                "http://itemnation.dev/assets/js/child.js"
            );
        }
    };

    inline.observe();
    inline.open();
});

