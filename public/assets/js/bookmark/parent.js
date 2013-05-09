(function(window, document, version, callback) {
    var j, d
    var loaded = false
    if (!(j = window.jQuery) || version > j.fn.jquery || callback(j, loaded)) {
        var script = document.createElement("script")
        script.type = "text/javascript"
        script.src = "http://code.jquery.com/jquery-1.9.1.min.js"
        script.onload = script.onreadystatechange = function() {
            if (!loaded && (!(d = this.readyState) || d == "loaded" || d == "complete")) {
                callback((j = window.jQuery).noConflict(1), loaded = true)
                j(script).remove()
            }
        }

        document.body.appendChild(script)
    }
})(window, document, "1.9.1", function($, jquery_loaded) {
    inline = {
        info: {
            description:  '',
            domain:       '',
            images:       [],
            name:         '',
            url:          ''
        },

        iframe: null,

        open: function() {
            console.log('inline.open()')
            if (!document.getElementById('itemnation-frame')) {
                inline.iframe = document.createElement('iframe')
                inline.iframe.id = 'itemnation-frame'
                inline.iframe.src = 'http://itemnation.dev/bookmark/view?inline=' + encodeURIComponent(inline.info.url) + '&cacheblock=' + Math.floor(Math.random() * 99999999999999999999999)
                inline.iframe.width = '290px'
                inline.iframe.height = '760px'
                inline.iframe.style.position = 'fixed'
                inline.iframe.style.top = '10px'
                inline.iframe.style.right = '20px'
                inline.iframe.style.border = '0'
                inline.iframe.style.zIndex = 99999999999999999999
                document.getElementsByTagName('body')[0].appendChild(inline.iframe)
                window.addEventListener("message", function(e) {
                    console.log('child: \"' + e.data + '\"')

                    switch (e.data) {
                        case 'ready':
                        inline.report()
                        break
                        case 'terminate':
                        inline.close()
                        break
                    }
                })
            }
        },

        observe: function() {
            console.log('inline.observe()')

            if (inline.info.description = $('meta[name="description"]').attr('content')) {
                inline.info.description = inline.info.description.replace(/(<.*?>)/ig,'')
            } else {
                inline.info.description = ''
            }

            $('img').each(function(i) {
                if (($(this).width() > '60') && ($(this).height() > '60')) {
                    if ((($(this).width() * 4) > $(this).height()) && (($(this).height() * 4) > $(this).width())) {
                        image = {
                            height: $(this).height(),
                            src:    $(this).prop('src'),
                            width:  $(this).width()
                        }

                        inline.info.images.push(image)
                    }
                }
            })

            inline.info.domain      = document.domain
            inline.info.name        = document.title.substring(0,50)
            inline.info.url         = document.URL

            if (window.location.hostname == 'amazon.com') {
                //code to run on amazon.com
            }
        },

        report: function() {
            console.log('inline.report()')
            delete Array.prototype.toJSON
            document.getElementById('itemnation-frame').contentWindow.postMessage(
                JSON.stringify(inline.info),
                "http://itemnation.dev/assets/js/child.js"
                )
        },

        close: function() {
            console.log('inline.close()')
            $(inline.iframe).fadeOut(500, function() {
             $(inline.iframe).remove() 
         })
        }
    }

    inline.observe()
    inline.open()
})