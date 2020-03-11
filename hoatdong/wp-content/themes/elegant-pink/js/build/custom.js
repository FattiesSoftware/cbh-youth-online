jQuery(document).ready(function($) {

    /** Variables from Customizer for Slider settings */
    var slider_auto, slider_loop, slider_control, rtl, mrtl, slider_animation;

    if (elegant_pink_data.auto == '1') {
        slider_auto = true;
    } else {
        slider_auto = false;
    }

    if (elegant_pink_data.loop == '1') {
        slider_loop = true;
    } else {
        slider_loop = false;
    }

    if (elegant_pink_data.option == '1') {
        slider_control = true;
    } else {
        slider_control = false;
    }

    if (elegant_pink_data.rtl == '1') {
        rtl = true;
        mrtl = false;
    } else {
        rtl = false;
        mrtl = true;
    }

    /** Home Page Slider */
    if (elegant_pink_data.mode == 'slide') {
        slider_animation = '';
    } else {
        slider_animation = 'fadeOut';
    }

    $("#imageGallery").owlCarousel({
        items: 1,
        margin: 0,
        loop: slider_loop,
        autoplay: slider_auto,
        nav: slider_control,
        dots: false,
        animateOut: slider_animation,
        autoplayTimeout: elegant_pink_data.pause,
        lazyLoad: true,
        mouseDrag: false,
        rtl: rtl,
        autoplaySpeed: elegant_pink_data.speed,
    });

    /** Masonry */
    $('.ep-masonry').imagesLoaded(function() {
        $('.ep-masonry').masonry({
            itemSelector: '.post',
            isOriginLeft: mrtl
        });
    });

    //mobile-menu
    $('.btn-menu-opener').click(function() {
        $('body').addClass('menu-open');

        $('.btn-close-menu').click(function() {
            $('body').removeClass('menu-open');
        });

    });

    $('.overlay').click(function() {
        $('body').removeClass('menu-open');
    });

    $('.mobile-menu').prepend('<div class="btn-close-menu"></div>');

    $('.mobile-main-navigation ul .menu-item-has-children').append('<div class="angle-down"></div>');

    $('.mobile-main-navigation ul li .angle-down').click(function() {
        $(this).prev().slideToggle();
        $(this).toggleClass('active');
    });

    //for drop down menu appear in edge from keyboard
    $("#site-navigation ul li a").focus(function(){
        $(this).parents("li").addClass("hover");
    }).blur(function(){
        $(this).parents("li").removeClass("hover");
    });
});
