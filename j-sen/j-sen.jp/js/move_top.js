var Lvs;

if (Lvs == undefined) {
    Lvs = {};
}

Lvs.Cookie = {
    Area: {}
};

Lvs.Cookie.Area.clear = function () {
    var areaCookie = new (Class.create(Lvs.CookieManager, {
        getKey: function () { return 'Jsen_area'; }
    }));
    areaCookie.remove();
};

Lvs.Cookie.Area.setupMoveTop = function (expr) {
    $A($$(expr)).each(function (elem) { $(elem).observe('click', Lvs.Cookie.Area.clear); });
};