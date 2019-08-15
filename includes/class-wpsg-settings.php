<?php
/**
 * Class WPSG_Settings
 *
 * @package WC_Product_Size_Guide/Classes
 * @since 1.0.0
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPSG_Settings' ) ) :

class WPSG_Settings {

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
		add_filter( 'woocommerce_get_sections_products', array( $this, 'add_section' ) );
		add_filter( 'woocommerce_get_settings_products', array( $this, 'add_settings' ), 10, 2 );
	}

	/**
	 * Add Size Guide section to Products settings tab.
	 *
	 * @since 1.0.0
	 */
	public function add_section( $sections ) {
		$sections['wc-product-size-guide'] = __( 'Size Guide', 'wc-product-size-guide' );
		return $sections;
	}

	/**
	 * Add settings to Size Guide section.
	 *
	 * @since 1.0.0
	 */
	public function add_settings( $settings, $current_section ) {
		if ( $current_section !== 'wc-product-size-guide' ) {
			return $settings;
		}

		$size_guide_settings = array(
			array(
				'title' => __( 'Size Guide', 'wc-product-size-guide' ),
				'type'  => 'title',
				'id'    => 'wpsg_title',
			),

			array(
				'title'    => __( 'Enable', 'wc-product-size-guide' ),
				'desc'     => __( 'Enable Size Guide', 'wc-product-size-guide' ),
				'id'       => 'wpsg_enable_size_guide',
				'default'  => 'no',
				'type'     => 'checkbox',
			),

			array(
				'title'    => __( 'Size Guide Position', 'woocommerce' ),
				'desc'     => __( 'The position for size guide in the product page.', 'wc-product-size-guide' ),
				'id'       => 'wpsg_size_guide_position',
				'default'  => '',
				'type'     => 'select',
				'desc_tip' => true,
				'options'  => array(
					'popup' => 'Popup',
					'tab' => 'Product Tabs',
					'both' => 'Popup & Product Tabs',
				),
			),

			array( 'type' => 'sectionend', 'id' => 'wc-product-size-guide' ),
		);

		return $size_guide_settings;
	}

}

endif;

return new WPSG_Settings();
