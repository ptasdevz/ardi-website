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
        <?php
            $header_link_1 = get_field('header_link_1');
            $link_url = $header_link_1["link_url"];
            ?>
        <div class="s_rq_assessment_signup">
            <div id="rq_assessment"  onclick="window.open('<?php  echo $link_url;?>','_blank')" class="card">
                <div class="info">
                    <?php $header_link_1 = get_field('header_link_1');
                    if ($header_link_1) : ?>
                        <h6><?php echo $header_link_1['title'] ?></h6>
                        <p><?php echo $header_link_1['sub_title'] ?></p>
                    <?php endif ?>
                </div>
                <div class="card-background"></div>
            </div>
            <?php
              $child_reg_form = get_field('child_reg_form');
              //$reg_form_link = $child_reg_form["child_registration_form"];
              $reg_form_link = get_home_url() . "/child-registration-form/";
              $f = search_file("wp-content/uploads", "child_registration_form.pdf");

            ?>
            <div <?php if (empty($f)) echo 'class="card card-disabled"';?> onclick="window.location='<?php if (!empty($f)) echo $reg_form_link; else echo get_home_url() . '/#'; ?>'" id="signup" class="card">
                <div class="info">
                    <?php if ($child_reg_form) : ?>
                        <h6><?php echo $child_reg_form['title'] ?></h6>
                        <p><?php echo $child_reg_form['sub_title'] ?></p>
                    <?php endif ?>
                </div>
                <div class="card-background"></div>
            </div>
        </div>
        <?php
        $front_img = get_field('front_page_bckgrn_header_img');
        ?>
        <div class="img_carousel" style="background-image: url('<?php echo $front_img['sizes']['xxlarge_16_9'] ?>')"></div>
    </section>
    <main>
        <?php if (have_rows('main_block_1')) : ?>
            <?php while (have_rows('main_block_1')) : the_row();
                // Get sub field values.
                $image = get_sub_field('img');
                //print_r($image);
                $title = get_sub_field('title');
                $desc = get_sub_field('desc');
                $link = get_sub_field('link');
                $pg = get_page_by_title($link); ?>
                <div id="kids_corner" class="card" onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">
                    <img src="<?php echo $image['sizes']['large_16_9_fixed'] ?>" alt="<?php $image['alt'] ?>">
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
                <div id="our_svc" class="card" onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">
                    <img src="<?php echo $image['sizes']['large_16_9_fixed'] ?>" alt="<?php $image['alt'] ?>">
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
                    <img src="<?php echo $image['sizes']['large_16_9_fixed'] ?>" alt="<?php $image['alt'] ?>">
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
                <!-- <div id="community" class="card community_tab_btn" onclick="window.location='<?php //echo get_permalink($pg->ID); 
                                                                                                    ?>';"> -->
                <div id="community" data-value=".resources_tab .tab_wrapper #community_menu #community_tab_btn" data-link="<?php echo get_permalink($pg->ID); ?>" class="card community_tab_btn">
                    <img src="<?php echo $image['sizes']['large_16_9_fixed'] ?>" alt="<?php $image['alt'] ?>">
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
        $active_testimonials = array();
        for ($i=0; $i < $count; $i++) { 
            $testimonial = $body[$i];
            if (strtolower($testimonial[2]['c']) === 'yes'){
                $active_testimonials[] = $testimonial; 
            }
        }
        $testimonial_count =count($active_testimonials);
        if ($testimonial_count > 0):
            // echo "<pre>";
            // print_r($active_testimonials);
            // echo "</pre>"
        ?>
        <div class="glide">
            <h1><?php the_field("testimonial_title"); ?></h1>
            <div class="glide__track" data-glide-el="track">
                <div class="glide__slides testimoninal_slides" data-testimonial-count="<?php echo $testimonial_count; ?>">

                    <?php foreach ($active_testimonials as $testimonial) :?>
                        <figure class="glide__slide">
                            <blockquote><?php echo $testimonial[0]['c'] ?></blockquote>
                            <figcaption><?php echo $testimonial[1]['c'] ?></figcaption>
                        </figure>
                   <?php endforeach; ?>
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
        <?php endif; ?>

    </section>
</div>
<?php get_footer(); ?>