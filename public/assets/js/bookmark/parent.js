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
    parent = {
        info: {
            description:  '',
            domain:       '',
            images:       [],
            name:         '',
            url:          ''
        },

        iframe: null,

        open: function() {
            console.log('parent.open()')
            if (!document.getElementById('itemnation-frame')) {
                parent.iframe = document.createElement('iframe')
                parent.iframe.id = 'itemnation-frame'
                parent.iframe.src = 'http://beta.itemnation.com/bookmark/view?parent=' + encodeURIComponent(parent.info.url) + '&cacheblock=' + Math.floor(Math.random() * 99999999999999999999999)
                parent.iframe.width = '290px'
                parent.iframe.height = '760px'
                parent.iframe.style.position = 'fixed'
                parent.iframe.style.top = '10px'
                parent.iframe.style.right = '20px'
                parent.iframe.style.border = '0'
                parent.iframe.style.zIndex = 99999999999999999999
                document.getElementsByTagName('body')[0].appendChild(parent.iframe)
                window.addEventListener("message", function(e) {
                    console.log('child: \"' + e.data + '\"')

                    switch (e.data) {
                        case 'ready':
                        parent.report()
                        break
                        case 'terminate':
                        parent.close()
                        break
                    }
                })
            }
        },

        observe: function() {
            console.log('parent.observe()')

            if (parent.info.description = $('meta[name="description"]').attr('content')) {
                parent.info.description = parent.info.description.replace(/(<.*?>)/ig,'')
            } else {
                parent.info.description = ''
            }

            $('img').each(function(i) {
                if (($(this).width() > '60') && ($(this).height() > '60')) {
                    image = {
                        height: $(this).height(),
                        src:    $(this).prop('src'),
                        width:  $(this).width()
                    }

                    parent.info.images.push(image)
                }
            })

            parent.info.domain      = document.domain
            parent.info.name        = document.title.substring(0,50)
            parent.info.url         = document.URL

            if (window.location.hostname == 'amazon.com') {
                //code to run on amazon.com
            }
        },

        report: function() {
            console.log('parent.report()')
            document.getElementById('itemnation-frame').contentWindow.postMessage(
                JSON.stringify(parent.info),
                "http://beta.itemnation.com/assets/js/child.js"
                )
        },

        close: function() {
            console.log('parent.close()')
            $(parent.iframe).fadeOut(500, function() {
               $(parent.iframe).remove() 
           })
        }
    }

    parent.observe()
    parent.open()
})