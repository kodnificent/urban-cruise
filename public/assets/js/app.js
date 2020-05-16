(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/assets/js/app"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/HeaderSearch.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/header/HeaderSearch.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      dialog_is_expanded: false
    };
  },
  methods: {
    toggleDialog: function toggleDialog() {
      if (this.dialog_is_expanded === true) {
        this.dialog_is_expanded = false;
      } else {
        this.dialog_is_expanded = true;
        this.$refs['dialog-input'].focus();
      }
    },
    search: function search() {//
    }
  },
  mounted: function mounted() {//
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/NavBar.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/header/NavBar.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      nav_is_expanded: false
    };
  },
  methods: {
    toggleNav: function toggleNav() {
      if (this.nav_is_expanded === true) {
        this.nav_is_expanded = false;
      } else {
        this.nav_is_expanded = true; //this.$refs['close-btn'].focus();
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/icon/FeatherIcon.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/icon/FeatherIcon.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var feather_icons__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! feather-icons */ "./node_modules/feather-icons/dist/feather.js");
/* harmony import */ var feather_icons__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(feather_icons__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    /**
     * The name of the icon to create
     */
    icon: {
      required: true,
      type: String
    },

    /**
     * Size of the icon
     */
    size: {
      "default": '',
      type: String
    },

    /**
     * A string containing classes for styling the icon
     */
    iconClass: {
      "default": '',
      type: String
    },
    xmlns: {
      "default": null,
      type: String
    },
    width: {
      "default": null,
      type: String
    },
    height: {
      "default": null,
      type: String
    },
    viewBox: {
      "default": null,
      type: String
    },
    fill: {
      "default": null,
      type: String
    },
    stroke: {
      "default": null,
      type: String
    },
    'stroke-width': {
      "default": null,
      type: String
    },
    'stroke-linecap': {
      "default": null,
      type: String
    },
    'stroke-linejoin': {
      "default": null,
      type: String
    }
  },
  data: function data() {
    return {
      iconSvg: null
    };
  },
  watch: {
    icon: function icon() {
      this.replace();
    }
  },
  methods: {
    /**
     * Replace the element with data-feather attribute with the icon svg
     */
    replace: function replace() {
      // we will replace all html elements with data-feather attribute with the svg html
      // and also add back the data-feather attribute to the svg so we can easily
      // replace the icon again when the icon name or attribute is changed
      var attrs = {};
      attrs["class"] = "".concat(this.iconClass, " inline ").concat(this.size);
      this.width ? attrs.width = this.width : '';
      this.height ? attrs.height = this.height : '';
      this.viewBox ? attrs.viewBox = this.viewBox : '';
      this.fill ? attrs.fill = this.fill : '';
      this.strokeWidth ? attrs.strokeWidth = this.strokeWidth : '';
      this.strokeLinecap ? attrs.strokeLinecap = this.strokeLinecap : '';
      this.strokeLinejoin ? attrs.strokeLinejoin = this.strokeLinejoin : '';
      this.iconSvg = feather_icons__WEBPACK_IMPORTED_MODULE_0__["icons"][this.icon].toSvg(attrs);
    }
  },
  mounted: function mounted() {
    try {
      this.replace();
    } catch (error) {
      console.error(error);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/layouts/home/HomeLayout.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/layouts/home/HomeLayout.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _mixins_layout__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../mixins/layout */ "./resources/js/mixins/layout.js");
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_mixins_layout__WEBPACK_IMPORTED_MODULE_0__["layout"]],
  data: function data() {
    return {//
    };
  },
  mounted: function mounted() {//
  }
});

/***/ }),

