/*!
 * Bootstrap Colorpicker v2.4.0
 * https://itsjavi.com/bootstrap-colorpicker/
 */
! function(a) {
    var b = "undefined" == typeof window ? this : window;
    "object" == typeof exports ? module.exports = a(b.jQuery, b) : "function" == typeof define && define.amd ? define(["jquery"], function(c) {
        return a(c, b)
    }) : b.jQuery && !b.jQuery.fn.colorpicker && a(b.jQuery, b)
}(function(a, b) {
    "use strict";
    var c = a,
        d = function(a, b, e, f) {
            this.fallbackValue = e ? e && "undefined" != typeof e.h ? e : this.value = {
                h: 0,
                s: 0,
                b: 0,
                a: 1
            } : null, this.fallbackFormat = f ? f : "rgba", this.value = this.fallbackValue, this.origFormat = null, this.predefinedColors = b ? b : {}, this.colors = c.extend({}, d.webColors, this.predefinedColors), a && ("undefined" != typeof a.h ? this.value = a : this.setColor(String(a))), this.value || (this.value = {
                h: 0,
                s: 0,
                b: 0,
                a: 1
            })
        };
    d.webColors = {
        aliceblue: "#f0f8ff",
        antiquewhite: "#faebd7",
        aqua: "#00ffff",
        aquamarine: "#7fffd4",
        azure: "#f0ffff",
        beige: "#f5f5dc",
        bisque: "#ffe4c4",
        black: "#000000",
        blanchedalmond: "#ffebcd",
        blue: "#0000ff",
        blueviolet: "#8a2be2",
        brown: "#a52a2a",
        burlywood: "#deb887",
        cadetblue: "#5f9ea0",
        chartreuse: "#7fff00",
        chocolate: "#d2691e",
        coral: "#ff7f50",
        cornflowerblue: "#6495ed",
        cornsilk: "#fff8dc",
        crimson: "#dc143c",
        cyan: "#00ffff",
        darkblue: "#00008b",
        darkcyan: "#008b8b",
        darkgoldenrod: "#b8860b",
        darkgray: "#a9a9a9",
        darkgreen: "#006400",
        darkkhaki: "#bdb76b",
        darkmagenta: "#8b008b",
        darkolivegreen: "#556b2f",
        darkorange: "#ff8c00",
        darkorchid: "#9932cc",
        darkred: "#8b0000",
        darksalmon: "#e9967a",
        darkseagreen: "#8fbc8f",
        darkslateblue: "#483d8b",
        darkslategray: "#2f4f4f",
        darkturquoise: "#00ced1",
        darkviolet: "#9400d3",
        deeppink: "#ff1493",
        deepskyblue: "#00bfff",
        dimgray: "#696969",
        dodgerblue: "#1e90ff",
        firebrick: "#b22222",
        floralwhite: "#fffaf0",
        forestgreen: "#228b22",
        fuchsia: "#ff00ff",
        gainsboro: "#dcdcdc",
        ghostwhite: "#f8f8ff",
        gold: "#ffd700",
        goldenrod: "#daa520",
        gray: "#808080",
        green: "#008000",
        greenyellow: "#adff2f",
        honeydew: "#f0fff0",
        hotpink: "#ff69b4",
        indianred: "#cd5c5c",
        indigo: "#4b0082",
        ivory: "#fffff0",
        khaki: "#f0e68c",
        lavender: "#e6e6fa",
        lavenderblush: "#fff0f5",
        lawngreen: "#7cfc00",
        lemonchiffon: "#fffacd",
        lightblue: "#add8e6",
        lightcoral: "#f08080",
        lightcyan: "#e0ffff",
        lightgoldenrodyellow: "#fafad2",
        lightgrey: "#d3d3d3",
        lightgreen: "#90ee90",
        lightpink: "#ffb6c1",
        lightsalmon: "#ffa07a",
        lightseagreen: "#20b2aa",
        lightskyblue: "#87cefa",
        lightslategray: "#778899",
        lightsteelblue: "#b0c4de",
        lightyellow: "#ffffe0",
        lime: "#00ff00",
        limegreen: "#32cd32",
        linen: "#faf0e6",
        magenta: "#ff00ff",
        maroon: "#800000",
        mediumaquamarine: "#66cdaa",
        mediumblue: "#0000cd",
        mediumorchid: "#ba55d3",
        mediumpurple: "#9370d8",
        mediumseagreen: "#3cb371",
        mediumslateblue: "#7b68ee",
        mediumspringgreen: "#00fa9a",
        mediumturquoise: "#48d1cc",
        mediumvioletred: "#c71585",
        midnightblue: "#191970",
        mintcream: "#f5fffa",
        mistyrose: "#ffe4e1",
        moccasin: "#ffe4b5",
        navajowhite: "#ffdead",
        navy: "#000080",
        oldlace: "#fdf5e6",
        olive: "#808000",
        olivedrab: "#6b8e23",
        orange: "#ffa500",
        orangered: "#ff4500",
        orchid: "#da70d6",
        palegoldenrod: "#eee8aa",
        palegreen: "#98fb98",
        paleturquoise: "#afeeee",
        palevioletred: "#d87093",
        papayawhip: "#ffefd5",
        peachpuff: "#ffdab9",
        peru: "#cd853f",
        pink: "#ffc0cb",
        plum: "#dda0dd",
        powderblue: "#b0e0e6",
        purple: "#800080",
        red: "#ff0000",
        rosybrown: "#bc8f8f",
        royalblue: "#4169e1",
        saddlebrown: "#8b4513",
        salmon: "#fa8072",
        sandybrown: "#f4a460",
        seagreen: "#2e8b57",
        seashell: "#fff5ee",
        sienna: "#a0522d",
        silver: "#c0c0c0",
        skyblue: "#87ceeb",
        slateblue: "#6a5acd",
        slategray: "#708090",
        snow: "#fffafa",
        springgreen: "#00ff7f",
        steelblue: "#4682b4",
        tan: "#d2b48c",
        teal: "#008080",
        thistle: "#d8bfd8",
        tomato: "#ff6347",
        turquoise: "#40e0d0",
        violet: "#ee82ee",
        wheat: "#f5deb3",
        white: "#ffffff",
        whitesmoke: "#f5f5f5",
        yellow: "#ffff00",
        yellowgreen: "#9acd32",
        transparent: "transparent"
    }, d.prototype = {
        constructor: d,
        colors: {},
        predefinedColors: {},
        getValue: function() {
            return this.value
        },
        setValue: function(a) {
            this.value = a
        },
        _sanitizeNumber: function(a) {
            return "number" == typeof a ? a : isNaN(a) || null === a || "" === a || void 0 === a ? 1 : "" === a ? 0 : "undefined" != typeof a.toLowerCase ? (a.match(/^\./) && (a = "0" + a), Math.ceil(100 * parseFloat(a)) / 100) : 1
        },
        isTransparent: function(a) {
            return !(!a || !("string" == typeof a || a instanceof String)) && (a = a.toLowerCase().trim(), "transparent" === a || a.match(/#?00000000/) || a.match(/(rgba|hsla)\(0,0,0,0?\.?0\)/))
        },
        rgbaIsTransparent: function(a) {
            return 0 === a.r && 0 === a.g && 0 === a.b && 0 === a.a
        },
        setColor: function(a) {
            if (a = a.toLowerCase().trim()) {
                if (this.isTransparent(a)) return this.value = {
                    h: 0,
                    s: 0,
                    b: 0,
                    a: 0
                }, !0;
                var b = this.parse(a);
                b ? (this.value = this.value = {
                    h: b.h,
                    s: b.s,
                    b: b.b,
                    a: b.a
                }, this.origFormat || (this.origFormat = b.format)) : this.fallbackValue && (this.value = this.fallbackValue)
            }
            return !1
        },
        setHue: function(a) {
            this.value.h = 1 - a
        },
        setSaturation: function(a) {
            this.value.s = a
        },
        setBrightness: function(a) {
            this.value.b = 1 - a
        },
        setAlpha: function(a) {
            this.value.a = Math.round(parseInt(100 * (1 - a), 10) / 100 * 100) / 100
        },
        toRGB: function(a, b, c, d) {
            0 === arguments.length && (a = this.value.h, b = this.value.s, c = this.value.b, d = this.value.a), a *= 360;
            var e, f, g, h, i;
            return a = a % 360 / 60, i = c * b, h = i * (1 - Math.abs(a % 2 - 1)), e = f = g = c - i, a = ~~a, e += [i, h, 0, 0, h, i][a], f += [h, i, i, h, 0, 0][a], g += [0, 0, h, i, i, h][a], {
                r: Math.round(255 * e),
                g: Math.round(255 * f),
                b: Math.round(255 * g),
                a: d
            }
        },
        toHex: function(a, b, c, d) {
            0 === arguments.length && (a = this.value.h, b = this.value.s, c = this.value.b, d = this.value.a);
            var e = this.toRGB(a, b, c, d);
            return this.rgbaIsTransparent(e) ? "transparent" : "#" + ((1 << 24) + (parseInt(e.r) << 16) + (parseInt(e.g) << 8) + parseInt(e.b)).toString(16).slice(1)
        },
        toHSL: function(a, b, c, d) {
            0 === arguments.length && (a = this.value.h, b = this.value.s, c = this.value.b, d = this.value.a);
            var e = a,
                f = (2 - b) * c,
                g = b * c;
            return g /= f > 0 && f <= 1 ? f : 2 - f, f /= 2, g > 1 && (g = 1), {
                h: isNaN(e) ? 0 : e,
                s: isNaN(g) ? 0 : g,
                l: isNaN(f) ? 0 : f,
                a: isNaN(d) ? 0 : d
            }
        },
        toAlias: function(a, b, c, d) {
            var e, f = 0 === arguments.length ? this.toHex() : this.toHex(a, b, c, d),
                g = "alias" === this.origFormat ? f : this.toString(this.origFormat, !1);
            for (var h in this.colors)
                if (e = this.colors[h].toLowerCase().trim(), e === f || e === g) return h;
            return !1
        },
        RGBtoHSB: function(a, b, c, d) {
            a /= 255, b /= 255, c /= 255;
            var e, f, g, h;
            return g = Math.max(a, b, c), h = g - Math.min(a, b, c), e = 0 === h ? null : g === a ? (b - c) / h : g === b ? (c - a) / h + 2 : (a - b) / h + 4, e = (e + 360) % 6 * 60 / 360, f = 0 === h ? 0 : h / g, {
                h: this._sanitizeNumber(e),
                s: f,
                b: g,
                a: this._sanitizeNumber(d)
            }
        },
        HueToRGB: function(a, b, c) {
            return c < 0 ? c += 1 : c > 1 && (c -= 1), 6 * c < 1 ? a + (b - a) * c * 6 : 2 * c < 1 ? b : 3 * c < 2 ? a + (b - a) * (2 / 3 - c) * 6 : a
        },
        HSLtoRGB: function(a, b, c, d) {
            b < 0 && (b = 0);
            var e;
            e = c <= .5 ? c * (1 + b) : c + b - c * b;
            var f = 2 * c - e,
                g = a + 1 / 3,
                h = a,
                i = a - 1 / 3,
                j = Math.round(255 * this.HueToRGB(f, e, g)),
                k = Math.round(255 * this.HueToRGB(f, e, h)),
                l = Math.round(255 * this.HueToRGB(f, e, i));
            return [j, k, l, this._sanitizeNumber(d)]
        },
        parse: function(a) {
            if (0 === arguments.length) return !1;
            var b, d, e = this,
                f = !1,
                g = "undefined" != typeof this.colors[a];
            return g && (a = this.colors[a].toLowerCase().trim()), c.each(this.stringParsers, function(c, h) {
                var i = h.re.exec(a);
                return b = i && h.parse.apply(e, [i]), !b || (f = {}, d = g ? "alias" : h.format ? h.format : e.getValidFallbackFormat(), f = d.match(/hsla?/) ? e.RGBtoHSB.apply(e, e.HSLtoRGB.apply(e, b)) : e.RGBtoHSB.apply(e, b), f instanceof Object && (f.format = d), !1)
            }), f
        },
        getValidFallbackFormat: function() {
            var a = ["rgba", "rgb", "hex", "hsla", "hsl"];
            return this.origFormat && a.indexOf(this.origFormat) !== -1 ? this.origFormat : this.fallbackFormat && a.indexOf(this.fallbackFormat) !== -1 ? this.fallbackFormat : "rgba"
        },
        toString: function(a, b) {
            a = a || this.origFormat || this.fallbackFormat, b = b || !1;
            var c = !1;
            switch (a) {
                case "rgb":
                    return c = this.toRGB(), this.rgbaIsTransparent(c) ? "transparent" : "rgb(" + c.r + "," + c.g + "," + c.b + ")";
                case "rgba":
                    return c = this.toRGB(), "rgba(" + c.r + "," + c.g + "," + c.b + "," + c.a + ")";
                case "hsl":
                    return c = this.toHSL(), "hsl(" + Math.round(360 * c.h) + "," + Math.round(100 * c.s) + "%," + Math.round(100 * c.l) + "%)";
                case "hsla":
                    return c = this.toHSL(), "hsla(" + Math.round(360 * c.h) + "," + Math.round(100 * c.s) + "%," + Math.round(100 * c.l) + "%," + c.a + ")";
                case "hex":
                    return this.toHex();
                case "alias":
                    return c = this.toAlias(), c === !1 ? this.toString(this.getValidFallbackFormat()) : b && !(c in d.webColors) && c in this.predefinedColors ? this.predefinedColors[c] : c;
                default:
                    return c
            }
        },
        stringParsers: [{
            re: /rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*?\)/,
            format: "rgb",
            parse: function(a) {
                return [a[1], a[2], a[3], 1]
            }
        }, {
            re: /rgb\(\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*?\)/,
            format: "rgb",
            parse: function(a) {
                return [2.55 * a[1], 2.55 * a[2], 2.55 * a[3], 1]
            }
        }, {
            re: /rgba\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*(?:,\s*(\d*(?:\.\d+)?)\s*)?\)/,
            format: "rgba",
            parse: function(a) {
                return [a[1], a[2], a[3], a[4]]
            }
        }, {
            re: /rgba\(\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*(?:,\s*(\d*(?:\.\d+)?)\s*)?\)/,
            format: "rgba",
            parse: function(a) {
                return [2.55 * a[1], 2.55 * a[2], 2.55 * a[3], a[4]]
            }
        }, {
            re: /hsl\(\s*(\d*(?:\.\d+)?)\s*,\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*?\)/,
            format: "hsl",
            parse: function(a) {
                return [a[1] / 360, a[2] / 100, a[3] / 100, a[4]]
            }
        }, {
            re: /hsla\(\s*(\d*(?:\.\d+)?)\s*,\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*(?:,\s*(\d*(?:\.\d+)?)\s*)?\)/,
            format: "hsla",
            parse: function(a) {
                return [a[1] / 360, a[2] / 100, a[3] / 100, a[4]]
            }
        }, {
            re: /#?([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/,
            format: "hex",
            parse: function(a) {
                return [parseInt(a[1], 16), parseInt(a[2], 16), parseInt(a[3], 16), 1]
            }
        }, {
            re: /#?([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/,
            format: "hex",
            parse: function(a) {
                return [parseInt(a[1] + a[1], 16), parseInt(a[2] + a[2], 16), parseInt(a[3] + a[3], 16), 1]
            }
        }],
        colorNameToHex: function(a) {
            return "undefined" != typeof this.colors[a.toLowerCase()] && this.colors[a.toLowerCase()]
        }
    };
    var e = {
            horizontal: !1,
            inline: !1,
            color: !1,
            format: !1,
            input: "input",
            container: !1,
            component: ".add-on, .input-group-addon",
            fallbackColor: !1,
            fallbackFormat: "hex",
            sliders: {
                saturation: {
                    maxLeft: 100,
                    maxTop: 100,
                    callLeft: "setSaturation",
                    callTop: "setBrightness"
                },
                hue: {
                    maxLeft: 0,
                    maxTop: 100,
                    callLeft: !1,
                    callTop: "setHue"
                },
                alpha: {
                    maxLeft: 0,
                    maxTop: 100,
                    callLeft: !1,
                    callTop: "setAlpha"
                }
            },
            slidersHorz: {
                saturation: {
                    maxLeft: 100,
                    maxTop: 100,
                    callLeft: "setSaturation",
                    callTop: "setBrightness"
                },
                hue: {
                    maxLeft: 100,
                    maxTop: 0,
                    callLeft: "setHue",
                    callTop: !1
                },
                alpha: {
                    maxLeft: 100,
                    maxTop: 0,
                    callLeft: "setAlpha",
                    callTop: !1
                }
            },
            template: '<div class="colorpicker dropdown-menu"><div class="colorpicker-saturation"><i><b></b></i></div><div class="colorpicker-hue"><i></i></div><div class="colorpicker-alpha"><i></i></div><div class="colorpicker-color"><div /></div><div class="colorpicker-selectors"></div></div>',
            align: "right",
            customClass: null,
            colorSelectors: null
        },
        f = function(a, b) {
            this.element = c(a).addClass("colorpicker-element"), this.options = c.extend(!0, {}, e, this.element.data(), b), this.component = this.options.component, this.component = this.component !== !1 && this.element.find(this.component), this.component && 0 === this.component.length && (this.component = !1), this.container = this.options.container === !0 ? this.element : this.options.container, this.container = this.container !== !1 && c(this.container), this.input = this.element.is("input") ? this.element : !!this.options.input && this.element.find(this.options.input), this.input && 0 === this.input.length && (this.input = !1), this.color = this.createColor(this.options.color !== !1 ? this.options.color : this.getValue()), this.format = this.options.format !== !1 ? this.options.format : this.color.origFormat, this.options.color !== !1 && (this.updateInput(this.color), this.updateData(this.color));
            var d = this.picker = c(this.options.template);
            if (this.options.customClass && d.addClass(this.options.customClass), this.options.inline ? d.addClass("colorpicker-inline colorpicker-visible") : d.addClass("colorpicker-hidden"), this.options.horizontal && d.addClass("colorpicker-horizontal"), ["rgba", "hsla", "alias"].indexOf(this.format) === -1 && this.options.format !== !1 && "transparent" !== this.getValue() || d.addClass("colorpicker-with-alpha"), "right" === this.options.align && d.addClass("colorpicker-right"), this.options.inline === !0 && d.addClass("colorpicker-no-arrow"), this.options.colorSelectors) {
                var f = this,
                    g = f.picker.find(".colorpicker-selectors");
                g.length > 0 && (c.each(this.options.colorSelectors, function(a, b) {
                    var d = c("<i />").addClass("colorpicker-selectors-color").css("background-color", b).data("class", a).data("alias", a);
                    d.on("click.colorpicker touchend.colorpicker", function() {
                        f.setValue("alias" === f.format ? c(this).data("alias") : c(this).css("background-color"))
                    }), g.append(d)
                }), g.show().addClass("colorpicker-visible"))
            }
            d.on("mousedown.colorpicker touchstart.colorpicker", c.proxy(function(a) {
                a.target === a.currentTarget && a.preventDefault()
            }, this)), d.find(".colorpicker-saturation, .colorpicker-hue, .colorpicker-alpha").on("mousedown.colorpicker touchstart.colorpicker", c.proxy(this.mousedown, this)), d.appendTo(this.container ? this.container : c("body")), this.input !== !1 && (this.input.on({
                "keyup.colorpicker": c.proxy(this.keyup, this)
            }), this.input.on({
                "change.colorpicker": c.proxy(this.change, this)
            }), this.component === !1 && this.element.on({
                "focus.colorpicker": c.proxy(this.show, this)
            }), this.options.inline === !1 && this.element.on({
                "focusout.colorpicker": c.proxy(this.hide, this)
            })), this.component !== !1 && this.component.on({
                "click.colorpicker": c.proxy(this.show, this)
            }), this.input === !1 && this.component === !1 && this.element.on({
                "click.colorpicker": c.proxy(this.show, this)
            }), this.input !== !1 && this.component !== !1 && "color" === this.input.attr("type") && this.input.on({
                "click.colorpicker": c.proxy(this.show, this),
                "focus.colorpicker": c.proxy(this.show, this)
            }), this.update(), c(c.proxy(function() {
                this.element.trigger("create")
            }, this))
        };
    f.Color = d, f.prototype = {
        constructor: f,
        destroy: function() {
            this.picker.remove(), this.element.removeData("colorpicker", "color").off(".colorpicker"), this.input !== !1 && this.input.off(".colorpicker"), this.component !== !1 && this.component.off(".colorpicker"), this.element.removeClass("colorpicker-element"), this.element.trigger({
                type: "destroy"
            })
        },
        reposition: function() {
            if (this.options.inline !== !1 || this.options.container) return !1;
            var a = this.container && this.container[0] !== b.document.body ? "position" : "offset",
                c = this.component || this.element,
                d = c[a]();
            "right" === this.options.align && (d.left -= this.picker.outerWidth() - c.outerWidth()), this.picker.css({
                top: d.top + c.outerHeight(),
                left: d.left
            })
        },
        show: function(a) {
            this.isDisabled() || (this.picker.addClass("colorpicker-visible").removeClass("colorpicker-hidden"), this.reposition(), c(b).on("resize.colorpicker", c.proxy(this.reposition, this)), !a || this.hasInput() && "color" !== this.input.attr("type") || a.stopPropagation && a.preventDefault && (a.stopPropagation(), a.preventDefault()), !this.component && this.input || this.options.inline !== !1 || c(b.document).on({
                "mousedown.colorpicker": c.proxy(this.hide, this)
            }), this.element.trigger({
                type: "showPicker",
                color: this.color
            }))
        },
        hide: function(a) {
            return ("undefined" == typeof a || !a.target || !(c(a.currentTarget).parents(".colorpicker").length > 0 || c(a.target).parents(".colorpicker").length > 0)) && (this.picker.addClass("colorpicker-hidden").removeClass("colorpicker-visible"), c(b).off("resize.colorpicker", this.reposition), c(b.document).off({
                "mousedown.colorpicker": this.hide
            }), this.update(), void this.element.trigger({
                type: "hidePicker",
                color: this.color
            }))
        },
        updateData: function(a) {
            return a = a || this.color.toString(this.format, !1), this.element.data("color", a), a
        },
        updateInput: function(a) {
            return a = a || this.color.toString(this.format, !1), this.input !== !1 && this.input.prop("value", a), a
        },
        updatePicker: function(a) {
            "undefined" != typeof a && (this.color = this.createColor(a));
            var b = this.options.horizontal === !1 ? this.options.sliders : this.options.slidersHorz,
                c = this.picker.find("i");
            if (0 !== c.length) return this.options.horizontal === !1 ? (b = this.options.sliders, c.eq(1).css("top", b.hue.maxTop * (1 - this.color.value.h)).end().eq(2).css("top", b.alpha.maxTop * (1 - this.color.value.a))) : (b = this.options.slidersHorz, c.eq(1).css("left", b.hue.maxLeft * (1 - this.color.value.h)).end().eq(2).css("left", b.alpha.maxLeft * (1 - this.color.value.a))), c.eq(0).css({
                top: b.saturation.maxTop - this.color.value.b * b.saturation.maxTop,
                left: this.color.value.s * b.saturation.maxLeft
            }), this.picker.find(".colorpicker-saturation").css("backgroundColor", this.color.toHex(this.color.value.h, 1, 1, 1)), this.picker.find(".colorpicker-alpha").css("backgroundColor", this.color.toHex()), this.picker.find(".colorpicker-color, .colorpicker-color div").css("backgroundColor", this.color.toString(this.format, !0)), a
        },
        updateComponent: function(a) {
            var b;
            if (b = "undefined" != typeof a ? this.createColor(a) : this.color, this.component !== !1) {
                var c = this.component.find("i").eq(0);
                c.length > 0 ? c.css({
                    backgroundColor: b.toString(this.format, !0)
                }) : this.component.css({
                    backgroundColor: b.toString(this.format, !0)
                })
            }
            return b.toString(this.format, !1)
        },
        update: function(a) {
            var b;
            return this.getValue(!1) === !1 && a !== !0 || (b = this.updateComponent(), this.updateInput(b), this.updateData(b), this.updatePicker()), b
        },
        setValue: function(a) {
            this.color = this.createColor(a), this.update(!0), this.element.trigger({
                type: "changeColor",
                color: this.color,
                value: a
            })
        },
        createColor: function(a) {
            return new d(a ? a : null, this.options.colorSelectors, this.options.fallbackColor ? this.options.fallbackColor : this.color, this.options.fallbackFormat)
        },
        getValue: function(a) {
            a = "undefined" == typeof a ? this.options.fallbackColor : a;
            var b;
            return b = this.hasInput() ? this.input.val() : this.element.data("color"), void 0 !== b && "" !== b && null !== b || (b = a), b
        },
        hasInput: function() {
            return this.input !== !1
        },
        isDisabled: function() {
            return !!this.hasInput() && this.input.prop("disabled") === !0
        },
        disable: function() {
            return !!this.hasInput() && (this.input.prop("disabled", !0), this.element.trigger({
                type: "disable",
                color: this.color,
                value: this.getValue()
            }), !0)
        },
        enable: function() {
            return !!this.hasInput() && (this.input.prop("disabled", !1), this.element.trigger({
                type: "enable",
                color: this.color,
                value: this.getValue()
            }), !0)
        },
        currentSlider: null,
        mousePointer: {
            left: 0,
            top: 0
        },
        mousedown: function(a) {
            !a.pageX && !a.pageY && a.originalEvent && a.originalEvent.touches && (a.pageX = a.originalEvent.touches[0].pageX, a.pageY = a.originalEvent.touches[0].pageY), a.stopPropagation(), a.preventDefault();
            var d = c(a.target),
                e = d.closest("div"),
                f = this.options.horizontal ? this.options.slidersHorz : this.options.sliders;
            if (!e.is(".colorpicker")) {
                if (e.is(".colorpicker-saturation")) this.currentSlider = c.extend({}, f.saturation);
                else if (e.is(".colorpicker-hue")) this.currentSlider = c.extend({}, f.hue);
                else {
                    if (!e.is(".colorpicker-alpha")) return !1;
                    this.currentSlider = c.extend({}, f.alpha)
                }
                var g = e.offset();
                this.currentSlider.guide = e.find("i")[0].style, this.currentSlider.left = a.pageX - g.left, this.currentSlider.top = a.pageY - g.top, this.mousePointer = {
                    left: a.pageX,
                    top: a.pageY
                }, c(b.document).on({
                    "mousemove.colorpicker": c.proxy(this.mousemove, this),
                    "touchmove.colorpicker": c.proxy(this.mousemove, this),
                    "mouseup.colorpicker": c.proxy(this.mouseup, this),
                    "touchend.colorpicker": c.proxy(this.mouseup, this)
                }).trigger("mousemove")
            }
            return !1
        },
        mousemove: function(a) {
            !a.pageX && !a.pageY && a.originalEvent && a.originalEvent.touches && (a.pageX = a.originalEvent.touches[0].pageX, a.pageY = a.originalEvent.touches[0].pageY), a.stopPropagation(), a.preventDefault();
            var b = Math.max(0, Math.min(this.currentSlider.maxLeft, this.currentSlider.left + ((a.pageX || this.mousePointer.left) - this.mousePointer.left))),
                c = Math.max(0, Math.min(this.currentSlider.maxTop, this.currentSlider.top + ((a.pageY || this.mousePointer.top) - this.mousePointer.top)));
            return this.currentSlider.guide.left = b + "px", this.currentSlider.guide.top = c + "px", this.currentSlider.callLeft && this.color[this.currentSlider.callLeft].call(this.color, b / this.currentSlider.maxLeft), this.currentSlider.callTop && this.color[this.currentSlider.callTop].call(this.color, c / this.currentSlider.maxTop), this.options.format !== !1 || "setAlpha" !== this.currentSlider.callTop && "setAlpha" !== this.currentSlider.callLeft || (1 !== this.color.value.a ? (this.format = "rgba", this.color.origFormat = "rgba") : (this.format = "hex", this.color.origFormat = "hex")), this.update(!0), this.element.trigger({
                type: "changeColor",
                color: this.color
            }), !1
        },
        mouseup: function(a) {
            return a.stopPropagation(), a.preventDefault(), c(b.document).off({
                "mousemove.colorpicker": this.mousemove,
                "touchmove.colorpicker": this.mousemove,
                "mouseup.colorpicker": this.mouseup,
                "touchend.colorpicker": this.mouseup
            }), !1
        },
        change: function(a) {
            this.keyup(a)
        },
        keyup: function(a) {
            38 === a.keyCode ? (this.color.value.a < 1 && (this.color.value.a = Math.round(100 * (this.color.value.a + .01)) / 100), this.update(!0)) : 40 === a.keyCode ? (this.color.value.a > 0 && (this.color.value.a = Math.round(100 * (this.color.value.a - .01)) / 100), this.update(!0)) : (this.color = this.createColor(this.input.val()), this.color.origFormat && this.options.format === !1 && (this.format = this.color.origFormat), this.getValue(!1) !== !1 && (this.updateData(), this.updateComponent(), this.updatePicker())), this.element.trigger({
                type: "changeColor",
                color: this.color,
                value: this.input.val()
            })
        }
    }, c.colorpicker = f, c.fn.colorpicker = function(a) {
        var b = Array.prototype.slice.call(arguments, 1),
            d = 1 === this.length,
            e = null,
            g = this.each(function() {
                var d = c(this),
                    g = d.data("colorpicker"),
                    h = "object" == typeof a ? a : {};
                g || (g = new f(this, h), d.data("colorpicker", g)), "string" == typeof a ? c.isFunction(g[a]) ? e = g[a].apply(g, b) : (b.length && (g[a] = b[0]), e = g[a]) : e = d
            });
        return d ? e : g
    }, c.fn.colorpicker.constructor = f
});
