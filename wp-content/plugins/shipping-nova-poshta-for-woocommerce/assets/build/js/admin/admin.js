/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/.src/js/admin/admin.js":
/*!***************************************!*\
  !*** ./assets/.src/js/admin/admin.js ***!
  \***************************************/
/***/ (function() {

/* global jQuery, shippingNovaPoshtaForWoocommerce */
var NovaPoshtaAdmin = window.NovaPoshtaAdmin || function (document, window, $) {
  var app = {
    init: function init() {
      app.tips();
      app.initAdminShipping();
      app.initCitySearch();
      app.initWarehouseSearch();
      app.updateShippingMethodClasses();
    },
    initCitySearch: function initCitySearch() {
      var $city = $('#shipping_nova_poshta_for_woocommerce_city');

      if (!$city.length) {
        return;
      }

      $city.np_select2({
        language: shippingNovaPoshtaForWoocommerce.language,
        minimumInputLength: 1,
        ajax: {
          url: shippingNovaPoshtaForWoocommerce.url,
          type: 'POST',
          data: function data(params) {
            return {
              'nonce': shippingNovaPoshtaForWoocommerce.nonce,
              'action': 'shipping_nova_poshta_for_woocommerce_city',
              'search': params.term
            };
          },
          processResults: function processResults(data) {
            return {
              results: data
            };
          }
        }
      }).on('select2:select', function () {
        app.updateWarehouses();
      });
    },
    initWarehouseSearch: function initWarehouseSearch() {
      var $warehouse = $('#shipping_nova_poshta_for_woocommerce_warehouse');

      if (!$warehouse.length) {
        return;
      }

      $warehouse.np_select2({
        language: shippingNovaPoshtaForWoocommerce.language
      });
      $(document).ajaxComplete(function (event, xhr, settings) {
        if ('woocommerce_save_order_items' === app.getQueryParams('action', settings.data)) {
          app.updateShippingMethodClasses();
        }
      });
    },
    updateWarehouses: function updateWarehouses() {
      var active = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
      var $city = $('#shipping_nova_poshta_for_woocommerce_city'),
          $warehouse = $('#shipping_nova_poshta_for_woocommerce_warehouse');

      if (!$city.length || !$warehouse) {
        return;
      }

      $.ajax({
        url: shippingNovaPoshtaForWoocommerce.url,
        type: 'POST',
        data: {
          'nonce': shippingNovaPoshtaForWoocommerce.nonce,
          'action': 'shipping_nova_poshta_for_woocommerce_warehouse',
          'city': $city.val()
        },
        beforeSend: function beforeSend() {
          $warehouse.addClass('inactive');
        },
        success: function success(data) {
          $warehouse.find('option').remove();
          data.forEach(function (element) {
            $warehouse.append(new Option(element.text, element.id, false, active === element.id));
          });
          $warehouse.trigger('change');
        },
        complete: function complete() {
          $warehouse.removeClass('inactive');
        }
      });
    },
    getQueryParams: function getQueryParams(params, href) {
      var reg = new RegExp('[?&]' + params + '=([^&#]*)', 'i');
      var queryString = reg.exec(href);
      return queryString ? queryString[1] : '';
    },
    initAdminShipping: function initAdminShipping() {
      var warehouse = $('#shipping_nova_poshta_for_woocommerce_warehouse').val(),
          $orderItems = $('#woocommerce-order-items');
      $orderItems.on('click', '#order_shipping_line_items .edit-order-item', function () {
        app.replaceInputToSelect('city_id', 'shipping_nova_poshta_for_woocommerce_city');
        app.replaceInputToSelect('warehouse_id', 'shipping_nova_poshta_for_woocommerce_warehouse');
        app.init();
        app.updateWarehouses(warehouse);
      });
      $orderItems.on('click', '#order_shipping_line_items .shipping_method', function () {
        app.updateShippingMethodClasses();
      });
    },
    updateShippingMethodClasses: function updateShippingMethodClasses() {
      var $methodBlock = $('#order_shipping_line_items'),
          $methodField = $methodBlock.find('.shipping_method');

      if ($methodField.length && ('shipping_nova_poshta_for_woocommerce' === $methodField.val() || 'shipping_nova_poshta_for_woocommerce_courier' === $methodField.val())) {
        $methodBlock.addClass('shipping-nova-poshta-for-woocommerce');
      } else {
        $methodBlock.removeClass('shipping-nova-poshta-for-woocommerce');
      }
    },
    replaceInputToSelect: function replaceInputToSelect(key, id) {
      var $el = $('#order_shipping_line_items input[value=' + key + ']'),
          $field = $el.next('textarea'),
          index = $field.closest('tr').index(),
          value = $('#order_shipping_line_items .display_meta tr:eq(' + index + ') td').text(),
          option = new Option(value, $field.val());
      $el.attr('type', 'hidden');
      $field.replaceWith('<select name="' + $field.attr('name') + '" id="' + id + '"></select>');
      $('#' + id).append(option);
    },
    tips: function tips() {
      $('.help-tip').tipTip({
        'attribute': 'data-tip',
        'fadeIn': 50,
        'fadeOut': 50,
        'delay': 50
      });
    }
  };
  return app;
}(document, window, jQuery);

NovaPoshtaAdmin.init();

/***/ }),

