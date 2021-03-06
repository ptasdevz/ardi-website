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
        <h1>
            <?php single_cat_title() ?>
        </h1>
    </section>
    <div id="page_main">
        <div class="content_area">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('small_1_1') ?>" />
                    <?php endif; ?>
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                    <button><a href=<?php the_permalink() ?>>Read More</a></button>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>