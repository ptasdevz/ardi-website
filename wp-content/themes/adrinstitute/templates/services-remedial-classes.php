<div class="services_content_area">
    <div class="breadcrumbs_nav">
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
        </div>
    </div>
    <div class="service remedial_classes_svc">
        <div class="remedial_classes_content">
            <?php if (have_rows('service_2', wp_get_post_parent_id($post->id))) : ?>
                <?php while (have_rows('service_2', wp_get_post_parent_id($post->id))) : the_row();
                    // Get sub field values.
                    $content = get_sub_field('content'); ?>
                    <div id="remedial_classes_content_text" class="content"><?php echo $content ?></div>
                <?php endwhile ?>
            <?php endif ?>
        </div>
    </div>
</div>