<div class="group" id="1">
	<h3><?php _e( 'Image', 'wcp-fgg' ); ?></h3>
	<div>
		<table style="padding: 5px;width:100%;">
			<tr>
				<td><?php _e( 'Paste URL or use from Media', 'wcp-fgg' ); ?>
				<td>
					<input name="fgg_images[1][imageurl]" type="text" value="" class="image-url">
					<button class="button-secondary upload_image_button"
						data-title="<?php _e( 'Select Image', 'wcp-fgg' ); ?>"
						data-btntext="<?php _e( 'Select', 'wcp-fgg' ); ?>"><?php _e( 'Media', 'wcp-fgg' ); ?></button>
				</td>
				<td>
					<p class="description"><?php _e( 'Paste image URL in this field', 'wcp-fgg' ); ?>.</p>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Title', 'wcp-fgg' ); ?></td>
				<td>
					<input name="fgg_images[1][imagetitle]" type="text" value="" class="widefat image-title" class="widefat">
				</td>
				<td>
					<p class="description"><?php _e( 'It will be used as title attribute of image tag', 'wcp-fgg' ); ?>.</p>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Alternate Text', 'wcp-fgg' ); ?></td>
				<td>
					<input name="fgg_images[1][imagealt]" type="text" value="" class="widefat alt-text">
				</td>
				<td>
					<p class="description"><?php _e( 'It will be used as alt attribute of image tag', 'wcp-fgg' ); ?>.</p>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Caption Text', 'wcp-fgg' ); ?></td>
				<td><textarea class="widefat" name="fgg_images[1][captiontext]"></textarea></td>
				<td>
					<p class="description"><?php _e( 'HTML tags can be used when caption wrapper is none', 'wcp-fgg' ); ?>.</p>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Caption Wrapper', 'wcp-fgg' ); ?></td>
				<td>
					<select class="widefat" name="fgg_images[1][captionwrap]">
						<option value="h1"><?php _e( 'Heading', 'wcp-fgg' ); ?> 1</option>
						<option value="h2"><?php _e( 'Heading', 'wcp-fgg' ); ?> 2</option>
						<option value="h3"><?php _e( 'Heading', 'wcp-fgg' ); ?> 3</option>
						<option value="h4"><?php _e( 'Heading', 'wcp-fgg' ); ?> 4</option>
						<option value="h5"><?php _e( 'Heading', 'wcp-fgg' ); ?> 5</option>
						<option value="h6"><?php _e( 'Heading', 'wcp-fgg' ); ?> 6</option>
						<option value="div" selected><?php _e( 'None', 'wcp-fgg' ); ?></option>
					</select>
				</td>
				<td>
					<p class="description"><?php _e( 'Wrap caption in markup', 'wcp-fgg' ); ?>.</p>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Caption Alignment', 'wcp-fgg' ); ?></td>
				<td>
					<select name="fgg_images[1][captionalignment]" class="widefat">
						<option value="auto"><?php _e( 'Auto', 'wcp-fgg' ); ?></option>
						<option value="center"><?php _e( 'Center', 'wcp-fgg' ); ?></option>
						<option value="right"><?php _e( 'Right', 'wcp-fgg' ); ?></option>
						<option value="left"><?php _e( 'Left', 'wcp-fgg' ); ?></option>
						<option value="justify"><?php _e( 'Justify', 'wcp-fgg' ); ?></option>
					</select>
				</td>
				<td>
					<p class="description"><?php _e( 'How you want to align caption', 'wcp-fgg' ); ?>.</p>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Link To', 'wcp-fgg' ); ?></td>
				<td><input name="fgg_images[1][captionlink]" type="text" class="widefat" value=""></td>
				<td>
					<p class="description"><?php _e( 'Paste URL here or leave blank to disable', 'wcp-fgg' ); ?>.</p>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Enable LightBox', 'wcp-fgg' ); ?></td>
				<td><input name="fgg_images[1][lightbox]" type="checkbox"></td>
				<td>
					<p class="description"><?php _e( 'It will open above link in popup on clicking', 'wcp-fgg' ); ?>.</p>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Link Target', 'wcp-fgg' ); ?></td>
				<td>
					<select name="fgg_images[1][captiontarget]" class="widefat">
						<option value="_blank"><?php _e( 'New window', 'wcp-fgg' ); ?></option>
						<option value="_self"><?php _e( 'Same Window', 'wcp-fgg' ); ?></option>
						<option value="_parent"><?php _e( 'Parent frameset', 'wcp-fgg' ); ?></option>
						<option value="_top"><?php _e( 'Full body of the window', 'wcp-fgg' ); ?></option>
					</select>
				</td>
				<td>
					<p class="description"><?php _e( 'Open link in new tab or same', 'wcp-fgg' ); ?>.</p>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Category', 'wcp-fgg' ); ?></td>
				<td>
					<input type="text" class="widefat" name="fgg_images[1][category]" value="">
				</td>
				<td>
					<p class="description"><?php _e( 'Enter image category name, use comma for multiple names', 'wcp-fgg' ); ?></p>
				</td>
			</tr>
		</table>
		<button class="button button-delete"><?php _e( 'Delete', 'wcp-fgg' ); ?></button>
		<br style="clear: both;">
		<br>		
	</div>
</div>