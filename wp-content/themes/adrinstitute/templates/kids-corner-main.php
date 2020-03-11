<?php
$nav_nonce = wp_create_nonce("kids_corner_video_nounce");
?>
<div class="kids_content_area">

    <div class="kids_corner_tab">
        <div class="tab_wrapper">
            <div id="instr_videos1" class="tab_menu">
                <button class="tablinks active" name="instr_videos"><span>Instructional Videos</span></button>
                <div class="tab_submenu" data-nounce="<?php echo $nav_nonce; ?>"></div>
            </div>
            <div id="worksheets1" class="tab_menu">
                <button class="tablinks" name="worksheets"><span>Worksheets</span></button>
                <div class="tab_submenu" data-nounce="<?php echo $nav_nonce; ?>">
                    <button>worksheet cat 1</button>
                    <button>worksheet cat 2</button>
                    <button>worksheet cat 3</button>
                </div>
            </div>
            <div id="reading_activites1" class="tab_menu">
                <button class="tablinks" name="reading_activites"><span>Reading Activites</span></button>
                <div class="tab_submenu" data-nounce="<?php echo $nav_nonce; ?>">
                    <button>reading cat 1</button>
                    <button>reading cat 2</button>
                    <button>reading cat 3</button>
                </div>
            </div>
        </div>
    </div>
    <div id="instr_videos" class="tabcontent">
    
        <div class="player_class">
            <div id="player_controls">
                <a id="close_btn" href="#">&times;</a>
                <i id="restore_btn" class="fa fa-window-restore"></i>
                <a id="minimize_btn" href="#">&#95;</a>
            </div>
            <div id="player"></div>
        </div>
        <div class="videos"></div>
    </div>
    
    <div id="worksheets" class="tabcontent">
        <p>Worksheets</p>
    </div>
    
    <div id="reading_activites" class="tabcontent">
        <p>Reading Activities</p>
    </div>
    
    <div class="you_tube_video_list"> 
    <?php
            $video_list = get_field('you_tube_videos');
            $body = $video_list['body'];
            $count = count($body);
            for ($i = 0; $i < $count; $i++) :
                $is_active = $body[$i][3]['c'];
                if ($is_active == 'yes') : ?>
                <div id = "<?php echo $body[$i][0]['c']; ?>" class = "<?php echo $body[$i][1]['c']; ?>"></div>
        <?php endif;
            endfor; ?>
    </div>

</div>