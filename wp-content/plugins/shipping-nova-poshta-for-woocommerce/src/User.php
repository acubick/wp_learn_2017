<?php
/**
 * User
 *
 * @package   Shipping-Nova-Poshta-For-Woocommerce
 * @author    WP Unit
 * @link      http://wp-unit.com/
 * @copyright Copyright (c) 2020
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

namespace NovaPoshta;

/**
 * Class User
 *
 * @package NovaPoshta
 */
class User {

	/**
	 * Add hooks
	 */
	public function hooks() {

		add_action( 'woocommerce_checkout_create_order_shipping_item', [ $this, 'update' ], 10, 4 );

		add_filter( 'shipping_nova_poshta_for_woocommerce_default_city_id', [ $this, 'city' ] );
		add_filter( 'shipping_nova_poshta_for_woocommerce_default_warehouse_id', [ $this, 'warehouse' ] );
	}

	/**
	 * Current user city.
	 *
	 * @param string $city_id City ID.
	 *
	 * @return string
	 */
	public function city( string $city_id ): string {

		$user_id = get_current_user_id();
		if ( ! $user_id ) {
			return $city_id;
		}

		$user_city_id = get_user_meta( $user_id, 'shipping_nova_poshta_for_woocommerce_city', true );

		return ! empty( $user_city_id ) ? $user_city_id : $city_id;
	}

	/**
	 * Current user warehouse
	 *
	 * @param string $warehouse_id Warehouse ID.
	 *
	 * @return string
	 */
	public function warehouse( string $warehouse_id ): string {

		$user_id = get_current_user_id();
		if ( $user_id ) {
			$user_warehouse_id = get_user_meta( $user_id, 'shipping_nova_poshta_for_woocommerce_warehouse', true );
		}

		return ! empty( $user_warehouse_id ) ? $user_warehouse_id : $warehouse_id;
	}

	/**
	 * Update user_meta after each order complete
	 */
	public function update() {

		$user_id = get_current_user_id();

		if ( ! $user_id ) {
			return;
		}

		$nonce = filter_input( INPUT_POST, 'shipping_nova_poshta_for_woocommerce_nonce', FILTER_SANITIZE_STRING );
		if ( ! wp_verify_nonce( $nonce, Main::PLUGIN_SLUG . '-shipping' ) ) {
			return;
		}

		$city_id         = filter_input( INPUT_POST, 'shipping_nova_poshta_for_woocommerce_city', FILTER_SANITIZE_STRING );
		$warehouse_id    = filter_input( INPUT_POST, 'shipping_nova_poshta_for_woocommerce_warehouse', FILTER_SANITIZE_STRING );
		$courier_address = filter_input( INPUT_POST, 'shipping_nova_poshta_for_woocommerce_courier_address', FILTER_SANITIZE_STRING );

		if ( $city_id ) {
			update_user_meta( $user_id, 'shipping_nova_poshta_for_woocommerce_city', $city_id );
		}

		if ( $warehouse_id ) {
			update_user_meta( $user_id, 'shipping_nova_poshta_for_woocommerce_warehouse', $warehouse_id );
		}

		if ( $courier_address ) {
			update_user_meta( $user_id, 'shipping_nova_poshta_for_woocommerce_courier', $courier_address );
		}
	}
}
