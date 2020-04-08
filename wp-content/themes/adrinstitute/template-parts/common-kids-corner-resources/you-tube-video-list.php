<div class="you_tube_video_list">
    <?php
    //load videos from common location between kids corner and resrouce; kids corner and resources content page
    $video_list = get_field('you_tube_videos', 376);
    if (isset($video_list)) :
        $body = $video_list['body'];
        $count = count($body);
        for ($i = 0; $i < $count; $i++) :
            $is_active = strtolower($body[$i][3]['c']);
            if ($is_active == 'yes') : ?>
                <div data-vid-id="<?php echo $body[$i][0]['c']; ?>" data-vid-cat="<?php echo $body[$i][1]['c']; ?>"></div>
            <?php endif;
        endfor;
    endif;

    //load videos specific to page
    $video_list = get_field('you_tube_videos');
    if (isset($video_list)) :
        $body = $video_list['body'];
        $count = count($body);
        for ($i = 0; $i < $count; $i++) :
            $is_active = strtolower($body[$i][3]['c']);
            if ($is_active == 'yes') :
            ?>
            <div data-vid-id="<?php echo $body[$i][0]['c']; ?>" data-vid-cat="<?php echo $body[$i][1]['c']; ?>"></div>
    <?php endif;
        endfor;
    endif; ?>
</div>