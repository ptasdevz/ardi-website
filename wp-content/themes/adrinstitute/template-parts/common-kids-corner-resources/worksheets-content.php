<div id="worksheets" class="tabcontent worksheets_tab_content">

    <div class="worksheets_cards">
        <?php
        $worksheets = get_field('worksheets');

        if (isset($worksheets)) :
            $body = $worksheets['body'];
            $count = count($body);
            for ($i = 0; $i < $count; $i++) :
                if ($i == 0) echo "<div style='display:none' class='worksheets_card all_worksheets' data-worksheet-card-cat='all worksheets'></div>";
                $is_active = strtolower($body[$i][3]['c']);
                $category = strtolower($body[$i][2]['c']);
                $img_url = $body[$i][0]['c'];
                $img_id = adri_get_image_id($img_url);
                $category_as_id = str_replace(" ", "_", $category);

                if ($is_active == 'yes') : ?>
                    <div class="worksheets_card <?php echo $category_as_id ?>" data-worksheet-card-cat="<?php echo $category; ?>" data-worksheet-card-url="<?php echo $img_url ?>">
                    <img class="card_img" img src="<?php echo wp_get_attachment_image_src($img_id, 'medium_1_1')[0]; ?>" alt=""/>
                        <div class="card_data">
                            <h3><?php echo adri_capitalize_each_word($body[$i][1]['c']); ?></h3>
                            <h5><?php echo adri_capitalize_each_word($category); ?></h5>
                        </div>
                    </div>
        <?php endif;
            endfor;
        endif; ?>
    </div>

</div>