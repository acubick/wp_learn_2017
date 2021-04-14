<?php
/**
 * Shipping Nova Poshta for WooCommerce Uninstall
 *
 * Uninstalling Shipping Nova Poshta for WooCommerce deletes.
 *
 * @package Shipping Nova Poshta for WooCommerce
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

require_once __DIR__ . '/shipping-nova-poshta-for-woocommerce.php';

$db = nova_poshta()->make( 'DB' );
$db->drop();

$transient_cache = nova_poshta()->make( 'Cache\TransientCache' );
$transient_cache->flush();

$object_cache = nova_poshta()->make( 'Cache\ObjectCache' );
$object_cache->flush();