/***/ "./node_modules/extract-text-webpack-plugin/dist/loader.js?!./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/HeaderComponent.vue?vue&type=style&index=0&lang=sass&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/extract-text-webpack-plugin/dist/loader.js??ref--9-0!./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--9-3!./node_modules/sass-loader/dist/cjs.js??ref--9-4!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/header/HeaderComponent.vue?vue&type=style&index=0&lang=sass& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./node_modules/extract-text-webpack-plugin/dist/loader.js?!./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/HeaderLogo.vue?vue&type=style&index=0&lang=sass&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/extract-text-webpack-plugin/dist/loader.js??ref--9-0!./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--9-3!./node_modules/sass-loader/dist/cjs.js??ref--9-4!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/header/HeaderLogo.vue?vue&type=style&index=0&lang=sass& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./node_modules/extract-text-webpack-plugin/dist/loader.js?!./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/HeaderSearch.vue?vue&type=style&index=0&lang=sass&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/extract-text-webpack-plugin/dist/loader.js??ref--9-0!./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--9-3!./node_modules/sass-loader/dist/cjs.js??ref--9-4!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/header/HeaderSearch.vue?vue&type=style&index=0&lang=sass& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./node_modules/extract-text-webpack-plugin/dist/loader.js?!./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/NavBar.vue?vue&type=style&index=0&lang=sass&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/extract-text-webpack-plugin/dist/loader.js??ref--9-0!./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--9-3!./node_modules/sass-loader/dist/cjs.js??ref--9-4!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/header/NavBar.vue?vue&type=style&index=0&lang=sass& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./node_modules/extract-text-webpack-plugin/dist/loader.js?!./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/icon/FeatherIcon.vue?vue&type=style&index=0&lang=sass&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/extract-text-webpack-plugin/dist/loader.js??ref--9-0!./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--9-3!./node_modules/sass-loader/dist/cjs.js??ref--9-4!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/icon/FeatherIcon.vue?vue&type=style&index=0&lang=sass& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/HeaderComponent.vue?vue&type=template&id=8d808b4e&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/header/HeaderComponent.vue?vue&type=template&id=8d808b4e& ***!
  \*************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("header", { staticClass: "header" }, [
    _c(
      "div",
      {
        staticClass:
          "header__container container mx-auto px-2 md:w-4/5 lg:w-3/4"
      },
      [_vm._t("default")],
      2
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/HeaderLogo.vue?vue&type=template&id=0b4d3eff&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/header/HeaderLogo.vue?vue&type=template&id=0b4d3eff& ***!
  \********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm._m(0)
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "logo order-2 md:order-1" }, [
      _c("img", {
        staticClass: "logo__desktop",
        attrs: {
          src: "/assets/imgs/desktop-logo.png",
          alt: "urban-cruise logo"
        }
      }),
      _vm._v(" "),
      _c("img", {
        staticClass: "logo__mobile",
        attrs: { src: "/assets/imgs/mobile-logo.png", alt: "urban-cruise logo" }
      })
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/HeaderSearch.vue?vue&type=template&id=4d730d08&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/header/HeaderSearch.vue?vue&type=template&id=4d730d08& ***!
  \**********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "mobile-search order-3" }, [
    _c(
      "button",
      {
        staticClass:
          "mobile-search__button p-1 rounded-full focus:shadow-outline focus:outline-none",
        attrs: { type: "button" },
        on: { click: _vm.toggleDialog }
      },
      [
        _c("feather-icon", { attrs: { icon: "search" } }),
        _vm._v(" "),
        _c("span", { staticClass: "sr-only" }, [_vm._v("open search form")])
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "form",
      {
        staticClass: "mobile-search__dialog",
        attrs: { "data-expanded": _vm.dialog_is_expanded ? "true" : "false" },
        on: {
          submit: function($event) {
            $event.preventDefault()
            return _vm.search($event)
          }
        }
      },
      [
        _c("div", { staticClass: "mobile-search__dialog-header" }, [
          _c(
            "button",
            {
              staticClass: "mobile-search__dialog-button",
              attrs: { type: "button" },
              on: { click: _vm.toggleDialog }
            },
            [
              _c("feather-icon", { attrs: { icon: "arrow-left" } }),
              _vm._v(" "),
              _c("span", { staticClass: "sr-only" }, [
                _vm._v(" close search form")
              ])
            ],
            1
          ),
          _vm._v(" "),
          _c("input", {
            ref: "dialog-input",
            staticClass: "mobile-search__dialog-input",
            attrs: {
              type: "search",
              placeholder: "Enter a keyword here to search",
              autofocus: ""
            }
          })
        ]),
        _vm._v(" "),
        _vm._m(0)
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "flex flex-col h-screen mx-auto items-center justify-center px-8"
      },
      [
        _c("img", {
          staticClass: "-mt-40 mb-6",
          attrs: {
            src: "/assets/imgs/search.svg",
            height: "200px",
            width: "200px"
          }
        }),
        _vm._v(" "),
        _c("p", { staticClass: "text-center text-gray-700" }, [
          _vm._v(
            "\n                Looking for information on Politics, News, Enterntainment, Sports, Lifestyle? We've got you covered\n            "
          )
        ])
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/NavBar.vue?vue&type=template&id=8b24aed2&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/header/NavBar.vue?vue&type=template&id=8b24aed2& ***!
  \****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "navbar order-1 md:order-2" }, [
    _c(
      "button",
      {
        staticClass:
          "navbar__toggler p-1 rounded-full focus:shadow-outline focus:outline-none",
        attrs: {
          type: "button",
          "aria-expanded": _vm.nav_is_expanded ? "true" : "false"
        },
        on: { click: _vm.toggleNav }
      },
      [
        _c("span", { staticClass: "sr-only" }, [
          _vm._v("toggle navigation visibility")
        ]),
        _vm._v(" "),
        _c("feather-icon", { attrs: { icon: "menu" } })
      ],
      1
    ),
    _vm._v(" "),
    _vm.nav_is_expanded
      ? _c("span", {
          staticClass:
            "md:hidden top-0 left-0 bg-black opacity-50 fixed h-full w-full z-30",
          attrs: { "aria-hidden": "true" },
          on: { click: _vm.toggleNav }
        })
      : _vm._e(),
    _vm._v(" "),
    _c(
      "nav",
      {
        staticClass: "navbar__nav",
        attrs: { "data-expanded": _vm.nav_is_expanded ? "true" : "false" }
      },
      [_vm._m(0), _vm._v(" "), _vm._m(1)]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "md:hidden",
        staticStyle: { width: "100%", height: "150px" }
      },
      [
        _c("img", {
          staticClass: "mx-auto block",
          attrs: {
            width: "150px",
            src: "/assets/imgs/desktop-logo.png",
            alt: "urban-cruise logo"
          }
        })
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("ul", { staticClass: "navbar__list" }, [
      _c("li", { staticClass: "navbar__item" }, [
        _c("a", { staticClass: "navbar__link", attrs: { href: "" } }, [
          _vm._v("\n                    Home\n                ")
        ])
      ]),
      _vm._v(" "),
      _c("li", { staticClass: "navbar__item" }, [
        _c("a", { staticClass: "navbar__link", attrs: { href: "" } }, [
          _vm._v("\n                    news\n                ")
        ])
      ]),
      _vm._v(" "),
      _c("li", { staticClass: "navbar__item" }, [
        _c("a", { staticClass: "navbar__link active", attrs: { href: "" } }, [
          _vm._v("\n                    enterntainment\n                ")
        ])
      ]),
      _vm._v(" "),
      _c("li", { staticClass: "navbar__item" }, [
        _c("a", { staticClass: "navbar__link", attrs: { href: "" } }, [
          _vm._v("\n                    lifestyle\n                ")
        ])
      ]),
      _vm._v(" "),
      _c("li", { staticClass: "navbar__item" }, [
        _c("a", { staticClass: "navbar__link", attrs: { href: "" } }, [
          _vm._v("\n                    sports\n                ")
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/icon/FeatherIcon.vue?vue&type=template&id=5478ae51&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/icon/FeatherIcon.vue?vue&type=template&id=5478ae51& ***!
  \*******************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("span", {
    attrs: { "aria-hidden": "true" },
    domProps: { innerHTML: _vm._s(_vm.iconSvg) }
  })
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/layouts/home/HomeLayout.vue?vue&type=template&id=23084525&":
/*!***************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/layouts/home/HomeLayout.vue?vue&type=template&id=23084525& ***!
  \***************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "header-component",
        [
          _c("nav-bar"),
          _vm._v(" "),
          _c("header-logo"),
          _vm._v(" "),
          _c("header-search")
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/js sync recursive \\.vue$/":
/*!***********************************!*\
  !*** ./resources/js sync \.vue$/ ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./components/header/HeaderComponent.vue": "./resources/js/components/header/HeaderComponent.vue",
	"./components/header/HeaderLogo.vue": "./resources/js/components/header/HeaderLogo.vue",
	"./components/header/HeaderSearch.vue": "./resources/js/components/header/HeaderSearch.vue",
	"./components/header/NavBar.vue": "./resources/js/components/header/NavBar.vue",
	"./components/icon/FeatherIcon.vue": "./resources/js/components/icon/FeatherIcon.vue",
	"./layouts/home/HomeLayout.vue": "./resources/js/layouts/home/HomeLayout.vue",
	"./layouts/post/PostListLayout.vue": "./resources/js/layouts/post/PostListLayout.vue",
	"./layouts/post/PostSingleLayout.vue": "./resources/js/layouts/post/PostSingleLayout.vue"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./resources/js sync recursive \\.vue$/";

/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
__webpack_require__(/*! ./bootstrap */ "./resources/js/bootstrap.js");

window.Vue = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

var files = __webpack_require__("./resources/js sync recursive \\.vue$/");

files.keys().map(function (key) {
  return Vue.component(key.split('/').pop().split('.')[0], files(key)["default"]);
});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var app = new Vue({
  el: '#app'
});

/***/ }),

/***/ "./resources/js/bootstrap.js":
/*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
window.axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
// import Echo from 'laravel-echo';
// window.Pusher = require('pusher-js');
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

/***/ }),

/***/ "./resources/js/components/header/HeaderComponent.vue":
/*!************************************************************!*\
  !*** ./resources/js/components/header/HeaderComponent.vue ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _HeaderComponent_vue_vue_type_template_id_8d808b4e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./HeaderComponent.vue?vue&type=template&id=8d808b4e& */ "./resources/js/components/header/HeaderComponent.vue?vue&type=template&id=8d808b4e&");
/* harmony import */ var _HeaderComponent_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./HeaderComponent.vue?vue&type=style&index=0&lang=sass& */ "./resources/js/components/header/HeaderComponent.vue?vue&type=style&index=0&lang=sass&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");

var script = {}



/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  script,
  _HeaderComponent_vue_vue_type_template_id_8d808b4e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _HeaderComponent_vue_vue_type_template_id_8d808b4e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/header/HeaderComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/header/HeaderComponent.vue?vue&type=style&index=0&lang=sass&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/header/HeaderComponent.vue?vue&type=style&index=0&lang=sass& ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderComponent_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/extract-text-webpack-plugin/dist/loader.js??ref--9-0!../../../../node_modules/style-loader!../../../../node_modules/css-loader!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--9-3!../../../../node_modules/sass-loader/dist/cjs.js??ref--9-4!../../../../node_modules/vue-loader/lib??vue-loader-options!./HeaderComponent.vue?vue&type=style&index=0&lang=sass& */ "./node_modules/extract-text-webpack-plugin/dist/loader.js?!./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/HeaderComponent.vue?vue&type=style&index=0&lang=sass&");
/* harmony import */ var _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderComponent_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderComponent_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderComponent_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderComponent_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderComponent_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/header/HeaderComponent.vue?vue&type=template&id=8d808b4e&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/components/header/HeaderComponent.vue?vue&type=template&id=8d808b4e& ***!
  \*******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderComponent_vue_vue_type_template_id_8d808b4e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./HeaderComponent.vue?vue&type=template&id=8d808b4e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/HeaderComponent.vue?vue&type=template&id=8d808b4e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderComponent_vue_vue_type_template_id_8d808b4e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderComponent_vue_vue_type_template_id_8d808b4e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/header/HeaderLogo.vue":
/*!*******************************************************!*\
  !*** ./resources/js/components/header/HeaderLogo.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _HeaderLogo_vue_vue_type_template_id_0b4d3eff___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./HeaderLogo.vue?vue&type=template&id=0b4d3eff& */ "./resources/js/components/header/HeaderLogo.vue?vue&type=template&id=0b4d3eff&");
/* harmony import */ var _HeaderLogo_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./HeaderLogo.vue?vue&type=style&index=0&lang=sass& */ "./resources/js/components/header/HeaderLogo.vue?vue&type=style&index=0&lang=sass&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");

var script = {}



/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  script,
  _HeaderLogo_vue_vue_type_template_id_0b4d3eff___WEBPACK_IMPORTED_MODULE_0__["render"],
  _HeaderLogo_vue_vue_type_template_id_0b4d3eff___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/header/HeaderLogo.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/header/HeaderLogo.vue?vue&type=style&index=0&lang=sass&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/header/HeaderLogo.vue?vue&type=style&index=0&lang=sass& ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderLogo_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/extract-text-webpack-plugin/dist/loader.js??ref--9-0!../../../../node_modules/style-loader!../../../../node_modules/css-loader!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--9-3!../../../../node_modules/sass-loader/dist/cjs.js??ref--9-4!../../../../node_modules/vue-loader/lib??vue-loader-options!./HeaderLogo.vue?vue&type=style&index=0&lang=sass& */ "./node_modules/extract-text-webpack-plugin/dist/loader.js?!./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/HeaderLogo.vue?vue&type=style&index=0&lang=sass&");
/* harmony import */ var _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderLogo_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderLogo_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderLogo_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderLogo_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderLogo_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/header/HeaderLogo.vue?vue&type=template&id=0b4d3eff&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/header/HeaderLogo.vue?vue&type=template&id=0b4d3eff& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderLogo_vue_vue_type_template_id_0b4d3eff___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./HeaderLogo.vue?vue&type=template&id=0b4d3eff& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/HeaderLogo.vue?vue&type=template&id=0b4d3eff&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderLogo_vue_vue_type_template_id_0b4d3eff___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderLogo_vue_vue_type_template_id_0b4d3eff___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/header/HeaderSearch.vue":
/*!*********************************************************!*\
  !*** ./resources/js/components/header/HeaderSearch.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _HeaderSearch_vue_vue_type_template_id_4d730d08___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./HeaderSearch.vue?vue&type=template&id=4d730d08& */ "./resources/js/components/header/HeaderSearch.vue?vue&type=template&id=4d730d08&");
/* harmony import */ var _HeaderSearch_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./HeaderSearch.vue?vue&type=script&lang=js& */ "./resources/js/components/header/HeaderSearch.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _HeaderSearch_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./HeaderSearch.vue?vue&type=style&index=0&lang=sass& */ "./resources/js/components/header/HeaderSearch.vue?vue&type=style&index=0&lang=sass&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _HeaderSearch_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _HeaderSearch_vue_vue_type_template_id_4d730d08___WEBPACK_IMPORTED_MODULE_0__["render"],
  _HeaderSearch_vue_vue_type_template_id_4d730d08___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/header/HeaderSearch.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/header/HeaderSearch.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/header/HeaderSearch.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderSearch_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./HeaderSearch.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/HeaderSearch.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderSearch_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/header/HeaderSearch.vue?vue&type=style&index=0&lang=sass&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/components/header/HeaderSearch.vue?vue&type=style&index=0&lang=sass& ***!
  \*******************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderSearch_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/extract-text-webpack-plugin/dist/loader.js??ref--9-0!../../../../node_modules/style-loader!../../../../node_modules/css-loader!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--9-3!../../../../node_modules/sass-loader/dist/cjs.js??ref--9-4!../../../../node_modules/vue-loader/lib??vue-loader-options!./HeaderSearch.vue?vue&type=style&index=0&lang=sass& */ "./node_modules/extract-text-webpack-plugin/dist/loader.js?!./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/HeaderSearch.vue?vue&type=style&index=0&lang=sass&");
