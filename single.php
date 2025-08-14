<?php
/**
 *
 * Single post template
 *
 * Looks for template based on post name and post type.
 * Falls back to standard post type template.
 *
 * @package XincTheme
 * @since 0.0.2
 */

use \XincTheme\Helpers as h;

get_header();

$template = get_post_type() . '-' . h\get_page_name(); // (post)-(my-post-name).

if (locate_template('templates/content-single-' . $template . '.php') != '') {
  get_template_part('templates/content-single', $template); // e.g. templates/content-single-post-my-post-name.php
} else {
  get_template_part('templates/content-single', get_post_type());
}

get_footer(); ?>
