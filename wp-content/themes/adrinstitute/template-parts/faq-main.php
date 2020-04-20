<div class="faq_content_area">
    <div class="faq_content">

        <?php
        $faq_list = get_field('faq_list');

        if (isset($faq_list)) :
            $body = $faq_list['body'];
            $count = count($body);
            for ($i = 0; $i < $count; $i++) :
                $is_active = strtolower($body[$i][2]['c']);
                $answer = strtolower($body[$i][1]['c']);
                $question = $body[$i][0]['c'];

                if ($is_active == 'yes') : ?>

                    <button class="faq_accordion"><?php echo adri_capitalize_each_word($question) ?></button>
                    <div class="faq_panel">
                        <p><?php echo ucfirst($answer); ?> </p>
                    </div>
        <?php endif;
            endfor;
        endif;
        ?>
    </div>
</div>