<?php
/**
 * Class WPSG_Post_Type
 *
 * @package WC_Product_Size_Guide
 * @since 1.0.0
 */

if ( ! class_exists( 'WPSG_Post_Type' ) ) :

class WPSG_Post_Type {

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
		add_action( 'init', array( $this, 'register_post_type' ) );
	}

	/**
	 * Register size guides custom post type.
	 *
	 * @since 1.0.0
	 */
	public function register_post_type() {
		register_post_type( 'size-guide', array(
			'labels' => array(
				'name' => __( 'Size Guides', 'wc-product-size-guide' ),
				'singular_name' => __( 'Size Guide', 'wc-product-size-guide' ),
				'add_new_item' => __( 'Add New Size Guide', 'wc-product-size-guide' ),
				'edit_item' => __( 'Edit Size Guide', 'wc-product-size-guide' ),
				'new_item' => __( 'New Size Guide', 'wc-product-size-guide' ),
				'all_items' => __( 'All Size Guides', 'wc-product-size-guide' ),
			),
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => false,
			'menu_icon' => 'dashicons-layout',
			'supports' => array( 'title', 'thumbnail', 'editor' ),
			'capability_type' => 'post',
			'menu_position' => 30,
		) );
	}

}

endif;

new WPSG_Post_Type();
