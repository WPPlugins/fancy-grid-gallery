<?php
	global $post;
	$fgg_settings = get_post_meta($post->ID, 'fgg_settings', true);
	// print_r($fgg_settings);
	$wcp_classes = array(
		'no-effect',
		'zoom-in',
		'zoom-out',
		'zoom-in-twist',
		'zoom-out-twist',
		'zoom-caption-in-image-out',
		'zoom-caption-out-image-in',
		'zoom-image-out-caption-twist',
		'zoom-image-in-caption-twist',
		'flip-image-vertical',
		'flip-image-horizontal',
		'flip-image-vertical-back',
		'flip-image-horizontal-back',		
	);
?>
<table style="padding: 5px;width:100%;">
	<tr>
		<td><?php _e( 'Display', 'wcp-fgg' ); ?></td>
		<td>
			<select name="fgg_settings[columns]" class="widefat">
				<?php for($i = 1; $i <= 12; $i++) { ?>
                <option value="<?php echo $i; ?>" <?php if(isset($fgg_settings['columns']) && $fgg_settings['columns'] == $i){echo 'selected';} ?>><?php echo $i; ?></option>
                <?php } ?>
			</select>			
		</td>
		<td>
			<p class="description"><?php _e( 'Images in a row', 'wcp-fgg' ); ?>.</p>
		</td>
	</tr>
	<tr>
		<td><?php _e( 'Space between images', 'wcp-fgg' ); ?></td>
		<td><input name="fgg_settings[col_space]" type="text" value="<?php echo (isset($fgg_settings['col_space'])) ? $fgg_settings['col_space'] : '10px' ; ?>" class="widefat"></td>
		<td>
			<p class="description"><?php _e( 'Space between each column', 'wcp-fgg' ); ?>.</p>
		</td>
	</tr>
	<tr>
		<td><?php _e( 'Caption Background Color', 'wcp-fgg' ); ?></td>
		<td><input name="fgg_settings[captionbg]" type="text" value="<?php echo (isset($fgg_settings['captionbg'])) ? $fgg_settings['captionbg'] : '' ; ?>" class="colorpicker"></td>
		<td>
			<p class="description"><?php _e( 'Choose color', 'wcp-fgg' ); ?>.</p>
		</td>
	</tr>
	<tr>
		<td><?php _e( 'Caption Text Color', 'wcp-fgg' ); ?></td>
		<td><input name="fgg_settings[captioncolor]" type="text" value="<?php echo (isset($fgg_settings['captioncolor'])) ? $fgg_settings['captioncolor'] : '' ; ?>" class="colorpicker"></td>
		<td>
			<p class="description"><?php _e( 'Choose color', 'wcp-fgg' ); ?>.</p>
		</td>
	</tr>
	<tr>
		<td><?php _e( 'Hover Effect', 'wcp-fgg' ); ?></td>
		<td>
			<select name="fgg_settings[hoverstyle]" class="widefat">
				<?php foreach ($wcp_classes as $className) { ?>
                <option value="<?php echo $className; ?>" <?php if(isset($fgg_settings['hoverstyle']) && $fgg_settings['hoverstyle'] == $className){echo 'selected';} ?>><?php echo ucwords(str_replace("-"," ",$className)) ?></option>
                <?php } ?>
			</select>
		</td>
		<td>
			<p class="description"><?php _e( 'Choose hover style', 'wcp-fgg' ); ?></p>
		</td>
	</tr>
	<tr>
		<td><?php _e( 'Border Width', 'wcp-fgg' ); ?></td>
		<td>
			<input type="text" class="widefat" name="fgg_settings[borderwidth]" value="<?php echo (isset($fgg_settings['borderwidth'])) ? $fgg_settings['borderwidth'] : '' ; ?>">
		</td>
		<td>
			<p class="description"><?php _e( 'Width of border. Leaving blank will disable border.', 'wcp-fgg' ); ?></p>
		</td>
	</tr>
	<tr>
		<td><?php _e( 'Border Type', 'wcp-fgg' ); ?></td>
		<td>
			<select name="fgg_settings[bordertype]" class="widefat">
				<option value="dotted" <?php if(isset($fgg_settings['bordertype']) && $fgg_settings['bordertype'] == 'dotted'){echo 'selected';} ?>><?php _e( 'Dotted', 'wcp-fgg' ); ?></option>
				<option value="dashed" <?php if(isset($fgg_settings['bordertype']) && $fgg_settings['bordertype'] == 'dashed'){echo 'selected';} ?>><?php _e( 'Dashed', 'wcp-fgg' ); ?></option>
				<option value="solid" <?php if(isset($fgg_settings['bordertype']) && $fgg_settings['bordertype'] == 'solid'){echo 'selected';} ?>><?php _e( 'Solid', 'wcp-fgg' ); ?></option>
				<option value="double" <?php if(isset($fgg_settings['bordertype']) && $fgg_settings['bordertype'] == 'double'){echo 'selected';} ?>><?php _e( 'Double', 'wcp-fgg' ); ?></option>
				<option value="groove" <?php if(isset($fgg_settings['bordertype']) && $fgg_settings['bordertype'] == 'groove'){echo 'selected';} ?>><?php _e( 'Groove', 'wcp-fgg' ); ?></option>
				<option value="ridge" <?php if(isset($fgg_settings['bordertype']) && $fgg_settings['bordertype'] == 'ridge'){echo 'selected';} ?>><?php _e( 'Ridge', 'wcp-fgg' ); ?></option>
				<option value="inset" <?php if(isset($fgg_settings['bordertype']) && $fgg_settings['bordertype'] == 'inset'){echo 'selected';} ?>><?php _e( 'Inset', 'wcp-fgg' ); ?></option>
				<option value="outset" <?php if(isset($fgg_settings['bordertype']) && $fgg_settings['bordertype'] == 'outset'){echo 'selected';} ?>><?php _e( 'Outset', 'wcp-fgg' ); ?></option>
			</select>
		<td>
			<p class="description"><?php _e( 'Some styles may depend on border color.', 'wcp-fgg' ); ?></p>
		</td>
	</tr>
	<tr>
		<td><?php _e( 'Border Color', 'wcp-fgg' ); ?></td>
		<td>
			<input type="text" class="widefat colorpicker" name="fgg_settings[bordercolor]" value="<?php echo (isset($fgg_settings['bordercolor'])) ? $fgg_settings['bordercolor'] : '' ; ?>">
		</td>
		<td>
			<p class="description"><?php _e( 'Name of color or color code.', 'wcp-fgg' ); ?></p>
		</td>
	</tr>
	<tr>
		<td><?php _e( 'Border Radius', 'wcp-fgg' ); ?></td>
		<td>
			<input type="text" class="widefat" name="fgg_settings[borderradius]" value="<?php echo (isset($fgg_settings['borderradius'])) ? $fgg_settings['borderradius'] : '' ; ?>">
		</td>
		<td>
			<p class="description"><?php _e( 'Radius of border eg: 5px or 50%.', 'wcp-fgg' ); ?></p>
		</td>
	</tr>
	<tr>
		<td><?php _e( 'Shadow', 'wcp-fgg' ); ?></td>
		<td>
			<input type="text" class="widefat" name="fgg_settings[shadow]" value="<?php echo (isset($fgg_settings['shadow'])) ? $fgg_settings['shadow'] : '' ; ?>">
		</td>
		<td>
			<p class="description"><?php _e( 'Shadow for images. <a href="http://www.cssmatic.com/box-shadow/" target="_blank">Generate Shadow</a>', 'wcp-fgg' ); ?></p>
		</td>
	</tr>
	<tr>
		<td colspan="3"><hr></td>
	</tr>
	<tr>
		<td><?php _e( 'Enable Category Filtering', 'wcp-fgg' ); ?></td>
		<td>
			<input type="checkbox" name="fgg_settings[category_filtering]" <?php echo (isset($fgg_settings['category_filtering'])) ? 'checked' : '' ; ?>>
		</td>
		<td>
			<p class="description"><?php _e( 'Displays top bar to filter images based on categories', 'wcp-fgg' ); ?></p>
		</td>
	</tr>
	<tr>
		<td><?php _e( 'Top Bar Background', 'wcp-fgg' ); ?></td>
		<td>
			<input type="text" class="colorpicker" name="fgg_settings[topbar_bg_color]" value="<?php echo (isset($fgg_settings['topbar_bg_color'])) ? $fgg_settings['topbar_bg_color'] : '' ; ?>">
		</td>
		<td>
			<p class="description"><?php _e( 'Top bar buttons background color', 'wcp-fgg' ); ?></p>
		</td>
	</tr>
	<tr>
		<td><?php _e( 'Top Bar Text Color', 'wcp-fgg' ); ?></td>
		<td>
			<input type="text" class="colorpicker" name="fgg_settings[topbar_text_color]" value="<?php echo (isset($fgg_settings['topbar_text_color'])) ? $fgg_settings['topbar_text_color'] : '' ; ?>">
		</td>
		<td>
			<p class="description"><?php _e( 'Top bar buttons text color', 'wcp-fgg' ); ?></p>
		</td>
	</tr>
</table>