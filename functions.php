<?php

define( 'SOD_VERSION', rand());

function sod_scripts() {
    wp_register_style( 'sod-style', get_stylesheet_directory_uri() . '/dist/css/app.css', array(), SOD_VERSION );
    wp_enqueue_style( 'sod-style');

    wp_deregister_style('_s-style');
}

add_action( 'wp_enqueue_scripts', 'sod_scripts', 11 );
