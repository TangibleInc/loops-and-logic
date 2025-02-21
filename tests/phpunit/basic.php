<?php
namespace tests\plugin;

class Basic_TestCase extends \WP_UnitTestCase {
  function test_plugin() {
    $this->assertTrue( function_exists( 'tangible_loops_and_logic' ) );
  }
}
