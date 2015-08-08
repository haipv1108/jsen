var Lvs;

if (Lvs == undefined) {
    Lvs = {};
}

Lvs.CookieManager = Class.create({
    lifetime: 1000 * 60 * 60 * 24 * 7 * 2,

    set: function (value, expires) {
        var expires = (expires == undefined) ? this.getExpires() : expires;
        document.cookie = this.getKey() + '=' + value + ';expires=' + expires + ';path=/;';
    },

    get: function () {
        var cookie = $A(unescape(document.cookie).split('; ')).find(function (item) {
            return item.split('=')[0] == this.getKey();
        }.bind(this));
        return (cookie != undefined && cookie.split('=').size() > 1) ? cookie.split('=')[1] : '';
    },

    getExpires: function () {
        var date = new Date();
        date.setTime(date.getTime() + this.lifetime);
        return date.toGMTString();
    },

    remove: function () {
        this.set('', new Date().toGMTString());
    },

    getKey: function () {
        throw new Error();
    }
});
