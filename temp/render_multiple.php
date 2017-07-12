<div class="wcp-prefix">
<?php
    $sc_id = rand(1, 10000);
    $fdd_ids = explode(',', $atts['ids']);
    $fgg_images = array();
    $fgg_settings = array();

    foreach ($fdd_ids as $fgg_id) {
        $all_images = get_post_meta( $fgg_id, 'fgg_images', true );
        foreach ($all_images as $imgData) {
            $fgg_images[] = $imgData;
        }
        $fgg_settings = get_post_meta( $fgg_id, 'fgg_settings', true );
    }
    // $arr_count = count($all_data);

    $css_class = 'col-1-'.$fgg_settings['columns'];

    if ($fgg_settings['borderwidth'] != '') {
        $border_styling = 'border: '.$fgg_settings['borderwidth'].' '.$fgg_settings['bordertype'].' '.$fgg_settings['bordercolor'].';';
    } else {
        $border_styling = '';
    }
    if ($fgg_settings['borderradius'] != '') {
        $b_radius = "border-radius: ".$fgg_settings['borderradius']."; -webkit-border-radius: ".$fgg_settings['borderradius'].";";
    } else {
        $b_radius = '';
    }
    if ($fgg_settings['shadow'] != '') {
        $b_shadow = "box-shadow: ".$fgg_settings['shadow']."; -webkit-box-shadow: ".$fgg_settings['shadow'].";";
    } else {
        $b_shadow = '';
    }
    $anim_styles = "transition-duration: 700ms; -webkit-transition-duration: 700ms;";

    if (isset($fgg_settings['category_filtering'])) {
        $wcp_nav = array();
        foreach ($fgg_images as $key => $data) {
            $this_cates = explode(',', $data['category']);
            foreach ($this_cates as $cat_name) {
                if (!in_array($cat_name, $wcp_nav)) {
                    $wcp_nav[] = trim($cat_name);
                }
            }
        }
        ?>

        <div>
            <ul class="wcp-nav">
                <li>
                    <a style="background-color: <?php echo $fgg_settings['topbar_bg_color']; ?>; color: <?php echo $fgg_settings['topbar_text_color']; ?>;" class="filter-<?php echo $sc_id; ?>" data-filter="all" href="javascript:void(0)">All</a>
                </li>
                <?php foreach ($wcp_nav as $cat_name) { ?>
                    <li>
                        <a style="background-color: <?php echo $fgg_settings['topbar_bg_color']; ?>; color: <?php echo $fgg_settings['topbar_text_color']; ?>;" class="filter-<?php echo $sc_id; ?>" data-filter=".term-<?php echo str_replace(' ', '_', $cat_name); ?>" href="javascript:void(0)"><?php echo $cat_name; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>    
    
    
    <?php $padding = (isset($fgg_settings['col_space'])) ? $fgg_settings['col_space'] : '20px' ; ?>
    <div class="grid grid-pad wcp-fgg-wrap" data-target=".mix-<?php echo $sc_id; ?>" data-filter=".filter-<?php echo $sc_id; ?>" style="padding-top: <?php echo $padding; ?>;
    padding-left: <?php echo $padding; ?>;
    padding-right: 0px;">

        <?php foreach ($fgg_images as $key => $data) {
            $filter_classes = '';
            $this_cates = explode(',', $data['category']);
            foreach ($this_cates as $cat_name) {
                $filter_classes .= ' term-'.str_replace(' ', '_', trim($cat_name));
            }
            ?>
            
            <div class="<?php echo $css_class; ?> mixi mix-<?php echo $sc_id; ?> <?php echo $filter_classes; ?>" style="padding-right: <?php echo $padding; ?>; padding-bottom: <?php echo $padding; ?>;">

                <div class="fancy-grid-gallery-wrap" id="fgg-<?php echo $key; ?>" style="<?php echo $border_styling; echo $b_radius; echo $b_shadow; ?>">
                    <?php if (isset($data['captionlink']) && $data['captionlink'] != '') { ?>
                        <a <?php echo (isset($data['lightbox'])) ? 'rel="prettyPhoto"' : '' ; ?> href="<?php echo $data['captionlink']; ?>" target="<?php echo $data['captiontarget']; ?>">
                    <?php } ?>
                        <div class="image-caption-box"> 
                            <div
                                class="caption <?php echo $fgg_settings['hoverstyle']; ?> captiontext"
                                style="background-color: <?php echo $fgg_settings['captionbg']; ?>; <?php echo $anim_styles; ?>
                                    color: <?php echo $fgg_settings['captioncolor']; ?>;"
                            >
                                <div style="display:table;height:100%;width: 100%;">
                                    <div class="centered-text" style="text-align: <?php echo $data['captionalignment'] ?>;padding: 5px;">

                                        <<?php echo $data['captionwrap']; ?> style="color: <?php echo $fgg_settings['captioncolor']; ?>">
                                            <?php echo $data['captiontext']; ?>
                                        </<?php echo $data['captionwrap']; ?>>

                                    </div>
                                </div>
                        </div>
                            <img style="<?php echo $anim_styles; ?>" class="wcp-caption-image img-make-responsive" src="<?php echo $data['imageurl']; ?>" title="<?php echo $data['imagetitle']; ?>" alt="<?php echo $data['imagealt']; ?>"/>
                </div>

                    <?php if (isset($data['captionlink']) && $data['captionlink'] != '') { ?>
                        </a>
                    <?php } ?>
                </div>

            </div>
        <?php } ?>
    </div>
    
    <div class="clearfix"></div>
    
</div>
<div class="wcp_loader"></div>