/* harmony import */ var _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderSearch_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderSearch_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderSearch_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderSearch_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderSearch_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/header/HeaderSearch.vue?vue&type=template&id=4d730d08&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/header/HeaderSearch.vue?vue&type=template&id=4d730d08& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderSearch_vue_vue_type_template_id_4d730d08___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./HeaderSearch.vue?vue&type=template&id=4d730d08& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/HeaderSearch.vue?vue&type=template&id=4d730d08&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderSearch_vue_vue_type_template_id_4d730d08___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HeaderSearch_vue_vue_type_template_id_4d730d08___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/header/NavBar.vue":
/*!***************************************************!*\
  !*** ./resources/js/components/header/NavBar.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _NavBar_vue_vue_type_template_id_8b24aed2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./NavBar.vue?vue&type=template&id=8b24aed2& */ "./resources/js/components/header/NavBar.vue?vue&type=template&id=8b24aed2&");
/* harmony import */ var _NavBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./NavBar.vue?vue&type=script&lang=js& */ "./resources/js/components/header/NavBar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _NavBar_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./NavBar.vue?vue&type=style&index=0&lang=sass& */ "./resources/js/components/header/NavBar.vue?vue&type=style&index=0&lang=sass&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _NavBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _NavBar_vue_vue_type_template_id_8b24aed2___WEBPACK_IMPORTED_MODULE_0__["render"],
  _NavBar_vue_vue_type_template_id_8b24aed2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/header/NavBar.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/header/NavBar.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/header/NavBar.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./NavBar.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/NavBar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/header/NavBar.vue?vue&type=style&index=0&lang=sass&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/header/NavBar.vue?vue&type=style&index=0&lang=sass& ***!
  \*************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/extract-text-webpack-plugin/dist/loader.js??ref--9-0!../../../../node_modules/style-loader!../../../../node_modules/css-loader!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--9-3!../../../../node_modules/sass-loader/dist/cjs.js??ref--9-4!../../../../node_modules/vue-loader/lib??vue-loader-options!./NavBar.vue?vue&type=style&index=0&lang=sass& */ "./node_modules/extract-text-webpack-plugin/dist/loader.js?!./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/NavBar.vue?vue&type=style&index=0&lang=sass&");
