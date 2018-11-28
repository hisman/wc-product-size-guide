<?php
/**
 * Class WPSG_Frontend
 *
 * @package WC_Product_Size_Guide/Classes
 * @since 1.0.0
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPSG_Frontend' ) ) :

class WPSG_Frontend {

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
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_assets' ) );
		add_filter( 'woocommerce_product_tabs', array( $this, 'product_tabs' ), 20 );
	}

	/**
	 * Load frontend assets.
	 *
	 * @since 1.0.0
	 */
	public function frontend_assets() {
		wp_register_style( 'wpsg-frontend-style', wpsg_get_plugin_url() . '/assets/css/style.css', array(), WPSG_PLUGIN_VERSION );
		wp_enqueue_style( 'wpsg-frontend-style' );
	}

	/**
	 * Override product tabs.
	 *
	 * @since 1.0.0
	 */
	public function product_tabs( $tabs ) {
		global $product, $size_guide;
		$size_guide = wpsg_get_size_guide( $product );

		if ( $size_guide ) {
			$tabs['size_guide'] = array(
				'title' => __( 'Size Guide', 'wc-product-size-guide' ),
				'priority' => 20,
				'callback' => array( $this, 'size_guide_tabs' ),
			);
		}

		return $tabs;
	}

	/**
	 * Size guide tabs.
	 *
	 * @since 1.0.0
	 */
	public function size_guide_tabs() {
		global $size_guide;

		wpsg_get_template( 'single-product/tabs/size-guide.php', array(
			'size_guide' => $size_guide,
		) );
	}

}

endif;

new WPSG_Frontend();
