<div class="services_content_area">
    <div class="service reading_assesment_svc">
        <img src="<?php echo get_template_directory_uri() . '/assets/imgs/reading_assessment_img.png' ?>" alt="reading_assessment" />
        <div class="reading_assessment_content">
            <h1>Reading Assessment</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui harum dignissimos temporibus voluptate
                velit aspernatur nihil tempora amet? Eius quasi quibusdam vitae, quam voluptates ducimus! Amet sequi
                corporis explicabo sint, molestiae architecto, quia nam repudiandae vel voluptatum quas rem impedit,
                facere ut debitis! Doloremque beatae neque nam odit quasi dignissimos?</p>
                <?php  $pg = get_page_by_title('reading assessment'); ?>
            <button onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">Read More</button>
        </div>
    </div>
    <div class="service remedial_classes_svc">
        <img src="<?php echo get_template_directory_uri() . '/assets/imgs/remedial_classes_img.png' ?>" alt="remedial_classes" />
        <div class="remedial_classes_content">
            <h1>Remedial Classes</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui harum dignissimos temporibus voluptate
                velit aspernatur nihil tempora amet? Eius quasi quibusdam vitae, quam voluptates ducimus! Amet sequi
                corporis explicabo sint, molestiae architecto, quia nam repudiandae vel voluptatum quas rem impedit,
                facere ut debitis! Doloremque beatae neque nam odit quasi dignissimos Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui harum dignissimos temporibus voluptate
                velit aspernatur nihil tempora amet? Eius quasi quibusdam vitae, quam voluptates ducimus! Amet sequi
                corporis explicabo sint, molestiae architecto, quia nam repudiandae vel voluptatum quas rem impedit,
                facere ut debitis! Doloremque beatae neque nam odit quasi dignissimos?</p>
                <?php  $pg = get_page_by_title('remedial classes'); ?>
            <button onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">Read More</button>
        </div>
    </div>
    <div class="service school_work_help_svc">
        <img src="<?php echo get_template_directory_uri() . '/assets/imgs/school_work_help_img.png' ?>" alt="remedial_classes" />
        <div class="school_work_help_svc_content">
            <h1>Project & Homework Help</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui harum dignissimos temporibus voluptate
                velit aspernatur nihil tempora amet? Eius quasi quibusdam vitae, quam voluptates ducimus! Amet sequi
                corporis explicabo sint, molestiae architecto, quia nam repudiandae vel voluptatum quas rem impedit,
                facere ut debitis! Doloremque beatae neque nam odit quasi dignissimos?</p>
                <?php  $pg = get_page_by_title('project & homework help'); ?>
            <button onclick="window.location='<?php echo get_permalink($pg->ID); ?>';">Read More</button>        </div>
    </div>
</div>