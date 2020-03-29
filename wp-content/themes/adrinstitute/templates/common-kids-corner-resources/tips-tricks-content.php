   <div id="tips_tricks" class="tabcontent tips_tricks_tab_content">
       <?php
        //print_r(get_posts());
        $posts = get_posts();

        //print_r(get_the_post_thumbnail(417,"medium")) 
        ?>
       <?php if ($posts) : foreach ($posts as $key => $post) : ?>
               <div class="tips_tricks_content">
                   <?php
                    $url = get_the_post_thumbnail_url($post->ID, "medium_1_1_fixed");
                    if ($url) : ?>
                       <div class="img_container"><img src="<?php echo $url ?>" /></div>
                   <?php endif ?>
                   <div class="content_container">
                       <?php $post_cat = get_the_category();
                        //print_r($post_cat); 
                        //print_r($post);
                        $comment_count = $post->comment_count;
                        $d = strtotime($post->post_date);
                        $date_formatted = date("F j, Y", $d);
                        $post_author_id = $post->post_author;
                        $author = get_userdata($post_author_id);
                        $name = ucfirst($author->first_name) . ' ' . ucfirst($author->last_name);
                        $post_cat_name = $post_cat[0]->cat_name;

                        ?>
                       <h3><?php echo $post_cat_name; ?></h3>
                       <h1><?php echo $post->post_title; ?></h1>
                       <p><?php the_excerpt(); ?></p>
                       <button onclick="window.location='<?php echo get_permalink(); ?>';">Read More</button>
                       <!-- <a href="window.location='<?php echo get_permalink(); ?>';">Read More</a> -->

                       <p class="tips_trick_meta_data"><span class="author"><i class="fa fa-user"></i> </span><?php echo $name; ?>
                           &nbsp;&nbsp;<span class="comment_count"><i class="fa fa-comments"></i> </span><?php echo $comment_count; ?>
                           &nbsp;&nbsp;<span class="date"><i class="fa fa-calendar-alt"></i> </span><?php echo $date_formatted; ?>
                       </p>
                   </div>


               </div>
       <?php endforeach;
        endif; ?>
   </div>