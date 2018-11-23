<?php
/**
 * Class WPSG_Size_Guide
 *
 * @package WC_Product_Size_Guide/Classes
 * @since 1.0.0
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPSG_Size_Guide' ) ) :

class WPSG_Size_Guide {

	/**
	 * Name.
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * Slug.
	 *
	 * @var string
	 */
	protected $slug;

	/**
	 * Sizes table.
	 *
	 * @var array
	 */
	protected $table;

	/**
	 * Content.
	 *
	 * @var string
	 */
	protected $content;

	/**
	 * Image.
	 *
	 * @var string
	 */
	protected $image;

	/**
	 * Post type.
	 *
	 * @var string
	 */
	protected $post_type = 'size-guide';

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct( $post ) {
		$this->name = $post->post_title;
		$this->slug = $post->post_name;
		$this->content = apply_filters( 'the_content', $post->post_content );
		$this->image = get_the_post_thumbnail( $post->ID );
		$this->table = json_decode( get_post_meta( $post->ID, '_wpsg_sizes_table', true ) );
		$this->table = ( is_array( $this->table ) ) ? $this->table : array();
	}

	/**
	 * Get name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * Get slug.
	 *
	 * @since 1.0.0
	 */
	public function get_slug() {
		return $this->slug;
	}

	/**
	 * Get sizes table.
	 *
	 * @since 1.0.0
	 */
	public function get_table() {
		return $this->table;
	}

	/**
	 * Get content.
	 *
	 * @since 1.0.0
	 */
	public function get_content() {
		return $this->content;
	}

	/**
	 * Get image.
	 *
	 * @since 1.0.0
	 */
	public function get_image() {
		return $this->image;
	}

	/**
	 * Get post type.
	 *
	 * @since 1.0.0
	 */
	public function get_post_type() {
		return $this->post_type;
	}

}

endif;
