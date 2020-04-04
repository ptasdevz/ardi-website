<?php
//echo "<pre>";
//print_r(get_categories());
$categories = get_categories();
// echo "</pre>";
?>
<button id="adri_blog_side_btn" class="side_menu"><i class="fa fa-chevron-right"></i>Adrinstitue Blog</button>
<div id="adri_blog_side_sub_menu" class="side_sub_menu">
    <?php foreach ($categories as $category) : ?>
        <button data-btn-loc="side_nav" class ="adri_blog_cat" id="cat_<?php echo $category->cat_ID; ?>"><?php echo $category->name; ?></button>
    <?php endforeach; ?>
</div>