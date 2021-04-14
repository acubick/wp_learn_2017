=== Plugin Nova Poshta for WooCommerce (WordPress) ===
Contributors: wppunk
Tags: нова пошта, nova poshta, новая почта, nova pochta, інтеграція нової пошти та інтернет-магазину, плагін нової пошти для wordpress
Requires at least: 5.1
Tested up to: 5.6.2
Stable tag: 1.5.0.5
Requires PHP: 7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Integration of Nova Poshta with e-commerce on WooCommerce. Cost calculation, Creating of internet documents, bulk order management...

== Description ==

With our plugin's help, you will have full integration of Nova Poshta with e-commerce on WooCommerce. Appreciate your time and choose the only quality product that our team offers.

= Features of the Lite version =
* The Nova Poshta shipping method for WooCommerce
* Smart fields for the shipping method that help you find the needed city and warehouse
* You can choose the location of shipping fields
* Multi-language support
* Updating of the customer profile
* Ability to create internet documents
* Best support

= Features of the Pro version =
* All features from the lite version
* Cash on delivery payment
* Courier delivery
* Bulk managing of orders
* Free delivery when more than some total price. (Optional)
* Calculation of shipping cost for the courier delivery
* Calculation of shipping cost for the warehouse delivery
* Premium support

[Became Pro](https://wp-unit.com/product/nova-poshta-pro/)

== Installation ==

1. Upload `shipping-nova-poshta-for-woocommerce` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= How to get a API key? =

You need to enter your [personal account](https://new.novaposhta.ua/)

1. Go to **Settings**
2. Tab a **Security**
3. Press button **Create a key**
4. In popup you click to **Create**
5. You need a copy key with the service *Business cabinet*

[Visual guide](https://github.com/wppunk/shipping-nova-poshta-for-woocommerce/wiki/%D0%9A%D0%B0%D0%BA-%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B8%D1%82%D1%8C-API-%D0%BA%D0%BB%D1%8E%D1%87%3F)

= How to change a recipient city or warehouse? =

1. Go to **Edit order** page
2. Check what you order status *On hold* or *Pending*.
3. In shipping method item click to **Edit** in the right top corner.
4. Update current recipient information
5. Save changes

= How to create an internet document? =

1. Go to **Edit order** page
2. You need to check what in shipping method item has a recipient city and warehouse.
3.
a) In order actions In select choose a create internet document for Nova Poshta.
b) Change order status to processing.
4. Check internet document in shipping method item.

= How to enable shipping cost? =

1. Go to plugin settings page.
2. Checked option "Enable shipping cost"
3. Fill in the calculation formulas
4. You can also fill out formulas for calculation in categories or products

= How to change the plugin? =

Please do not change the code, otherwise it will be lost during the next update. Use hooks instead. We have written [documentation](https://github.com/wppunk/shipping-nova-poshta-for-woocommerce/wiki/%D0%A5%D1%83%D0%BA%D0%B8-%D0%BF%D0%BB%D0%B0%D0%B3%D0%B8%D0%BD%D0%B0) for you with examples. If there is no necessary hook for you, then create a [task](https://wordpress.org/support/plugin/shipping-nova-poshta-for-woocommerce/) and we will do it in the near future.

== Changelog ==

= 1.5.0.5 =
* Fixed API get cities error
* Increase WordPress compatibility version
* Increase WooCommerce compatibility version

= 1.5.0.4 =
* Fixed error handling for internet invoices.
* Removed Middle Name from the internet invoices.

= 1.5.0.3 =
* Improved translates

= 1.5.0.2 =
* Fixed save shipping fields

= 1.5.0.1 =
* Fixed create invoices

= 1.5.0 =
* Added courier shipping method
* Free shipping if total price more that
* Updated design
* Added ability to choose fields location.

= 1.4.1.1 =
* Fix show notices
* Fix notices markup

= 1.4.1.0 =
* Improved a plugin description
* Added a advertisement notices
* Added invoice column to the WooCommerce order list table
* Added "Exclude shipping cost from the total" options
* Added Page for the Quick shipping manage(Beta)

= 1.4.0 =
* COD Payment

= 1.3.1.3 =
* Update a support of the WooCommerce version.

= 1.3.1.2 =
* Fix 500 error in shipping method.

= 1.3.1.1 =
* Update plugin description and support of the WooCommerce version.

= 1.3.1 =
* Improved cache work
* Improved first UX
* Added notices for internet document creating

= 1.3.0 =
* Rename select2 for no conflicting with other plugins
* Calculate shipping cost
* Formulas for shipping cost
* Improved city search
* Improved activate/deactivation plugin

= 1.2.2 =
* Add translates of select2

= 1.2.1 =
* Fix default city for the Ukrainian language
* Add translates of select2
* Fix js ajax complete

= 1.2.0 =
* Clear cache after deactivate plugin
* Delete plugin tables after deactivate plugin
* UX enhancements upon plugin activation

= 1.1.1 =
* Update documentation
* Add hooks

= 1.1.0 =
* Update translates
* Auto detect user language

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0.0 =
* Initial release
* Auto detect user language

= 1.5.0 =
* Warning! The shipping cost feature was moved to the pro version
* Warning! The cash on delivery shipping method was moved to the pro version

== Screenshots ==

1. /assets/build/img/screenshot-1.png
