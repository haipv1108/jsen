if (Lvs == undefined) {
    var Lvs = {};
}

if (Lvs.Guide == undefined) {
    Lvs.Guide = {};
}

Lvs.Guide.Checkbox = Class.create({
    initialize: function (elem, mediator) {
        this.elem     = elem;
        this.mediator = mediator;
        this.setEventListener();
    },

    setEventListener: function () {
        this.elem.observe('click', this.click.bindAsEventListener(this));
    },

    click: function () {
        this.mediator.updateAll(this);
    },

    check: function (checked) {
        this.elem.checked = checked;
    },

    checked: function () {
        return this.elem.checked;
    },

    getValue: function () {
        return this.elem.value;
    },

    update: function (disable) {
        throw new Error('Not Implementation Error');
    }
});

Lvs.Guide.CheckboxMediator = Class.create({
    initialize: function (mgr) {
        this.mgr  = mgr;
        this.hash = new Hash();
        this.checkboxes = [];
    },

    add: function (checkbox) {
        this.hash.set(checkbox.getValue(), checkbox);
        this.checkboxes.push(checkbox);
    },

    countIfChecked: function () {
        return this.checkboxes.filter(function (checkbox) {
            return checkbox.checked();
        }).size();
    },

    checkedAll: function () {
        return this.checkboxes.all(function (checkbox) {
            return checkbox.checked();
        });
    },

    checkedAny: function () {
        return this.checkboxes.any(function (checkbox) {
            return checkbox.checked();
        });
    },

    checkAll: function (checked) {
        this.checkboxes.each(function (checkbox) {
            checkbox.check(checked);
        });
    },

    updateAll: function (checkbox) {
        throw new Error('Not Implementation Error');
    },

    update: function (checkbox) {
        throw new Error('Not Implementation Error');
    },

    updateCheckbox: function (checkbox) {
        var other = this.hash.get(checkbox.getValue());
        if (other != undefined) {
            other.check(checkbox.checked());
        }
    }
});

Lvs.Guide.CheckboxMediatorManager = Class.create({
    initialize: function () {
        this.mediators = [];
    },

    add: function (mediator) {
        this.mediators.push(mediator);
    },

    update: function (checkbox) {
        this.mediators.each(function (mediator) {
            mediator.updateCheckbox(checkbox);
            mediator.update(checkbox);
        });
    },

    each: function (iterator) {
        this.mediators.each(iterator);
    }
});

Lvs.Guide.LimitedCheckbox = Class.create(Lvs.Guide.Checkbox, {
    update: function (value) {
        if (!this.checked()) {
            this.elem.disabled = value;
        }
    }
});

Lvs.Guide.LimitedCheckboxMediator = Class.create(Lvs.Guide.CheckboxMediator, {
    initialize: function ($super, mgr, limit) {
        $super(mgr);
        this.limit = limit;
    },

    updateAll: function (checkbox) {
        this.update(checkbox);
    },

    update: function (checkbox) {
        var disable = this.countIfChecked() >= this.limit;
        this.checkboxes.each(function (checkbox) {
            checkbox.update(disable);
        });
    }
});

Lvs.Guide.ParentCheckbox = Class.create(Lvs.Guide.Checkbox, {
    update: function () {
    }
});

Lvs.Guide.ChildCheckbox = Class.create(Lvs.Guide.Checkbox, {
    update: function () {
    }
});

Lvs.Guide.FamilyCheckboxMediator = Class.create(Lvs.Guide.CheckboxMediator, {
    initialize: function ($super, mgr, elem) {
        $super(mgr);
        this.parent = new Lvs.Guide.ParentCheckbox(elem, this);
    },

    updateAll: function (checkbox) {
        this.update(checkbox);
    },

    update: function (checkbox) {
        if (checkbox instanceof Lvs.Guide.ParentCheckbox) {
            this.checkAll(this.parent.checked());
            this.checkboxes.each(function (c) {
                this.mgr.update(c);
            }.bind(this));
        } else {
            this.mgr.each(function (mediator) {
                mediator.updateCheckbox(checkbox);
                mediator.parent.check(mediator.checkedAll());
            });
            this.parent.check(this.checkedAll());
        }
    },

    checkSelectLine: function () {
        var elem = $('selectLine' + this.parent.getValue());
        if (elem == undefined) {
            return;
        }
        elem.checked = this.parent.checked() || this.checkedAny();
    }
});

Lvs.Guide.initLimitCheckboxes = function (selector, limit) {
    Event.observe(window, 'load', function () {
        var mgr = new Lvs.Guide.CheckboxMediatorManager();
        var mediator = new Lvs.Guide.LimitedCheckboxMediator(mgr, limit);
        $$(selector).each(function (elem) {
            mediator.add(new Lvs.Guide.LimitedCheckbox(elem, mediator));
        });
    });
}

Lvs.Guide.Form = Class.create({
    initialize: function (elem, mgr) {
        this.elem = elem;
        this.mgr  = mgr;
        this.setEventListener();
    },

    setEventListener: function () {
        this.elem.observe('submit', this.submit.bindAsEventListener(this));
    },

    submit: function () {
        this.mgr.each(function (mediator) {
            if (mediator.checkedAll()) {
                mediator.checkAll(false);
            }
            mediator.checkSelectLine();
        });
    }
});

Lvs.Guide.initFamilyCheckboxes = function (selector, formId) {
    Event.observe(window, 'load', function () {
        var mgr = new Lvs.Guide.CheckboxMediatorManager();
        $$(selector).each(function (parent) {
            var mediator = new Lvs.Guide.FamilyCheckboxMediator(mgr, parent);
            var id = parent.id.match(/\d+/)[0];
            $$('.childCheckbox' + id).each(function (child) {
                mediator.add(new Lvs.Guide.ChildCheckbox(child, mediator));
            });
            mgr.add(mediator);
        });
        new Lvs.Guide.Form($('searchForm'), mgr);
    });
}

Lvs.Guide.alert = function (elems, word) {
    var checkedAny = $A(elems).any(function (elem) { return elem.checked; });
    if (!checkedAny) {
        alert(word + 'を選択してください');
    }
    return checkedAny;
}