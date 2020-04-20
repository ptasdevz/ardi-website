<html>

<head>
    <?php wp_head();
    global $post; ?>
</head>

<body <?php body_class(); ?>>
    <div class="container">
        <div id="overlay"></div>
        <header>
            <div class="header_info">
                <div class="logo"><a href="<?php echo get_home_url(); ?>"><img src="<?php echo  wp_get_attachment_image_src(429, 'medium_1_1')[0]; ?>" alt="logo"></a></div>
                <div id="nav_drawer_btn" class="nav_btn"><span data-ele-name="nav_drawer_btn">&#9776;</span></div>
            </div>
            <div class="navigation">
                <div id="navigation_menu" class="navigation_content">
                    <!-- adding navigation menu to the header -->
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'header_menu',
                            'menu_class' => 'header_nav_links'
                        )
                    ) ?>
                </div>
            </div>
        </header>
        <div data-page-title="<?php echo $post->post_name; ?>" id="nav_touch">

            <div id="page_side_nav" class="side_nav">
                <section class="main_nav">
                    <!-- <div class="close_btn">
                        <a href="#" id="close_nav">&times;</a>
                    </div> -->
                    <!-- adding navigation menu to the mobile nav -->
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'header_menu',
                            'menu_class' => 'header_nav_links'
                        )
                    ) ?>
                </section>
                <section class="side_bar_1">

                    <?php

                    //side navigation links 
                    switch ($post->post_name):
                        case "kids-corner":
                            include "template-parts/kids-corner-side-nav.php";
                            break;
                        case "resources":
                            include "template-parts/resources-side-nav.php";
                            break;
                    endswitch ?>

                </section>
            </div>
        </div>