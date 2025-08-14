<?php
/**
 *
 * Page template
 *
 * Checks pagename in WP query_var.
 * Looks for template based on pagename.
 * Looks for original languages pagename template if WPML plugin installed.
 * Falls back to standard get_template_part.
 *
 * @package XincTHeme
 * @since 0.0.2
 */

use \XincTheme\Helpers as h;

get_header();

$template = h\get_page_name();

if (is_front_page()) {
  get_template_part('templates/content-page-front');
} elseif (locate_template('templates/content-page-' . $template . '.php') != '') {
  get_template_part('templates/content-page', $template); // e.g. templates/content-page-members.php
} else {
  get_template_part('templates/content-page');
}

get_footer(); ?>
