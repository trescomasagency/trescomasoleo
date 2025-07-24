<?php

function oleotrescomas_inicial() {

    wp_register_style('inter', 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap', array(), false, 'all');

    wp_enqueue_style('front', get_stylesheet_directory_uri() . '/assets/styles/principal/front-page.css', array('inter'), false, 'all');
    wp_enqueue_style('style', get_stylesheet_uri(), array(), false, 'all');

    wp_register_script('axios', get_template_directory_uri() . '/assets/js/config/axios.js', array(), false, true);
    wp_register_script('platzi-service', get_template_directory_uri() . '/assets/js/services/platzi.js', array('axios'), false, true);
    wp_register_script('custom-controllers', get_template_directory_uri() . '/assets/js/controllers/customController.js', array('platzi-service'), false, true);
    wp_register_script('custom-views', get_template_directory_uri() . '/assets/js/views/customViews.js', array('custom-controllers'), false, true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array('custom-views'), false, true);

}

add_action('wp_enqueue_scripts', 'oleotrescomas_inicial');
add_action('after_setup_theme', function() {

    add_theme_support('post-thumbnails');

});
add_action('init', function() {

    $perro_arr = array(
        'label'                 => 'Perros',
        'labels'                => array(
            'name'          => 'Perros',
            'singular_name' => 'perro',
            'add_new'       => 'Agregar nuevo perro.',
            'edit_item'     => 'Editar datos del perro',
            'new_item'      => 'Nuevo perro',
            'view_item'     => 'Ver perro'
        ),
        'description'           => 'Datos del perro',
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

    register_post_type('perro', $perro_arr);

});

add_action('wp_footer', function() {
    ?>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <?php
});