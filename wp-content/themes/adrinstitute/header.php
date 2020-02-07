<html>

<head>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- <script>0</script> -->
    <div class="grid_container">
        <header>

            <div class="header_info">
                <div class="logo"><img src="<?php echo get_template_directory_uri();  ?>/assets/imgs/site-logo.png" alt=""></div>
                <div id="nav_drawer_btn" class="nav_btn"><span>&#9776;</span></div>
            </div>
            <div class="navigation">
                <div class="navigation-content">
                    <!-- adding navigation menu to the header -->
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'head-menu',
                            'menu_class' => 'navigation-links'
                        )
                    ) ?>
                </div>
            </div>
        </header>