<?php $home_page_id = 32; ?>
<footer class="theme_layout">
    <div class="footer_social_media">
        <p><?php the_field('social_media_tagline', $home_page_id); ?></p>
        <div class="vertical_line"></div>
        <ul>
            <?php
            $social_media_list = get_field('social_media', $home_page_id);
            // echo "<pre>";
            // echo print_r($social_media_list);
            // echo "</pre>";
            // die();
            if ($social_media_list) :
                foreach ($social_media_list as $scocial_media) : ?>
                    <li><a href="<?php if (isset($scocial_media['link'])) echo $scocial_media['link'] ?>" target="_blank">
                            <i class="<?php if (isset($scocial_media['icon'])) echo $scocial_media['icon']; ?>"></i></a></li>
            <?php endforeach;
            endif; ?>
        </ul>
    </div>
    <div class="horizontal_line"></div>
    <div class="footer_nav_links">
        <?php wp_nav_menu(
            array(
                'theme_location' => 'footer_menu',
            )
        ) ?>
    </div>
    <div class="copyright">
        <?php
        $copyright = get_field('copyright', $home_page_id);
        if ($copyright) :
        ?>
            <p><span class="<?php echo $copyright['icon']; ?>"></span><?php echo $copyright['year']; ?> <?php echo $copyright['text']; ?></p>

        <?php endif; ?>
    </div>
</footer>
<?php wp_footer(); ?>
</div>
</body>

</html>