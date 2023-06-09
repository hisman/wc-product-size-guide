<?php
/**
 * Class Test_WPSG_Post_Type
 *
 * @package WC_Product_Size_Guide/Tests
 * @since 1.0.0
 */

class Test_WPSG_Post_Type extends WPSG_Test_Case {

	/**
	 * Set up for each test.
	 *
	 * @since 1.0.0
	 */
	public function setUp() {
		parent::setUp();

		$this->post_type_instance = new WPSG_Post_Type();
	}

	/**
	 * Test register post type.
	 *
	 * @since 1.0.0
	 */
	public function test_register_post_type() {
		global $wp_post_types;

		$this->post_type_instance->register_post_type();
		$this->assertTrue( array_key_exists( 'size-guide', $wp_post_types ) );
	}

	/**
	 * Test sizes table meta box.
	 *
	 * @since 1.0.0
	 */
	public function test_sizes_table_meta() {
		$post_id = $this->factory->post->create( array(
			'post_name' => 'test-size',
			'post_title' => 'Test Size',
			'post_type' => 'size-guide',
			'post_status' => 'publish',
		) );

		$post = get_post( $post_id );

		$this->expectOutputRegex( '/<textarea id="wpsg_sizes_table_textarea" class="wpsg_sizes_table_textarea"/' );
		$this->post_type_instance->sizes_table_meta( $post );
	}

}
