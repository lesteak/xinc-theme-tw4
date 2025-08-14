<!doctype html>
<html <?php language_attributes(); ?> data-theme="<?php echo esc_attr( get_theme_mod('site_theme', 'light') ); ?>">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php get_template_part('templates/header/favicon'); ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class('min-h-dvh bg-base-100 text-base-content'); ?>>
  <header class="border-b border-base-300">
    <div class="navbar container mx-auto">
      <div class="flex-1 flex items-center">
        <div class="flex-none">
          <label class="swap swap-rotate">
            <input id="theme-toggle" type="checkbox" />
            <svg class="swap-off h-6 w-6 fill-current" aria-hidden="true"><use href="#icon-sun"/></svg>
            <svg class="swap-on h-6 w-6 fill-current" aria-hidden="true"><use href="#icon-moon"/></svg>
          </label>
        </div>

        <a class="btn btn-ghost text-xl font-bold" href="<?php echo esc_url(home_url('/')); ?>">
          <?php bloginfo('name'); ?>
        </a>
      </div>

       
      <!-- Desktop menu -->
      <div class="hidden md:flex">
        <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'menu menu-horizontal px-1',
          'fallback_cb'    => false,
          'walker'         => new \TW4DaisyStarter\DaisyUI_Walker(),
        ]);
        ?>
      </div>

      <!-- Mobile hamburger -->
      <div class="md:hidden flex-none">
        <button id="mobile-menu-toggle" aria-label="Toggle menu" class="btn btn-ghost btn-square">
          <svg class="h-5 w-5 fill-current" id="main-nav-hamburger"><use href="#icon-hamburger"/></svg>
          <svg class="h-5 w-5 hidden fill-current icon-close" id="main-nav-close"><use href="#icon-close"/></svg>
        </button>
      </div>
    </div>

    <!-- Mobile dropdown -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-base-300">
      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'menu menu-vertical p-2',
        'fallback_cb'    => false,
        'walker'         => new \TW4DaisyStarter\DaisyUI_Walker(),
      ]);
      ?>
    </div>
  </header>
  <main class="container mx-auto py-10">
