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

        /* Move entire gallery left or right.. */
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

        /* Move current image left or right through thumbnails. */
        move: function (direction) {
            console.log('child.move(' + direction + ')');
            var index, next, current, new_source;
            current = parseInt($('.product-image').attr('id'), 10);
            index = parseInt($('.gallery img:first').attr('id'), 10);


            switch (direction) {
                case 'left':
                if (current > 0) {
                    next = current - 1;
                    if (next < index) {
                        child.shift('left');
                    }
                    new_source = $('#' + next).attr('src');
                    $('.product-image').attr('id', next);
                    $('.product-image').attr('src', new_source);
                }
                break;
                case 'right':
                if (current < (child.imageArraySize)) {
                    next = current + 1;
                    if (next > (index + 4)) {
                        child.shift('left');
                    }
                    new_source = $('#' + next).attr('src');
                    $('.product-image').attr('id', next);
                    $('.product-image').attr('src', new_source);
                }
                break;
            }
        },

        /* Set gallery's index (left-most thumbnail). */
        gallery: function (index) {
            console.log('child.gallery(' + index + ')');

            var count = 1;
            var size = 0;
            var largest = 0;
            var arraySize = 0;
            var source = '';
            var drawn = 0;
            child.sorted = [];
            arraySize = child.imageArraySize; 

            /* Truncate gallery. */
            $('.gallery').html('');

            /* Why isn't this breaking when we move right from index 5? */
            $('.product-image').attr('id', index);

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

        display_options: function(add_to) {
            console.log('child.display_options(' + add_to + ')');
            if (add_to === 'my')
            {
                $('#friends').hide();
                $('#friend_quests').hide();
                $('#new_quest').hide();
                $('#my_quests').show();
            }
            if (add_to === 'friend')
            {
                $('#friends').show();
                $('#friend_quests').hide();
                $('#new_quest').hide();
                $('#my_quests').hide();

                child.load_friend_quests($('#form_friend').val());
            }
            if (add_to === 'new')
            {
                $('#friends').hide();
                $('#friend_quests').hide();
                $('#new_quest').show();
                $('#my_quests').hide();
            }
        },

        load_friend_quests: function(friend_id) {
            console.log('child.load_friend_quests(' + friend_id + ')');
            if (friend_id !== 'none') {
                $.ajax({
                    url: '/bookmark/friend_quests/' . friend_id,
                    type: 'GET',
                    timeout: 30000,
                    dataType: 'json',
                    success: function() {
                        $('#friend_quests').show();
                    }
                });
            }
            
        },

        /* Set event handlers and listeners. */
        initialize: function () {
            console.log('child.initialize()');

            /* Save inline parent's URL for communication. */
            child.inlineURL = urlParam('inline');

            $('.add').click(function () {
                child.send();
            });

            $('.cancel').click(function () {
                child.terminate();
            });

            $('#form_add_to').change(function() {
                var add_to = $(this).val();
                child.display_options(add_to);
            });

            $('#form_friend').change(function() {
                var friend_id = $(this).val();
                child.load_friend_quests(friend_id);
            });

            /* Populate the bookmarklet with any information sent by inline. */
            window.addEventListener("message", function (e) {
                console.log('inline: \"' + e.data + '\"');
                child.populate(e.data);
            });

            /* Tell inline we're ready, and fade in. */
            child.talk('ready');
            $('.itemnation-box').fadeIn(500);
        },

        /** Pre-fill input forms and gallery. */
        populate: function (data) {
            console.log('child.populate(' + data +')');

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

        /* Send information to ItemNation */
        send: function () {
            console.log('child.send()');

            /* Replace info object with current inputs. */
            $.extend(child.info, {
                name: $('.title').val(),
                description: $('.description').val(),
                images: $('.product-image').attr('src'),
                add_to: $("select[name='add_to']").val(),
                chat_id: $("select[name='chat_id']").val()
            });

            /* Send an AJAX request and terminate. */
            $.ajax({
                url: '/bookmark/add',
                data: child.info,
                type: 'POST',
                timeout: 30000,
                dataType: 'text',
                complete: function () {
                    child.terminate();
                }
            });
        },

        /* Tell inline frame to close and terminate child */
        terminate: function () {
            console.log('child.terminate()');
            child.talk('terminate');
        },

        /* Send message to inline frame */ 
        talk: function (message) {
            parent.postMessage(message, child.inlineURL);
        }
    };

    child.initialize();
});
