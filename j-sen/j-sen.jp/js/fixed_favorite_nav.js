;(function($) {
  $(function() {
    var t = 200;
    var $element = $('#js-fixed-favorite-nav');
    var isTransform  = typeof $('body').css('transform') === 'string';

    if (isTransform) {
        $element.show();
    }

    $(window).scroll(function() {
      st = $(window).scrollTop();
      if (st > t) {
        isTransform ? $element.addClass('js-show') : $element.show();
      } else {
        isTransform ? $element.removeClass('js-show') : $element.hide();
      }
    });
  });
})(jQuery);