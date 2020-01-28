<?php

function load_style_sheets()
{
    wp_register_style(
        'bootstrap_style',
        get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css',
        array(),
        false,
        'all'
    );
    wp_enqueue_style('bootstrap_style');

    wp_register_style('scripts_style', get_template_directory_uri() . '/style.css', array(), false, 'all');
    wp_enqueue_style('scripts_style');
}
add_action('wp_enqueue_scripts', 'load_style_sheets');

function load_js()
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery/jquery.js','',null, true);
    wp_enqueue_script('jquery');
    
    wp_register_script('bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.min.js','',null,true);
    wp_enqueue_script('bootstrap_js');

    wp_register_script('scripts_js', get_template_directory_uri() . '/assets/js/scripts.js', '', 1, true);
    wp_enqueue_script('scripts_js');
}
add_action('wp_enqueue_scripts', 'load_js');
