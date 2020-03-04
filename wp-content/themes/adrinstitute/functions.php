<?php

//enqueue css style sheets
function load_style_sheets()
{

    // wp_register_style(
    //     'bootstrap_style',
    //     get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css',
    //     array(),
    //     false,
    //     'all'
    // );
    wp_enqueue_style('bootstrap_style');

    wp_enqueue_style('glider');

    wp_register_style(
        'glide',
        get_template_directory_uri() . '/node_modules/@glidejs/glide/dist/css/glide.core.min.css',
        array(),
        false,
        'all'
    );
    wp_enqueue_style('glide-optional');
    wp_enqueue_style('glide');

    wp_register_style(
        'glide-optional',
        get_template_directory_uri() . '/node_modules/@glidejs/glide/dist/css/glide.theme.min.css',
        array(),
        false,
        'all'
    );
    wp_enqueue_style('glide-optional');

    // wp_register_style(
    //     'font_awesome',
    //     "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css",
    //     array(),
    //     false,
    //     'all'
    // );
    // wp_enqueue_style('font_awesome');

    wp_register_style(
        'adobe_typekit',
        "https://use.typekit.net/zos4hme.css",
        array(),
        false,
        'all'
    );
    wp_enqueue_style('adobe_typekit');

    wp_register_style('imports', get_template_directory_uri() . '/assets/css/imports.css', array(), false, 'all');
    wp_enqueue_style('imports');

    wp_register_style('scripts_style', get_template_directory_uri() . '/style.css', array(), false, 'all');
    wp_enqueue_style('scripts_style');

    wp_register_style('header', get_template_directory_uri() . '/assets/css/header.css', array(), false, 'all');
    wp_enqueue_style('header');

    wp_register_style('footer', get_template_directory_uri() . '/assets/css/footer.css', array(), false, 'all');
    wp_enqueue_style('footer');

    wp_register_style('front-page', get_template_directory_uri() . '/assets/css/front-page.css', array(), false, 'all');
    wp_enqueue_style('front-page');

    
    wp_register_style('page', get_template_directory_uri() . '/assets/css/page.css', array(), false, 'all');
    wp_enqueue_style('page');

    wp_register_style('kids-corner', get_template_directory_uri() . '/assets/css/kids-corner.css', array(), false, 'all');
    wp_enqueue_style('kids-corner');
}
add_action('wp_enqueue_scripts', 'load_style_sheets');

function load_js()
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery/jquery.js', '', null, true);
    wp_enqueue_script('jquery');

    wp_register_script('google_api', 'https://apis.google.com/js/api.js', '', 1, true);
    wp_enqueue_script('google_api');


    // wp_register_script('bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.min.js','',null,true);
    // wp_enqueue_script('bootstrap_js');

    wp_deregister_script('glide');
    wp_register_script('glide', get_template_directory_uri() . '/node_modules/@glidejs/glide/dist/glide.min.js', '', null, true);
    wp_enqueue_script('glide');

    wp_register_script('scripts_js', get_template_directory_uri() . '/assets/js/scripts.js', '', 1, true);
    wp_localize_script('scripts_js', 'ajax', array('ajax_url' => admin_url('admin-ajax.php')));
    wp_enqueue_script('scripts_js');

    wp_register_script('kids_corner_js', get_template_directory_uri() . '/assets/js/kids-corner.js', '', 1, true);
    wp_enqueue_script('kids_corner_js');

    wp_register_script('youtube_iframe_api', 'https://www.youtube.com/iframe_api', '', 1, true);
    wp_enqueue_script('youtube_iframe_api');
}
add_action('wp_enqueue_scripts', 'load_js');

function load_meta_tags()
{
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0" >';
    echo '<script src="https://kit.fontawesome.com/592fd30525.js" crossorigin="anonymous"></script>';
}

add_action('wp_head', 'load_meta_tags');

function load_footer_scripts()
{
}
add_action('wp_footer', 'load_footer_scripts');

// function my_acf_fallback ($value, $post_id, $field){

//     // $value = get_field('social_media_tagline');
// echo "<pre>";
// print_r($value);
// // print_r($post_id);
// // print_r($field);
// echo "</pre>";
// // die();
// // return $value;
// }
// add_filter('acf/load_value/name=social_media_tagline','my_acf_fallback',10,3);

/**
 * Enable support for post thumbnails and featured images.
 */
add_theme_support('post-thumbnails');

add_image_size('featured', 1100, 400, true);
add_image_size('front_pg_main', 287, 177, true);

// add support for wordpress navigational theme menus
add_theme_support("menus");

// register navigational menu locations
register_nav_menus(array(
    "header_menu" => __('Header Menu', 'theme'),
    "footer_menu" => __('Footer Menu', 'theme'),
));

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
// remove_filter ('acf_the_content', 'wpautop');
