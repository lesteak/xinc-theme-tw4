<?php
function xinc_styles_scripts() {
  $ver = wp_get_theme()->get('Version');

  $styles_path = '/dist/styles.css';
  $styles_modified = filemtime(get_template_directory() . $styles_path);
  
  wp_enqueue_style('xinc-theme-css', get_stylesheet_directory_uri() . $styles_path . '?v=' . $styles_modified, [], $ver);

  $js_path = '/assets/js/app.js';
  $js_modified = filemtime(get_template_directory() . $js_path);
  
  wp_enqueue_script('xinc-theme-js', get_stylesheet_directory_uri() . $js_path, [], $ver, true);

}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\xinc_styles_scripts');

function add_module_to_script($tag, $handle, $src) {
    // Only add type="module" to specific scripts
    if ('xinc-theme-js' === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_module_to_script', 10, 3);

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
