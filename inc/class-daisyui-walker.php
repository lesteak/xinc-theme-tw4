<?php
namespace TW4DaisyStarter;

class DaisyUI_Walker extends \Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = null ) {
        // Submenu UL
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"p-2 bg-base-100\">\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', array_filter($classes));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $atts = [];
        $atts['href'] = !empty($item->url) ? $item->url : '';
        $atts['class'] = 'block'; // basic link class

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        // If item has children, wrap it in <details>
        $has_children = in_array('menu-item-has-children', $classes, true);

        if ($has_children && $depth === 0) {
            $output .= $indent . '<li><details>';
            $output .= '<summary>' . apply_filters('the_title', $item->title, $item->ID) . '</summary>';
        } else {
            $output .= $indent . '<li><a' . $attributes . '>' . apply_filters('the_title', $item->title, $item->ID) . '</a>';
        }
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $has_children = in_array('menu-item-has-children', (array) $item->classes, true);
        if ($has_children && $depth === 0) {
            $output .= '</details></li>';
        } else {
            $output .= "</li>";
        }
    }
}
