<?php
add_action('wp_enqueue_scripts', function () {
  $ver = wp_get_theme()->get('Version');
  wp_enqueue_style('tw4-daisyui', get_stylesheet_directory_uri() . '/dist/styles.css', [], $ver);
  
    // Optional: your JS
  wp_enqueue_script('theme-js', get_stylesheet_directory_uri() . '/assets/js/theme.js', [], $ver, true);
});

// (Optional) load same CSS in the block editor
add_action('after_setup_theme', function () {
  add_editor_style('dist/styles.css');
});


add_action('after_setup_theme', function () {
    register_nav_menus([
        'primary' => __('Primary Menu', 'xinc-theme'),
    ]);
});

add_action('wp_footer', function () {
  echo file_get_contents( get_template_directory() . '/assets/icons/icons.svg' );
});

require_once get_template_directory() . '/inc/class-daisyui-walker.php';
