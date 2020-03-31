<?php
add_action("wp_ajax_get_blog_by_category", "get_blog_by_category");
add_action("wp_ajax_nopriv_get_blog_by_category", "get_blog_by_category");

function get_blog_by_category()
{
    //     echo "<pre>";
    //     print_r($_REQUEST);
    //     echo "</pre>";
    // if (!wp_verify_nonce($_REQUEST['nonce'], "kids_corner_video_nounce") &&  $_REQUEST["call_type"] == "external") {
    //     exit("No naughty business please");
    // }
    $cat_id = $_REQUEST['cat_id'];

    if ($cat_id != "cat_all") {
        $posts = get_posts(array(
            'category'         => $cat_id,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'include'          => array(),
            'exclude'          => array(),
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => 'post',
            'suppress_filters' => true,
        ));
    } else {
        $posts = get_posts();
    }
    foreach ($posts as $post) {
        $url = get_the_post_thumbnail_url($post->ID, "medium_1_1_fixed");
        if ($url != false) $post->featured_img_url = $url;
        else  $post->featured_img_url = "";

        if (empty($post->post_excerpt)) {
            $post->post_excerpt = get_the_excerpt($post->ID);
        }
        $post_author_id = $post->post_author;
        $author = get_userdata($post_author_id);
        $name = ucfirst($author->first_name) . ' ' . ucfirst($author->last_name);
        $post->author_name = $name;

        $d = strtotime($post->post_date);
        $date_formatted = date("F j, Y", $d);
        $post->date_formatted = $date_formatted;
    }
    $result["category_name"] = get_cat_name($cat_id);
    $result["category_url"] = get_category_link($cat_id);
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
