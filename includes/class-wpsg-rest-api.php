<?php
/**
 * Class WPSG_REST_API
 *
 * @package WC_Product_Size_Guide/Classes
 * @since 1.0.0
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPSG_REST_API' ) ) :

class WPSG_REST_API {

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
		add_filter( 'woocommerce_rest_prepare_product_object', array( $this, 'prepare_product_for_response' ), 10, 3 );
	}

	/**
	 * Add Size Guide product object.
	 *
	 * @since 1.0.0
	 */
	public function prepare_product_for_response( $response, $product, $request ) {
		$size_guide = wpsg_get_size_guide( $product );

		if ( $size_guide ) {
			$size_table = $size_guide->get_table();
			$table = '<table class="size-guide-table"><body>';
			foreach ( $size_table as $r => $row ) {
				$table .= '<tr>';
				foreach ( $row as $c => $column ) {
					if ( $r === 0 || $c === 0 ) {
						$table .= '<th>' . $column . '</th>';
					} else {
						$table .= '<td>' . $column . '</td>';
					}
				}
				$table .= '</tr>';
			}
			$table .= '</body></table>';

			$response->data['size_guide'] = array(
				'name' => $size_guide->get_name(),
				'image' => $size_guide->get_image(),
				'content' => $size_guide->get_content(),
				'table' => $table,
			);
		} else {
			$response->data['size_guide'] = null;
		}

		return $response;
	}

}

endif;

return new WPSG_REST_API();
