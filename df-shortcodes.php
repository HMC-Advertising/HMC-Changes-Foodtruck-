<?php
/*
Plugin Name: Dahz DF Shortcodes - HMC Changes
Plugin URL: http://dahztheme.com/
Description:  Extensible shortcodes functionality for AZ theme and plugins ( strongly required ). HMC Edit: This plugin may need to be updated to different versions. Files that were updated: 
Version: 1.3.0
Author: Dahz
Author URI: http://dahztheme.com/
*/

// Define Constants
// =============================================================================

define( 'DF_SHORTCODES_URL', plugins_url( '', __FILE__ ) );
define( 'DF_SHORTCODES_PATH', plugin_dir_path( __FILE__ ) );

if ( ! class_exists( 'df_Shortcodes' ) ) :

class df_Shortcodes {


      function df_Shortcodes() {

         add_action( 'wp_enqueue_scripts', array( &$this, 'df_shortcodes_enqueue_styles' ));
         add_action( 'wp_enqueue_scripts', array( &$this, 'df_shortcodes_enqueue_scripts' ));
         add_action( 'admin_footer', array( &$this, 'df_shortcodes_enqueue_admin_scripts')); 

         add_action( 'init', array( &$this, 'df_shortcodes_init' ) );
         add_action( 'init', array( &$this, 'df_shortcodes_init_button' ) );
  
      
   }

	/*=============================
   	Front-end Scripts & Styles 
   	============================= */
   	function df_shortcodes_enqueue_styles() {
   		if( ! is_admin() ) :

            wp_register_style( 'df-shortcodes-style', DF_SHORTCODES_URL . '/css/shortcodes.css', NULL, '1.0.0');
            // wp_register_style( 'df-animate', DF_SHORTCODES_URL . '/css/animate.css', NULL, '1.0.0');

            // register style for modal

            wp_enqueue_style('df-shortcodes-style');
   			// wp_enqueue_style('df-animate');

   		endif;

   	}

      function df_shortcodes_enqueue_scripts() {
         if( ! is_admin() ) :

            wp_register_script( 'df-queryselector', DF_SHORTCODES_URL . '/js/jquery.selectorquery.min.js', array( 'jquery' ), NULL, true );
            wp_register_script( 'df-shortcodes-script', DF_SHORTCODES_URL . '/js/shortcodes.min.js', array( 'jquery' ), '', true);
            wp_register_script( 'df-countup', DF_SHORTCODES_URL . '/js/countUp.js', array( 'jquery' ), '', true);
            wp_register_script( 'df-countdown', DF_SHORTCODES_URL . '/js/jquery.countdown_org.js', array( 'jquery' ), '', true);
            wp_register_script( 'df-count-timer', DF_SHORTCODES_URL . '/js/count-timer.js', array( 'jquery' ), '', true);
            wp_register_script( 'df-appear', DF_SHORTCODES_URL . '/js/jquery.appear.js', array( 'jquery' ), '', true);
            wp_register_script( 'df-custom', DF_SHORTCODES_URL . '/js/custom.js', array( 'jquery' ), '', true);
            wp_register_script( 'df-bg', DF_SHORTCODES_URL . '/js/ultimate_bg.js', array( 'jquery' ), '', true);
            wp_register_script( 'df-skrollr', DF_SHORTCODES_URL .'/js/skrollr-ck.js', array( 'jquery' ), '', true );
            wp_register_script( 'df-parallax-main-script', DF_SHORTCODES_URL . '/js/jquery.parallax-main.min.js', array( 'jquery' ), '', true);
            
            // register js for modal
            wp_register_script( 'df-classie', DF_SHORTCODES_URL . '/js/classie.js', array('jquery'), '', true );
            wp_register_script( 'df-snap-svg', DF_SHORTCODES_URL . '/js/snap.svg-min.js', array('jquery'), '', true );
            wp_register_script( 'df-frongloop', DF_SHORTCODES_URL . '/js/froogaloop2.min.js', array('jquery'), '', true);
            wp_register_script( 'df-modal', DF_SHORTCODES_URL . '/js/modal.js', array('jquery'), '', true);

            // register js for pie
            
            wp_register_script( 'df-pie-chart', DF_SHORTCODES_URL .'/js/jquery.pie.js', array( 'jquery', 'progressCircle'), '', true );
            wp_enqueue_script('df-shortcodes-script');

         endif;
      }

	/*=============================
   	Back-end Scripts & Styles 
   	============================= */
   	function df_shortcodes_enqueue_admin_scripts() {
         if( is_admin() ) :
		   	wp_register_style( 'df-shortcodes-icon-style', DF_SHORTCODES_URL . '/css/vc_extend_admin.css' );
   			wp_enqueue_style( 'df-shortcodes-icon-style' );
         endif;
   	}

   	function df_shortcodes_init() {
         require_once DF_SHORTCODES_PATH . '/shortcodes/shortcodes.php' ;
      	require_once DF_SHORTCODES_PATH . '/mod-vc/vc_mod-setup.php' ;
   	}

	/*=============================
   	 Add Admin Shortcode Button
	============================= */

  
	function df_shortcodes_init_button() {
	  global $pagenow;
	   
	  if ( (current_user_can('edit_posts') &&  current_user_can('edit_pages') ) && get_user_option( 'rich_editing' ) == 'true' && ( in_array( $pagenow, array( 'post.php', 'post-new.php', 'page-new.php', 'page.php' ) ) ) )    
	   { 
	      add_filter( 'mce_external_plugins', array( &$this, 'df_shortcodes_plugin' ) );
	      add_filter( 'mce_buttons', array( &$this,'df_shortcodes_register_button' ) );
         wp_enqueue_style( 'df-shortcodes-admin-style', DF_SHORTCODES_URL . '/css/shortcodes-admin-style.css' );
		}
	}

	function df_shortcodes_plugin( $plugin_array ) {
	    $tinymce_js = DF_SHORTCODES_URL .'/js/admin/tinymce.js';
	    $plugin_array['DahzThemeShortcodes'] = $tinymce_js;
	    return $plugin_array;
	}

	function df_shortcodes_register_button( $buttons ) {
	    array_push( $buttons, 'DahzThemeShortcodes' );
	    return $buttons;
	}


}

endif;

$df_shortcodes = new df_Shortcodes(); // Start an instance of the plugin class



