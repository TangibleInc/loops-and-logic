<?php

return function() use ($plugin) {

  ?>
  <h2>Getting Started</h2>

  <p>Here is the <a href="https://loopsandlogic.com/" target="_blank">official site for Loops & Logic</a>.</p>

  <p><a href="https://docs.loopsandlogic.com/">The documentation site</a> has a complete description of the template system.</p>

  <hr>

  <p>In the admin sidebar menu <b>Tangible</b>, there is a list of template types and actions.</p>
  <p>Use the <a href="<?php echo admin_url('edit.php?post_type=tangible_template'); ?>">template post type</a> to manage reusable HTML templates.</p>

  <hr>
  <p>A <b>Tangible Template</b> module is included for the following builders:
    <ul class="list">
      <li>Gutenberg</li>
      <li>Elementor</li>
      <li>Beaver Builder</li>
    </ul>
    It provides a code editor and a way to load existing templates.
  </p>

  <hr>

  <p>Please visit <a href="https://discourse.tangible.one/c/loops-and-logic/9">our discussion forum</a> for questions, feature suggestions, and other feedback.</p>

  <?php
};
