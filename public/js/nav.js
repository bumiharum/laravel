(function($) {
  'use strict';

  $(window).on('scroll',function() {
   var scroll = $(window).scrollTop();
   if (scroll < 2) {
    $("#sticky-header").removeClass("sticky");
   }else{
    $("#sticky-header").addClass("sticky");
   }
  });

})(jQuery);
