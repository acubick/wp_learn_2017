<?php
/**
 * Cart
 *
 * @package   Shipping-Nova-Poshta-For-Woocommerce
 * @author    WP Unit
 * @link      http://wp-unit.com/
 * @copyright Copyright (c) 2020
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

namespace NovaPoshta\WooCommerce;

use NovaPoshta\Settings\Settings;

/**
 * Class Cart
 *
 * @package NovaPoshta\WooCommerce
 */
class Cart {

	/**
	 * Plugin settings.
	 *
	 * @var Settings
	 */
	private $settings;

	/**
	 * Cart constructor.
	 *
	 * @param Settings $settings Settings.
	 */
	public function __construct( Settings $settings ) {

		$this->settings = $settings;
	}

	/**
	 * Add hooks
	 */
	public function hooks() {

		add_filter( 'woocommerce_cart_get_total', [ $this, 'cart_total' ] );
	}

	/**
	 * Update cart total.
	 *
	 * @param float $total Total.
	 *
	 * @return float
	 */
	public function cart_total( float $total ): float {

		$is_free = apply_filters( 'shipping_nova_poshta_for_woocommerce_free_shipping', $this->settings->exclude_shipping_from_total() );

		if ( $is_free ) {
			return $total - WC()->cart->get_shipping_total();
		}

		return $total;
	}
}
