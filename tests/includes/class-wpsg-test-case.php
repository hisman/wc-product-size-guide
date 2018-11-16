<?php
/**
 * Class WPUC_Test_Case
 *
 * @package WC_Product_Size_Guide
 * @since 1.0.0
 */

class WPSG_Test_Case extends WP_UnitTestCase {

	/**
	 * Set up for each test.
	 *
	 * @since 1.0.0
	 */
	public function setUp() {
		parent::setUp();

		$this->plugin_instance = new WC_Product_Size_Guide();
	}

}
