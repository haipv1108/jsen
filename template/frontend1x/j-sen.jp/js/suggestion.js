;(function($) {
  $(function() {
    var footer = $('#footerInnerBrandnew');
    var LOADING_HTML = '<div style="padding-bottom:50px; padding-top:50px; text-align:center;"><img src="img/result/ajax_loading_photo.gif"></div>';
    var suggestionLoaded = false;

    footer
      .lazyload()
      .on('appear', function () {
        if (suggestionLoaded) {
          return;
        }
        suggestionLoaded = true;
        loadSuggestion();
      });

    function loadSuggestion() {
      footer.html(LOADING_HTML);
      $.get('/works/suggestionIds.json')
        .then(function(workIds) {
          if (!workIds) {
            return $.Deferred().reject();
          }
          return $.ajax('/works/suggestion?' + $.param(workIds), { type: 'GET', timeout: 3000 });
        })
        .done(function(suggestionHtml) {
          if(!suggestionHtml){
            footer.html('');
            return;
          }
          footer.html(suggestionHtml);
          setSlider();
        })
        .fail(function() {
          footer.html('');
        });
    }

    function setSlider() {
      jQuery('.footerSlider').easySlider({
        speed: 400,
        prevId: 'fstPrevBtn',
        nextId: 'fstNextBtn'
      });
    }
  });
})(jQuery.noConflict(true));
