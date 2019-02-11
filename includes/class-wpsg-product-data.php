<?php
/**
 * Class WPSG_Product_data
 *
 * @package WC_Product_Size_Guide/Classes
 * @since 1.0.0
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPSG_Product_data' ) ) :

class WPSG_Product_data {

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
		add_action( 'woocommerce_product_options_general_product_data', array( $this, 'size_guide_field' ) );
		add_action( 'woocommerce_process_product_meta', array( $this, 'save_size_guide_field' ) );
	}

	/**
	 * Output product size guide field.
	 *
	 * @since 1.0.0
	 */
	public function size_guide_field() {
		$size_guides = get_posts( array(
			'posts_per_page' => -1,
			'post_type' => 'size-guide',
			'orderby' => 'title',
			'order' => 'ASC',
		) );

		$options = array( '' => 'None' );
		foreach ( $size_guides as $size ) {
			$options[$size->ID] = $size->post_title;
		}

		woocommerce_wp_select( array(
			'id' => '_wpsg_product_size_guide',
			'label' => 'Size Guide',
			'options' => $options
		) );
	}

	/**
	 * Save product size guide field.
	 *
	 * @since 1.0.0
	 */
	public function save_size_guide_field( $post_id ) {
		if ( isset( $_POST['_wpsg_product_size_guide'] ) ) {
			$product = wc_get_product( $post_id );
			$product->update_meta_data( '_wpsg_product_size_guide', sanitize_text_field( $_POST['_wpsg_product_size_guide'] ) );
			$product->save_meta_data();
		}
	}

}

endif;

new WPSG_Product_data();
