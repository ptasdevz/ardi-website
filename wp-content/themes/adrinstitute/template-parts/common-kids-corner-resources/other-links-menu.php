<?php if (have_rows('other_links')) : ?>
    <?php while (have_rows('other_links')) : the_row();
        // Get sub field values.
        $menu_title = get_sub_field('other_links_menu_title');
        $menu_content = get_sub_field('other_links_menu_content'); ?>

        <div id="other_links_menu" class="tab_menu">
            <button id="other_links_tab_btn" class="tablinks" name="other_links"><span><?php echo $menu_title ?></span></button>
            <div class="tab_submenu"></div>
        </div>
        <div class="other_links_list">
            <?php
            if (isset($menu_content)) :
                $body = $menu_content['body'];
                $count = count($body);
                for ($i = 0; $i < $count; $i++) :
                    $display_name = $body[$i][1]['c'];
                    $is_active = $body[$i][2]['c'];
                    if ($is_active == 'yes') : ?>
                        <div id="<?php echo $body[$i][0]['c'] . '_' . $display_name; ?>"></div>
            <?php endif;
                endfor;
            endif;
            ?>
        </div>
    <?php endwhile ?>
<?php endif ?>