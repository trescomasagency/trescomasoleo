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

add_action('wp_footer', function() {
    ?>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <?php
});