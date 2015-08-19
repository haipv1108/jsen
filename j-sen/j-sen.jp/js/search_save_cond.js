var Lvs = Lvs || {};

Lvs.SearchCondSaver = {};

/**
 *
 * @class Lvs.SearchCondSaver.Tooltip
 */
Lvs.SearchCondSaver.Tooltip = Class.create({

    /**
     * @type {Element}
     */
    tooltips: null,

    /**
     * @type {string}
     */
    query: null,

    /**
     * @type {Element}
     */
    element: null,

    /**
     * @type {Element}
     */
    tooltip: null,

    /**
     * @param {Element} tips
     * @param {Element} element
     * @constructor
     * @protected
     */
    initialize: function (tips, element) {
        tips.remove();
        document.body.insert(tips);
        tips.setStyle(this.getDefaultStyles());
        this.tooltips = tips;
        this.query = element.id.replace(/__anchor__/, '');
        this.element = element;
        this.tooltip = $('__tooltip__' + this.query);
        this.setEventListener();
    },

    /**
     * @protected
     */
    show: function (e) {
        this.tooltip.show();
        this.tooltips.show();
        this.tooltips.setStyle({
            top: e.pointerY() - this.tooltips.offsetHeight - 10 + 'px',
            left: e.pointerX() - 95 + 'px',
            zIndex: 2000,
            opacity: '1.0',
            filter: 'progid:DXImageTransform.Microsoft.Alpha(opacity=100)'
        });
    },

    /**
     * @protected
     */
    hide: function () {
        this.tooltips.setStyle(this.getDefaultStyles());
        this.tooltip.hide();
        this.tooltips.hide();
    },

    /**
     * @private
     */
    setEventListener: function () {
        this.element.observe('mousemove', this.show.bindAsEventListener(this));
        this.element.observe('mouseout', this.hide.bindAsEventListener(this));
    },

    /**
     * @private
     */
    getDefaultStyles: function () {
        return {
            top: '0px',
            left: '0px',
            position: 'absolute',
            zIndex: 0,
            opacity: '0.0',
            filter: 'progid:DXImageTransform.Microsoft.Alpha(opacity=0)'
        };
    }
});