<?php
/**
 * Class Test_WPSG_Frontend
 *
 * @package WC_Product_Size_Guide/Tests
 * @since 1.0.0
 */

class Test_WPSG_Frontend extends WPSG_Test_Case {

	/**
	 * Set up for each test.
	 *
	 * @since 1.0.0
	 */
	public function setUp() {
		parent::setUp();

		$this->frontend_instance = new WPSG_Frontend();
	}

	/**
	 * Test product tabs.
	 *
	 * @since 1.0.0
	 */
	public function test_product_tabs() {
		global $product;

		$product_id = $this->factory->post->create( array(
			'post_name' => 'test',
			'post_title' => 'Test',
			'post_status' => 'publish',
		) );

		$size_guide_id = $this->factory->post->create( array(
			'post_name' => 'test-size',
			'post_title' => 'Test Size',
			'post_type' => 'size-guide',
			'post_status' => 'publish',
		) );

		update_post_meta( $product_id, '_wpsg_product_size_guide', $size_guide_id );

		$product = $this->getMockBuilder( 'WC_Product' )->setMethods( array( 'get_id' ) )->getMock();
		$product->method( 'get_id' )->willReturn( $product_id );

		$tabs = $this->frontend_instance->product_tabs( array() );

		$this->assertEquals( $tabs['size_guide'], array(
			'title' => 'Size Guide',
			'priority' => 20,
			'callback' => array( $this->frontend_instance, 'size_guide_tabs' ),
		) );
	}

}
