webpackJsonp([0],{

/***/ 730:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(735)
}
var normalizeComponent = __webpack_require__(3)
/* script */
var __vue_script__ = __webpack_require__(737)
/* template */
var __vue_template__ = __webpack_require__(738)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/master/AddCourriel.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-aa0807b4", Component.options)
  } else {
    hotAPI.reload("data-v-aa0807b4", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 735:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(736);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(2)("68b6c60f", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-aa0807b4\",\"scoped\":false,\"hasInlineConfig\":true}!./add-courriel.scss", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-aa0807b4\",\"scoped\":false,\"hasInlineConfig\":true}!./add-courriel.scss");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 736:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(1)(false);
// imports


// module
exports.push([module.i, "\n.add-couriel {\r\n\r\n    background-color:rgba(236, 240, 241, 0.7);\r\n    min-height:500px;\r\n    min-width: 750px;\r\n    margin-top:100px;\r\n\r\n    padding:30px;\r\n    width: 100%;\r\n    display: -webkit-box;\r\n    display: -ms-flexbox;\r\n    display: flex;\r\n    -webkit-box-pack: center;\r\n        -ms-flex-pack: center;\r\n            justify-content: center;\n}\n.div-text-new-courrier {\r\n\r\n    margin:30px;\n}\n.text-new-courrier {\r\n\r\n    color:rgb(52, 152, 219);\r\n    font-weight:bold;\r\n    font-size:30px;\n}\n.label-add {\r\n\r\n    color:#2a323c;\r\n    font-weight:300;\r\n    font-size: 20px;\n}\n.form-input-add {\r\n\r\n    color:rgba(2,2,2,0.6);\r\n    background-color:white !important;\r\n    font-size:20px !important ;\r\n    border-radius:3px !important;\r\n    margin:2% 2% !important ;\r\n    padding:8px 2px !important ;\r\n\r\n    border:1px solid rgb(127, 140, 141 )  !important;\r\n    padding:10px 10px;\r\n    width:95% !important;\r\n    font-size:20px;\r\n    height:2rem !important;\n}\n.select-wrapper {\r\n\r\n    color:rgba(2,2,2,0.6);\r\n    background-color:white !important;\r\n    font-size:20px;\r\n    border-radius:3px;\r\n    margin:2% 2%;\r\n    padding:8px 2px;\r\n\r\n    border:1px solid rgb(127, 140, 141);\n}\n#form-input-submit {\r\n\r\n\r\n\r\n    outline:none;\r\n    background-color:rgb(231, 76, 60);\r\n\r\n    color:white;\r\n    border-bottom-left-radius:10px;\r\n    border-bottom-right-radius:10px;\r\n    cursor:pointer;\r\n    padding:10px 10px;\r\n    width:95%;\r\n    font-size:20px;\n}\n.errors {\r\n\r\n    color:red;\r\n    text-align: center;\n}\n.select-wrapper input.select-dropdown:focus {\r\n\r\n    border-bottom :none;\n}\n.select-wrapper input.select-dropdown {\r\n\r\n    height:2rem;\r\n    border-bottom:none;\r\n\r\n\r\n    font-size:20px;\n}\n.select-dropdown {\r\n\r\n    width:100% !important;\n}\r\n", ""]);

// exports


/***/ }),

/***/ 737:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
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


/* export default {

     data() {

         return {
             type:"" ,
             service:"",
             fichier :""
         }
     }
 }*/

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {

            expediteur: "",
            service: "",
            categorie: "",
            fichier: "",
            type: "",
            telephone: "",
            tab_categorie: this.$route.params.tab_categorie,
            tab_service: this.$route.params.tab_service,
            nom: '',

            hasError: false,
            hasErrorService: '',
            hasErrorFichier: '',
            hasErrorNom: '',
            hasErrorCategorie: '',
            error: '',
            errors: {
                expediteur: "",
                service: "",
                fichier: "",
                categorie: ''

            },
            success: false,
            element: {}
        };
    },


    methods: {
        registerCourriel: function registerCourriel() {
            var app = this;

            //verification du fichier
            //expediteur = index du tableau recuperé


            this.element = {

                nom: app.nom,
                fichier: app.fichier,
                service: app.service,
                categorie: app.categorie
            };

            axios.post('archive/addArchive', this.element).then(function (e) {

                app.success = true;
                app.hasError = false;

                app.$parent.$children[3].changeIsMessage("Votre courrier a été enregistré Mr");
                app.nom = "";
                app.fichier = "";
                app.categorie = "";
                app.service = "";
            }).catch(function (res) {

                console.log(res.response);

                app.hasError = true;
                if (_.isArray(res.response.data.errors.service)) {
                    app.hasErrorService = true;
                    app.errors.service = res.response.data.errors.service[0];
                }

                if (_.isArray(res.response.data.errors.categorie)) {

                    app.hasErrorCategorie = true;
                    app.errors.categorie = res.response.data.errors.categorie[0];
                }

                if (_.isArray(res.response.data.errors.fichier)) {

                    app.hasErrorFichier = true;
                    app.errors.fichier = res.response.data.errors.fichier[0];
                }

                if (_.isArray(res.response.data.errors.nom)) {

                    app.hasErrorNom = true;
                    app.errors.nom = res.response.data.errors.nom;
                }
            });
        },


        onFileSelected: function onFileSelected(event) {

            this.fichier = event.target.files[0];
        }
    },

    beforeRouteEnter: function beforeRouteEnter(to, from, next) {
        var app = this;
        axios.get('archive/categorie').then(function (e) {

            to.params.tab_categorie = e.data.categorie;
            console.log(e.data);
        }).catch(function (e) {

            app.redirectError(e);
        });

        axios.get('archive/service').then(function (e) {

            to.params.tab_service = e.data.service;

            console.log(e);
            next();
        }).catch(function (e) {

            app.redirectError(e);
            //
        });
    },
    mounted: function mounted() {}
});

