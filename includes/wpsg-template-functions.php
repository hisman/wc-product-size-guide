<?php
/**
 * WC_Product_Size_Guide Template Functions
 *
 * @package  WC_Product_Size_Guide/Functions
 * @since  1.0.0
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get size guide id.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wpsg_get_size_guide_id' ) ) {
	function wpsg_get_size_guide_id( $product ) {
		return $product->get_meta( '_wpsg_product_size_guide' );
	}
}

/**
 * Get size guide.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wpsg_get_size_guide' ) ) {
	function wpsg_get_size_guide( $product ) {
		$size_guide_id = wpsg_get_size_guide_id( $product );
		if ( ! $size_guide_id ) {
			return false;
		}

		$post = get_post( $size_guide_id );
		if ( ! $post ) {
			return false;
		}

		return new WPSG_Size_Guide( $post );
	}
}

/**
 * Show size guide content.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wpsg_template_size_guide_content' ) ) {
	function wpsg_template_size_guide_content( $size_guide ) {
		if ( $size_guide->get_content() == '' ) {
			return;
		}

		wpsg_get_template( 'size-guide/content.php', array(
			'size_content' => $size_guide->get_content(),
		) );
	}
}

/**
 * Show size guide image.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wpsg_template_size_guide_image' ) ) {
	function wpsg_template_size_guide_image( $size_guide ) {
		if ( $size_guide->get_image() == '' ) {
			return;
		}

		wpsg_get_template( 'size-guide/image.php', array(
			'size_image' => $size_guide->get_image(),
		) );
	}
}

/**
 * Show size guide table.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wpsg_template_size_guide_table' ) ) {
	function wpsg_template_size_guide_table( $size_guide ) {
		if ( $size_guide->get_table() == '' ) {
			return;
		}

		wpsg_get_template( 'size-guide/table.php', array(
			'size_table' => $size_guide->get_table(),
		) );
	}
}
