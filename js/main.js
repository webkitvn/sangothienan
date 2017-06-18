jQuery(document).ready(function($) {
    $('.button-collapse').sideNav({
        menuWidth: 300, // Default is 300
        edge: 'right', // Choose the horizontal origin
        draggable: true // Choose whether you can drag to open on touch screens
    });
    $('.close-menu').on('click', function(e){
    	$('.button-collapse').sideNav('hide');
    	return false;
    });
    $('#main-menu ul ul').append('<a class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></a>');

    $('#main-menu li.menu-item-has-children > a').on('click', function(e){
    	$(this).parent().find('ul').toggleClass('active');
    	return false;
    });
    $('#main-menu ul ul a.close-btn').on('click', function(e){
    	$(this).parent().removeClass('active');
    	return false;
    });
	$('.cate-slider-wrapper').slick({
	  	infinite: false,
	  	responsive: true,
    	slidesToShow: 5,
    	slidesToScroll: 1,
    	prevArrow: '<div class="prev"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></div>',
    	nextArrow: '<div class="next"><i class="fa fa-angle-right fa-2x" aria-hidden="true"></i></div>',
    	responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  	]
	});

	$('.product-slider, .blog-slider').slick({
	  	infinite: true,
	  	fade: true,
    	slidesToShow: 1,
    	slidesToScroll: 1,
    	prevArrow: '<div class="prev"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></div>',
    	nextArrow: '<div class="next"><i class="fa fa-angle-right fa-2x" aria-hidden="true"></i></div>'
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

	$('#totop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
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

});


