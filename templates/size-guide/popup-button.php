<?php
/**
 * Size guide popup button
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/size-guide/popup-button.php.
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
<a href="#size-guide-popup" id="size-guide-popup-button" class="size-guide-popup-button button">
	<?php esc_html_e( 'Size Guide', 'wc-product-size-guide' ); ?>
</a>
