<?php
/**
 * Plugin Name:       Product Size Guide for WooCommerce
 * Plugin URI:        https://hisman.co
 * Description:       Allows you to add size guides for your WooCommerce products.
 * Version:           1.0.0
 * Author:            Hisman
 * Author URI:        https://hisman.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc-product-size-guide
 * Domain Path:       /languages
 * WC tested up to:      3.5.1
 * WC requires at least: 3.0.0
 *
 * @since             1.0.0
 * @package           WC_Product_Size_Guide
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Check if WooCommerce is active
if ( ! in_array('woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	return;
}

if ( ! class_exists( 'WC_Product_Size_Guide' ) ) :

class WC_Product_Size_Guide {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->includes();
	}

	/**
	 * Include required core files.
	 *
	 * @since 1.0.0
	 */
	public function includes() {
		include_once( 'includes/class-wpsg-post-type.php' );
	}

}

endif;

new WC_Product_Size_Guide();
