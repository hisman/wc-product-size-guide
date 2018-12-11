<?php
/**
 * Class Test_WPSG_Template_Functions
 *
 * @package WC_Product_Size_Guide/Tests
 * @since 1.0.0
 */

class Test_WPSG_Template_Functions extends WPSG_Test_Case {

	/**
	 * Set up for each test.
	 *
	 * @since 1.0.0
	 */
	public function setUp() {
		parent::setUp();

		$this->product_id = $this->factory->post->create( array(
			'post_name' => 'test',
			'post_title' => 'Test',
			'post_status' => 'publish',
		) );

		$this->size_guide_id = $this->factory->post->create( array(
			'post_name' => 'test-size',
			'post_title' => 'Test Size',
			'post_type' => 'size-guide',
			'post_status' => 'publish',
		) );

		update_post_meta( $this->product_id, '_wpsg_product_size_guide', $this->size_guide_id );

		$this->product = $this->getMockBuilder( 'WC_Product' )->setMethods( array( 'get_id' ) )->getMock();
		$this->product->method( 'get_id' )->willReturn( $this->product_id );
	}

	/**
	 * Test get size guide id function.
	 *
	 * @since 1.0.0
	 */
	public function test_get_size_guide_id() {
		$size_guide_id = wpsg_get_size_guide_id( $this->product );

		$this->assertEquals( $size_guide_id, $this->size_guide_id );
	}

	/**
	 * Test get size guide function.
	 *
	 * @since 1.0.0
	 */
	public function test_get_size_guide() {
		$size_guide = wpsg_get_size_guide( $this->product );

		$this->assertEquals( $size_guide->get_name(), 'Test Size' );
		$this->assertEquals( $size_guide->get_slug(), 'test-size' );
		$this->assertEquals( $size_guide->get_post_type(), 'size-guide' );
	}

}
