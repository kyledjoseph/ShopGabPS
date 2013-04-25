$(document).ready(function () {
    urlParam = function(name) {
      name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
      var regexS = "[\\?&]" + name + "=([^&#]*)";
      var regex = new RegExp(regexS);
      var results = regex.exec(window.location.search);
      if(results == null)
        return "";
    else
        return decodeURIComponent(results[1].replace(/\+/g, " "));
}

child = {
    info: {
        description:  '',
        domain:       '',
        images:       [],
        name:         '',
        url:          ''
    },

    imageArraySize: 0,

    guess: false,

    sorted: [],

    parentURL: '',

    shift: function(direction) {
        id = parseInt($('.product-image').attr('id'))

        switch (direction) {
            case 'left':
            shifted =  id + 1
            break
            case 'right':
            shifted = id - 1
            break
        }

        if (shifted < 1) {
            child.gallery(1)
        } else if (shifted > (child.imageArraySize - 4)){
            child.gallery(shifted - 1)
        } else {
            child.gallery(shifted)
        }
    },

    gallery: function(index) {
        console.log('child.gallery(' + index + ')')
        count = 1
        size = 0
        largest = 0
        arraySize = 0
        source = ''
        drawn = 0
        child.sorted =[]
        $('.gallery').html('')

        $('.product-image').attr('id', index)

        arraySize = child.imageArraySize

        while (count <= arraySize) {
            $(child.info.images).each(function() {
                if ((this.width * this.height) > size) {
                    if (jQuery.inArray(jQuery.inArray(this, child.info.images), child.sorted) == -1) {
                        size = this.width * this.height
                        largest = jQuery.inArray(this, child.info.images)
                        source = this.src
                    }   
                }
            })

            child.sorted.push(largest)
            if ((count >= index) && (drawn < 5)) {
                $('.gallery').append('<img id ="' + count + '" src="' + source + '" />');
                if (count == index) {
                    $('.product-image').attr('src', source)
                }
                drawn++
            }
            size = 0

            if ((count === 1) && (child.guess === false)) {
                $('.product-image').attr('src', child.info.images[largest].src)
                child.guess = true
            }
            count++
        }

        $('.gallery img').click(function() {
            $('.product-image').attr('src', $(this).attr('src'));
            $('.product-image').attr('id', $(this).attr('id'));
        });
    },

    initialize: function() {
        console.log('child.initialize()')
        child.parentURL = urlParam('parent')
        $('.add').click(function() {
            child.send()
        })

        $('.cancel').click(function() {
            child.terminate()
        })

        window.addEventListener("message", function(e) {
            console.log('parent: \"' + e.data + '\"')
            child.populate(e.data)
        })

        parent.postMessage(
            'ready',
            child.parentURL
            )

        $('.itemnation-box').fadeIn(500)


    },

    populate: function(data) {
        console.log('child.populate()')
        child.info = jQuery.parseJSON(data)

        $('.title').val(child.info.name)
        $('.description').val(child.info.description)

        $(child.info.images).each(function() {
            child.imageArraySize++
        })

        if (child.imageArraySize > 5) {
            $('.arrow').css('display', 'block')

            $('.arrow.left').click(function() {
                child.shift('right')
            })

            $('.arrow.right').click(function() {
                child.shift('left')
            })
        }

        child.gallery(1)
    },

    send: function() {
        console.log('child.send()')

        child.info.name        = $('.title').val()
        child.info.description = $('.description').val()
        child.info.images      = $('.product-image').attr('src') 

        $.ajax({
            url: 'http://beta.itemnation.com/bookmark/add',
            data: child.info,
            type: 'POST',
            timeout: 30000,
            dataType: 'text',
            complete: function(data) {
                child.terminate()
            }
        })
    },

    terminate: function() {
        console.log('child.terminate()')
        parent.postMessage(
            'terminate',
            child.info.url
            )
    }
}

child.initialize()

})