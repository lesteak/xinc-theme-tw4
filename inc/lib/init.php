<?php

//register Menus
add_action('after_setup_theme', function () {
    register_nav_menus([
        'primary' => __('Primary Menu', 'xinc-theme'),
    ]);
});

add_action('wp_footer', function () {
  echo file_get_contents( get_template_directory() . '/assets/icons/icons.svg' );
});
