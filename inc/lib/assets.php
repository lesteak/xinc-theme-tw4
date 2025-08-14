<?php
function xinc_styles_scripts() {
  $ver = wp_get_theme()->get('Version');

  $styles_path = '/dist/styles.css';
  $styles_modified = filemtime(get_template_directory() . $styles_path);
  
  //load css
  wp_enqueue_style('xinc_theme', get_stylesheet_directory_uri() . $styles_path . '?v=' . $styles_modified, [], $ver);
  
  wp_enqueue_script('theme-js', get_stylesheet_directory_uri() . '/assets/js/theme.js', [], $ver, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\xinc_styles_scripts');

/**
 * Localize script
 *
 * Make data available to JS scripts via global JS variables.
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_localize_script
 * @since 1.1.0
 * @return void
 */
function localize_scripts() {
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
    wp_localize_script('xinc-theme', 'xinc-theme-JS', [
      'ajaxUrl'        => admin_url('admin-ajax.php'),
      'nextNonce'      => wp_create_nonce('next_nonce'),
      'cookieExpires'  => (get_theme_mod('notification_expires') ? get_theme_mod('notification_expires'): 999),
      'themeUrl'       => get_template_directory_uri(),
      'notificationJS' => (get_theme_mod('notification_use_js') ? 'true' : 'false'),
      'siteURL'        => site_url(),
    ]);
  } 
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\localize_scripts');
