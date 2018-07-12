(function($) {

    /*
    // Vimeo API nonsense
    var player = document.getElementById('player_1');
    $f(player).addEvent('ready', ready);

    function addEvent(element, eventName, callback) {
        if (element.addEventListener) {
            element.addEventListener(eventName, callback, false)
        } else {
            element.attachEvent(eventName, callback, false);
        }
    }

    function ready(player_id) {
        var froogaloop = $f(player_id);
        froogaloop.addEvent('play', function(data) {
            $('.flexslider').flexslider("pause");
        });
        froogaloop.addEvent('pause', function(data) {
            $('.flexslider').flexslider("play");
        });
    }


    // Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
    $(".flexslider")
    .flexslider({
        animation: "slide",
        slideshow: true,
        //useCSS: false,
        //animationLoop: false,
        //smoothHeight: true,
        slideshowSpeed: 2000,
        start: function(slider){
            $f(player).api('play');
        },
        before: function(slider){
            $f(player).api('pause');
        }
    });
    */


    $('.flexslider').flexslider({
        animation: "slide",
        slideshowSpeed: 7000
    });

    $('.slider-clientes').flexslider({
        animation: "slide",
        itemWidth: 230,
        minItems: 2,
        maxItems: 5,
        animationSpeed:1200,
        slideshowSpeed: 3000
    });

})(jQuery);
