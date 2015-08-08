var Lvs;

if (Lvs == undefined) {
    Lvs = {};
}

Lvs.Favorite = {};

Lvs.Favorite.Configure = {
    COOKIE_KEY_NAME:   'favorite',

    ELEMENT_SELECTOR:  '.recommendFavoriteList',

    ADD_URL:           '/favorite/add',
    ADD_CLASS_NAME:    'kininaruList',
    ADD_INNER_HTML:    'キープする',
    ADD_MESSAGE:       '<div class="boxInn">\n<h2>キープしました</h2>\n<div class="inner">バイトのキープが完了いたしました。<br>ページ最上部右のボタンから確認ができます。</div>\n</div>',

    DELETE_URL:        '/favorite/delete',
    DELETE_CLASS_NAME: 'kininaruListDel',
    DELETE_INNER_HTML: 'キープから削除',
    DELETE_MESSAGE:    '<div class="boxInn">\n<h2>キープから削除</h2>\n<div class="inner">キープから削除いたしました。</div>\n</div>',

    LINK_CLASS_NAME: 'kininaruListLink',
    LINK_INNER_HTML: 'キープ中 キープリストへ',

    ADD_FINISH_CALLBACK: function (button) {},
    DEL_FINISH_CALLBACK: function (button) {},

    DEL_CLASS_REGEXP:  /Del/,
    LINK_CLASS_REGEXP: /Link/,

    NEED_INNER_HTML: true,
    IS_LINK:         false
};

Lvs.Favorite.Button = Class.create({
    pool: {},

    initialize: function (elem, state, config) {
        this.elem   = elem;
        this.state  = state;
        this.config = config;
        this.id     = this.elem.id.match(/h?\d+/)[0];
        this.params = new Hash({id: this.id});
        if (this.pool[this.id]) {
            this.pool[this.id].push(this);
        } else {
            this.pool[this.id] = [this];
        }
        if (elem.getAttribute('pattern')) {
            this.params.set('pattern', elem.getAttribute('pattern'));
        }
        this.setEventListener();
    },

    setEventListener: function () {
        $(this.elem.children[0]).observe('click', this.click.bindAsEventListener(this));
    },

    setState: function (state) {
        this.state = state;
    },

    click: function () {
        this.state.execute(this);
    },

    getPool: function() {
        return this.pool[this.id];
    },

    getQueryString: function () {
        return this.getParams().toQueryString();
    },

    getParams: function () {
        return this.params;
    },

    getId: function () {
        return this.id;
    },

    update: function () {
        this.elem.className = this.state.getClassName();
        if (this.config.NEED_INNER_HTML) {
            this.elem.children[0].innerHTML = this.state.getInnerHTML();
        }
    }
});

Lvs.Favorite.State = Class.create({
    initialize: function (strategy, config) {
        this.strategy = strategy;
        this.config   = config;
    },

    execute: function (button) {
        this.strategy.execute(this, button);
    },

    getUrl: function () {
        throw new Error();
    },

    getClassName: function () {
        throw new Error();
    },

    getMethodName: function () {
        throw new Error();
    },

    getInnerHTML: function () {
        throw new Error();
    },

    changeState: function (button) {
        throw new Error();
    },

    afterFinish: function (button) {
        throw new Error();
    },

    onSuccess: function (button) {
        var pool = button.getPool();
        for (var i = 0; i < pool.length; i++) {
            this.changeState(pool[i]);
            pool[i].update();
        };
        this.afterFinish(button);
        this.updateFavoriteNum();
        this.showMessage();
    },

    showMessage: function () {
        var elem = new Lvs.BookmarkBox().getBookmarkElement();
        this.updateBookmark(elem);
        var scrollable = new Lvs.Scrollable(elem);
        Element.blindDown(elem, {
            duration: 0.4,
            afterFinishInternal: function (effect) {
                Element.blindUp(effect.element, {
                    duration: 0.4,
                    delay: 1.5,
                    afterFinishInternal: function () {
                        Element.remove(elem);
                    }
                });

            }
        });
    },

    updateFavoriteNum: function() {
        var element = $$('#js-fixed-favorite-num');
        if (element.length) {
            var ajax = new Ajax.Request('../favorite/number/index.html',
                {
                    onSuccess: function(data) {
                        var obj = eval('json=' + data.responseText);
                        element[0].innerHTML = obj.count;
                    }
                }
            );
        }
    },

    updateBookmark: function(element) {
        var dustBoxName = 'dust';
        (this.getMethodName()=='add') ? Element.removeClassName(element, dustBoxName) : Element.addClassName(element, dustBoxName);
        Element.update(element, this.getMessage());
    },

    getMessage: function () {
        throw new Error();
    }
});

Lvs.Favorite.AddState = Class.create(Lvs.Favorite.State, {
    methodName: 'add',

    getUrl: function () {
        return this.config.ADD_URL;
    },

    getClassName: function () {
        return this.config.ADD_CLASS_NAME;
    },

    getMethodName: function () {
        return this.methodName;
    },

    getInnerHTML: function () {
        return this.config.ADD_INNER_HTML;
    },

    changeState: function (button) {
        if (this.config.IS_LINK) {
            button.setState(Lvs.Favorite.LinkState.getInstance(this.config));
        } else {
            button.setState(Lvs.Favorite.DeleteState.getInstance(this.config));
        }
    },

    afterFinish: function (button) {
        this.config.ADD_FINISH_CALLBACK(button);
    },

    getMessage: function () {
        return this.config.ADD_MESSAGE;
    }
});

