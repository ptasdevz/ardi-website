<?php
//echo "<pre>";
//print_r(get_categories());
$categories = get_categories();
// echo "</pre>";
?>
<div id="adri_blog_menu" class="tab_menu">
    <button id="adri_blog_tab_btn" class="tablinks" name="adri_blog"><span>Adrinstitue Blog</span></button>
    <div class="tab_submenu">
        <button class ="adri_blog_cat cat_all" data-cat-id="cat_all">All Blogs</button>
        <?php foreach ($categories as $category) : ?>
            <button class ="adri_blog_cat cat_<?php echo $category->cat_ID;?>" data-cat-id="cat_<?php echo $category->cat_ID; ?>"><?php echo $category->name; ?></button>
        <?php endforeach; ?>
    </div>
</div>