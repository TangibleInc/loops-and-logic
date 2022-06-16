
<h1>Tangible Loops and Logic</h1>

<p>Global function <code>tangible_loops_and_logic</code></p>
<?php

$tester->test('tangible_loops_and_logic()', function( $it ) {

  $it( 'exists', function_exists( 'tangible_loops_and_logic' ) );
  $it( 'is not empty', ! empty( tangible_loops_and_logic() ) );
});
/*
?><hr><?php
include __DIR__ . '/../vendor/tangible/logic/tests/index.php';

?><hr><?php
include __DIR__ . '/../vendor/tangible/loop/tests/index.php';
*/
