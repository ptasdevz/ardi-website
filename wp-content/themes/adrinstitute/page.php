<?php get_header(); ?>
<div class="page_container">
    <?php
    // $pg = get_page_by_title("kids corner");
    // echo "<pre>";
    // echo print_r($pg);
    // echo print_r($pg->ID);
    // echo print_r(get_permalink($pg->ID));
    // echo "</pre>";
    // die();
    ?>
    <!-- <img id="page_bckgrn_img"src="< echo get_template_directory_uri();  ?>/assets/imgs/kids_corner.png" alt="bckgrn_img"> -->
    <section class="content_title">
        <h1><?php the_title() ?></h1>
    </section>
    <main>
        <div class="content_area">

            <div id="instr_videos" class="card">
                <img src="<?php echo get_template_directory_uri();  ?>/assets/imgs/instr_videos.png" alt="instructional_videos">
                <div class="info">
                    <h6>Instructional Videos</h6>
                </div>
            </div>
            <div id="reading_activities" class="card">
                <img src="<?php echo get_template_directory_uri();  ?>/assets/imgs/reading_activities.png" alt="reading_activites">
                <div class="info">
                    <h6>Reading Activities</h6>
                </div>
            </div>
            <div id="worksheets" class="card">
                <img src="<?php echo get_template_directory_uri();  ?>/assets/imgs/worksheets.png" alt="worksheets">
                <div class="info">
                    <h6>Worksheets</h6>
                </div>
            </div>

        </div>
    </main>

    <div id="nav_touch">

        <div id="page_side_nav" class="side_nav">

            <section class="side_bar_1">
                <div class="close_btn">
                    <a href="#" id="close_nav">&times;</a>
                </div>
                <button class="side_menu"><i class="fa fa-chevron-right"></i>Instructional Videos</button>
                <div class="sub_menu">
                    <a href="#">video cat 1</a>
                    <a href="#">video cat 2</a>
                    <a href="#">video cat 3</a>
                </div>
                <button class="side_menu"><i class="fa fa-chevron-right"></i>Reading Activites</button>
                <div class="sub_menu">
                    <a href="#">reading cat 1</a>
                    <a href="#">reading cat 2</a>
                    <a href="#">reading cat 3</a>
                </div>
                <button class="side_menu"><i class="fa fa-chevron-right"></i>Worksheets</button>
                <div class="sub_menu">
                    <a href="#">worksheet cat 1</a>
                    <a href="#">worksheet cat 2</a>
                    <a href="#">worksheet cat 3</a>
                </div>
            </section>
            <section class="side_bar_2">
                <button class="side_menu"><i class="fa fa-chevron-right"></i>Other Links</button>
                <div class="sub_menu">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </section>

        </div>
    </div>
</div>

<?php get_footer(); ?>