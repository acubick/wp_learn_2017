<?php
/**
 * Bootstrap class
 *
 * @package   Shipping-Nova-Poshta-For-Woocommerce
 * @author    WP Unit
 * @link      http://wp-unit.com/
 * @copyright Copyright (c) 2020
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

namespace NovaPoshta;

use Exception;
use Auryn\Injector;
use NovaPoshta\Settings\Settings;

/**
 * Class Main
 *
 * @package NovaPoshta
 */
class Main {

	/**
	 * Plugin name
	 */
	const PLUGIN_NAME = 'Nova Poshta';
	/**
	 * Plugin slug
	 */
	const PLUGIN_SLUG = 'shipping-nova-poshta-for-woocommerce';
	/**
	 * Plugin version
	 */
	const VERSION = '1.5.0.5';


	/**
	 * Instance.
	 *
	 * @var Main|null
	 */
	private static $instance;

	/**
	 * Dependency injection container.
	 *
	 * @var Injector
	 */
	private $injector;

	/**
	 * Settings
	 *
	 * @var Settings
	 */
	private $settings;

	/**
	 * Is pro version.
	 *
	 * @var bool
	 */
	private $is_pro;

	/**
	 * Main construct.
	 *
	 * @param Injector $injector Dependency injection container.
	 */
	private function __construct( Injector $injector ) {

		$this->injector = $injector;
	}

	/**
	 * Get instance.
	 */
	public static function get_instance(): Main {

		if ( ! self::$instance ) {
			self::$instance = new self( new Injector() );
			self::$instance->init();
		}

		return self::$instance;
	}

	/**
	 * Init plugin hooks.
	 */
	private function init() {

		$this->settings = $this->make( 'Settings\Settings' );

		$this->define_hooks_without_api_key();

		if ( $this->settings->api_key() ) {
			$this->define_hooks_with_api_key();
		}

		if ( $this->is_pro() ) {
			( $this->make( 'Pro' ) )->init( $this );
		}

		do_action( 'shipping_nova_poshta_for_woocommerce_loaded', $this );
	}

	/**
	 * Is a pro version?
	 *
	 * @return bool
	 */
	public function is_pro(): bool {

		if ( ! is_null( $this->is_pro ) ) {
			return $this->is_pro;
		}

		$license_class = class_exists( 'NovaPoshta\\Pro\\License\\License' )
			? 'NovaPoshta\\Pro\\License\\License'
			: 'NovaPoshta\\Pro\\License';

		try {
			$this->injector->share( $license_class );

			$this->is_pro = ( $this->injector->make( $license_class ) )->is_valid_license();
		} catch ( \Exception $e ) {
			$this->is_pro = false;
		}

		return $this->is_pro;
	}

	/**
	 * Define hooks without API key.
	 */
	private function define_hooks_without_api_key() {

		foreach (
			[
				'Notice\Notice',
				'WooCommerce\Shipping\Shipping',
				'Admin\SettingsPage',
				'Admin\Admin',
				'License\License',
			] as $class
		) {
			( $this->make( $class ) )->hooks();
		}

		if ( ! $this->is_pro() ) {
			$this->load_education();
		}
	}

	/**
	 * Load education part.
	 */
	private function load_education() {

		if ( apply_filters( 'shipping_nova_poshta_for_woocommerce_load_education', false ) ) {
			return;
		}

		foreach (
			[
				'Education\SettingsPage',
				'Education\WooCommerce\SettingsPage',
				'Education\WooCommerce\Shipping\Shipping',
				'Education\WooCommerce\Payments\Payments',
				'Education\WooCommerce\ShippingCost\Metabox\ProductMetabox',
				'Education\WooCommerce\ShippingCost\Metabox\ProductCategoryMetabox',
				'Education\ManageOrders\ManageOrdersPage',
			] as $class
		) {
			( $this->make( $class ) )->hooks();
		}
	}

	/**
	 * Make a class from DIC.
	 *
	 * @param string $class_name Full class name.
	 *
	 * @return mixed
	 */
	public function make( string $class_name ) {

		$full_class = $this->is_pro() && class_exists( 'NovaPoshta\\Pro\\' . $class_name )
			? 'NovaPoshta\\Pro\\' . $class_name
			: 'NovaPoshta\\' . $class_name;

		try {
			$this->injector->share( $full_class );

			return $this->injector->make( $full_class );
		} catch ( Exception $e ) {
			echo esc_html( $e->getTraceAsString() );
			die();
		}
	}

	/**
	 * Define hooks with API key.
	 */
	private function define_hooks_with_api_key() {

		foreach (
			[
				'Migrations',
				'WooCommerce\Cart',
				'Notice\Advertisement',
				'WooCommerce\Checkout',
				'Front\Front',
				'WooCommerce\Order',
				'WooCommerce\ThankYou',
				'User',
				'WooCommerce\Shipping\Methods\NovaPoshta\Fields',
			] as $class
		) {
			( $this->make( $class ) )->hooks();
		}
	}
}