Lvs.Favorite.DeleteState = Class.create(Lvs.Favorite.State, {
    methodName: 'remove',

    getUrl: function () {
        return this.config.DELETE_URL;
    },

    getClassName: function () {
        return this.config.DELETE_CLASS_NAME;
    },

    getMethodName: function () {
        return this.methodName;
    },

    getInnerHTML: function () {
        return this.config.DELETE_INNER_HTML;
    },

    changeState: function (button) {
        button.setState(Lvs.Favorite.AddState.getInstance(this.config));
    },

    afterFinish: function (button) {
        this.config.DEL_FINISH_CALLBACK(button);
    },

    getMessage: function () {
        return this.config.DELETE_MESSAGE;
    }
});

Lvs.Favorite.LinkState = Class.create(Lvs.Favorite.State, {
    methodName: 'link',

    getClassName: function () {
        return this.config.LINK_CLASS_NAME;
    },

    getMethodName: function () {
        return this.methodName;
    },

    getInnerHTML: function () {
        return this.config.LINK_INNER_HTML;
    },

    execute: function(button) {
        location.href = 'favorite.html';
    }
});

Lvs.getInstance = function (config) {
    if (this.configs == undefined) {
        this.configs = [];
        this.pool    = [];
    }
    if (!this.configs.include(config)) {
        this.configs.push(config);
    }
    var key = this.configs.indexOf(config);
    if (this.pool[key] == undefined) {
        this.pool[key] = new this(Lvs.FavoriteUpdaterFactory.create(config), config);
    }
    return this.pool[key];
};

Lvs.Favorite.AddState.getInstance    = Lvs.getInstance;
Lvs.Favorite.DeleteState.getInstance = Lvs.getInstance;
Lvs.Favorite.LinkState.getInstance   = Lvs.getInstance;

Lvs.Favorite.Updater = Class.create({
    initialize: function (config) {
        this.manager = new Lvs.Favorite.CookieManager(config.COOKIE_KEY_NAME);
    },

    execute: function (state, button) {
        throw new Error();
    }
});

Lvs.Favorite.ClientUpdater = Class.create(Lvs.Favorite.Updater, {
    execute: function (state, button) {
        this.manager[state.getMethodName()](button.getId());
        state.onSuccess(button);
    }
});

Lvs.Favorite.ServerUpdater = Class.create(Lvs.Favorite.Updater, {
    execute: function (state, button) {
        new Ajax.Request(state.getUrl(), {
            method: 'get',
            parameters: button.getQueryString(),
            onSuccess: function (response) { state.onSuccess(button); }.bind(this)
        });
    }
});

Lvs.FavoriteUpdaterFactory = {
    klass: Lvs.Favorite.ServerUpdater,

    setClass: function (klass) {
        this.klass = klass;
    },

    create: function (config) {
        return new this.klass(config);
    }
};

Lvs.Favorite.CookieManager = Class.create(Lvs.CookieManager, {
    initialize: function (key) {
        this.key = key;
    },

    set: function ($super, ids) {
        $super(ids.join(','));
    },

    get: function ($super) {
        return $A($super().split(',').filter(function (item) { return item != ''; }));
    },

    add: function (id) {
        var ids = this.get();
        if (!ids.include(id)) {
            ids.push(id);
        }
        this.set(ids);
    },

    remove: function (id) {
        var ids = this.get();
        if (ids.include(id)) {
            ids = ids.filter(function (otherId) { return otherId != id; });
        }
        this.set(ids);
    },

    getKey: function () {
        return this.key;
    }
});

Lvs.FavoriteUpdaterFactory.setClass(Lvs.Favorite.ServerUpdater);

Lvs.Favorite.init = function (options) {
    if (options == undefined) {
        options = {};
    }
    var config = Object.extend(Object.clone(Lvs.Favorite.Configure), options);

    $$(config.ELEMENT_SELECTOR).each(function (elem) {
        var state;
        switch (true) {
            case config.DEL_CLASS_REGEXP.test(elem.className):
                state = 'DeleteState';
                break;
            case config.LINK_CLASS_REGEXP.test(elem.className):
                state = 'LinkState';
                break;
            default:
                state = 'AddState';
                break;
        };
        new Lvs.Favorite.Button(elem, Lvs.Favorite[state].getInstance(config), config);
    });
};

Lvs.Scrollable = Class.create({
    initialize: function (elem) {
        this.elem = elem;
        this.elem.setStyle({top: this.elem.cumulativeScrollOffset().top + 'px'});
        Event.observe(window, 'scroll', this.scroll.bindAsEventListener(this));
    },

    scroll: function() {
        var top = (document.body.scrollTop||document.documentElement.scrollTop) + 0.1;
        this.elem.setStyle({ top: top + 'px' });
    }
});


Lvs.BookmarkBox = Class.create({
    createH2: function() {
        return new Element('h2');
    },

    createInnerDiv: function() {
        return new Element('div', {'class': 'inner'});
    },

    createBoxInnDiv: function() {
        return new Element('div', {'class': 'box_inn'}).update(this.createH2()).insert(this.createInnerDiv());
    },

    createBookmarkBoxDiv: function() {
        return new Element('div', {'class': 'dust', 'id': 'bookmarkBox', 'style': 'display:none'}).update(this.createBoxInnDiv());
    },

    getBookmarkElement: function() {
        var element = this.createBookmarkBoxDiv();
        this.setBody(element);
        return element;
    },

    setBody: function(element) {
        document.body.appendChild(element);
    }
});