/* harmony import */ var _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/header/NavBar.vue?vue&type=template&id=8b24aed2&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/header/NavBar.vue?vue&type=template&id=8b24aed2& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_template_id_8b24aed2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./NavBar.vue?vue&type=template&id=8b24aed2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/header/NavBar.vue?vue&type=template&id=8b24aed2&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_template_id_8b24aed2___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_template_id_8b24aed2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/icon/FeatherIcon.vue":
/*!******************************************************!*\
  !*** ./resources/js/components/icon/FeatherIcon.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _FeatherIcon_vue_vue_type_template_id_5478ae51___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./FeatherIcon.vue?vue&type=template&id=5478ae51& */ "./resources/js/components/icon/FeatherIcon.vue?vue&type=template&id=5478ae51&");
/* harmony import */ var _FeatherIcon_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./FeatherIcon.vue?vue&type=script&lang=js& */ "./resources/js/components/icon/FeatherIcon.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _FeatherIcon_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./FeatherIcon.vue?vue&type=style&index=0&lang=sass& */ "./resources/js/components/icon/FeatherIcon.vue?vue&type=style&index=0&lang=sass&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _FeatherIcon_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _FeatherIcon_vue_vue_type_template_id_5478ae51___WEBPACK_IMPORTED_MODULE_0__["render"],
  _FeatherIcon_vue_vue_type_template_id_5478ae51___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/icon/FeatherIcon.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/icon/FeatherIcon.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/icon/FeatherIcon.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FeatherIcon_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./FeatherIcon.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/icon/FeatherIcon.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FeatherIcon_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/icon/FeatherIcon.vue?vue&type=style&index=0&lang=sass&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/icon/FeatherIcon.vue?vue&type=style&index=0&lang=sass& ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_FeatherIcon_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/extract-text-webpack-plugin/dist/loader.js??ref--9-0!../../../../node_modules/style-loader!../../../../node_modules/css-loader!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--9-3!../../../../node_modules/sass-loader/dist/cjs.js??ref--9-4!../../../../node_modules/vue-loader/lib??vue-loader-options!./FeatherIcon.vue?vue&type=style&index=0&lang=sass& */ "./node_modules/extract-text-webpack-plugin/dist/loader.js?!./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/icon/FeatherIcon.vue?vue&type=style&index=0&lang=sass&");
