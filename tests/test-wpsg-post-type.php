<?php
/**
 * Class Test_WPSG_Post_Type
 *
 * @package WC_Product_Size_Guide
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

}