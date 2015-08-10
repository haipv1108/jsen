var Lvs;

if (Lvs == undefined) {
    Lvs = {};
}

Lvs.SkipPagination = {};

Lvs.SkipPagination.Configure = {
    PAGE_BOX_SELECTOR: '.pageNaviBox, .searchPager',
    OBSERVER_SELECTOR: '.openSkipPaginationPopup',
    POPUP_SELECTOR:    '.skipPaginationPopup',
    MENU_WIDTH:        '160px'
};

Lvs.SkipPagination.Window = Class.create({
    initialize: function (elem, config) {
        this.elem = elem;
        this.elem.style.width = config.MENU_WIDTH;
        this.setEventListener();
    },

    setEventListener: function () {
        this.elem.observe('mouseover', this.show.bindAsEventListener(this));
        this.elem.observe('mouseout',  this.hide.bindAsEventListener(this));
    },

    show: function (e) {
        if (this.elem.visible()) {
            return;
        }
        this.updatePosition(e);
        this.elem.show();
    },

    hide: function (e) {
        if (!this.onThisElement(e)) {
            this.elem.hide();
        }
    },

    updatePosition: function (e) {
        this.updateLeft(e);
        this.updateTop(e);
    },

    updateLeft: function (e) {
        this.elem.style.left = this.getNewLeft(e) + 'px';
    },

    updateTop: function (e) {
        this.elem.style.top = this.getNewTop(e) + 'px';
    },

    getNewLeft: function (e) {
        var left  = document.viewport.getScrollOffsets().left + e.clientX;
        var width = Prototype.Browser.Opera ? document.body.clientWidth : document.viewport.getWidth();
        if (width - e.clientX < this.elem.getWidth()) {
            left -= this.elem.getWidth();
        }
        return left - Position.cumulativeOffset(this.elem.getOffsetParent()).left;
    },

    getNewTop: function (e) {
        var top    = document.viewport.getScrollOffsets().top + e.clientY;
        var height = Prototype.Browser.Opera ? document.body.clientHeight : document.viewport.getHeight();
        if (height - e.clientY < this.elem.getHeight()) {
            top -= this.elem.getHeight();
        }
        return top - Position.cumulativeOffset(this.elem.getOffsetParent()).top;
    },

    onThisElement: function (e) {
        var rect = this.elem.getClientRects()[0];
        return e.clientX >= rect.left && e.clientX <= rect.right && e.clientY >= rect.top && e.clientY <= rect.bottom;
    }
});

Lvs.SkipPagination.Observer = Class.create({
    initialize: function (elem, popup, config) {
        this.elem   = elem;
        this.popup  = popup;
        this.config = config;
        this.setEventListener();
    },

    setEventListener: function () {
        this.elem.observe('mouseover', this.open.bindAsEventListener(this));
        this.elem.observe('mouseout',  this.close.bindAsEventListener(this));
    },

    open: function (e) {
        this.popup.show(e);
    },

    close: function (e) {
        this.popup.hide(e);
    }
});

Lvs.SkipPagination.Utility = {
    createPopups: function (pageBox, config) {
        return pageBox.getElementsBySelector(config.POPUP_SELECTOR).map(function (elem) {
            return new Lvs.SkipPagination.Window(elem, config);
        });
    }
};

Lvs.SkipPagination.setup = function (options, selector) {
    if (options == undefined) {
        options = {};
    }
    var config = Object.extend(Object.clone(Lvs.SkipPagination.Configure), options);
    $$(config.PAGE_BOX_SELECTOR).each(function (elem) {
        var popups = Lvs.SkipPagination.Utility.createPopups(elem, config);
        elem.getElementsBySelector(config.OBSERVER_SELECTOR).each(function (observer) {
            popups.each(function (popup) {
                new Lvs.SkipPagination.Observer(observer, popup, config);
            });
        });
    });
};
