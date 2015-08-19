Lvs = {};

Lvs.ImageLazyLoader = Class.create({
    img : null,

    loaded: false,

    initialize: function(img) {
        this.img = $(img);
    },

    wasLoaded: function() {
        return this.loaded;
    },

    isBelowTheFold: function() {
        return document.viewport.getHeight() + document.viewport.getScrollOffsets().top <= this.img.cumulativeOffset().top;
    },

    isAboveTheTop: function() {
        return document.viewport.getScrollOffsets().top >= this.img.cumulativeOffset().top + this.img.height;
    },

    lazyload: function() {
        if (!this.wasLoaded()) { this.load(); }
    },

    load: function() {
        if (!this.isAboveTheTop() && !this.isBelowTheFold()) {
            this.doLoad.bind(this).delay(0.001);
        }
    },

    doLoad: function() {
        this.changeImgSrc.bind(this).delay(0.001);
        Event.observe(this.img, 'load', this.removeLoadingClassName.bindAsEventListener(this));
        this.loaded = true;
    },

    changeImgSrc: function () {
        jQuery(this.img).hide();
        this.img.src = this.img.attributes.getNamedItem('original').nodeValue;
        jQuery(this.img).fadeIn();
    },

    removeLoadingClassName: function () {
        this.img.removeClassName('loading');
    }
});

Lvs.ImageLoaderHandler = Class.create({
    className: null,

    objects: [],

    init: function() {
        this.initObjects();
        this.setObserver();
    },

    setClassName: function(className) {
        this.className = className;
    },

    initObjects: function() {
        this.getObjects().each(function(obj) { if (!obj.isBelowTheFold()) { obj.load(); } });
    },

    getObjects: function() {
        return this.objects.size() ? this.objects : this.createObjects();
    },

    createObjects: function() {
        this.objects = this.getImages().map(function(img) { return new Lvs.ImageLazyLoader(img); });
        return this.objects;
    },

    setObserver: function() {
        Event.observe(window, 'scroll', this.lazyload.bindAsEventListener(this));
    },

    getImages: function() {
        return $A(document.getElementsByClassName(this.className));
    },

    lazyload: function() {
        this.getObjects().each(function(obj) { obj.lazyload(); });
    }
});

Lvs.ImageLoaderHandlerModule = {
    getInstance: function() {
        if (this.instance === undefined) {
            this.instance = new this();
        }
        return this.instance;
    },

    register: function(className) {
        Event.observe(window, 'load', function() { this.init(className); }.bindAsEventListener(this));
    },

    init: function(className) {
        if (this.isNotIE6() && !Prototype.Browser.Opera) {
            this.initLazyLoad(className);
        } else {
            this.initNotLazyLoad(className);
        }
    },

    initLazyLoad: function(className) {
        var handler = this.getInstance();
        handler.setClassName(className);
        handler.init();
    },

    initNotLazyLoad: function(className) {
        var handler = this.getInstance();
        handler.setClassName(className);
        handler.getObjects().each(function(obj) { obj.doLoad(); });
    },

    isNotIE6: function() {
        return !Prototype.Browser.IE || (Prototype.Browser.IE && (typeof document.documentElement.style.maxHeight != "undefined"));
    }
};

Object.extend(Lvs.ImageLoaderHandler, Lvs.ImageLoaderHandlerModule);

Lvs.lazyLoadImage = function (className) {
    Lvs.ImageLoaderHandler.register(className);
};