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
                <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                <div class="reading_assessment_content">
                    <h1><?php echo $title ?></h1>
                    <div id = "reading_assessment_content_text_excerpt" class="content"><?php echo service_content_excerpt($content,$excert_length); ?></div>
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
                <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                <div class="remedial_classes_content">
                    <h1><?php echo $title ?></h1>
                    <div id = "remedial_classes_content_text_excerpt" class="content"><?php echo service_content_excerpt($content,$excert_length); ?></div>
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
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $link = get_sub_field('link');
                $excert_length = get_sub_field('content_excerpt_length');
                $pg = get_page_by_title($link); ?>
                <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                <div class="school_work_help_svc_content">
                    <h1><?php echo $title ?></h1>
                    <div id = "school_work_help_svc_content_text_excerpt" class="content"><?php echo service_content_excerpt($content,$excert_length); ?></div>
                    <button onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">Read More</button>
                </div>
            <?php endwhile ?>
        <?php endif ?>
    </div>
</div>