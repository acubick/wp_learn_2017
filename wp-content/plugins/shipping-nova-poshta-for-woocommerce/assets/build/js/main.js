/******/ (function() { // webpackBootstrap
/*!********************************!*\
  !*** ./assets/.src/js/main.js ***!
  \********************************/
/* global jQuery, shippingNovaPoshtaForWoocommerce */
var NovaPoshta = window.NovaPoshta || function (document, window, $) {
  var app = {
    init: function init() {
      $(function () {
        if (!$('#shipping_nova_poshta_for_woocommerce_city, #shipping_nova_poshta_for_woocommerce_warehouse').length) {
          return;
        }

        app.initCitySearch();
        app.initWarehouseSearch();
      });
      $(document).ajaxComplete(function (event, xhr, settings) {
        if ('update_order_review' === app.getQueryParams('wc-ajax', settings.url)) {
          app.initCitySearch();
          app.initWarehouseSearch();
        }
      });
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
        $(document.body).trigger('update_checkout');
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
    },
    getQueryParams: function getQueryParams(params, url) {
      var href = url;
      var reg = new RegExp('[?&]' + params + '=([^&#]*)', 'i');
      var queryString = reg.exec(href);
      return queryString ? queryString[1] : '';
    }
  };
  return app;
}(document, window, jQuery);

NovaPoshta.init();
/******/ })()
;
//# sourceMappingURL=main.js.map