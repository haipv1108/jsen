var Lvs = Lvs || {};

Lvs.EntryTrackingPusherForSearch = {};

Lvs.EntryTrackingPusherForSearch.pushTrackEvent = function(name, eventType, value) {
    ga('send', 'event', name, eventType, value);
};

Lvs.EntryTrackingPusherForSearch.Index = Class.create({
    initialize: function() {
        this.setupOfferNameAnchor();
        this.setupOfferPrAnchor();
        this.setupOfferImageAnchor();
        this.setupFavoriteOrDetailButton();
    },
    setupOfferNameAnchor: function() {
        $$('div[class=searchResultBox] h2[class=clearfix] a').each(function(elm) {
            elm.observe('click', function(ev) {
                Lvs.EntryTrackingPusherForSearch.pushTrackEvent('detail', 'click', 'to_detail');
            });
        });
    },
    setupOfferPrAnchor: function() {
        $$('div[class=searchResultBox] div[class=lead clearfix] p[class=txt clearfix] a').each(function(elm) {
            elm.observe('click', function(ev) {
                Lvs.EntryTrackingPusherForSearch.pushTrackEvent('detail', 'click', 'to_detail');
            });
        });
    },
    setupOfferImageAnchor: function() {
        $$('div[class=searchResultBox] div[class=info] div[class=detail clearfix] div[class=photoArea] div[class=photo] a').each(function(elm) {
            elm.observe('click', function(ev) {
                Lvs.EntryTrackingPusherForSearch.pushTrackEvent('detail', 'click', 'to_detail');
            });
        });
    },
    setupFavoriteOrDetailButton: function() {
        $$('div[class=searchResultBox] div[class=info] div[class=btnArea clearfix] ul').each(function(elm) {
            elm.observe('click', function(ev) {
                var clickedElm = ev.element();
                if (clickedElm.match('a.btnShowdetail')) {
                    Lvs.EntryTrackingPusherForSearch.pushTrackEvent('detail', 'click', 'to_detail');
                } else if (clickedElm.match('a[href="javascript:void 0;"]')) {
                    Lvs.EntryTrackingPusherForSearch.pushTrackEvent('favorite', 'button', 'favorite_from_result');
                }
            });
        });
    }
});

Event.observe(window, 'load', function(ev) {
    new Lvs.EntryTrackingPusherForSearch.Index();
});
