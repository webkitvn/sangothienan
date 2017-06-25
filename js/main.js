jQuery(document).ready(function($) {

    $(function() {
        var shrinkHeader = 100;
        $(window).scroll(function() {
            var scroll = getCurrentScroll();
            if (scroll >= shrinkHeader) {
                $('#masthead').addClass('shrink');
            } else {
                $('#masthead').removeClass('shrink');
            }
        });

        function getCurrentScroll() {
            return window.pageYOffset || document.documentElement.scrollTop;
        }
    });

    $('.button-collapse').sideNav({
        menuWidth: 300, // Default is 300
        edge: 'right', // Choose the horizontal origin
        draggable: true // Choose whether you can drag to open on touch screens
    });
    $('.close-menu').on('click', function(e) {
        $('.button-collapse').sideNav('hide');
        return false;
    });
    $('#main-menu ul ul').append('<a class="close-btn">Close <i class="close-x" aria-hidden="true"></a>');

    $('#main-menu li.menu-item-has-children > a').on('click', function(e) {
        $(this).parent().parent().find('li').removeClass('active');
        $(this).parent().addClass('active');
        $(this).parent().parent().find('ul').removeClass('active').addClass('unactive');
        $(this).parent().children('ul').removeClass('unactive').addClass('active');
        return false;
    });
    $('#main-menu a.close-btn').on('click', function(e) {
        $(this).parent().removeClass('active').addClass('unactive');
        return false;
    });

    $('.category-list-wrapper .item, .product-item .image-wrapper, .project-item').each( function() { $(this).hoverdir(); } );
    $('.about-product-cats .main-cat .toggle-btn').on('click', function(){
        $(this).toggleClass('active');
        $(this).parent().parent().find('.sub-cats').slideToggle();
    })
    $('.cate-slider-wrapper').slick({
        infinite: false,
        responsive: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        prevArrow: '<div class="prev"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></div>',
        nextArrow: '<div class="next"><i class="fa fa-angle-right fa-2x" aria-hidden="true"></i></div>',
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });

    $('.product-slider, .blog-slider').slick({
        infinite: true,
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<div class="prev"></div>',
        nextArrow: '<div class="next"></div>'
    });

    $('.testimonios-slider').slick({
        //autoplay: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        responsive: true,
        arrows: false
    });
    $('.woocommerce-product-gallery .flex-control-thumbs').slick({
        //autoplay: true,
        infinite: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: false,
        responsive: true,
        arrows: false
    });
    $('.project-images-slider').slick({
        autoplay: true,
        fade: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        responsive: true,
        prevArrow: '<div class="prev"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></div>',
        nextArrow: '<div class="next"><i class="fa fa-angle-right fa-2x" aria-hidden="true"></i></div>',
    });


    $('#totop').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });

    $(".qty-button").on("click", function() {

        var $button = $(this);
        var oldValue = $button.parent().find("input").val();

        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }

        $button.parent().find("input").val(newVal);
    });

    jQuery('.product-item .title-wrapper').matchHeight();
    jQuery('.post-list .post-item').matchHeight();


    //AJAX QUICKVIEW
    $('.modal').modal();
    $('.product-item .quickview-btn').on('click', function(e) {
        e.preventDefault();
        console.log("Clicked");
        $("div#quickview-modal.modal").html('');
        $("div#quickview-modal.modal").modal('open');
        product_id = $(this).data('id');
        data = {
            'action': 'product_quick_view',
            'product_id': product_id
        }
        $.ajax({
            url: sango_ajax_object.ajax_url,
            type: "POST",
            data: {
                action: 'product_quick_view',
                id: product_id
            },
            success: function(response) {
                $("div#quickview-modal.modal").html(response);
                $('.modal .images figure').slick({
                    autoplay: false,
                    fade: true,
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    responsive: true,
                    prevArrow: '<div class="prev"></div>',
                    nextArrow: '<div class="next"></div>',
                });
                $(".qty-button").on("click", function() {

                    var $button = $(this);
                    var oldValue = $button.parent().find("input").val();

                    if ($button.text() == "+") {
                        var newVal = parseFloat(oldValue) + 1;
                    } else {
                        // Don't allow decrementing below zero
                        if (oldValue > 0) {
                            var newVal = parseFloat(oldValue) - 1;
                        } else {
                            newVal = 0;
                        }
                    }

                    $button.parent().find("input").val(newVal);
                });
            },
            error: function(response) {

            }
        })
    })
});
