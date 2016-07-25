/*
* Loads the Flexslider JS for the Home Page Image Carousel
 */
(function($) {
  $(window).load(function() {
    // front-page slider
    $('.flexslider').flexslider({
        animation: 'fade',
        directionNav: false,
        animationLoop: true
    });
  });
})(jQuery);