<?php
/**
 * Class WPSG_Post_Type
 *
 * @package WC_Product_Size_Guide/Classes
 * @since 1.0.0
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_meta_boxes' ), 1, 2 );
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

	/**
	 * Add post meta boxes.
	 *
	 * @since 1.0.0
	 */
	public function add_meta_boxes() {
		add_meta_box( 'wpsg_sizes_table', __( 'Sizes Table', 'wc-product-size-guide' ), array( $this, 'sizes_table_meta' ), 'size-guide', 'normal', 'high' );
	}

	/**
	 * Product size table meta box.
	 *
	 * @since 1.0.0
	 */
	public function sizes_table_meta( $post ) {
		$sizes_table = get_post_meta( $post->ID, '_wpsg_sizes_table', true );
	?>
		<p>
			<textarea id="wpsg_sizes_table_textarea" class="wpsg_sizes_table_textarea" type="text" rows="3" name="wpsg_sizes_table"><?php echo esc_html( $sizes_table ); ?></textarea>
		<p>
	<?php
	}

	/**
	 * Save meta boxes.
	 *
	 * @since 1.0.0
	 */
	public function save_meta_boxes( $post_id, $post ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		$slugs = array( 'size-guide' );
		if ( ! in_array( $post->post_type, $slugs ) ) {
			return $post_id;
		}

		if ( isset( $_POST['wpsg_sizes_table'] ) ) {
			$sizes_table = sanitize_text_field( $_POST['wpsg_sizes_table'] );
			update_post_meta( $post_id, '_wpsg_sizes_table', $sizes_table );
		}
	}

}

endif;

new WPSG_Post_Type();
