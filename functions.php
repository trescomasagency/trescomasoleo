<?php

function oleotrescomas_inicial() {

    // wp_register_style('inter', 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap', array(), false, 'all');

    wp_enqueue_style('front', get_stylesheet_directory_uri() . '/assets/styles/principal/front-page.css', array('inter'), false, 'all');
    wp_enqueue_style('style', get_stylesheet_uri(), array(), false, 'all');

    // wp_register_script('axios', get_template_directory_uri() . '/assets/js/config/axios.js', array(), false, true);
    // wp_register_script('platzi-service', get_template_directory_uri() . '/assets/js/services/platzi.js', array('axios'), false, true);
    // wp_register_script('custom-controllers', get_template_directory_uri() . '/assets/js/controllers/customController.js', array('platzi-service'), false, true);
    // wp_register_script('custom-views', get_template_directory_uri() . '/assets/js/views/customViews.js', array('custom-controllers'), false, true);

    wp_register_script('controller-product', get_template_directory_uri() . '/assets/js/controllers/controllerProducts.js', array(), false, true);
    wp_register_script('view-product', get_template_directory_uri() . '/assets/js/views/viewProducts.js', array('controller-product'), false, true);

    wp_register_script('routing', get_template_directory_uri() . '/assets/js/routing.js', array(), false, true);
    wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/app.js', array('routing', 'view-product'), false, true);

    wp_localize_script('controller-product', 'controllerproduct', array(
        'rest_url'  => rest_url()
    ));
}

function custom_post_type_gatitos() {

    $gato_arr = array(
        'label'                 => 'Gatos',
        'labels'                => array(
            'name'          => 'Gatos',
            'singular_name' => 'gato',
        ),
        'description'           => 'Datos del gato',
        'public'                => true,
        'hierarchical'          => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'show_in_rest'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-database',
        'supports'              => array('title', 'thumbnail', 'editor', 'custom-fields', 'page-attributes'),
        'rewrite'               => true
    );

    register_post_type('gato', $gato_arr);

}

function crear_gato($request) {

    $title = sanitize_text_field($request['title']);

    wp_insert_post(array(
        'post_type'     => 'post',
        'post_status'   => 'publish',
        'post_title'    => $title
    ));

    return true;

}

function register_routes_api() {

    register_rest_route('oleo', 'crear-gato', array(
        'methods'               => 'POST',
        'callback'              => 'crear_gato',
        'permission_callback'   => function() {
            return true;
        }
    ));

}

add_action('wp_enqueue_scripts', 'oleotrescomas_inicial');
add_action('after_setup_theme', function() {

    add_theme_support('post-thumbnails');

});

add_action('init', 'custom_post_type_gatitos');
add_action('rest_api_init', 'register_routes_api');