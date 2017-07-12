<?php global $post; ?>
    <div id="wcpinner" class="wcp-main-wrap">
    <?php

    //get the saved meta as an arry
    $wcp_settings = get_post_meta($post->ID,'fgg_images',true);

    $column = 1;
    if ( count( $wcp_settings ) > 0 && is_array($wcp_settings)) {
        foreach( $wcp_settings as $key => $options ) {
            include 'temp/saved_options.php';
            $column = $column + 1;
        }
    } else {
        include 'temp/load_first.php';
    }
    ?>
</div>
<br>
<span class="add button button-primary"><?php _e('Add New Image', 'ich-effects'); ?></span>