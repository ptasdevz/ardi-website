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
$post = get_post();
$post_author_id = $post->post_author;
$author = get_userdata($post_author_id);
$name = ucfirst($author->first_name) . ' ' . ucfirst($author->last_name);

$d = strtotime($post->post_date);
$date_formatted = date("F j, Y", $d);

//print_r($post);

$res_pg = get_page_by_title("resources");
// print_r($res_pg);
?>

<div class="post_container">
    <section class="content_title">
        <h1>Parents & Teachers Resources</h1>
    </section>
    <div id="post_main">
        <div class="content_area">
            <div class="post_content_area">
                <div class="post_content_area_data">
                    <div class="bread_crumb_nav">
                        <ul class="breadcrumb">
                            <li><a data-value=".resources_tab .tab_wrapper #adri_blog_menu .tab_submenu .cat_all" data-link="<?php echo get_permalink($res_pg->ID); ?> " class="adri_blog_tab_btn" href="#">Adrinstitute Blog</a></li>
                            <li><?php the_title(); ?></li>
                        </ul>
                    </div>
                    <div class="post_wrapper">
                        <div class="post_header">
                            <h1><?php the_title(); ?></h1>
                            <p class='adri_blog_meta_data'><span class='author'><i class='fa fa-user' aria-hidden='true'></i>
                                </span><?php echo $name ?> &nbsp;&nbsp;<span class='comment_count'><i class='fa fa-comments' aria-hidden='true'></i>
                                </span><?php echo $post->comment_count; ?> &nbsp;&nbsp;<span class='date'><i class='fa fa-calendar-alt' aria-hidden='true'></i> </span><?php echo $date_formatted ?></p>
                        </div>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="img_container">
                                        <img src="<?php the_post_thumbnail_url('xlarge_1_1') ?>" />
                                    </div>
                                <?php endif; ?>

                                <div class="post_content">
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

                    <div class="post_meta_content">
                        <div style="display:none; " class="popular_posts">
                            <?php
                            wpp_get_mostpopular();
                            ?>
                        </div>
                        <h2>Popular Posts</h2>
                        <div class="popular_post_content">
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

<?php get_footer(); ?>