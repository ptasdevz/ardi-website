<?php
get_header();
$upload_dir = wp_upload_dir();
//echo "<pre>";
// print_r($upload_dir["basedir"]. '/2020/01/imgs/');
//print_r($respDecode);
//print_r($respDecode->success);
?>
    <section class="s_img_rq_assessment_signup">
        <div class="s_rq_assessment_signup">
            <div class="card rq_assessment">
                <div class="info">
                    <h6>request an assessment</h6>
                    <p>discover your child's reading level</p>
                </div>
                <div class="card-background"></div>
            </div>
            <div class="card signup">
                <div class="info">
                    <h6>signup</h6>
                    <p>help your strugginlg reader</p>
                </div>
                <div class="card-background"></div>
            </div>
        </div>
        <div class="img_carousel"></div>
    </section>
<main>
    <div id="kids_corner" class="card">
        <img src="<?php echo get_template_directory_uri();  ?>/assets/imgs/kids_corner.png" alt="kids_corner">
        <div class="info">
            <h6>kids corner</h6>
            <p>reading activities worksheets instructional videos</p>
        </div>
    </div>
    <div id="our_svc" class="card">
        <img src="<?php echo get_template_directory_uri();  ?>/assets/imgs/our_services.png" alt="our_services">
        <div class="info">
            <h6>our services</h6>
            <p>Reading Assessment Remedial Reading Remedial Writing Stories and Essay Writing and more...</p>
        </div>
    </div>
    <div id="pt_resources" class="card">
        <img src="<?php echo get_template_directory_uri();  ?>/assets/imgs/pt_resources.png" alt="pt_resources">
        <div class="info">
            <h6>parent teacher resources</h6>
            <p>Get tips and trick to help your child improve their reading and writing. </p>
        </div>
    </div>
    <div id="community" class="card">
        <img src="<?php echo get_template_directory_uri();  ?>/assets/imgs/community_scaled.png" alt="community">
        <div class="info">
            <h6>Community</h6>
            <p>Join our community and ask questions on topics related to literacy and learning. </p>
        </div>
    </div>
</main>
<section class="s_testimonial">testimonial</section>
<?php get_footer(); ?>