<?php
function styles() {
  $ver = wp_get_theme()->get('Version');

  $styles_path = '/dist/styles.css';
  $styles_modified = filemtime(get_template_directory() . $styles_path);
  
  //load css
  wp_enqueue_style('xinc_theme', get_stylesheet_directory_uri() . $styles_path . '?v=' . $styles_modified, [], $ver);
  
  wp_enqueue_script('theme-js', get_stylesheet_directory_uri() . '/assets/js/theme.js', [], $ver, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\styles');

