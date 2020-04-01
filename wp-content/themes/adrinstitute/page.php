<?php

/**
 * The template for displaying single pages
 *
 * @package PtasDevz
 * @subpackage Adrinsitute
 * @since 1.0.0
 */

get_header(); ?>
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
        <h1>
            <?php
            $title = strtolower(get_the_title());
            if ($title  == "services") echo "Our Services";
            elseif ($title == "resources") echo "Parent & Teacher Resources";
            else the_title()
            ?>
        </h1>
        <h3 id="sub_title">Sub Title</h3>
    </section>
    <div id="nav_touch">
        <div id="page_side_nav" class="side_nav">
            <section class="side_bar_1">
                <div class="close_btn">
                    <a href="#" id="close_nav">&times;</a>
                </div>
                <?php

                //side navigation links 
                switch ($post->post_name):
                    case "kids-corner":
                        include "template-parts/kids-corner-nav.php";
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
    <div id="page_main">
        <div class="content_area">
            <?php
            //main content 
            switch ($post->post_name):
                case "kids-corner":
                    include "template-parts/kids-corner-main.php";
                    break;
                case "services":
                    include "template-parts/services-main.php";
                    break;
                case "resources":
                    include "template-parts/resources-main.php";
                    break;
                case "reading-assessment":
                    include "template-parts/services-reading-assessment.php";
                    break;
                case "remedial-classes":
                    include "template-parts/services-remedial-classes.php";
                    break;
                case "project-homework-help":
                    include "template-parts/services-project-homework-help.php";
                    break;
                case "printing-laminating":
                    include "template-parts/services-printing-laminating.php";
                    break;
                case "study-buddy":
                    include "template-parts/services-study-buddy.php";
                    break;
                case "contact-us":
                    include "template-parts/contact-us-main.php";
                    break;
                case "about-adri":
                    include "template-parts/about-adri-main.php";
                    break;
                case "privacy-policy":
                    include "template-parts/privacy-policy-main.php";
                    break;
                case "terms-of-use":
                    include "template-parts/terms-of-use-main.php";
                    break;
            endswitch ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>