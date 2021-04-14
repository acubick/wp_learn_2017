<?php
/**
 * Education on settings page
 *
 * @package   Shipping-Nova-Poshta-For-Woocommerce
 * @author    WP Unit
 * @link      http://wp-unit.com/
 * @copyright Copyright (c) 2020
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

namespace NovaPoshta\Education\WooCommerce;

use NovaPoshta\Main;

/**
 * Class SettingsPage
 *
 * @package NovaPoshta\Education
 */
class SettingsPage {

	/**
	 * Hooks.
	 */
	public function hooks() {

		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_style' ] );
	}

	/**
	 * Enqueue styles.
	 */
	public function enqueue_style() {

		if ( ! $this->is_settings_page() ) {
			return;
		}

		wp_enqueue_style(
			Main::PLUGIN_SLUG . '-woocommerce-admin',
			NOVA_POSHTA_URL . 'assets/build/css/admin/education.css',
			[],
			Main::VERSION
		);
	}

	/**
	 * Determinate settings page.
	 *
	 * @return bool
	 */
	private function is_settings_page(): bool {

		return in_array( filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRING ), [ Main::PLUGIN_SLUG, Main::PLUGIN_SLUG . '-manage-orders', 'wc-settings' ], true ) || in_array( filter_input( INPUT_GET, 'tab', FILTER_SANITIZE_STRING ), [ 'shipping', 'payment' ], true );
	}
}
