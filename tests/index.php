<?php

$system = tangible_template_system();
$tester = $system->tester();

$test = $tester->start('Loops & Logic');

$test('Function tangible_loops_and_logic()', function( $it ) {

  $it( 'exists', function_exists( 'tangible_loops_and_logic' ) );

  $plugin = tangible_loops_and_logic();

  $it( 'returns an object', is_object( $plugin ) );

});

$test->report();

$system->run_tests();
