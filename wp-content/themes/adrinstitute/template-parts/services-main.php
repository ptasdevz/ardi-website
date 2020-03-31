<div class="services_content_area">
    <div class="service reading_assesment_svc">
        <?php if (have_rows('service_1')) : ?>
            <?php while (have_rows('service_1')) : the_row();
                // Get sub field values.
                $image = get_sub_field('img');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $link = get_sub_field('link');
                $excert_length = get_sub_field('content_excerpt_length');
                $pg = get_page_by_title($link); ?>
                <img src="<?php echo $image['sizes']['large_16_9'] ?>" alt="<?php $image['alt'] ?>">
                <div class="reading_assessment_content">
                    <h2><?php echo $title ?></h2>
                    <div id="reading_assessment_content_text_excerpt" class="content"><?php echo service_content_excerpt($content, $excert_length); ?></div>
                    <button onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">Read More</button>
                </div>
            <?php endwhile ?>
        <?php endif ?>
    </div>
    <div class="service remedial_classes_svc">
        <?php if (have_rows('service_2')) : ?>
            <?php while (have_rows('service_2')) : the_row();
                // Get sub field values.
                $image = get_sub_field('img');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $link = get_sub_field('link');
                $excert_length = get_sub_field('content_excerpt_length');
                $pg = get_page_by_title($link); ?>
                <img src="<?php echo $image['sizes']['large_16_9'] ?>" alt="<?php $image['alt'] ?>">
                <div class="remedial_classes_content">
                    <h2><?php echo $title ?></h2>
                    <div id="remedial_classes_content_text_excerpt" class="content"><?php echo service_content_excerpt($content, $excert_length); ?></div>
                    <button onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">Read More</button>
                </div>
            <?php endwhile ?>
        <?php endif ?>
    </div>
    <div class="service school_work_help_svc">
        <?php if (have_rows('service_3')) : ?>
            <?php while (have_rows('service_3')) : the_row();
                // Get sub field values.
                $image = get_sub_field('img');
                // echo "<pre>";
                // print_r($image);
                // echo "</pre>";
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $link = get_sub_field('link');
                $excert_length = get_sub_field('content_excerpt_length');
                $pg = get_page_by_title($link); ?>
                <img src="<?php echo $image['sizes']['large_16_9'] ?>" alt="<?php $image['alt'] ?>">
                <div class="school_work_help_content">
                    <h2><?php echo $title ?></h2>
                    <div id="school_work_help_svc_content_text_excerpt" class="content"><?php echo service_content_excerpt($content, $excert_length); ?></div>
                    <button onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">Read More</button>
                </div>
            <?php endwhile ?>
        <?php endif ?>
    </div>
    <div class="service printing_laminating_svc">
        <?php if (have_rows('service_4')) : ?>
            <?php while (have_rows('service_4')) : the_row();
                // Get sub field values.
                $image = get_sub_field('img');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $link = get_sub_field('link');
                $excert_length = get_sub_field('content_excerpt_length');
                $pg = get_page_by_title($link); ?>
                <img src="<?php echo $image['sizes']['large_16_9'] ?>" alt="<?php $image['alt'] ?>">
                <div class="printing_laminating_content">
                    <h2><?php echo $title ?></h2>
                    <div id="printing_laminating_svc_content_text_excerpt" class="content"><?php echo service_content_excerpt($content, $excert_length); ?></div>
                    <button onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">Read More</button>
                </div>
            <?php endwhile ?>
        <?php endif ?>
    </div>
    <div class="service study_buddy_svc">
        <?php if (have_rows('service_5')) : ?>
            <?php while (have_rows('service_5')) : the_row();
                // Get sub field values.
                $image = get_sub_field('img');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $link = get_sub_field('link');
                $excert_length = get_sub_field('content_excerpt_length');
                $pg = get_page_by_title($link); ?>
                <img src="<?php echo $image['sizes']['large_16_9'] ?>" alt="<?php $image['alt'] ?>">
                <div class="study_buddy_content">
                    <h2><?php echo $title ?></h2>
                    <div id="study_buddy_svc_content_text_excerpt" class="content"><?php echo service_content_excerpt($content, $excert_length); ?></div>
                    <button onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">Read More</button>
                </div>
            <?php endwhile ?>
        <?php endif ?>
    </div>
</div>