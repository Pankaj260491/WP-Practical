<?php

function register_custom_menu() {
    register_nav_menus(
        array(
            'service_menu' => __('Service Menu'),
        )
    );
}
add_action( 'init', 'register_custom_menu' );