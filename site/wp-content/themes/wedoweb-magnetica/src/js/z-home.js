(function($) {

    var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);

    var vimeoPlayers = jQuery('.flexslider').find('iframe'), player;

    for (var i = 0, length = vimeoPlayers.length; i < length; i++) {
            player = vimeoPlayers[i];
            $f(player).addEvent('ready', ready);
    }

    function addEvent(element, eventName, callback) {
        if (element.addEventListener) {
            element.addEventListener(eventName, callback, false)
        } else {
            element.attachEvent(eventName, callback, false);
        }
    }

    function ready(player_id) {

        console.log( 'ready' );

        $('.flex-next').click();

        var froogaloop = $f(player_id);
        froogaloop.addEvent('play', function(data) {
            console.log( 'froogaloop-play' );
        });
        froogaloop.addEvent('pause', function(data) {
            console.log( 'froogaloop-pause' );
        });
    }

    jQuery(".flexslider").flexslider({
        animation: "slide",
        useCSS: false,
        smoothHeight: true,
        initDelay: 2000,
        slideshowSpeed: 80000,
        pauseOnAction: false,
        after: function(slider){
            console.log( slider.slides.eq(slider.currentSlide).find('iframe').attr('id') );
            console.log( 'after-play' );
            if (slider.slides.eq(slider.currentSlide).find('iframe').length !== 0)
                $f( slider.slides.eq(slider.currentSlide).find('iframe').attr('id') ).api('play');
        },
        before: function(slider){
            console.log( slider.slides.eq(slider.currentSlide).find('iframe').attr('id') );
            console.log( 'before-pause' );
            if (slider.slides.eq(slider.currentSlide).find('iframe').length !== 0)
                $f( slider.slides.eq(slider.currentSlide).find('iframe').attr('id') ).api('pause');
        }
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


function myFunction(x) {
    x.classList.toggle("change");
}
