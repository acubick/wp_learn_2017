<?php
/**
 * InternetDocument
 *
 * @package   Shipping-Nova-Poshta-For-Woocommerce
 * @author    WP Unit
 * @link      http://wp-unit.com/
 * @copyright Copyright (c) 2020
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

namespace NovaPoshta\WooCommerce;

use WC_Order;
use Exception;
use NovaPoshta\Api\Api;
use WC_Order_Item_Shipping;
use NovaPoshta\Notice\Notice;
use NovaPoshta\Settings\Settings;
use NovaPoshta\Pro\WooCommerce\Payments\Gateways\COD;
use NovaPoshta\WooCommerce\Shipping\Methods\NovaPoshta\NovaPoshta;

/**
 * Class InternetDocument
 *
 * @package NovaPoshta\WooCommerce
 */
class InternetDocument {

	/**
	 * API for Nova Poshta
	 *
	 * @var Api
	 */
	private $api;

	/**
	 * Settings.
	 *
	 * @var Settings
	 */
	private $settings;

	/**
	 * Notice
	 *
	 * @var Notice
	 */
	private $notice;

	/**
	 * InternetDocument constructor.
	 *
	 * @param Api      $api      API for Nova Poshta.
	 * @param Settings $settings Settings.
	 * @param Notice   $notice   Notice.
	 */
	public function __construct( Api $api, Settings $settings, Notice $notice ) {

		$this->api      = $api;
		$this->settings = $settings;
		$this->notice   = $notice;
	}

	/**
	 * Create internet document for WC_Order
	 *
	 * @param WC_Order $order WooCommerce order.
	 *
	 * @throws Exception Invalid DateTime.
	 */
	public function create( WC_Order $order ) {

		$shipping_item = $this->find_shipping_method( $order->get_shipping_methods() );
		if ( ! $shipping_item ) {
			return;
		}

		if ( $shipping_item->get_meta( 'internet_document' ) ) {
			$this->notice->add( 'error', esc_html__( 'The invoice for this order was created earlier.', 'shipping-nova-poshta-for-woocommerce' ) );

			return;
		}

		$items = $order->get_items();
		if ( empty( $items ) ) {
			$this->notice->add( 'error', esc_html__( 'The order doesn\'t have a products', 'shipping-nova-poshta-for-woocommerce' ) );

			return;
		}

		$prepayment = $this->get_prepayment( $order );
		$total      = $this->settings->exclude_shipping_from_total() ?
			$order->get_total() :
			$order->get_total() - $order->get_shipping_total();

		$response = $this->api->internet_document(
			$order->get_billing_first_name(),
			$order->get_billing_last_name(),
			$order->get_billing_phone(),
			$shipping_item->get_meta( 'city_id' ),
			$this->get_delivery_address( $shipping_item ),
			$this->get_delivery_type( $shipping_item ),
			$total,
			$this->get_weight( $order ),
			$this->get_volume( $order ),
			$prepayment ? $total - $prepayment : 0
		);

		if ( is_wp_error( $response ) ) {
			$message = sprintf(
				'<strong>%s</strong>',
				esc_html__( 'The invoice wasn\'t created because:', 'shipping-nova-poshta-for-woocommerce' )
			);

			$message .= ' ' . implode( ', ', $response->get_error_messages() );
			$this->notice->add( 'error', $message );

			return;
		}

		$shipping_item->add_meta_data( 'internet_document', $response, true );
		$shipping_item->save_meta_data();
		$this->notice->add( 'success', esc_html__( 'The invoice was successfully created', 'shipping-nova-poshta-for-woocommerce' ) );

		$order->add_order_note(
			esc_html__( 'Created an Internet document for Nova Poshta', 'shipping-nova-poshta-for-woocommerce' )
		);
	}

	/**
	 * Get prepayment price.
	 *
	 * @param WC_Order $order Current Order.
	 *
	 * @return int
	 */
	protected function get_prepayment( WC_Order $order ): int {

		return 0;
	}

	/**
	 * Get delivery address.
	 *
	 * @param WC_Order_Item_Shipping $shipping_item Current shipping method.
	 *
	 * @return array|mixed|string
	 */
	protected function get_delivery_address( WC_Order_Item_Shipping $shipping_item ): string {

		return $shipping_item->get_meta( 'warehouse_id' );
	}

	/**
	 * Get delivery type.
	 *
	 * @param WC_Order_Item_Shipping $shipping_item Current shipping method.
	 *
	 * @return string
	 */
	protected function get_delivery_type( WC_Order_Item_Shipping $shipping_item ): string {

		return 'warehouse';
	}

	/**
	 * Get weight for current order.
	 *
	 * @param WC_Order $order Current order.
	 *
	 * @return float
	 */
	protected function get_weight( WC_Order $order ): float {

		return 0;
	}

	/**
	 * Get volume for current order.
	 *
	 * @param WC_Order $order Current order.
	 *
	 * @return float
	 */
	protected function get_volume( WC_Order $order ): float {

		return 0;
	}

	/**
	 * Find current shipping method
	 *
	 * @param array $shipping_methods List of shipping methods.
	 *
	 * @return WC_Order_Item_Shipping|null
	 */
	protected function find_shipping_method( array $shipping_methods ) {

		foreach ( $shipping_methods as $shipping_method ) {
			if ( NovaPoshta::ID === $shipping_method->get_method_id() ) {
				return $shipping_method;
			}
		}

		return null;
	}
}
