/******/ (function() { // webpackBootstrap
/*!****************************************!*\
  !*** ./assets/.src/js/admin/notice.js ***!
  \****************************************/
/* global jQuery, shippingNovaPoshtaForWoocommerce */
var NovaPoshtaNotices = window.NovaPoshtaNotices || function (document, window, $) {
  var app = {
    init: function init() {
      $(document).on('click', '.shipping-nova-poshta-for-woocommerce-notice .notice-dismiss', function () {
        app.close();
      });
    },
    close: function close() {
      $.ajax({
        url: shippingNovaPoshtaForWoocommerce.url,
        type: 'POST',
        data: {
          nonce: shippingNovaPoshtaForWoocommerce.nonce,
          action: 'shipping_nova_poshta_for_woocommerce_notice'
        }
      });
    }
  };
  return app;
}(document, window, jQuery);

NovaPoshtaNotices.init();
/******/ })()
;
//# sourceMappingURL=notice.js.map