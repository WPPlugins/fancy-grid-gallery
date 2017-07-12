<?php
/**
 * Plugin Name: Fancy Grid Gallery
 * Plugin URI: http://webcodingplace.com/wordpress-free-plugins/fancy-grid-gallery-wordpress-plugin/
 * Description: Create Animated Filterable Galleries with Awesome Hover Effects absolutely FREE!
 * Version: 4.0
 * Author: Rameez
 * Author URI: http://webcodingplace.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wcp-fgg
 */

/*

  Copyright (C) 2015  Rameez  rameez.iqbal@live.com

*/
require_once('plugin.class.php');

if( class_exists('Fancy_Grid_Gallery')){
	
	$just_initialize = new Fancy_Grid_Gallery;
}

?>