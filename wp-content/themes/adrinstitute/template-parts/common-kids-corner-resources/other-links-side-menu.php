<?php if (have_rows('other_links')) : ?>
    <?php while (have_rows('other_links')) : the_row();
       
        $menu_title = get_sub_field('other_links_menu_title'); ?>
        <button class="side_menu"><i class="fa fa-chevron-right"></i><?php echo $menu_title ?></button>
        <div  id="other_links_side_sub_menu" class="side_sub_menu"></div>
    <?php endwhile ?>
<?php endif ?>