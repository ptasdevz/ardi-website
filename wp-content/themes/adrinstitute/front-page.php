<?php
get_header();
$upload_dir = wp_upload_dir();
//echo "<pre>";
// print_r($upload_dir["basedir"]. '/2020/01/imgs/');
//print_r($respDecode);
//print_r($respDecode->success);
?>

<section class="s_img_rq_assessment_signup">
    <div class="home_page_text">
        <h1>Assessment Diagnostic </h1>
        <h1>Remediation </h1>
        <h1>Institute</h1>
        <h3>Remediation That Works!</h3>
    </div>
    <div class="s_rq_assessment_signup">
        <div id ="rq_assessment" class="card">
            <div class="info">
                <h6>request an assessment</h6>
                <p>discover your child's reading level</p>
            </div>
            <div class="card-background"></div>
        </div>
        <div id ="signup" class="card">
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

<section class="s_testimonial">
    <div class="glide">

        <h1>testimonials</h1>

        <div class="glide__track" data-glide-el="track">
            <div class="glide__slides">

                <figure class="glide__slide">
                    <blockquote>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi dolorem aut expedita deserunt fugit odit itaque aspernatur mollitia at voluptas?</blockquote>
                    <figcaption>john doe</figcaption>
                </figure>
                <figure class="glide__slide">
                    <blockquote>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi dolorem aut expedita deserunt fugit odit itaque aspernatur mollitia at voluptas?</blockquote>
                    <figcaption>mike doe</figcaption>
                </figure>
                <figure class="glide__slide">
                    <blockquote>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi dolorem aut expedita deserunt fugit odit itaque aspernatur mollitia at voluptas?</blockquote>
                    <figcaption>loren jack</figcaption>
                </figure>
                <figure class="glide__slide">
                    <blockquote>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi dolorem aut expedita deserunt fugit odit itaque aspernatur mollitia at voluptas?</blockquote>
                    <figcaption>mark doe</figcaption>
                </figure>
                <figure class="glide__slide">
                    <blockquote>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi dolorem aut expedita deserunt fugit odit itaque aspernatur mollitia at voluptas?</blockquote>
                    <figcaption>john millman</figcaption>
                </figure>

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
<?php get_footer(); ?>