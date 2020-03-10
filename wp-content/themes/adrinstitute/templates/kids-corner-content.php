<?php
add_action("wp_ajax_video_action", "get_youtube_videos");
add_action("wp_ajax_nopriv_video_action", "get_youtube_videos");

function get_youtube_videos()
{
//     echo "<pre>";
//     print_r($_REQUEST);
//     echo "</pre>";
    // if (!wp_verify_nonce($_REQUEST['nonce'], "kids_corner_video_nounce") &&  $_REQUEST["call_type"] == "external") {
    //     exit("No naughty business please");
    // }

    if (get_field("you_tube_videos")) {
        $result['type'] = "error";
    } else {
        $result['type'] = "success";
        $result['video_list'] = the_sub_field("you_tube_videos",14);
    }

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    die();
}

