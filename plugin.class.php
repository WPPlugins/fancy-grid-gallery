<?php
/**
* Plugin Main Class
*/
class Fancy_Grid_Gallery
{
    
    function __construct(){
        add_action( 'admin_enqueue_scripts', array($this, 'loading_scripts_admin'));
        add_shortcode( 'fgg', array($this, 'render_gallery_shortcode') );
        add_action( 'init', array($this, 'wcp_register_gallery_pt') );
        add_action( 'add_meta_boxes', array($this, 'gallery_settings_box') );
        add_action( 'wp_enqueue_scripts', array($this, 'loading_front_scripts') );
        add_action( 'save_post', array($this, 'saving_fgg') );

        add_filter('manage_fancy_grid_gallery_posts_columns', array($this, 'fancy_grid_gallery_column_head'));
        add_action('manage_fancy_grid_gallery_posts_custom_column', array($this, 'fancy_grid_gallery_column_content'), 10, 2);

        // add_action( 'admin_menu', array( $this, 'ih_gallery_admin_menu' ) );
        add_action( 'plugins_loaded', array($this, 'wcp_load_plugin_textdomain' ) );
    }

    function wcp_load_plugin_textdomain(){
        load_plugin_textdomain( 'ich-effects', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    }    

    /**
    * Registers a new post type
    * @uses $wp_post_types Inserts new post type object into the list
    *
    * @param string  Post type key, must not exceed 20 characters
    * @param array|string  See optional args description above.
    * @return object|WP_Error the registered post type object, or an error object
    */
    function wcp_register_gallery_pt() {
    
        $custom_labels = array(
            'name'                => __( 'Fancy Grid Gallery', 'ich-effects' ),
            'singular_name'       => __( 'Grid Gallery', 'ich-effects' ),
            'add_new'             => _x( 'Add New Gallery', 'ich-effects', 'ich-effects' ),
            'add_new_item'        => __( 'Add New Gallery', 'ich-effects' ),
            'edit_item'           => __( 'Edit Gallery', 'ich-effects' ),
            'new_item'            => __( 'New Gallery', 'ich-effects' ),
            'view_item'           => __( 'View Gallery', 'ich-effects' ),
            'search_items'        => __( 'Search Galleries', 'ich-effects' ),
            'not_found'           => __( 'No Galleries found', 'ich-effects' ),
            'not_found_in_trash'  => __( 'No Galleries found in Trash', 'ich-effects' ),
            'parent_item_colon'   => __( 'Parent Gallery:', 'ich-effects' ),
            'menu_name'           => __( 'Grid Galleries', 'ich-effects' ),
        );
    
        $anim_args = array(
            'labels'              => $custom_labels,
            'hierarchical'        => false,
            'description'         => 'Fancy Grid Gallery',
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => null,
            'menu_icon'           => 'dashicons-screenoptions',
            'show_in_nav_menus'   => false,
            'publicly_queryable'  => true,
            'exclude_from_search' => true,
            'has_archive'         => false,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => true,
            'capability_type'     => 'post',
            'supports'            => array(
                'title'
                )
        );
    
        register_post_type( 'fancy_grid_gallery', $anim_args );
    }
    

    function loading_scripts_admin($check){
        global $post;
        if ( $check == 'post-new.php' || $check == 'post.php' || 'edit.php') {
            if (isset($post->post_type) && 'fancy_grid_gallery' === $post->post_type) {
                wp_enqueue_style( 'wp-color-picker' );
                wp_enqueue_media();
                wp_enqueue_script( 'fgg-admin', plugin_dir_url( __FILE__ ). '/js/admin.js', array('jquery', 'wp-color-picker', 'jquery-ui-sortable', 'jquery-ui-accordion'));
                wp_enqueue_style( 'jquery-ui-theme', plugin_dir_url( __FILE__ ). '/css/jquery-ui.theme.min.css');
            }
        }
    }

    function loading_front_scripts(){

    }

    function render_gallery_shortcode($atts){

        wp_enqueue_style( 'wc-simple-grid', plugin_dir_url( __FILE__ ). 'css/simplegrid.css');
        wp_enqueue_style( 'fancy-grid-gallery-css', plugin_dir_url( __FILE__ ). 'css/fgg.css');
        wp_enqueue_style( 'wcp-pretty-photo-css', plugin_dir_url( __FILE__ ). 'css/prettyPhoto.css');
        wp_enqueue_script( 'wcp-pretty-photo-script', plugin_dir_url( __FILE__ ). 'js/jquery.prettyPhoto.js', array('jquery'));
        wp_enqueue_script( 'jquery-mixitup-script', plugin_dir_url( __FILE__ ). 'js/jquery.mixitup.js', array('jquery'));
        wp_enqueue_script( 'fancy-grid-gallery-script', plugin_dir_url( __FILE__ ). 'js/script.js', array('jquery'));

        if (isset($atts['ids'])) {
            ob_start();
                include 'temp/render_multiple.php';
            return ob_get_clean();
        } else {
            ob_start();
                include 'temp/render_shortcode.php';
            return ob_get_clean();
        }

        

    }

    function gallery_settings_box() {
        add_meta_box( 'fgg_options', 'Images', array($this, 'fgg_contents_mb'), 'fancy_grid_gallery');
        add_meta_box( 'fgg_shortcode', 'Shortcode', array($this, 'fgg_shortcode_mb'), 'fancy_grid_gallery', 'side');
        add_meta_box( 'fgg_settings', 'Settings', array($this, 'fgg_settings_mb'), 'fancy_grid_gallery');
    }

    function fgg_shortcode_mb(){
        global $post;
        if (isset($post->ID)) {
            echo '<p style="text-align:center;">[fgg id="'.$post->ID.'"]</p>';
            
        } else {
            echo 'Please Save settings to see shortcode';
        }
    }

    function fgg_settings_mb(){
        include 'temp/settings_box.php';
    }

    /* Prints the box content */
    function fgg_contents_mb() {
        // Use nonce for verification
        wp_nonce_field( plugin_basename( __FILE__ ), 'wcp_fgg_nonce' );
        include 'render_box_contents.php';
    }

    function saving_fgg( $post_id ) {
        // verify if this is an auto save routine. 
        // If it is our form has not been submitted, so we dont want to do anything
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
            return;

        // verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times
        if ( !isset( $_POST['wcp_fgg_nonce'] ) )
            return;

        if ( !wp_verify_nonce( $_POST['wcp_fgg_nonce'], plugin_basename( __FILE__ ) ) )
            return;

        // OK, we're authenticated: we need to find and save the data

        $wcp_images = $_POST['fgg_images'];
        $wcp_settings = $_POST['fgg_settings'];

        update_post_meta($post_id,'fgg_images',$wcp_images);
        update_post_meta($post_id,'fgg_settings',$wcp_settings);
    }

    function fancy_grid_gallery_column_head($defaults){
        $defaults['fgg_col'] = 'Shortcode';
        return $defaults;       
    }

    function fancy_grid_gallery_column_content($column_name, $gallery_id){
        if ($column_name == 'fgg_col') {
            echo '[fgg id="'.$gallery_id.'"]';
        }
    }


    function ih_gallery_admin_menu(){
        add_submenu_page( 'edit.php?post_type=fancy_grid_gallery', 'Settings', 'Settings', 'manage_options', 'fgg_settings', array($this, 'render_fgg_settings_page') );
    }
    function render_fgg_settings_page(){
        include 'temp/doc_page.php';
    }
}
?>