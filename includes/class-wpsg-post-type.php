<?php
/**
 * Class WPSG_Post_Type
 *
 * @package WC_Product_Size_Guide
 * @since 1.0.0
 */

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
		add_meta_box( 'wpsg_product_size_guide', __( 'Size Guides', 'wc-product-size-guide' ), array( $this, 'product_size_guide_meta' ), 'product', 'side', 'high' );
	}

	/**
	 * Product size guide meta box.
	 *
	 * @since 1.0.0
	 */
	public function product_size_guide_meta( $post ) {
		$custom_fields = get_post_custom( $post->ID );
		$product_size_guide = get_post_meta( $post->ID, '_wpsg_product_size_guide', true );

		$size_guides = get_posts( array(
			'posts_per_page' => -1,
			'post_type' => 'size-guide',
			'orderby' => 'title',
			'order' => 'ASC',
		) );
		?>
		<p>
			<select name="wpsg_product_size_guide" class="wpsg_product_size_guide" style="width: 100%;">
				<option value="">None</option>
				<?php foreach ( $size_guides as $size ) : $selected = ( $size->ID == $product_size_guide ) ? 'selected' : ''; ?>
					<option value="<?php echo esc_attr( $size->ID ); ?>" <?php echo esc_attr( $selected ); ?>>
						<?php echo esc_attr( $size->post_title ); ?>
					</option>
				<?php endforeach; ?>
			</select>
		</p>
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

		$slugs = array( 'size-guide', 'product' );
		if ( ! in_array( $post->post_type, $slugs ) ) {
			return $post_id;
		}

		if ( isset( $_POST['wpsg_product_size_guide'] ) ) {
			$product_size_guide = sanitize_text_field( $_POST['wpsg_product_size_guide'] );
			update_post_meta( $post_id, '_wpsg_product_size_guide', $product_size_guide );
		}
	}

}

endif;

new WPSG_Post_Type();
