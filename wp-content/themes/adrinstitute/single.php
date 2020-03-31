<?php

/**
 * The template for displaying single posts
 *
 * @package PtasDevz
 * @subpackage Adrinsitute
 * @since 1.0.0
 */

get_header();
//print_r($var);
// $cat = get_the_category()[0];
// print_r($cat_name);

$res_pg = get_page_by_title("resources");
?>
<div class="post_container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php if (has_post_thumbnail()) : ?>
                <div class="img_container">
                    <img src="<?php the_post_thumbnail_url('medium_1_1_fixed') ?>" />
                </div>
            <?php endif; ?>
            <div class="bread_crumb_nav">
                <ul class="breadcrumb">
                    <li><a data-value=".resources_tab .tab_wrapper #adri_blog_menu #adri_blog_tab_btn" data-link="<?php echo get_permalink($res_pg->ID); ?> " class="adri_blog_tab_btn" href="#">Adrinstitute Blog</a></li>
                    <li><?php the_title(); ?></li>
                </ul>
            </div>
            <div class="post_content">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
            <?php

            /**Display navigation buttons to next and previous posts */
            if (is_single()) : ?>
                <div class="post_nav_container">
                    <?php get_template_part('template-parts/navigation'); ?>
                </div>
            <?php
            endif;
            /**
             *  Output comments wrapper if it's a post, or if comments are open,
             * or if there's a comment number – and check for password.
             * */
            if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) :
            ?>

                <div class="comments_container">

                    <?php comments_template(); ?>

                </div>

            <?php endif; ?>
    <?php endwhile;
    endif; ?>
</div>

<?php get_footer(); ?>