/***/ "./assets/.src/scss/admin/admin.scss":
/*!*******************************************!*\
  !*** ./assets/.src/scss/admin/admin.scss ***!
  \*******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./assets/.src/scss/admin/notice.scss":
/*!********************************************!*\
  !*** ./assets/.src/scss/admin/notice.scss ***!
  \********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./assets/.src/scss/admin/education.scss":
/*!***********************************************!*\
  !*** ./assets/.src/scss/admin/education.scss ***!
  \***********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./assets/.src/scss/main.scss":
/*!************************************!*\
  !*** ./assets/.src/scss/main.scss ***!
  \************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./assets/.src/scss/pro/main.scss":
/*!****************************************!*\
  !*** ./assets/.src/scss/pro/main.scss ***!
  \****************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		if(__webpack_module_cache__[moduleId]) {
/******/ 			return __webpack_module_cache__[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/******/ 	// the startup function
/******/ 	// It's empty as some runtime module handles the default behavior
/******/ 	__webpack_require__.x = function() {}
/************************************************************************/
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	!function() {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// Promise = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/admin/admin": 0
/******/ 		};
/******/ 		
/******/ 		var deferredModules = [
/******/ 			["./assets/.src/js/admin/admin.js"],
/******/ 			["./assets/.src/scss/admin/admin.scss"],
/******/ 			["./assets/.src/scss/admin/notice.scss"],
/******/ 			["./assets/.src/scss/admin/education.scss"],
/******/ 			["./assets/.src/scss/main.scss"],
/******/ 			["./assets/.src/scss/pro/main.scss"]
/******/ 		];
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		var checkDeferredModules = function() {};
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = function(parentChunkLoadingFunction, data) {
/******/ 			var chunkIds = data[0];
/******/ 			var moreModules = data[1];
/******/ 			var runtime = data[2];
/******/ 			var executeModules = data[3];
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0, resolves = [];
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					resolves.push(installedChunks[chunkId][0]);
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			while(resolves.length) {
/******/ 				resolves.shift()();
/******/ 			}
/******/ 		
/******/ 			// add entry modules from loaded chunk to deferred list
/******/ 			if(executeModules) deferredModules.push.apply(deferredModules, executeModules);
/******/ 		
/******/ 			// run deferred modules when all chunks ready
/******/ 			return checkDeferredModules();
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk_wppunk_shipping_nova_poshta_for_woocommerce"] = self["webpackChunk_wppunk_shipping_nova_poshta_for_woocommerce"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 		
/******/ 		function checkDeferredModulesImpl() {
/******/ 			var result;
/******/ 			for(var i = 0; i < deferredModules.length; i++) {
/******/ 				var deferredModule = deferredModules[i];
/******/ 				var fulfilled = true;
/******/ 				for(var j = 1; j < deferredModule.length; j++) {
/******/ 					var depId = deferredModule[j];
/******/ 					if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferredModules.splice(i--, 1);
/******/ 					result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 				}
/******/ 			}
/******/ 			if(deferredModules.length === 0) {
/******/ 				__webpack_require__.x();
/******/ 				__webpack_require__.x = function() {};
/******/ 			}
/******/ 			return result;
/******/ 		}
/******/ 		var startup = __webpack_require__.x;
/******/ 		__webpack_require__.x = function() {
/******/ 			// reset startup function so it can be called again when more startup code is added
/******/ 			__webpack_require__.x = startup || (function() {});
/******/ 			return (checkDeferredModules = checkDeferredModulesImpl)();
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	// run startup
/******/ 	__webpack_require__.x();
/******/ })()
;
//# sourceMappingURL=admin.js.map