/* harmony import */ var _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_FeatherIcon_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_FeatherIcon_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_FeatherIcon_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_FeatherIcon_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_extract_text_webpack_plugin_dist_loader_js_ref_9_0_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_9_3_node_modules_sass_loader_dist_cjs_js_ref_9_4_node_modules_vue_loader_lib_index_js_vue_loader_options_FeatherIcon_vue_vue_type_style_index_0_lang_sass___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/icon/FeatherIcon.vue?vue&type=template&id=5478ae51&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/icon/FeatherIcon.vue?vue&type=template&id=5478ae51& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FeatherIcon_vue_vue_type_template_id_5478ae51___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./FeatherIcon.vue?vue&type=template&id=5478ae51& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/icon/FeatherIcon.vue?vue&type=template&id=5478ae51&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FeatherIcon_vue_vue_type_template_id_5478ae51___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FeatherIcon_vue_vue_type_template_id_5478ae51___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/layouts/home/HomeLayout.vue":
/*!**************************************************!*\
  !*** ./resources/js/layouts/home/HomeLayout.vue ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _HomeLayout_vue_vue_type_template_id_23084525___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./HomeLayout.vue?vue&type=template&id=23084525& */ "./resources/js/layouts/home/HomeLayout.vue?vue&type=template&id=23084525&");
