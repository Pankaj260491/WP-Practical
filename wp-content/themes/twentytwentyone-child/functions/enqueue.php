<?php
function wp_enqueue_styles() {
    wp_enqueue_style( 'twenty-twenty-one-child-style', get_stylesheet_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_styles', 99  );