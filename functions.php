<?php

function oleotrescomas_inicial() {

    wp_enqueue_style('front', get_stylesheet_directory_uri() . '/assets/styles/principal/front-page.css', array(), false, 'all');
    wp_enqueue_style('style', get_stylesheet_uri(), array(), false, 'all');

}

add_action('wp_enqueue_scripts', 'oleotrescomas_inicial');