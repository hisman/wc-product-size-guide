<?php
/**
 * WC_Product_Size_Guide Functions
 *
 * @package  WC_Product_Size_Guide/Functions
 * @since  1.0.0
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get size guide.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wpsg_get_size_guide' ) ) {
	function wpsg_get_size_guide( $post_id ) {
		$post = get_post( $post_id );

		if ( ! $post ) {
			return false;
		}

		$size_guide = new WPSG_Size_Guide( $post );

		return $size_guide;
	}
}