/* harmony import */ var _HomeLayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./HomeLayout.vue?vue&type=script&lang=js& */ "./resources/js/layouts/home/HomeLayout.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _HomeLayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _HomeLayout_vue_vue_type_template_id_23084525___WEBPACK_IMPORTED_MODULE_0__["render"],
  _HomeLayout_vue_vue_type_template_id_23084525___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/layouts/home/HomeLayout.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/layouts/home/HomeLayout.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/js/layouts/home/HomeLayout.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_HomeLayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./HomeLayout.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/layouts/home/HomeLayout.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_HomeLayout_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/layouts/home/HomeLayout.vue?vue&type=template&id=23084525&":
/*!*********************************************************************************!*\
  !*** ./resources/js/layouts/home/HomeLayout.vue?vue&type=template&id=23084525& ***!
  \*********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HomeLayout_vue_vue_type_template_id_23084525___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./HomeLayout.vue?vue&type=template&id=23084525& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/layouts/home/HomeLayout.vue?vue&type=template&id=23084525&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HomeLayout_vue_vue_type_template_id_23084525___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_HomeLayout_vue_vue_type_template_id_23084525___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/layouts/post/PostListLayout.vue":
/*!******************************************************!*\
  !*** ./resources/js/layouts/post/PostListLayout.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
var render, staticRenderFns
var script = {}


/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_0__["default"])(
  script,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

component.options.__file = "resources/js/layouts/post/PostListLayout.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/layouts/post/PostSingleLayout.vue":
/*!********************************************************!*\
  !*** ./resources/js/layouts/post/PostSingleLayout.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
var render, staticRenderFns
var script = {}


/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_0__["default"])(
  script,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

component.options.__file = "resources/js/layouts/post/PostSingleLayout.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/mixins/layout.js":
/*!***************************************!*\
  !*** ./resources/js/mixins/layout.js ***!
  \***************************************/
