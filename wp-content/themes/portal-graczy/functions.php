<?php
function portal_graczy_enqueue() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_style('main-style', get_stylesheet_uri());

    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', [], null, true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/script.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'portal_graczy_enqueue');

register_nav_menus([
    'main-menu' => 'Menu główne',
]);
