<?php
/**
 * WC_Product_Size_Guide Template Hooks
 *
 * @package  WC_Product_Size_Guide/Templates
 * @since  1.0.0
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Size guide content.
 *
 * @see wpsg_template_size_guide_content()
 */
add_action( 'wpsg_size_guide_content', 'wpsg_template_size_guide_content', 10 );

/**
 * Size guide image.
 *
 * @see wpsg_template_size_guide_image()
 */
add_action( 'wpsg_size_guide_image', 'wpsg_template_size_guide_image', 10 );

/**
 * Size guide table.
 *
 * @see wpsg_template_size_guide_table()
 */
add_action( 'wpsg_size_guide_table', 'wpsg_template_size_guide_table', 10 );