/*! exports provided: layout */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "layout", function() { return layout; });
var layout = {
  props: {
    res: {
      required: false,
      type: Object
    }
  },
  data: function data() {
    return {
      meta: this.res.meta,
      data: this.res.data,
      endpoints: this.res.endpoints,
      fetching: false
    };
  },
  methods: {
    /**
     * Fetch basic data for the layout
     *
     * @return {void}
     */
    fetchBase: function fetchBase() {
      var _this = this;

      this.fetching = true;
      axios.get(this.res.endpoints.base, {
        'Accept': 'application/json'
      }).then(function (res) {
        _this.meta = res.data.meta;
        _this.data = res.data.data;
        _this.endpoints = res.data.endpoints;
      })["catch"](function (err) {//
      }).then(function () {
        return _this.fetching = false;
      });
    },

    /**
     * Update the dom with meta information
     *
     * @return {void}
     */
    assignMeta: function assignMeta() {//
    },
    create: function create(d) {
      console.log(d);
    }
  },
  watch: {
    meta: function meta() {
      this.assignMeta();
    }
  },
  beforeMount: function beforeMount() {
    if (this.res.is_skeleton) {
      this.fetchBase();
    }
  }
};

/***/ }),

/***/ "./resources/scss/vendor.scss":
/*!************************************!*\
  !*** ./resources/scss/vendor.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!****************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/scss/vendor.scss ./resources/css/app.css ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\kodnificent\urban-cruise\resources\js\app.js */"./resources/js/app.js");
__webpack_require__(/*! C:\xampp\htdocs\kodnificent\urban-cruise\resources\scss\vendor.scss */"./resources/scss/vendor.scss");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\kodnificent\urban-cruise\resources\css\app.css */"./resources/css/app.css");


/***/ })

},[[0,"/assets/js/manifest","/assets/js/vendor"]]]);