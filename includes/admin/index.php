<?php
use tangible\framework;

require_once __DIR__.'/admin-notice.php';

framework\register_plugin_settings($plugin, [
  'css' => $plugin->assets_url . '/build/admin.min.css',
  'title_callback' => function() use ($plugin) {
    ?>
      <img class="plugin-logo"
        src="<?php echo $plugin->assets_url; ?>/images/loops-and-logic-logo.png"
        alt="Loops & Logic Logo"
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
