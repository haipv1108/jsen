jQuery(function() {
    jQuery.fn.keisaiHeaderBar();
});

(function($) {
    var KeisaiHeaderBar = function(element, options) {
        this.element = element;
        this.options = options;

        this.cookieName = this.options.cookie.name;

        this.initialize();
    };
    KeisaiHeaderBar.prototype = {
        initialize: function() {
            var that = this;
            if (this.isUnloaded()) {
                this.shown();
            }
            $(this.options.headerBarSelector).find(this.options.closeButtonSelector).click(function() {
                that.removeContainer();
            });
        },

        saveCookie:function() {
            $.cookie(this.cookieName, this.cookieName, { expires: this.options.cookie.expirses, path: this.options.cookie.path });
        },

        isUnloaded: function() {
            return !$.cookie(this.cookieName);
        },

        shown: function() {
            $('body').prepend('<div id="keisaiHeaderBar"><div class="inner"><div class="col-1">掲載をお考えの企業様は<a href="info/corp.html">こちら</a></div><div class="col-2"><a href="javascript: void(0);" class="icon-times close">表示を消す</a></div></div></div>');
        },

        removeContainer: function() {
            this.saveCookie();
            $(this.options.headerBarSelector).remove();
        }
    };
    $.fn.keisaiHeaderBar = function() {
        var options = $.extend({}, $.fn.keisaiHeaderBar.defaults);
        new KeisaiHeaderBar($(this), options);
    };
    $.fn.keisaiHeaderBar.defaults = {
        cookie: {
            name: 'jsen_keisai',
            expirses: 30,
            path: '/'
        },
        headerBarSelector: '#keisaiHeaderBar',
        closeButtonSelector: '.close'
    };
})(jQuery);