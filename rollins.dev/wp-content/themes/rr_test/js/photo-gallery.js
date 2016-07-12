/*
* Loads the Flexslider JS for the Photo Gallery Page
 */
(function($) {
  $(window).load(function() {
    // front-page slider
    $('.flexslider').flexslider({
        controlNav: 'thumbnail',
        directionNav: true,
        prevText: "Previous",
        nextText: "Next"
    });
  });
})(jQuery);