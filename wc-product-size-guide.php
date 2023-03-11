<?php
/**
 * Plugin Name:       Product Size Guide for WooCommerce
 * Plugin URI:        https://github.com/hisman/wc-product-size-guide
 * Description:       Allows you to add size guides for your WooCommerce products.
 * Version:           1.0.0
 * Author:            Hisman
 * Author URI:        https://hisman.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc-product-size-guide
 * Domain Path:       /languages
 * WC tested up to:      5.0.0
 * WC requires at least: 4.0.0
 *
 * @since             1.0.0
 * @package           WC_Product_Size_Guide
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check if WooCommerce is active
 **/
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
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
		$this->init_hooks();
		$this->includes();
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @since 1.0.0
	 */
	public function init_hooks() {
		add_filter( 'plugin_action_links_' . plugin_basename( WPSG_PLUGIN_FILE ), array( $this, 'plugin_action_links' ) );
	}

	/**
	 * Include required core files.
	 *
	 * @since 1.0.0
	 */
	public function includes() {
		include_once( 'includes/wpsg-core-functions.php' );
		include_once( 'includes/class-wpsg-settings.php' );
		include_once( 'includes/class-wpsg-post-type.php' );
		include_once( 'includes/class-wpsg-product-data.php' );
		include_once( 'includes/class-wpsg-size-guide.php' );
		include_once( 'includes/class-wpsg-admin.php' );
		include_once( 'includes/class-wpsg-frontend.php' );
		include_once( 'includes/class-wpsg-rest-api.php' );
		include_once( 'includes/wpsg-template-functions.php' );
		include_once( 'includes/wpsg-template-hooks.php' );
	}

	/**
	 * Show action links on the plugin screen.
	 *
	 * @param	mixed $links Plugin Action links
	 * @return  array
	 * @since   1.0.0
	 **/
	public function plugin_action_links( $links ){
		$action_links = array(
			'settings' => '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=products&section=wc-product-size-guide' ) . '" aria-label="' . esc_attr__( 'View Product Size Guide settings', 'wc-product-size-guide' ) . '">' . esc_html__( 'Settings', 'wc-product-size-guide' ) . '</a>',
		);

		return array_merge( $action_links, $links );
	}

}

endif;

new WC_Product_Size_Guide();
