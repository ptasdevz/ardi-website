<?php

use function YoastSEO_Vendor\GuzzleHttp\Psr7\str;

/**
 * REQUIRED FILES
 * Include required files.
 */
// Custom comment walker.
require get_template_directory() . '/classes/class-adri-walker-comment.php';

require get_template_directory() . '/inc/template-tags.php';

/*using ajax to get blog categories data */
include get_template_directory() . "/template-parts/ajax-adri-blog-categories.php";

/*using ajax to get post data */
include get_template_directory() . "/template-parts/ajax-adri-post.php";

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


    wp_register_style('page-single', get_template_directory_uri() . '/assets/css/page-single.css', array(), false, 'all');
    wp_enqueue_style('page-single');

    wp_register_style('kids-corner-parents-teachers-resources', get_template_directory_uri() . '/assets/css/kids-corner-parents-teachers-resources.css', array(), false, 'all');
    wp_enqueue_style('kids-corner-parents-teachers-resources');

    wp_register_style('services', get_template_directory_uri() . '/assets/css/services.css', array(), false, 'all');
    wp_enqueue_style('services');

    wp_register_style('contact-us', get_template_directory_uri() . '/assets/css/contact-us.css', array(), false, 'all');
    wp_enqueue_style('contact-us');

    wp_register_style('single-based-text-page', get_template_directory_uri() . '/assets/css/single-based-text-page.css', array(), false, 'all');
    wp_enqueue_style('single-based-text-page');
}
add_action('wp_enqueue_scripts', 'load_style_sheets');

