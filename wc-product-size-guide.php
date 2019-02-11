<?php
/**
 * Plugin Name:       Product Size Guide for WooCommerce
 * Plugin URI:        https://plugins.hisman.co/product-size-guide-for-woocommerce
 * Description:       Allows you to add size guides for your WooCommerce products.
 * Version:           1.0.0
 * Author:            Hisman
 * Author URI:        https://hisman.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc-product-size-guide
 * Domain Path:       /languages
 * WC tested up to:      3.5.2
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

// Define WPSG_PLUGIN_FILE.
if ( ! defined( 'WPSG_PLUGIN_FILE' ) ) {
	define( 'WPSG_PLUGIN_FILE', __FILE__ );
}

// Define WPSG_PLUGIN_FILE.
if ( ! defined( 'WPSG_PLUGIN_VERSION' ) ) {
	define( 'WPSG_PLUGIN_VERSION', '1.0.0' );
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
		include_once( 'includes/wpsg-core-functions.php' );
		include_once( 'includes/class-wpsg-post-type.php' );
		include_once( 'includes/class-wpsg-product-data.php' );
		include_once( 'includes/class-wpsg-size-guide.php' );
		include_once( 'includes/class-wpsg-admin.php' );
		include_once( 'includes/class-wpsg-frontend.php' );
		include_once( 'includes/wpsg-template-functions.php' );
		include_once( 'includes/wpsg-template-hooks.php' );
	}

}

endif;

new WC_Product_Size_Guide();
