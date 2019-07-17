<?php
/**
 * Class WPSG_Admin
 *
 * @package WC_Product_Size_Guide/Classes
 * @since 1.0.0
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPSG_Admin' ) ) :

class WPSG_Admin {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->init_hooks();
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @since 1.0.0
	 */
	public function init_hooks() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_assets' ) );
	}

	/**
	 * Load admin assets.
	 *
	 * @since 1.0.0
	 */
	public function admin_assets( $suffix ) {
		if ( in_array( $suffix, array( 'post.php', 'post-new.php', 'edit-tags.php' ) ) ) {
			wp_register_style( 'wpsg-admin-style', wpsg_get_plugin_url() . '/assets/css/admin.css', array(), WPSG_PLUGIN_VERSION );

			wp_register_script( 'wpsg-admin-edittable-scripts', wpsg_get_plugin_url() . '/assets/js/jquery.edittable.min.js', array( 'jquery' ), WPSG_PLUGIN_VERSION, true );
			wp_register_script( 'wpsg-admin-scripts', wpsg_get_plugin_url() . '/assets/js/admin.min.js', array( 'wpsg-admin-edittable-scripts' ), WPSG_PLUGIN_VERSION, true );

			wp_enqueue_style( 'wpsg-admin-style' );
			wp_enqueue_script( 'wpsg-admin-scripts' );
		}
	}

}

endif;

new WPSG_Admin();
