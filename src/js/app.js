import '../scss/app.scss';

jQuery(function() {
  if (jQuery('.banner-slider').length) {
    jQuery('.banner-slider').slick({
      draggable: true,        
      centerMode: true,        
      centerPadding: 0,
      slidesToShow: 1,
      arrows: true,
      dots: true,
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
      infinite: true
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

