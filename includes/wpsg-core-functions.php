<?php
/**
 * WC_Product_Size_Guide Core Functions
 *
 * @package  WC_Product_Size_Guide/Functions
 * @since  1.0.0
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get template.
 *
 * @since 1.0.0
 */
function wpsg_get_template( $template_name, $args = array() ) {
	$plugin_path = untrailingslashit( plugin_dir_path( WPSG_PLUGIN_FILE ) );
	wc_get_template( $template_name, $args, '', $plugin_path . '/templates/' );
}
