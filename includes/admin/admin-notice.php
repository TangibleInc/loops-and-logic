<?php
use tangible\framework;

defined('ABSPATH') or die();

framework\register_admin_notice(function() use ($plugin) {

  $welcome_notice_key = $plugin->setting_prefix . '_welcome_notice';

  // For testing
  // framework\reset_admin_notice($welcome_notice_key);

  if ( framework\is_admin_notice_dismissed( $welcome_notice_key ) ) {
    return;
  }

  if (
    isset( $_GET['dismiss_admin_notice'], $_GET['_wpnonce'] )
    && wp_verify_nonce( sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ), 'dismiss_admin_notice' )
  ) {
    // Remove notice after clicking link to welcome page
    framework\dismiss_admin_notice( $welcome_notice_key );
    return;
  }

  ?>
  <div class="notice notice-info is-dismissible"
    data-tangible-admin-notice="<?php echo esc_attr( $welcome_notice_key ); ?>"
  >
    <p>Welcome to <b><?php echo esc_html( $plugin->title ); ?></b>. Please see the <a href="<?php
      $url = (is_multisite() ? 'settings.php' : 'options-general.php')
        . "?page={$plugin->name}-settings&dismiss_admin_notice=true"
      ;
      echo esc_url( wp_nonce_url( $url, 'dismiss_admin_notice' ) );
    ?>">plugin settings page</a> to get started.</p>
  </div>
  <?php

});
