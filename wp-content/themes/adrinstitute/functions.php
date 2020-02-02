<?php

//enqueue css style sheets
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

    wp_enqueue_style('glider');

    wp_register_style(
        'glide',
        get_template_directory_uri() .'/node_modules/@glidejs/glide/dist/css/glide.core.min.css',
        array(),
        false,
        'all'
    );
    wp_enqueue_style('glide-optional');
    wp_enqueue_style('glide');

    wp_register_style(
        'glide-optional',
        get_template_directory_uri() .'/node_modules/@glidejs/glide/dist/css/glide.theme.min.css',
        array(),
        false,
        'all'
    );
    wp_enqueue_style('glide-optional');
    
    wp_register_style(
        'font_awesome',
        "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css",
        array(),
        false,
        'all'
    );
    wp_enqueue_style('font_awesome');


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
    
    wp_deregister_script('glide');
    wp_register_script('glide',get_template_directory_uri() .'/node_modules/@glidejs/glide/dist/glide.min.js','',null, true);
    wp_enqueue_script('glide');

    wp_register_script('scripts_js', get_template_directory_uri() . '/assets/js/scripts.js', '', 1, true);
    wp_enqueue_script('scripts_js');
}
add_action('wp_enqueue_scripts', 'load_js');

// add support for wordpress navigational theme menus
add_theme_support("menus");

// register navigational menu locations
register_nav_menus(array(
    "head-menu" => __('Head Menu', 'theme'),
    "foot-menu" => __('Foot Menu', 'theme'),
));
