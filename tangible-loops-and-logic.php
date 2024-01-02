<?php
/**
 * Plugin Name: Tangible: Loops & Logic
 * Plugin URI: https://loopsandlogic.com/
 * Description: A template system with content type loops and conditions.
 * Version: 4.0.0-beta.4
 * Author: Team Tangible
 * Author URI: https://teamtangible.com
 * License: GPLv2 or later
 */

define( 'TANGIBLE_LOOPS_AND_LOGIC_VERSION', '4.0.0-beta.4' );

require_once __DIR__ . '/vendor/tangible/template-system/index.php';

/**
 * Get plugin instance
 */
function tangible_loops_and_logic($instance = false) {
  static $plugin;
  return $plugin ? $plugin : ($plugin = $instance);
}

add_action('plugins_loaded', function() {

  $plugin    = tangible\framework\register_plugin([
    'name'           => 'tangible-loops-and-logic',
    'title'          => 'Loops & Logic',
    'setting_prefix' => 'tloopslogic',

    'version'        => TANGIBLE_LOOPS_AND_LOGIC_VERSION,
    'file_path'      => __FILE__,
    'base_path'      => plugin_basename( __FILE__ ),
    'dir_path'       => plugin_dir_path( __FILE__ ),
    'url'            => plugins_url( '/', __FILE__ ),

    'multisite'      => false,
  ]);

  $plugin->assets_url = $plugin->url . 'assets';

  tangible_loops_and_logic( $plugin );

  // Features loaded will have in their local scope: $plugin

  $template_system = tangible_template_system();

  $loop      = $template_system->loop;
  $logic     = $template_system->logic;
  $html      = $template_system->html;
  $interface = $template_system->interface;

  require_once __DIR__.'/includes/index.php';


  // Ready hook for plugins that depend on Loops and Logic

  add_action('plugins_loaded', function() use ($plugin, $loop, $logic, $interface, $html) {

    // require_once __DIR__.'/includes/integrations/index.php';

    do_action('tangible_loops_and_logic_ready', $loop, $logic, $html);

  }, 12); // Give time for other plugins at priority 10

}, 10); // Newest version of Template System ready
