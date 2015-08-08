/* ブラウザ判別 */
var ie=document.all ? 1 : 0;
var ns6=document.getElementById&&!document.all ? 1 : 0;
var opera=window.opera ? 1 : 0;

/* 子メニューの表示・非表示切替 */
function openFolder(childObj, number){
    $(childObj).toggle();

    // 全て空欄だった場合のみ全てチェック
    var name_reg = new RegExp('^subjob\\[' + number + '\\]');
    var checkboxes = $A(document.getElementsByTagName('input')).findAll(function(element) {
        return element.name.match(name_reg);
    });
    var elem = $('work_type_' + childObj.match(/\d+/));
    var isAllUnchecked = !checkboxes.all(function (elem) { return elem.checked; });
    if ((elem && isAllUnchecked) || !elem.checked) {
        checkboxes.each(function (checkbox) {
            checkbox.checked = elem.checked;
        });
    }
}

function setcolor(obj0,sw1) {
  if (sw1 == 0) {
    bd = '1px solid #F5F5F5';
    bgc = '';
  } else {
    bd = '1px solid #71AFEE';
    bgc = '#EEF7FB';
  }
  obj0.style.border = bd;
  obj0.style.backgroundColor = bgc;
}

(function($) {
  /* キープリスト まとめて応募 */
  $(function() {
    var btn = $('.js-mluti-entry-btn');
    if (btn.length) {
      var checkbox = $('.js-multi-entry-checkbox');
      checkbox.click(function() {
        if (checkbox.is(':checked')) {
          btn.css({backgroundColor: '#fff', opacity: 1}).unbind('click');
        } else {
          btn.css({backgroundColor: '#eee', opacity: 0.5}).click(function() {
            return false;
          });
        }
      });
    }
  });

  /* キープボタン チュートリアル */
  $(function() {
    var key = 'isFavoriteTutorial';
    var $element = $('.js-tutorial-favorite');

    if (!$element.length || sessionStorage.getItem(key)) {
      return false;
    }

    var t    = $element.parent().offset().top;
    var wp   = window.innerHeight * 0.8;
    var move = 5;
    var st;

    $element.css('top', -($element.outerHeight() - 10));
    $(window).scroll(function() {
      st = $(window).scrollTop();
      if (st > t - wp) {
        $(window).unbind('scroll');
        sessionStorage.setItem(key, 'false');
        $element
          .stop()
          .animate({opacity: 'show', top: '-=' + move}, 500, function() {
            setTimeout(function() {
              $element.animate({opacity: 'hide', top: '-=' + move}, 500);
            }, 4000);
          });
      }
    });
  });
})(jQuery);