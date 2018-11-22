<?php
/**
 * Class WPSG_Frontend
 *
 * @package WC_Product_Size_Guide
 * @since 1.0.0
 */

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
		add_filter( 'woocommerce_product_tabs', array( $this, 'product_tabs' ), 20 );
	}

	/**
	 * Override product tabs.
	 *
	 * @since 1.0.0
	 */
	public function product_tabs( $tabs ) {
		$tabs['size_guide'] = array(
			'title' => __( 'Size Guide', 'wc-product-size-guide' ),
			'priority' => 20,
			'callback' => array( $this, 'size_guide_tabs' ),
		);

		return $tabs;
	}

	/**
	 * Size guide tabs.
	 *
	 * @since 1.0.0
	 */
	public function size_guide_tabs() {
		wc_get_template( 'single-product/tabs/size-guide.php', array(), '', $this->plugin_path() . '/templates/' );
	}

	/**
     * Get the plugin path.
     *
     * @since 1.0.0
     */
    public function plugin_path(){
		return untrailingslashit( plugin_dir_path( WPSG_PLUGIN_FILE ) );
    }

}

endif;

new WPSG_Frontend();
