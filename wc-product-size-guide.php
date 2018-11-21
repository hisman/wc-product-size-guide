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
     * Plugin version.
     *
     * @var string
     */
	public $version = '1.0.0';

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * Include required core files.
	 *
	 * @since 1.0.0
	 */
	public function includes() {
		include_once( 'includes/class-wpsg-post-type.php' );
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @since 1.0.0
	 */
	public function init_hooks() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @since 1.0.0
	 */
	public function admin_scripts( $suffix ) {
		if ( in_array( $suffix, array( 'post.php', 'post-new.php', 'edit-tags.php' ) ) ) {
			wp_register_style( 'wpsg-admin-styles', $this->plugin_url() . '/assets/css/admin.css', array(), $this->version );

			wp_register_script( 'wpsg-admin-edittable-scripts', $this->plugin_url() . '/assets/js/jquery.edittable.min.js', array( 'jquery' ), $this->version );
			wp_register_script( 'wpsg-admin-scripts', $this->plugin_url() . '/assets/js/admin.min.js', array( 'wpsg-admin-edittable-scripts' ), $this->version );

			wp_enqueue_style( 'wpsg-admin-styles' );
			wp_enqueue_script( 'wpsg-admin-scripts' );
		}
	}

	/**
     * Get the plugin url.
     *
     * @since 1.0.0
     */
    public function plugin_url(){
		return untrailingslashit( plugins_url( '/', __FILE__ ) );
    }

}

endif;

new WC_Product_Size_Guide();
