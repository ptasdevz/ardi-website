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
    <section class="content_title">
        <h1><?php the_title() ?></h1>
        <h3 id="sub_title">Sub Title</h3>
    </section>
    <main id="page_main">
        <div class="content_area">
            <?php
            //main content 
            switch ($post->post_name):
                case "kids-corner":
                    include "templates/kids-corner-main.php";
            endswitch ?>
        </div>
    </main>
    <div id="nav_touch">
        <div id="page_side_nav" class="side_nav">
            <section class="side_bar_1">
                <!-- <div class="close_btn">
                    <a href="#" id="close_nav">&times;</a>
                </div> -->
                <?php

                //side navigation links 
                switch ($post->post_name):
                    case "kids-corner":
                        include "templates/kids-corner-nav.php";
                endswitch ?>

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