//enqueue javascript files
function load_scripts()
{
    if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
    }
    
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery/jquery.js', '', null, false);
    wp_enqueue_script('jquery');

    wp_register_script('google_api', 'https://apis.google.com/js/api.js', '', 1, true);
    wp_enqueue_script('google_api');


    // wp_register_script('bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.min.js','',null,true);
    // wp_enqueue_script('bootstrap_js');

    wp_deregister_script('glide');
    wp_register_script('glide', get_template_directory_uri() . '/node_modules/@glidejs/glide/dist/glide.min.js', '', null, true);
    wp_enqueue_script('glide');

    wp_register_script('scripts_js', get_template_directory_uri() . '/assets/js/scripts.js', '', 1, true);
    wp_localize_script('scripts_js', 'ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
    wp_enqueue_script('scripts_js');

    wp_register_script('kids_corner_parents_teachers_resources_js', get_template_directory_uri() . '/assets/js/kids-corner-parents-teachers-resources.js', '', 1, true);
    wp_localize_script('kids_corner_parents_teachers_resources_js', 'ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
    wp_enqueue_script('kids_corner_parents_teachers_resources_js');

    wp_register_script('services_js', get_template_directory_uri() . '/assets/js/services.js', '', 1, true);
    wp_localize_script('services_js', 'ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
    wp_enqueue_script('services_js');


    wp_register_script('contact_us_js', get_template_directory_uri() . '/assets/js/contact-us.js', '', 1, true);
    wp_localize_script('contact_us_js', 'ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
    wp_enqueue_script('contact_us_js');


    wp_register_script('youtube_iframe_api', 'https://www.youtube.com/iframe_api', '', 1, true);
    wp_enqueue_script('youtube_iframe_api');
}
add_action('wp_enqueue_scripts', 'load_scripts');

/*add additional meta tags */
function load_meta_tags()
{
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0" >';
    echo '<script src="https://kit.fontawesome.com/592fd30525.js" crossorigin="anonymous"></script>';
}
add_action('wp_head', 'load_meta_tags');

/*footer scripts */
function load_footer_scripts()
{
}
add_action('wp_footer', 'load_footer_scripts');



/*Custom logo*/
function custom_loginlogo()
{
    echo '<style type="text/css">
    h1 a {background-image: url(' . wp_get_attachment_image_src(429, 'xlarge_16_9')[0] . ') !important; }
    </style>';
}
add_action('login_head', 'custom_loginlogo');

/*Change custom logo to site url */
function the_url($url)
{
    return get_bloginfo('url');
}
add_filter('login_headerurl', 'the_url');

/*Using template to rediect to child registation form page to so that form canbe downloaded */
add_action('template_redirect', 'adri_template_redirect');
function adri_template_redirect()
{
    if (
        $_SERVER['REQUEST_URI'] == '/child-registration-form/' || $_SERVER['REQUEST_URI'] == '/child-registration-form'
        || $_SERVER['REQUEST_URI'] == '/dev/child-registration-form/' || $_SERVER['REQUEST_URI'] == '/dev/child-registration-form'
    ) {
        $f = "wp-content/uploads/2020/03/child_registration_form.pdf";
        header('Content-Disposition: attachment; filename=child_registration_form.pdf');
        header("Content-type: application/x-msdownload", true, 200);
        header('Content-Type: application/force-download');
        header('Content-Type: application/octet-stream');
        header('Content-Type: application/download');
        header("Pragma: no-cache");
        header("Expires: 0");
        header('Content-Description: File Transfer');
        header('Content-Length: ' . filesize($f));
        echo file_get_contents($f);
    }
}

//retrieves the attachment ID from the file URL
function adri_get_image_id($image_url)
{
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url));
    return $attachment[0];
}
//capitalize each word in a string
function adri_capitalize_each_word($str_complete)
{
    $str_arr = explode(" ", strtolower($str_complete));
    $length = count($str_arr);
    $str_captitalize_complete = "";
    for ($i = 0; $i < $length; $i++) {
        $str = $str_arr[$i];
        if ($i + 1 < $length) $str_captitalize_complete .= ucfirst($str) . " ";
        else $str_captitalize_complete .= ucfirst($str);
    }
    return $str_captitalize_complete;
}

//get time elapse
function time_elapsed($secs, $time_unit = null){


    $bit = array(
        'y' => $secs / 31556926 % 12,
        'w' => $secs / 604800 % 52,
        'd' => $secs / 86400 % 7,
        'h' => $secs / 3600 % 24,
        'm' => $secs / 60 % 60,
        's' => $secs % 60
    );

    foreach ($bit as $k => $v)
        if ($v > 0 && $time_unit == null) $ret[] = $v . $k;
        else if ($v > 0 && $time_unit == $k) $ret[] = $v . $k;


    return join(' ', $ret);
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function adri_theme_support()
{
    /* Enable support for post thumbnails and featured images.*/
    add_theme_support('post-thumbnails');

    /*add support for wordpress navigational theme menus*/
    add_theme_support("menus");

    /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );

    /*Image sizes 1:1*/
    add_image_size('small_1_1', 150, 150, false);
    add_image_size('small_1_1_fixed', 150, 150, true);
    add_image_size('medium_1_1', 300, 300, false);
    add_image_size('medium_1_1_fixed', 300, 300, true);
    add_image_size('large_1_1', 550, 550, false);
    add_image_size('large_1_1_fixed', 550, 550, true);
    add_image_size('xlarge_1_1', 800, 800, false);
    add_image_size('xlarge_1_1_fixed', 800, 800, true);
    add_image_size('xxlarge_1_1', 1540, 1540, false);
    add_image_size('xxlarge_1_1_fixed', 1540, 1540, true);

    /*Image sizes 16:9*/
    add_image_size('small_16_9', 150, 84.375, false);
    add_image_size('small_16_9_fixed', 150, 84.375, true);
    add_image_size('medium_16_9', 300, 168.75, false);
    add_image_size('medium_16_9_fixed', 300, 168.75, true);
    add_image_size('large_16_9', 550, 309.375, false);
    add_image_size('large_16_9_fixed', 550, 309.375, true);
    add_image_size('xlarge_16_9', 800, 450, false);
    add_image_size('xlarge_16_9_fixed', 800, 450, true);
    add_image_size('xxlarge_16_9', 1540, 866.25, false);
    add_image_size('xxlarge_16_9_fixed', 1540, 866.25, true);
}
add_action('after_setup_theme', 'adri_theme_support');

// register navigational menu locations
register_nav_menus(array(
    "header_menu" => __('Header Menu', 'theme'),
    "footer_menu" => __('Footer Menu', 'theme'),
));

/*remove <p> tags that generates from spaces in content and excerpt blocks */
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
// remove_filter ('acf_the_content', 'wpautop');

/*using ajax to get videos */
//include get_template_directory() . "/templates/kids-corner-content.php";



/*Filter to only view excerpt of full content on the service page */
function service_content_excerpt($text, $excerpt_length)
{

    if ('' != $text) {
        $text = strip_shortcodes($text);
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
        $excerpt_length = $excerpt_length;
        $excerpt_more = apply_filters('excerpt_more', ' ' . '...');
        $text = wp_trim_words($text, $excerpt_length, $excerpt_more);
    }
    return apply_filters('the_excerpt', $text);
}

/*Custom length for wordpress excerpt */
function adri_custom_excerpt_length($length)
{
    return 50;
}
add_filter('excerpt_length', 'adri_custom_excerpt_length', 999);
