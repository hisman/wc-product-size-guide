<?php
/**
 * Size guide popup
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/size-guide/popup.php.
 *
 * HOWEVER, on occasion WC_Product_Size_Guide will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @package 	WC_Product_Size_Guide/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div id="size-guide-popup" class="mfp-hide size-guide-popup">

	<h2><?php esc_html_e( 'Size Guide', 'wc-product-size-guide' ); ?></h2>

	<?php
	/**
	 * Hook: wpsg_size_guide_image.
	 *
	 * @hooked wpsg_template_size_guide_image - 10
	 */
	do_action( 'wpsg_size_guide_image', $size_guide );

	/**
	 * Hook: wpsg_size_guide_content.
	 *
	 * @hooked wpsg_template_size_guide_content - 10
	 */
	do_action( 'wpsg_size_guide_content', $size_guide );

	/**
	 * Hook: wpsg_size_guide_table.
	 *
	 * @hooked wpsg_template_size_guide_table - 10
	 */
	do_action( 'wpsg_size_guide_table', $size_guide );

	?>

</div>
