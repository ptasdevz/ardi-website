<?php
//$nav_nonce = wp_create_nonce("kids_corner_video_nounce");
?>
<div class="kids_content_area">
    <div class="kids_corner_tab">
        <div class="tab_wrapper">
            <?php
            include_once "common-kids-corner-resources/instructional-videos-menu.php";
            include_once "common-kids-corner-resources/worksheets-menu.php";
            include_once "common-kids-corner-resources/reading-activities-menu.php";
            include_once "common-kids-corner-resources/other-links-menu.php";
            ?>
        </div>
    </div>
    <?php
    include_once "common-kids-corner-resources/instructional-videos-content.php";
    include_once "common-kids-corner-resources/worksheets-content.php";
    include_once "common-kids-corner-resources/reading-activities-content.php";
    include_once "common-kids-corner-resources/other-links-content.php";
    include_once "common-kids-corner-resources/you-tube-video-list.php"
    ?>

</div>