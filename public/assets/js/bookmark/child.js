$(document).ready(function () {
    var urlParam = function (name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regexS = "[\\?&]" + name + "=([^&#]*)";
        var regex = new RegExp(regexS);
        var results = regex.exec(window.location.search);
        if (results === null) {
            return "";
        } else {
            return decodeURIComponent(results[1].replace(/\+/g, " "));
        }
    };

    var child = {
        info: {
            description: '',
            domain: '',
            images: [],
            name: '',
            url: ''
        },

        imageArraySize: 0,
        guess: false,
        sorted: [],
        inlineURL: '',

        /** Move gallery thumbnails left or right. */
        shift: function (direction) {
            console.log('child.shift(' + direction + ')');
            var shifted, id;
            id = parseInt($('.product-image').attr('id'), 10);

            switch (direction) {
                case 'left':
                shifted = id - 3;
                break;
                case 'right':
                shifted = id + 3;
                break;
            }

            if (shifted < 1) {
                child.gallery(1);
            } else if (shifted > (child.imageArraySize - 4)) {
                child.gallery(shifted - 1);
            } else {
                child.gallery(shifted);
            }
        },

        move: function (direction) {
            console.log('child.move(' + direction + ')');
            var product, index, next;
            current = parseInt($('.product-image').attr('id'), 10);
            index = parseInt($('.gallery img:first').attr('id'), 10);


            switch (direction) {
                case 'left':
                next = current - 1;
                new_source = $('#' + next).attr('src');
                $('.product-image').attr('id', next);
                $('.product-image').attr('src', new_source);
                break;
                case 'right':
                next = current + 1;
                if (next > (index + 4)) {
                    child.shift('left');
                }
                new_source = $('#' + next).attr('src');
                $('.product-image').attr('id', next);
                $('.product-image').attr('src', new_source);
                break;
            }
        },

        /** Set gallery's index (left-most thumbnail). */
        gallery: function (index) {
            console.log('child.gallery(' + index + ')');
            var count = 1;
            var size = 0;
            var largest = 0;
            var arraySize = 0;
            var source = '';
            var drawn = 0;
            child.sorted = [];
            $('.gallery').html('');

            $('.product-image').attr('id', index);

            arraySize = child.imageArraySize;        

            while (count <= arraySize) {
                $.each(child.info.images, function () {
                    if ((this.width * this.height) > size) {
                        if (jQuery.inArray(jQuery.inArray(this, child.info.images), child.sorted) === -1) {
                            size = this.width * this.height;
                            largest = jQuery.inArray(this, child.info.images);
                            source = this.src;
                        }
                    }
                });

                child.sorted.push(largest);
                if ((count >= index) && (drawn < 5)) {
                    $('.gallery').append('<img id ="' + count + '" src="' + source + '" />');
                    if (count === index) {
                        $('.product-image').attr('src', source);
                    }
                    drawn++;
                }
                size = 0;

                if ((count === 1) && (child.guess === false)) {
                    $('.product-image').attr('src', child.info.images[largest].src);
                    child.guess = true;
                }
                count++;
            }

            $('.gallery img').click(function () {
                $('.product-image').attr('src', $(this).attr('src'));
                $('.product-image').attr('id', $(this).attr('id'));
            });
        },

        /** Set event handlers and listeners. */
        initialize: function () {
            console.log('child.initialize()');
            child.inlineURL = urlParam('inline');
            $('.add').click(function () {
                child.send();
            });

            $('.cancel').click(function () {
                child.terminate();
            });

            window.addEventListener("message", function (e) {
                console.log('inline: \"' + e.data + '\"');
                child.populate(e.data);
            });

            child.talk('ready');
            $('.itemnation-box').fadeIn(500);
        },

        /** Pre-fill input forms and gallery. */
        populate: function (data) {
            console.log('child.populate()');
            child.info = jQuery.parseJSON(data);

            $('.title').val(child.info.name);
            $('.description').val(child.info.description);
            $('.price').val(child.info.price[0]);

            $(child.info.images).each(function () {
                child.imageArraySize++;
            });

            if (child.imageArraySize > 5) {
                $('.arrow').css('display', 'block');

                $('.arrow.left').click(function () {
                    child.move('left');
                });

                $('.arrow.right').click(function () {
                    child.move('right');
                });
            }

            child.gallery(1);
        },

        /** Send information to ItemNation */
        send: function () {
            console.log('child.send()');

            $.extend(child.info, {
                name: $('.title').val(),
                description: $('.description').val(),
                images: $('.product-image').attr('src'),
                add_to: $("select[name='add_to']").val(),
                chat_id: $("select[name='chat_id']").val()
            });

            $.ajax({
                url: 'http://itemnation.dev/bookmark/add',
                data: child.info,
                type: 'POST',
                timeout: 30000,
                dataType: 'text',
                <<<<<<< HEAD
                complete: function () {
                    child.terminate();
                }
            });
        },

        /** Tell inline frame to close and terminate child */
        terminate: function () {
            console.log('child.terminate()');
            child.talk('terminate');
        },

        /** Send message to inline frame */ 
        talk: function (message) {
            parent.postMessage(
                message,
                child.inlineURL
                );
        }
    };
});
