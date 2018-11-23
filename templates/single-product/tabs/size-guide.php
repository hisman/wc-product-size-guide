<?php
/**
 * Size guide tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/size-guide.php.
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

$heading = esc_html( apply_filters( 'wpsg_size_guide_tab_heading', __( 'Size Guide', 'wc-product-size-guide' ) ) );
?>

<?php if ( $heading ) : ?>
	<h2><?php echo $heading; ?></h2>
<?php endif; ?>

<div>
	<?php if ( $size_guide->get_content() != '' ) : ?>
		<div>
			<?php echo $size_guide->get_content(); ?>
		</div>
	<?php endif; ?>

	<?php if ( $size_guide->get_image() != '' ) : ?>
		<div>
			<?php echo $size_guide->get_image(); ?>
		</div>
	<?php endif; ?>

	<?php if ( is_array( $size_guide->get_table() ) ) : ?>
		<table>
			<body>
			<?php foreach ( $size_guide->get_table() as $r => $row ) : ?>
				<tr>
				<?php foreach ( $row as $c => $column ) : ?>
					<?php if ( $r === 0 ) : ?>
						<th><?php echo esc_html( $column ); ?></th>
					<?php else : ?>
						<td><?php echo esc_html( $column ); ?></td>
					<?php endif; ?>
				<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
			</body>
		</table>
	<?php endif; ?>
</div>
