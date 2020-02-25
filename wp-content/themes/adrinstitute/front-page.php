<?php
get_header();
$upload_dir = wp_upload_dir();
?>
<div class="front_page_container">
    <section class="s_img_rq_assessment_signup">
        <div class="home_page_text">
            <?php $front_page_title = get_field('front_page_title');
            if ($front_page_title) : ?>
                <h1><?php echo $front_page_title['title_1']; ?></h1>
                <h1><?php echo $front_page_title['title_2']; ?></h1>
                <h1><?php echo $front_page_title['title_3']; ?></h1>
                <h3><?php echo $front_page_title['sub_title']; ?></h3>
            <?php endif ?>
        </div>
        <div class="s_rq_assessment_signup">
            <div id="rq_assessment" class="card">
                <div class="info">
                    <?php $header_link_1 = get_field('header_link_1');
                    if ($header_link_1) : ?>
                        <h6><?php echo $header_link_1['title'] ?></h6>
                        <p><?php echo $header_link_1['sub_title'] ?></p>
                    <?php endif ?>
                </div>
                <div class="card-background"></div>
            </div>
            <div id="signup" class="card">
                <div class="info">
                    <?php $header_link_2 = get_field('header_link_2');
                    if ($header_link_2) : ?>
                        <h6><?php echo $header_link_2['title'] ?></h6>
                        <p><?php echo $header_link_2['sub_title'] ?></p>
                    <?php endif ?>
                </div>
                <div class="card-background"></div>
            </div>
        </div>
        <div class="img_carousel" style="background-image: url('<?php the_field('front_page_bckgrn_header_img'); ?>')"></div>
    </section>
    <main>
        <?php if (have_rows('main_block_1')) : ?>
            <?php while (have_rows('main_block_1')) : the_row();
                // Get sub field values.
                $image = get_sub_field('img');
                $title = get_sub_field('title');
                $desc = get_sub_field('desc');
                $link = get_sub_field('link');
                $pg = get_page_by_title($link); ?>
                <div id="kids_corner" class="card" onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">
                    <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                    <div class="info">
                        <h6><?php echo $title ?></h6>
                        <p><?php echo $desc ?></p>
                    </div>
                </div>
            <?php endwhile ?>
        <?php endif ?>
        <?php if (have_rows('main_block_2')) : ?>
            <?php while (have_rows('main_block_2')) : the_row();
                // Get sub field values.
                $image = get_sub_field('img');
                $title = get_sub_field('title');
                $desc = get_sub_field('desc');
                $link = get_sub_field('link');
                $pg = get_page_by_title($link); ?>
                <div id ="our_svc" class="card" onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">
                    <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                    <div class="info">
                        <h6><?php echo $title ?></h6>
                        <p><?php echo $desc ?></p>
                    </div>
                </div>
            <?php endwhile ?>
        <?php endif ?>
        <?php if (have_rows('main_block_3')) : ?>
            <?php while (have_rows('main_block_3')) : the_row();
                // Get sub field values.
                $image = get_sub_field('img');
                $title = get_sub_field('title');
                $desc = get_sub_field('desc');
                $link = get_sub_field('link');
                $pg = get_page_by_title($link); ?>
                <div id="pt_resources" class="card" onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">
                    <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                    <div class="info">
                        <h6><?php echo $title ?></h6>
                        <p><?php echo $desc ?></p>
                    </div>
                </div>
            <?php endwhile ?>
        <?php endif ?>
        <?php if (have_rows('main_block_4')) : ?>
            <?php while (have_rows('main_block_4')) : the_row();
                // Get sub field values.
                $image = get_sub_field('img');
                $title = get_sub_field('title');
                $desc = get_sub_field('desc');
                $link = get_sub_field('link');
                $pg = get_page_by_title($link); ?>
                <div id="community" class="card" onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">
                    <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                    <div class="info">
                        <h6><?php echo $title ?></h6>
                        <p><?php echo $desc ?></p>
                    </div>
                </div>
            <?php endwhile ?>
        <?php endif ?>
    </main>
    <section class="s_testimonial">
        <?php
        // $testimonials = $wpdb->get_results("SELECT testimonial_text, attestant FROM adri_testimonials WHERE is_active = 1
        //                 ORDER BY date_created DESC");
        $testimonial_data = get_field('testimonial_data');
        $body = $testimonial_data['body'];
        $count = count($body);

        ?>
        <div class="glide">
            <h1><?php the_field("testimonial_title"); ?></h1>
            <div class="glide__track" data-glide-el="track">
                <div class="glide__slides">

                    <?php for ($i = 0; $i < $count; $i++) :
                        if ($body[$i][2]['c'] === 'true') : ?>
                            <figure class="glide__slide">
                                <blockquote><?php echo $body[$i][0]['c'] ?></blockquote>
                                <figcaption><?php echo $body[$i][1]['c'] ?></figcaption>
                            </figure>
                    <?php endif;
                    endfor; ?>
                </div>
            </div>

            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                    <i class="fa fa-chevron-right"></i>
                </button>

                <div class="glide__bullets" data-glide-el="controls[nav]">
                    <button class="glide__bullet" data-glide-dir="=0"></button>
                    <button class="glide__bullet" data-glide-dir="=1"></button>
                    <button class="glide__bullet" data-glide-dir="=2"></button>
                    <button class="glide__bullet" data-glide-dir="=3"></button>
                    <button class="glide__bullet" data-glide-dir="=4"></button>
                </div>
            </div>

        </div>

    </section>
</div>
<?php get_footer(); ?>