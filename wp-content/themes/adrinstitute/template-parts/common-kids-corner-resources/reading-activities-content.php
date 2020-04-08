   <div id="reading_activities" class="tabcontent reading_activities_tab_content">
       <!-- <div id='reading_activites_spinner' class="content_spinner   "><i class='fa fa-spinner fa-spin fa-3x fa-fw'></i></div> -->

       <div class="reading_activities_cards">
           <!-- <div style="display:none" class="reading_activities_card all_activities" data-reading-card-cat="all activities"></div> -->
           <?php
            $reading_activities = get_field('reading_activities');

            if (isset($reading_activities)) :
                $body = $reading_activities['body'];
                $count = count($body);
                for ($i = 0; $i < $count; $i++) :
                    if ($i == 0) echo "<div style='display:none' class='reading_activities_card all_activities' data-reading-card-cat='all activities'></div>";
                    $is_active = strtolower($body[$i][3]['c']);
                    $category = strtolower($body[$i][2]['c']);
                    $category_as_id = str_replace(" ", "_", $category);

                    if ($is_active == 'yes') : ?>
                       <div class="reading_activities_card <?php echo $category_as_id ?>" data-reading-card-cat="<?php echo $category; ?>" data-reading-card-url="<?php echo $body[$i][0]['c']; ?>">
                           <div class="card_img"></div>
                           <div class="card_data">
                               <h3><?php echo $body[$i][1]['c']; ?></h3>
                               <h5><?php echo $category ?></h5>
                           </div>
                       </div>
           <?php endif;
                endfor;
            endif; ?>
       </div>

   </div>