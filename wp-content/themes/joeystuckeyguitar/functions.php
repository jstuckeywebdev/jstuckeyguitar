<?php
/**
 * Theme Setup
 */
function guitar_portfolio_setup() {
    // 1. Core Support
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    
    // 2. Alignment Support 
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );

    // // 3. Editor Styling
    // add_theme_support( 'editor-styles' );
    // add_editor_style( 'style.css' ); 

    // 1. Add support for menus
    add_theme_support( 'menus' );

    // 2. Register the actual location
    register_nav_menus( array(
        'primary-menu' => __( 'Primary Menu', 'guitar-portfolio' ),
        'footer-menu'  => __( 'Footer Menu', 'guitar-portfolio' ),
    ) );
}
add_action( 'after_setup_theme', 'guitar_portfolio_setup' );

/**
 * Enqueue Styles, Fonts, and Scripts
 */
function guitar_portfolio_assets() {
    // Main Stylesheet
    wp_enqueue_style( 
    'joey-stuckey-style', 
    get_stylesheet_uri(), 
    array(), 
    filemtime( get_template_directory() . '/style.css' ) 
    );

    // Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Quattrocento+Sans:wght@400;700&family=Fira+Code:wght@300..700&display=swap', false );

    wp_enqueue_style( 'glightbox-css', 'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css' );
    wp_enqueue_script( 'glightbox-js', 'https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js', array(), null, true );

    wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css' );
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true );

    wp_enqueue_script( 
        'guitar-main-js',                               
        get_template_directory_uri() . '/assets/js/script.js',
        array(),                                       
        filemtime( get_template_directory() . '/assets/js/script.js' ),                
        true                                    
    );
}
add_action( 'wp_enqueue_scripts', 'guitar_portfolio_assets' );

/**
 * Register ACF Blocks
 */
function register_layout_blocks() {
    // Ensure the folder exists before registering to avoid errors
    if ( file_exists( __DIR__ . '/blocks/video-selector/block.json' ) ) {
        register_block_type( __DIR__ . '/blocks/video-selector' );
    }
}
add_action( 'init', 'register_layout_blocks' );

function get_youtube_id($url) {
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
    return isset($match[1]) ? $match[1] : false;
}