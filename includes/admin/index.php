<?php

require_once __DIR__.'/admin-notice.php';

$plugin->register_settings([
  'css' => $plugin->assets_url . '/admin.css',
  'title_callback' => function() use ($plugin) {
    ?>
      <img class="plugin-logo"
        src="<?php echo $plugin->assets_url; ?>/images/loops-and-logic-logo.png"
        alt="Tangible Blocks Logo"
        width="40"
      >
      <?php echo $plugin->title; ?>
    <?php
  },
  'tabs' => [
    'welcome' => [
      'title' => 'Welcome',
      'callback' => require_once __DIR__.'/welcome.php'
    ]
  ],
]);
