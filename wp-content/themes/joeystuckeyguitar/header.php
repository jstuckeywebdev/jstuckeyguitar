<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header container">
    <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png"; id="header-logo"></a>
    <nav class="main-navigation">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary-menu',
            'container'      => false,
            'menu_class'     => 'main-nav-list', 
        ) );
        ?>
    </nav>

    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
    </button>

</header>
<section class="full-width-row">
