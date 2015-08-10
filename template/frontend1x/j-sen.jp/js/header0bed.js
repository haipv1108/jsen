;
var JsenHeader = Class.create({
    initialize: function () {
        this.preload();
    },
    preload: function () {
        this.buildToggleLoginButton();
        this.buildHeaderLoginForm();
    },
    buildToggleLoginButton: function() {
        new Ajax.Updater('toggleLoginButton', '/sessions/toggle_button', { method: 'get' });
    },
    buildHeaderLoginForm: function() {
        new Ajax.Updater('headerLoginForm', '/sessions/sign_in_form_header?redirect_to=' + encodeURIComponent(location.href), { method: 'get' });
    },
    toggleLoginWindow: function () {
        var execute = $('loginWindow').visible() ? 'hide' : 'show';
        this[execute + 'LoginWindow']();
    },
    visibleLoginWindow: function () {
        return $('loginWindow').visible();
    },
    showLoginWindow: function () {
        $('loginWindow').appendChild($('loginWindowInner'));
        $('loginBtn').addClassName('open');
        if (navigator.userAgent.indexOf("MSIE 6") >= 0 || navigator.userAgent.indexOf("MSIE 7") >= 0) {
            $('loginWindow').show();
        } else {
            Effect.BlindDown('loginWindow', { duration: 1 });
        }
    },
    hideLoginWindow: function () {
        (function () { $('loginBtn').removeClassName('open'); }).delay(0.6);
        if (navigator.userAgent.indexOf("MSIE 6") >= 0 || navigator.userAgent.indexOf("MSIE 7") >= 0) {
            $('loginWindow').hide();
        } else {
            Effect.BlindUp('loginWindow', { duration: 1 });
        }
    }
});

var header = null;
document.observe('dom:loaded', function() { header = new JsenHeader(); });
