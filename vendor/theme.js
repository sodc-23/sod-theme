
jQuery(function($) {
    if (jQuery('.banner-slider').length) {
      jQuery('.banner-slider').slick({
        draggable: true,        
        centerMode: true,        
        centerPadding: 0,
        slidesToShow: 1,
        arrows: false,
        dots: false,
        swipeToSlide: true,
        infinite: true,
        fade: true
      });
  
    }
      
    if (jQuery(".image_carousel").length) {
      jQuery('.image_carousel').slick({
        draggable: true,        
        centerMode: true,        
        centerPadding: 0,
        slidesToShow: 1,
        arrows: true,
        dots: true,
        swipeToSlide: true,
        infinite: true,
        asNavFor: ".image_carousel"
      });
    }
  
    if (jQuery(".section3-carousel").length) {
      jQuery('.section3-carousel').slick({
        draggable: true,        
        centerMode: true,        
        centerPadding: 0,
        slidesToShow: 1,
        arrows: true,
        dots: true,
        swipeToSlide: true,
        infinite: true
      });
    }
    
    jQuery("[data-section]").onScreen({
        container: window,
        direction: 'vertical',
        doIn: function() {
            
            var type = jQuery(this).attr("data-type");
            if (type == "counter") {
              jQuery(this).find(".counter-elment").each(function() {
                var upto = jQuery(this).attr('data-upto');
                console.log(upto);
                if (upto) {
                  var count = new CountUp(jQuery(this)[0], parseInt(upto));
                  count.start();
                }        
              });
            }
        },
        doOut: function(e) {
          // Do something to the matched elements as they get off scren
        },
        tolerance: 0,
        throttle: 50,
        toggleClass: 'onScreen',       
        debug: false
     });

     jQuery("a[data-popup]").magnificPopup({
      type: 'image',
      closeOnContentClick: true,
      mainClass: 'mfp-img-mobile',
      image: {
        verticalFit: true
      },
      gallery:{
        enabled:true
      },
    });
  
    var lazyContent = new LazyLoad({});
    lazyContent.update();
  });
  
  
  window.lazyLoadOptions = {
    
  };
  
  window.addEventListener(
    "LazyLoad::Initialized",
    function (event) {
      window.lazyLoadInstance = event.detail.instance;
    },
    false
  );
  