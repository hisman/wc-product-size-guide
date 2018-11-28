<?php
/**
 * Class Test_WPSG_Functions
 *
 * @package WC_Product_Size_Guide/Tests
 * @since 1.0.0
 */

class Test_WPSG_Functions extends WPSG_Test_Case {

	/**
	 * Test get size guide function.
	 *
	 * @since 1.0.0
	 */
	public function test_get_size_guide() {
		$post_id = $this->factory->post->create( array(
			'post_name' => 'test-size',
			'post_title' => 'Test Size',
			'post_type' => 'size-guide',
			'post_status' => 'publish',
		) );

		$size_guide = wpsg_get_size_guide( $post_id );

		$this->assertEquals( $size_guide->get_name(), 'Test Size' );
		$this->assertEquals( $size_guide->get_slug(), 'test-size' );
		$this->assertEquals( $size_guide->get_post_type(), 'size-guide' );
	}

}
