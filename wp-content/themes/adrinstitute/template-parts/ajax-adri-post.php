<?php
add_action("wp_ajax_get_post_by_titles", "get_post_by_titles");
add_action("wp_ajax_nopriv_get_post_by_titles", "get_post_by_titles");

function get_post_by_titles()
{

    $titles = $_REQUEST['post_titles'];
    $posts = array();

    foreach($titles as $key=>$title){
        $post = get_page_by_title($title,OBJECT,"post");
        $url = get_the_post_thumbnail_url($post->ID, "small_1_1_fixed");
        if ($url != false) $post->featured_img_url = $url;
        else  $post->featured_img_url = "";
        $posts[] = $post;
    }
   
    $result['type'] = "success";
    $result['post_list'] = $posts;

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    die();
}
