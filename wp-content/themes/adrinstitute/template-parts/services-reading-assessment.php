<div class="services_content_area">
    <div class="breadcrumbs_nav">
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
        </div>
    </div>
    <div class="service ">
        <div class="reading_assessment_content">
            <?php if (have_rows('service_1',wp_get_post_parent_id($post->id))) : ?>
                <?php while (have_rows('service_1',wp_get_post_parent_id($post->id))) : the_row();
                    // Get sub field values.
                    $content = get_sub_field('content');?>
                    <div id = "reading_assessment_content_text" class="svc_content"><?php echo $content ?></div>
                <?php endwhile ?>
            <?php endif ?>
        </div>

    </div>
</div>