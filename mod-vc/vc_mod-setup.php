<?php
/*
This example/starter plugin can be used to speed up Visual Composer plugins creation process.
More information can be found here: http://kb.wpbakery.com/index.php?title=Category:Visual_Composer

In this example all plugin related functions will have a "vc_extend" prefix, make sure to use unique prefix
in your plugin. Otherwise, you (or your users) may experience "Cannot redaclare function" error.
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

function custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
  if ($tag=='vc_row' || $tag=='vc_row_inner') {
    $class_string = str_replace('vc_row-fluid', 'df_row-fluid', $class_string);
  }
  if ($tag=='vc_column' || $tag=='vc_column_inner') {
    $pattern = array('/vc_col-sm-(\d{1,2})/', '/vc_col-md-(\d{1,2})/', '/vc_col-lg-(\d{1,2})/', '/vc_col-xs-(\d{1,2})/' ,'/vc_col-lg-offset-(\d{1,2})/','/vc_col-sm-offset-(\d{1,2})/','/vc_col-md-offset-(\d{1,2})/','/vc_col-xs-offset-(\d{1,2})/');
    $replace = array('df_span-sm-$1','df_span-md-$1','df_span-lg-$1','df_span-xs-$1','df_span-lg-offset-$1','df_span-sm-offset-$1', 'df_span-md-offset-$1', 'df_span-xs-offset-$1');
    $class_string = preg_replace($pattern, $replace, $class_string);
  }
  return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2);

/*
Override Template WPB VC - since version 4.0
*/
if(function_exists('vc_set_shortcodes_templates_dir')) {
$temp_dir = plugin_dir_path( __FILE__ ) . '/vc-templates/';
vc_set_shortcodes_templates_dir($temp_dir);
}


/*
Display notice if Visual Composer is not installed or activated.
*/
if ( !defined('WPB_VC_VERSION') ) { add_action('admin_notices', 'df_vc_extend_notice'); return; }
function df_vc_extend_notice() {
  $plugin_data = get_plugin_data(__FILE__);
  $link_data = admin_url() . 'themes.php?page=install-required-plugins';
  echo '
  <div class="updated">
    <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="%s">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'dahztheme'), $plugin_data['Name'], $link_data ).'</p>
  </div>';
}

/*
Get Google Fonts File.
*/
function df_google_fonts_get_fonts() {
  return json_decode( file_get_contents( DF_SHORTCODES_URL . '/js/admin/googlefont.json'  ) ) ;
}
//add_filter( 'vc_google_fonts_get_fonts_filter', 'df_google_fonts_get_fonts' );


/*
Load plugin css and javascript files
*/
//add_action('admin_init', 'df_vc_extend_unregister_admin_css', 99999);
function df_vc_extend_unregister_admin_css() {

  wp_deregister_style('js_composer');
  wp_dequeue_style( 'js_composer' );
  
}

require_once dirname(__FILE__) . '/vc_mod-extend.php';
require_once dirname(__FILE__) . '/vc_mod-update.php';
require_once dirname(__FILE__) . '/vc_mod-remove.php';

