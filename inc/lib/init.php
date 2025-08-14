<?php
/**
 * Register Menus
 */
add_filter('show_admin_bar', '__return_false');
add_action('after_setup_theme', function () {
    register_nav_menus([
        'primary' => __('Primary Menu', 'xinc-theme'),
        'footer' => __('Footer Menu', 'xinc-theme'),
    ]);
});

/**
 * Add icons in footer
 */
add_filter('show_admin_bar', '__return_false');
add_action('wp_footer', function () {
  echo file_get_contents( get_template_directory() . '/assets/icons/icons.svg' );
});

/**
 * Add page titles
 */
function custom_document_title() {
    if (is_single() || is_page()) {
        echo '<title>' . get_the_title() . ' | ' . get_bloginfo('name') . '</title>';
    } else {
        echo '<title>' . wp_get_document_title() . '</title>';
    }
}
add_action('wp_head', 'custom_document_title');


/**
 * Remove admin bar
 */
add_filter('show_admin_bar', '__return_false');