/***/ }),

/***/ 738:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "add-couriel" },
    [
      _c(
        "b-form",
        {
          staticClass: "w-50",
          attrs: { autocomplete: "off" },
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.registerCourriel($event)
            }
          }
        },
        [
          _c("b-row", {
            staticClass: "div-text-new-courrier",
            attrs: { "align-h": "center" }
          }),
          _vm._v(" "),
          _c(
            "b-row",
            { staticClass: "my-1" },
            [
              _c("b-col", { attrs: { sm: "3" } }, [
                _c("label", { staticClass: "label-add" }, [_vm._v(" Nom")])
              ]),
              _vm._v(" "),
              _c(
                "b-col",
                { attrs: { sm: "9" } },
                [
                  _c("b-form-input", {
                    staticClass: "form-input-add",
                    attrs: { type: "text" },
                    model: {
                      value: _vm.nom,
                      callback: function($$v) {
                        _vm.nom = $$v
                      },
                      expression: "nom"
                    }
                  })
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          (_vm.hasError && _vm.hasErrorNom
          ? _vm.errors.type
          : "")
            ? _c("span", { staticClass: "errors" }, [
                _vm._v(_vm._s(_vm.errors.type))
              ])
            : _vm._e(),
          _vm._v(" "),
          _c(
            "b-row",
            { staticClass: "my-1 w-100" },
            [
              _c("b-col", { attrs: { sm: "3" } }, [
                _c("label", { staticClass: "label-add" }, [
                  _vm._v("Catégories")
                ])
              ]),
              _vm._v(" "),
              _c("b-col", { attrs: { sm: "9" } }, [
                _c(
                  "select",
                  {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.categorie,
                        expression: "categorie"
                      }
                    ],
                    staticClass: "icons form-select-add",
                    on: {
                      change: function($event) {
                        var $$selectedVal = Array.prototype.filter
                          .call($event.target.options, function(o) {
                            return o.selected
                          })
                          .map(function(o) {
                            var val = "_value" in o ? o._value : o.value
                            return val
                          })
                        _vm.categorie = $event.target.multiple
                          ? $$selectedVal
                          : $$selectedVal[0]
                      }
                    }
                  },
                  _vm._l(_vm.tab_categorie, function(value) {
                    return _c(
                      "option",
                      {
                        staticClass: "left",
                        attrs: { "data-icon": _vm.pathImg + "5.jpg" },
                        domProps: { value: value.id }
                      },
                      [_vm._v(_vm._s(value.nom))]
                    )
                  })
                ),
                _vm._v(" "),
                (_vm.hasError && _vm.hasErrorCategorie
                ? _vm.errors.categorie
                : "")
                  ? _c("span", { staticClass: "errors" }, [
                      _vm._v(_vm._s(_vm.errors.categorie))
                    ])
                  : _vm._e()
              ])
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "b-row",
            { staticClass: "my-1 w-100" },
            [
              _c("b-col", { attrs: { sm: "3" } }, [
                _c("label", { staticClass: "label-add" }, [_vm._v("Service")])
              ]),
              _vm._v(" "),
              _c("b-col", { attrs: { sm: "9" } }, [
                _c(
                  "select",
                  {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.service,
                        expression: "service"
                      }
                    ],
                    staticClass: "icons form-select-add",
                    on: {
                      change: function($event) {
                        var $$selectedVal = Array.prototype.filter
                          .call($event.target.options, function(o) {
                            return o.selected
                          })
                          .map(function(o) {
                            var val = "_value" in o ? o._value : o.value
                            return val
                          })
                        _vm.service = $event.target.multiple
                          ? $$selectedVal
                          : $$selectedVal[0]
                      }
                    }
                  },
                  _vm._l(_vm.tab_service, function(value) {
                    return _c(
                      "option",
                      {
                        staticClass: "left",
                        attrs: { "data-icon": _vm.pathImg + "5.jpg" },
                        domProps: { value: value.id }
                      },
                      [_vm._v(_vm._s(value.nom))]
                    )
                  })
                ),
                _vm._v(" "),
                (_vm.hasError && _vm.hasErrorService
                ? _vm.errors.service
                : "")
                  ? _c("span", { staticClass: "errors" }, [
                      _vm._v(_vm._s(_vm.errors.service))
                    ])
                  : _vm._e()
              ])
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "b-row",
            { staticClass: "my-1" },
            [
              _c("b-col", { attrs: { sm: "3" } }, [
                _c("label", { staticClass: "label-add" }, [_vm._v(" Fichier")])
              ]),
              _vm._v(" "),
              _c(
                "b-col",
                { attrs: { sm: "9" } },
                [
                  _c("b-form-file", {
                    staticClass: "form-input-add",
                    attrs: {
                      type: "file",
                      "drop-placeholder": "Drop file here"
                    },
                    on: { change: _vm.onFileSelected }
                  })
                ],
                1
              ),
              _vm._v(" "),
              (_vm.hasError && _vm.hasErrorFichier
              ? _vm.errors.fichier
              : "")
                ? _c("span", { staticClass: "errors" }, [
                    _vm._v(_vm._s(_vm.errors.fichier))
                  ])
                : _vm._e()
            ],
            1
          ),
          _vm._v(" "),
          _c("b-row", { attrs: { "align-h": "center" } }, [
            _c("button", { attrs: { id: "form-input-submit" } }, [
              _vm._v("Valider")
            ])
          ])
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-aa0807b4", module.exports)
  }
}

/***/ })

});