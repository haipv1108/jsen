var Lvs;

if (Lvs == undefined) {
    Lvs = {};
}

Lvs.EasySearch = {};

Lvs.EasySearch.Configure = {
    PREF_SELECT_ID: 'area3_1',
    CITY_SELECT_ID: 'area3_2',
    GET_CITY_URL: '/api/get_city'
};

Lvs.EasySearch.Mediator = Class.create({
    initialize: function () {
    },

    setPrefSelector: function (prefSelector) {
        this.prefSelector = prefSelector;
    },

    setCitySelector: function (citySelector) {
        this.citySelector = citySelector;
    },

    updateCity: function (items) {
        if (this.citySelector) {
            this.citySelector.update(items);
        } else {
            throw new Error();
        }
    }
});

Lvs.EasySearch.Selector = Class.create({
    initialize: function (elem, mediator, config) {
        this.elem     = elem;
        this.mediator = mediator;
        this.config   = config;
        this.setEventListener();
    },

    setEventListener: function () {
        this.elem.observe('change', this.change.bindAsEventListener(this));
    },

    change: function () {
        throw new Error();
    },

    update :function (items) {
        this.clear();
        this.addOptions(items);
        if (items.size() == 0) {
            this.addOption('▼選択して下さい', null);
        }
        this.elem.disabled = items.size() == 0;
    },

    clear: function () {
        $A(this.elem.options).each(function (c) { $(c).remove(); });
    },

    addOptions: function (items) {
        $A(items).each(function (item) {
            this.addOption(item.name, item.id);
        }.bind(this));
    },

    addOption: function (name, value) {
        var option = new Option(name, value);
        option.innerText = name;
        this.elem.appendChild(option);
    }
});

Lvs.EasySearch.PrefSelector = Class.create(Lvs.EasySearch.Selector, {
    initialize: function ($super, elem, mediator, config) {
        $super(elem, mediator, config);
        mediator.setPrefSelector(this);
    },

    change: function () {
        new Ajax.Request(this.config.get('GET_CITY_URL'), {
            method:     'get',
            parameters: 'id=' + this.elem.value,
            onSuccess:  this.onSuccess.bind(this)
        });
    },

    onSuccess: function (response) {
        this.mediator.updateCity(response.responseJSON);
    }
});

Lvs.EasySearch.CitySelector = Class.create(Lvs.EasySearch.Selector, {
    initialize: function ($super, elem, mediator, config) {
        $super(elem, mediator, config);
        mediator.setCitySelector(this);
    },

    change: function () {
    }
});


Lvs.EasySearch.init = function (options) {
    if (options == undefined) {
        options = {};
    }
    var config = $H(Lvs.EasySearch.Configure).merge(options);
    var mediator = new Lvs.EasySearch.Mediator();
    var prefSelectBox = $(config.get('PREF_SELECT_ID'));
    var citySelectBox = $(config.get('CITY_SELECT_ID'));
    if (!prefSelectBox || !citySelectBox) {
        return;
    }
    new Lvs.EasySearch.PrefSelector(prefSelectBox, mediator, config);
    new Lvs.EasySearch.CitySelector(citySelectBox, mediator, config);
}

Event.observe(window, 'load', Lvs.EasySearch.init);