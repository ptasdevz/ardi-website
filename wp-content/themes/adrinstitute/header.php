<html>

<head>
    <?php wp_head();
    global $post; ?>
</head>

<body <?php body_class(); ?>>
    <!-- <script>0</script> -->
    <div class="container">
        <div id="overlay"></div>
        <header>
            <div class="header_info">
                <div class="logo"><a href="<?php echo get_home_url(); ?>"><img src="<?php echo  wp_get_attachment_image_src(429,'medium_1_1')[0];?>" alt="logo"></a></div>
                <div id="nav_drawer_btn" class="nav_btn"><span>&#9776;</span></div>
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