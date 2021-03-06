<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package caearagon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site <?php if (is_front_page()) {  ?> main-background <? } ?>">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'caearagon'); ?></a>

        <header id="masthead" class="site-header">
            <div class="site-branding">
                <img src="<?php print(get_template_directory_uri()) ?>/images/logo.png">
                <!-- <?php
                        the_custom_logo();
                        ?> <?php
                            if (is_front_page() && is_home()) :
                            ?> <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php
                            else :
            ?>
                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
            <?php
                            endif;
                            $caearagon_description = get_bloginfo('description', 'display');
                            if ($caearagon_description || is_customize_preview()) :
            ?>
                <p class="site-description"><?php echo $caearagon_description; /* WPCS: xss ok. */ ?></p>
            <?php endif; ?>
            -->
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'caearagon'); ?></button>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                ));
                ?>
            </nav><!-- #site-navigation -->
        </header><!-- #masthead -->

        <div id="content" class="site-content">
