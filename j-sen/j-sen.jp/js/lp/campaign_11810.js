$(function() {
  $('.js-scroll').click(function() {
    var target = $(this).attr('href');
    var position = ($(this).hasClass('js-to-top')) ? 0 : $(target).offset().top;

    $('body, html').animate({scrollTop: position}, 400, 'swing');
    return false;
  });

  $('.js-login-launcher').click(function() {
    $('.js-login-form').show();
    $(this).remove();
  });

  $('#js-freeword').focus();
});

(function (w, d) {
  w.___gcfg = {lang: 'ja'};
  var s, e = d.getElementsByTagName('script')[0],
    a = function (u, i) {
      if (!d.getElementById(i)) {
        s = d.createElement('script');
        s.src = u;
        if (i) {s.id = i;}
        e.parentNode.insertBefore(s, e);
      }
    };
  a('../../../connect.facebook.net/ja_JP/all.js#xfbml=1', 'facebook-jssdk');
  a('../../../platform.twitter.com/widgets.js', 'twitter-wjs');
})(this, document);