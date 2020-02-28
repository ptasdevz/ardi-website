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
        <h3 id="sub_title">Sub Title</h3>
    </section>
    <main id="page_main">
        <div class="content_area">

            <?php //the_field('main_content', false, false); ?>
            <?php //the_field('video_categories', false, false);?>

            <div id="video_reproduction">

                <div id="kids_corner_video_player"></div>
                <h1>Videos</h1>
                <div class="video_cat_links">
                    <div id="video_link_1" class="card video_link">
                        <div class="info">
                            <h6>Video link 1</h6>
                        </div>
                    </div>
                    <div id="video_link_2" class="card video_link">
                        <div class="info">
                            <h6>Video link 2</h6>
                        </div>
                    </div>
                    <div id="video_link_3" class="card video_link">
                        <div class="info">
                            <h6>Video link 3</h6>
                        </div>
                    </div>
                    <div id="video_link_4" class="card video_link">
                        <div class="info">
                            <h6>Video link 4</h6>
                        </div>
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
                <?php the_field('side_nav', false, false); ?>
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