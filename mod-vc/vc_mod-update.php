<?php
// TABLE OF CONTENTS:
// 1. vc_row
// 2. vc_pie
// 3. vc_progress_bar
// 4. vc_text_separator
// 5. vc_text
// 6. vc_message
// 7. vc_toggle
// 8. vc_tour
// 9. vc_tabs
// 10. vc_gallery
// 11. vc_button
// 12. vc_cta_button
// 13. vc_accordions

// don't load directly
if (!defined('ABSPATH')) die('-1');

// Update Existing Maps
// =============================================================================
  if ( ! function_exists( 'df_vc_update_existing_shortcodes' ) ) {

    function df_vc_update_existing_shortcodes() {
      
      /* ======================================================================= */
      /* 1. Vc_row                                                               */
      /* ======================================================================= */
      $device_visibility     = array(
     "All" => '',
     "Hidden on Phones" => "hidden-sm",
     "Hidden on Tablets" => "hidden-tl",
     "Hidden on Desktops" => "hidden-dt",
     "Visible on Phones" => "visible-sm",
     "Visible on Tablets" => "visible-tl",
     "Visible on Desktops" => "visible-dt"
    );

      vc_map_update( 'vc_row', array(
        'description' => __( 'Place and structure your shortcodes inside of a row', 'dahztheme' )
      ) );      

      // vc_remove_param( 'vc_row', 'bg_color' );
      // vc_remove_param( 'vc_row', 'font_color' );
      // vc_remove_param( 'vc_row', 'padding' );
      // vc_remove_param( 'vc_row', 'margin_bottom' );
      // vc_remove_param( 'vc_row', 'bg_image' );
      // vc_remove_param( 'vc_row', 'bg_image_repeat' );
      vc_remove_param( 'vc_row', 'el_class' );
      vc_remove_param( 'vc_row', 'css' );


      vc_add_param("vc_row", array(
         "type" => "textfield",
         "heading" => __("Anchor"),
         "param_name" => "anchor"
      ));

      vc_add_param("vc_row", array(
        "type" => "textfield",
        "heading" => __("Minimum height", "dahztheme"),
        "param_name" => "min_height",
        "description" => __("You can use pixels (px) or percents (%).", "dahztheme")
      ));

      vc_add_param( 'vc_row', array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Row Style", "dahztheme"),
        "admin_label" => true,
        "param_name" => "type",
        "group" => "Options", 
        "value" => array(
          "No" => "",
          "Yes" => "yes",
           )
      ));

      vc_add_param( 'vc_row', array(
        "type" => "dropdown",
        "heading" => __('Content Type', 'dahztheme'),
        "param_name" => "content_type",
        "description" => __("Select Content Type", "dahztheme"),
        "group" => "Options", 
        "value" => array(
          'In Container' => 'in_container',
          'Full Width Content' => 'full_width_content',
          ),
         "dependency" => array(
          "element" => "type",
          "not_empty" => true
          )
      ));

      vc_add_param( 'vc_row', array(
        "type" => "colorpicker",
        "heading" => __('Font Color', 'dahztheme'),
        "param_name" => "font_color",
        "description" => __("Select font color", "dahztheme"),
      ));

      vc_add_param( 'vc_row', array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Background Color", "dahztheme"),
        "param_name" => "bg_color",
        "group" => "Options", 
        "value" => "",
        "dependency" => array(
          "element" => "type",
          "not_empty" => true
          )
        ));

      vc_add_param( 'vc_row', array(
        "type" => "attach_image", //attach_image
        "heading" => __("Background Image", "dahztheme"),
        "param_name" => "bg_image",
        "group" => "Options", 
        "description" => __("Select image from media library", "dahztheme"),
        "dependency" => array(
          "element" => "type",
          "not_empty" => true
        )
        ));

      vc_add_param( 'vc_row', array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Background Position", "dahztheme"),
        "param_name" => "bg_image_position",
        "group" => "Options", 
        "value" => array(
          "Top" => "top",
          "Middle" => "center",
          "Bottom" => "bottom"
          ),
        "dependency" => array(
          "element" => "type",
          "not_empty" => true
          )
        ));

      vc_add_param( 'vc_row', array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Background Repeat", "dahztheme"),
        "param_name" => "bg_image_repeat",
        "group" => "Options", 
        "value" => array(
          "No repeat" => "no-repeat",
          "Repeat (horizontally & vertically)" => "repeat",
          "Repeat horizontally" => "repeat-x",
          "Repeat vertically" => "repeat-y",
          "Inherit" => "inherit"
        ),
        "dependency" => array(
          "element" => "type",
          "not_empty" => true
        )
      ));
      
      vc_add_param( 'vc_row', array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Background Size", "dahztheme"),
        "param_name" => "bg_image_cover",
        "group" => "Options", 
        "value" => array(
          "Auto" => "auto",
          "Cover" => "cover",
          "Contain" => "contain"
        ),
        "dependency" => array(
          "element" => "type",
          "not_empty" => true
        )
      ));

      vc_add_param( 'vc_row', array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Fixed Background", "dahztheme"),
        "param_name" => "bg_image_attachment",
        "group" => "Options", 
        "value" => array(
          "Disabled" => "false",
          "Enabled" => "true"
        ),
        "dependency" => array(
          "element" => "type",
          "not_empty" => true
        )
      ));

      vc_add_param( 'vc_row', array(
        "type" => "textfield",
        "class" => "",
        "heading" => __("Top Padding", "dahztheme"),
        "param_name" => "padding_top",
        "group" => "Options", 
        "value" => "40",
        "description" => __("In pixels.", "dahztheme"),
        "dependency" => array(
          "element" => "type",
          "not_empty" => true
        )
      ));

      vc_add_param( 'vc_row',  array(
        "type" => "textfield",
        "class" => "",
        "heading" => __("Bottom Padding", "dahztheme"),
        "param_name" => "padding_bottom",
        "group" => "Options", 
        "value" => "40",
        "description" => __("In pixels.", "dahztheme"),
        "dependency" => array(
          "element" => "type",
          "not_empty" => true
        )
      ));

      vc_add_param( 'vc_row', array(
        "type" => "textfield",
        "class" => "",
        "heading" => __("Top Margin", "dahztheme"),
        "param_name" => "margin_top",
        "group" => "Options", 
        "value" => "20",
        "description" => __("In pixels; negative values are allowed.", "dahztheme"),
      ));

      vc_add_param( 'vc_row', array(
        "type" => "textfield",
        "class" => "",
        "heading" => __("Bottom Margin", "dahztheme"),
        "param_name" => "margin_bottom",
        "group" => "Options", 
        "value" => "20",
        "description" => __("In pixels; negative values are allowed.", "dahztheme"),
      ));

      vc_add_param("vc_row",  array(
             "type" => "dropdown",
             "heading" => __("Visibility For devices", "dahztheme"),
             "param_name" => "visibility",
             "group" => "Options", 
             "value" => $device_visibility,
             "description" => __("You can make this element visible for a device range or make it hidden for a device.", "dahztheme"),
             "dependency" => array(
         "element" => "type",
         "not_empty" => true
        )
        ));

      // parallax speed
      vc_add_param( 'vc_row', array(
        "type" => "checkbox",
        "class" => "",
        "heading" => __("Enable Parallax", "dahztheme"),
        "param_name" => "enable_parallax",
        "value" => array(
          "" => "false"
        )
      ));
      vc_add_param("vc_row",   array(
      "type" => "textfield",
      "class" => "",
      "heading" => __("Parallax speed", "dahztheme"),
      "param_name" => "parallax_speed",
      "value" => "0.5"
    ));

      // video background
      vc_add_param("vc_row", array(
        "type" => "textfield",
        "class" => "",
        "group" => "Options", 
        "heading" => __("Video background (mp4)", 'dahztheme'),
        "param_name" => "bg_video_mp4",
        "value" => "",
        "dependency" => array(
          "element" => "type",
          "not_empty" => true
        )
      ));

      vc_add_param("vc_row", array(
        "type" => "textfield",
        "class" => "",
        "group" => "Options", 
        "heading" => __("Video background (ogv)", 'dahztheme'),
        "param_name" => "bg_video_ogv",
        "value" => "",
        "dependency" => array(
          "element" => "type",
          "not_empty" => true
        )
      ));

      vc_add_param("vc_row", array(
        "type" => "textfield",
        "class" => "",
        "group" => "Options", 
        "heading" => __("Video background (webm)", 'dahztheme'),
        "param_name" => "bg_video_webm",
        "value" => "",
        "dependency" => array(
          "element" => "type",
          "not_empty" => true
        )
      ));
      
      /* ======================================================================= */
      /* 2. vc_pie                                                               */
      /* ======================================================================= */
      vc_map_update( 'vc_pie', array(
          'description' => __( 'Animated pie chart', 'dahztheme' ),
      ));

      vc_remove_param( 'vc_pie', 'el_class' );

      // Pie chart style
      vc_add_param( 'vc_pie', array(
          'type'        => 'dropdown',
          'class'       => '',
          'heading'     => __('Pie Chart Style', 'dahztheme'),
          'param_name'  => 'style_pie',
          'value'       => array(
                              __("Thin", "dahztheme") => "thin",
                              __("Normal", "dahztheme") => "normal",
                              __("Thick", "dahztheme") => "thick"
                           ),
          'description' => __('Please choose the style for your pie chart', 'dahztheme')
      ));
      
      // pie chart color
      // vc_add_param( 'vc_pie', array(
      //     'type'               => 'dropdown',
      //     'heading'            => __( 'Bar color', 'dahztheme' ),
      //     'param_name'         => 'color',
      //     'value'              => $colors_arr, //$pie_colors,
      //     'description'        => __( 'Select pie chart color.', 'dahztheme' ),
      //     'admin_label'        => true,
      //     'param_holder_class' => 'vc_colored-dropdown'
      // ));

      // pie chart extra class
      vc_add_param( 'vc_pie', array(
          'type'        => 'textfield',
          'heading'     => __( 'Extra class name', 'dahztheme' ),
          'param_name'  => 'el_class',
          'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'dahztheme' )
      ));

      /* ======================================================================= */
      /* 3. vc_progress_bar                                                      */
      /* ======================================================================= */
      vc_map_update( 'vc_progress_bar', array(
        'description' => __( 'Animated progress bar', 'dahztheme' )
      ));

      vc_remove_param( 'vc_progress_bar', 'el_class' );

      // progress bar style
      vc_add_param( 'vc_progress_bar', array(
          "type"        => "dropdown",
          "class"       => "",
          "heading"     => __("Progress Bar Style", "dahztheme"),
          "param_name"  => "bar_style",
          "value"       => array(
                              __("Flat", "dahztheme") => "flat",
                              __("Normal", "dahztheme") => "normal",
                              __("Round", "dahztheme") => "round"
                           ),
          "description" => __("Please choose the style for your progress bar", "dahztheme")
      ));

      // progress bar extra class
      vc_add_param( 'vc_progress_bar', array(
          "type"        => "textfield",
          "class"       => "",
          "heading"     => __("Extra Class", "dahztheme"),
          "param_name"  => "el_class",
          "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "dahztheme")
      ));

      /* ======================================================================= */
      /* 4. vc_text_separator                                                    */
      /* ======================================================================= */
      vc_map_update( 'vc_text_separator', array(
        'description' => __( 'Separator with Text', 'dahztheme' )
      ));

      vc_remove_param( 'vc_text_separator', 'el_width' );
      vc_remove_param( 'vc_text_separator', 'style' );
      vc_remove_param( 'vc_text_separator', 'el_class' );

      vc_add_param( 'vc_text_separator', array(
        'type'        => 'dropdown',
        'heading'     => __( 'Border Width', 'dahztheme' ),
        'param_name'  => 'el_width',
        'value'       => array(
                            __( '100%', 'dahztheme' ) => '100',
                            __( '90%', 'dahztheme' ) => '90',
                            __( '80%', 'dahztheme' ) => '80',
                            __( '70%', 'dahztheme' ) => '70',
                            __( '60%', 'dahztheme' ) => '60',
                            __( '50%', 'dahztheme' ) => '50',
                            __( '40%', 'dahztheme' ) => '40',
                            __( '30%', 'dahztheme' ) => '30',
                            __( '20%', 'dahztheme' ) => '20',
                            __( '10%', 'dahztheme' ) => '10'
                         ),
        'description' => __( 'Separator element width in percents.', 'dahztheme' )
      ));

      vc_add_param( 'vc_text_separator', array(
        'type'        => 'dropdown',
        'heading'     => __( 'Border Position', 'dahztheme' ),
        'param_name'  => 'position',
        'value'       => array(
                            __( 'Left', 'dahztheme' ) => 'left',
                            __( 'Center', 'dahztheme' ) => 'center',
                            __( 'Right', 'dahztheme' ) => 'right',
                         ),
        'description' => __( 'Separator position', 'dahztheme' )
      ));

      vc_add_param( 'vc_text_separator', array(
        'type'        => 'textfield',
        'heading'     => __( 'Border Size', 'dahztheme' ),
        'param_name'  => 'border_size',
        'description' => __( 'Custom your size of border. Fill with px.', 'dahztheme' )
      ));

      vc_add_param( 'vc_text_separator', array(
        'type'        => 'dropdown',
        'heading'     => __( 'Style', 'dahztheme' ),
        'param_name'  => 'style',
        'value'       => getVcShared( 'separator styles' ),
        'description' => __( 'Separator style.', 'dahztheme' )
      ));

      vc_add_param( 'vc_text_separator', array(
        'type'        => 'textfield',
        'heading'     => __( 'Height', 'dahztheme' ),
        'param_name'  => 'height',
        'value'       => '3px',
        'dependency'  => Array('element' => "style", 'value' => array('double')),
        'description' => __( 'Height each border (2*Border size + 1)px or more px. Fill with px', 'dahztheme' )
      ));

      vc_add_param( 'vc_text_separator', array(
        'type'        => 'textfield',
        'heading'     => __( 'Padding', 'dahztheme' ),
        'param_name'  => 'padding',
        'value'       => '28px',
        'description' => __( 'Your padding can be in single value or you can specify eg: 20px 40px 20px 40px', 'dahztheme' )
      ));

      vc_add_param( 'vc_text_separator', array(
        'type'        => 'textfield',
        'heading'     => __( 'Extra class name', 'dahztheme' ),
        'param_name'  => 'el_class',
        'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'dahztheme' )
      ));

      /* ======================================================================= */
      /* 5. Vc_separator                                                         */
      /* ======================================================================= */
      vc_map_update( 'vc_separator', array(
        'description' => __( 'Horizontal separator line', 'dahztheme' )
      ));
      
      vc_remove_param( 'vc_separator', 'el_width' );
      vc_remove_param( 'vc_separator', 'style' );
      vc_remove_param( 'vc_separator', 'el_class' );

      vc_add_param( 'vc_separator', array(
        'type'        => 'dropdown',
        'heading'     => __( 'Border Width', 'dahztheme' ),
        'param_name'  => 'el_width',
        'value'       => array(
                            __( '100%', 'dahztheme' ) => '100',
                            __( '90%', 'dahztheme' ) => '90',
                            __( '80%', 'dahztheme' ) => '80',
                            __( '70%', 'dahztheme' ) => '70',
                            __( '60%', 'dahztheme' ) => '60',
                            __( '50%', 'dahztheme' ) => '50',
                            __( '40%', 'dahztheme' ) => '40',
                            __( '30%', 'dahztheme' ) => '30',
                            __( '20%', 'dahztheme' ) => '20',
                            __( '10%', 'dahztheme' ) => '10'
                         ),
        'description' => __( 'Separator element width in percents.', 'dahztheme' )
      ));

      vc_add_param( 'vc_separator', array(
        'type'        => 'dropdown',
        'heading'     => __( 'Border Position', 'dahztheme' ),
        'param_name'  => 'position',
        'value'       => array(
                            __( 'Left', 'dahztheme' ) => 'left',
                            __( 'Center', 'dahztheme' ) => 'center',
                            __( 'Right', 'dahztheme' ) => 'right',
                         ),
        'description' => __( 'Separator position', 'dahztheme' )
      ));

      vc_add_param( 'vc_separator', array(
        'type'        => 'textfield',
        'heading'     => __( 'Border Size', 'dahztheme' ),
        'param_name'  => 'border_size',
        'description' => __( 'Custom your size of border. Fill with px.', 'dahztheme' )
      ));

      vc_add_param( 'vc_separator', array(
        'type'        => 'dropdown',
        'heading'     => __( 'Style', 'dahztheme' ),
        'param_name'  => 'style',
        'value'       => getVcShared( 'separator styles' ),
        'description' => __( 'Separator style.', 'dahztheme' )
      ));

      vc_add_param( 'vc_separator', array(
        'type'        => 'textfield',
        'heading'     => __( 'Height', 'dahztheme' ),
        'param_name'  => 'height',
        'value'       => '3px',
        'dependency'  => Array('element' => "style", 'value' => array('double')),
        'description' => __( 'Height each border (2*Border size + 1)px or more px. Fill with px', 'dahztheme' )
      ));

      vc_add_param( 'vc_separator', array(
        'type'        => 'textfield',
        'heading'     => __( 'Padding', 'dahztheme' ),
        'param_name'  => 'padding',
        'value'       => '28px',
        'description' => __( 'Your padding can be in single value or you can specify eg: 20px 40px 20px 40px', 'dahztheme' )
      ));

      vc_add_param( 'vc_separator', array(
        'type'        => 'textfield',
        'heading'     => __( 'Extra class name', 'dahztheme' ),
        'param_name'  => 'el_class',
        'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'dahztheme' )
      ));

      /* ======================================================================= */
      /* 6. vc_message                                                           */
      /* ======================================================================= */
      vc_map_update( 'vc_message', array(
        'description' => __( 'Notification box', 'dahztheme' )
      ));
      
      vc_remove_param( 'vc_message', 'el_class' );
      
      vc_add_param( 'vc_message', array(
          "type"        => "dropdown",
          "heading"     => __("Font Awesome Icon", "dahztheme"),
          "param_name"  => "icon_type",
          "value"       => array(
                               __("No", "dahztheme") => '',
                               __("Yes", "dahztheme") => 'fa_icon',
                           ),
      ));
      vc_add_param( 'vc_message', array(
          "type"        => "textfield",
          "heading"     => __("Font Awesome", "dahztheme"),
          "param_name"  => "type",
          "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon')),
          "description" => __( 'Check the icon list here <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">Font Awesome</a>, use icon id only. e.g, "adjust" instead "fa-adjust"', 'dahztheme' )
      ));
      vc_add_param( 'vc_message', array(
          "type"        => "dropdown",
          "heading"     => __("Font Size", "dahztheme"),
          "param_name"  => "size",
          "value"       => array(
                               __("1x", "dahztheme") => '1x',
                               __("2x", "dahztheme") => '2x',
                               __("3x", "dahztheme") => '3x',
                               __("4x", "dahztheme") => '4x',
                               __("5x", "dahztheme") => '5x',
                               __("lg", "dahztheme") => 'lg',
                           ),
          "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon'))
      ));
      vc_add_param( 'vc_message', array(
          "type"        => "dropdown",
          "heading"     => __("Font Rotate", "dahztheme"),
          "param_name"  => "rotate",
          "value"       => array(
                               __("Normal", "dahztheme") => 'normal',
                               __("Rotate 90 Degree", "dahztheme") => '90',
                               __("Rotate 180 Degree", "dahztheme") => '180',
                               __("Rotate 270 Degree", "dahztheme") => '270'
                           ),
          "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon'))
      ));
      vc_add_param( 'vc_message', array(
          "type"        => "dropdown",
          "heading"     => __("Font Flip", "dahztheme"),
          "param_name"  => "flip",
          "value"       => array(
                               __("None", "dahztheme") => '',
                               __("Horizontal", "dahztheme") => 'horizontal',
                               __("Vertical", "dahztheme") => 'vertical'
                           ),
          "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon'))
      ));
      vc_add_param( 'vc_message', array(
        'type'        => 'textfield',
        'heading'     => __( 'Extra class name', 'dahztheme' ),
        'param_name'  => 'el_class',
        'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'dahztheme' )
      ));

      /* ======================================================================= */
      /* 7. vc_toggle                                                            */
      /* ======================================================================= */
      vc_map_update( 'vc_toggle', array(
        'description' => __( 'Toggle element for Q&A block', 'dahztheme' )
      ));
      
      vc_remove_param( 'vc_toggle', 'el_class' );

      vc_add_param( 'vc_toggle', array(
        'type'        => 'dropdown',
        'heading'     => __( 'Toggle Style', 'dahztheme' ),
        'param_name'  => 'toggle_style',
        'value'       => array(
                            __("List", "dahztheme") => 'toggle1',
                            __("Box", "dahztheme") => 'toggle2',
                         ),
        'description' => __( 'Choose your toggle style', 'dahztheme' )
      ));

      vc_add_param( 'vc_toggle', array(
        'type'        => 'textfield',
        'heading'     => __( 'Extra class name', 'dahztheme' ),
        'param_name'  => 'el_class',
        'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'dahztheme' )
      ));

      /* ======================================================================= */
      /* 8. vc_tour                                                              */
      /* ======================================================================= */
      vc_map_update( 'vc_tour', array(
        'description' => __( 'Vertical tabbed content', 'dahztheme' )
      ));
      
      vc_remove_param( 'vc_tour', 'interval' );
      vc_remove_param( 'vc_tour', 'el_class' );

      vc_add_param( 'vc_tour', array(
        'type'        => 'dropdown',
        'heading'     => __( 'Tour Tab Style', 'dahztheme' ),
        'param_name'  => 'tour_style',
        'value'       => array(
                            __("List", "dahztheme") => 'tour_style_1',
                            __("Box", "dahztheme") => 'tour_style_2',
                         ),
        'description' => __( 'Choose your tabs style', 'dahztheme' )
      ));

      vc_add_param( 'vc_tour', array(
        'type'        => 'textfield',
        'heading'     => __( 'Extra class name', 'dahztheme' ),
        'param_name'  => 'el_class',
        'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'dahztheme' )
      ));

      /* ======================================================================= */
      /* 9. vc_tabs                                                              */
      /* ======================================================================= */
      vc_map_update( 'vc_tabs', array(
        'description' => __( 'Tabbed content', 'dahztheme' )
      ));
      
      vc_remove_param( 'vc_tabs', 'interval' );
      vc_remove_param( 'vc_tabs', 'el_class' );

      vc_add_param( 'vc_tabs', array(
        'type'        => 'dropdown',
        'heading'     => __( 'Tab Style', 'dahztheme' ),
        'param_name'  => 'tab_style',
        'value'       => array(
                            __("List", "dahztheme") => 'tab_style_1',
                            __("Box", "dahztheme") => 'tab_style_2',
                         ),
        'description' => __( 'Choose your tabs style', 'dahztheme' )
      ));

      vc_add_param( 'vc_tabs', array(
        'type'        => 'dropdown',
        'heading'     => __( 'Tour Tab Style', 'dahztheme' ),
        'param_name'  => 'tab_position',
        'value'       => array(
                            __("Left", "dahztheme") => 'left',
                            __("Center", "dahztheme") => 'center',
                         ),
        'description' => __( 'Choose your tabs position', 'dahztheme' )
      ));

      vc_add_param( 'vc_tabs', array(
        'type'        => 'textfield',
        'heading'     => __( 'Extra class name', 'dahztheme' ),
        'param_name'  => 'el_class',
        'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'dahztheme' )
      ));

      /* ======================================================================= */
      /* 10. vc_gallery                                                          */
      /* ======================================================================= */
      vc_map_update( 'vc_gallery', array(
        'description' => __( 'Responsive image gallery', 'dahztheme' )
      ));
      
      $target_arr = array(
          __( 'Same window', 'dahztheme' ) => '_self',
          __( 'New window', 'dahztheme' ) => "_blank"
      );
      
      vc_remove_param( 'vc_gallery', 'type' );
      vc_remove_param( 'vc_gallery', 'interval' );
      vc_remove_param( 'vc_gallery', 'images' );
      vc_remove_param( 'vc_gallery', 'img_size' );
      vc_remove_param( 'vc_gallery', 'onclick' );
      vc_remove_param( 'vc_gallery', 'custom_links' );
      vc_remove_param( 'vc_gallery', 'custom_links_target' );
      vc_remove_param( 'vc_gallery', 'el_class' );

      vc_add_param( 'vc_gallery', array(
        'type'          => 'dropdown',
        'heading'       => __( 'Gallery type', 'dahztheme' ),
        'param_name'    => 'type',
        'value'         => array(
                              __( 'Flex slider fade', 'dahztheme' ) => 'flexslider_fade',
                              __( 'Flex slider slide', 'dahztheme' ) => 'flexslider_slide',
                              __( 'Image grid', 'dahztheme' ) => 'image_grid'
                           ),
        'description'   => __( 'Select gallery type.', 'dahztheme' )
      ));

      vc_add_param( 'vc_gallery', array(
        'type'          => 'dropdown',
        'heading'       => __( 'Auto rotate slides', 'dahztheme' ),
        'param_name'    => 'interval',
        'value'         => array( 3, 5, 10, 15, __( 'Disable', 'dahztheme' ) => 0 ),
        'description'   => __( 'Auto rotate slides each X seconds.', 'dahztheme' ),
        'dependency'    => array(
            'element'   => 'type',
            'value'     => array( 'flexslider_fade', 'flexslider_slide', 'nivo' )
            )
      ));
      vc_add_param( 'vc_gallery', array(
          'type'          => 'attach_images',
          'heading'       => __( 'Images', 'dahztheme' ),
          'param_name'    => 'images',
          'value'         => '',
          'description'   => __( 'Select images from media library.', 'dahztheme' )
      ));
      vc_add_param( 'vc_gallery', array(
          'type'          => 'textfield',
          'heading'       => __( 'Image size', 'dahztheme' ),
          'param_name'    => 'img_size',
          'description'   => __( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'dahztheme' )
      ));
      vc_add_param( 'vc_gallery', array(
          'type'          => 'dropdown',
          'heading'       => __( 'On click', 'dahztheme' ),
          'param_name'    => 'onclick',
          'value'         => array(
                              __( 'Open prettyPhoto', 'dahztheme' ) => 'link_image',
                              __( 'Do nothing', 'dahztheme' ) => 'link_no',
                              __( 'Open custom link', 'dahztheme' ) => 'custom_link'
                             ),
          'description'   => __( 'Define action for onclick event if needed.', 'dahztheme' )
      ));
      vc_add_param( 'vc_gallery', array(
          'type'          => 'exploded_textarea',
          'heading'       => __( 'Custom links', 'dahztheme' ),
          'param_name'    => 'custom_links',
          'description'   => __( 'Enter links for each slide here. Divide links with linebreaks (Enter) . ', 'dahztheme' ),
          'dependency'    => array(
                              'element' => 'onclick',
                              'value' => array( 'custom_link' )
                             )
      ));
      vc_add_param( 'vc_gallery', array(
          'type'          => 'dropdown',
          'heading'       => __( 'Custom link target', 'dahztheme' ),
          'param_name'    => 'custom_links_target',
          'description'   => __( 'Select where to open  custom links.', 'dahztheme' ),
          'dependency'    => array(
                              'element' => 'onclick',
                              'value' => array( 'custom_link' )
                            ),
          'value'         => $target_arr
      ));
      vc_add_param( 'vc_gallery', array(
          'type'          => 'textfield',
          'heading'       => __( 'Extra class name', 'dahztheme' ),
          'param_name'    => 'el_class',
          'description'   => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'dahztheme' )
      ));

      /* ======================================================================= */
      /* 11. vc_button                                                           */
      /* ======================================================================= */
      vc_map_update( 'vc_button2', array(
          'name'            => 'Button',
          'description'     => __( 'Eye catching button', 'dahztheme' )
      ));
      
      vc_remove_param( 'vc_button2', 'color' );
      vc_remove_param( 'vc_button2', 'size' );
      vc_remove_param( 'vc_button2', 'el_class' );



      vc_add_param( 'vc_button2', array(
          "type"        => "dropdown",
          "heading"     => __("Font Awesome Icon", "dahztheme"),
          "param_name"  => "icon_type",
          "value"       => array(
                               __("No", "dahztheme") => '',
                               __("Yes", "dahztheme") => 'fa_icon',
                           ),
      ));
      vc_add_param( 'vc_button2', array(
          "type"        => "textfield",
          "heading"     => __("Font Awesome", "dahztheme"),
          "param_name"  => "type",
          "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon')),
          "description" => __( 'Check the icon list here <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">Font Awesome</a>, use icon id only. e.g, "adjust" instead "fa-adjust"', 'dahztheme' )
      ));
      vc_add_param( 'vc_button2', array(
          "type"        => "dropdown",
          "heading"     => __("Font Size", "dahztheme"),
          "param_name"  => "size",
          "value"       => array(
                               __("1x", "dahztheme") => '1x',
                               __("2x", "dahztheme") => '2x',
                               __("3x", "dahztheme") => '3x',
                               __("4x", "dahztheme") => '4x',
                               __("5x", "dahztheme") => '5x',
                               __("lg", "dahztheme") => 'lg',
                           ),
          "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon'))
      ));
      vc_add_param( 'vc_button2', array(
          "type"        => "dropdown",
          "heading"     => __("Font Rotate", "dahztheme"),
          "param_name"  => "rotate",
          "value"       => array(
                               __("Normal", "dahztheme") => 'normal',
                               __("Rotate 90 Degree", "dahztheme") => '90',
                               __("Rotate 180 Degree", "dahztheme") => '180',
                               __("Rotate 270 Degree", "dahztheme") => '270'
                           ),
          "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon'))
      ));
      vc_add_param( 'vc_button2', array(
          "type"        => "dropdown",
          "heading"     => __("Font Flip", "dahztheme"),
          "param_name"  => "flip",
          "value"       => array(
                               __("None", "dahztheme") => '',
                               __("Horizontal", "dahztheme") => 'horizontal',
                               __("Vertical", "dahztheme") => 'vertical'
                           ),
          "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon'))
      ));
      vc_add_param( 'vc_button2', array(
          'type'            => 'colorpicker',
          'heading'         => __( 'Font Color', 'dahztheme' ),
          'param_name'      => 'font_color',
          'value'           => '#ffffff',
          'description'     => __( 'Font color.', 'dahztheme' ),
          'dependency'      => Array('element' => "style", 'value' => array('round', 'rounded', 'square', '3d'))
      ));
      vc_add_param( 'vc_button2', array(
          'type'            => 'colorpicker',
          'heading'         => __( 'Button Color', 'dahztheme' ),
          'param_name'      => 'color',
          'value'           => '#999999',
          'description'     => __( 'Button color.', 'dahztheme' ),
          'dependency'      => Array('element' => "style", 'value' => array('round', 'rounded', 'square', '3d', 'outlined', 'square_outlined'))
      ));
      vc_add_param( 'vc_button2', array(
          'type'            => 'colorpicker',
          'heading'         => __( 'Button Color Hover', 'dahztheme' ),
          'param_name'      => 'color_hover',
          'description'     => __( 'Button color hover.', 'dahztheme' ),
          'dependency'      => Array('element' => "style", 'value' => array('round', 'rounded', 'square', 'outlined', 'square_outlined'))

      ));
      vc_add_param( 'vc_button2', array(
          "type"        => "colorpicker",
          "heading"     => __("3d button shadow", "dahztheme"),
          "param_name"  => "btn_shadow_color",
          'dependency'      => Array('element' => "style", 'value' => array('3d'))
      ));

      vc_add_param( 'vc_button2', array(
          'type'            => 'dropdown',
          'heading'         => __( 'Size', 'dahztheme' ),
          'param_name'      => 'btn_size',
          'value'           => getVcShared( 'sizes' ),
          'std'             => 'md',
          'description'     => __( 'Button size.', 'dahztheme' )
      ));
      vc_add_param( 'vc_button2', array(
          'type'            => 'dropdown',
          'heading'         => __( 'Button Position', 'dahztheme' ),
          'param_name'      => 'btn_position',
          'value'           => array(
                                    __( 'Left', 'dahztheme' ) => '',
                                    __( 'Center', 'dahztheme' ) => 'btn_position_center',
                                    __( 'Right', 'dahztheme' ) => 'btn_position_right'
                               ),
          'description'     => __( 'Button position.', 'dahztheme' )
      ));
      vc_add_param( 'vc_button2', array(
          'type'            => 'dropdown',
          'heading'         => __( 'Button Animation', 'dahztheme' ),
          'param_name'      => 'animated_style',
          'value'           => array(
                                    __( 'none', 'dahztheme' ) => '',
                                    __( 'Top to Bottom', 'dahztheme' ) => 'top_to_bottom',
                                    __( 'Opacity Icon Animation Left to Right (button icon only)', 'dahztheme' ) => 'op_icon_animation_ltr',
            
                               ),
          'dependency'      => Array('element' => "style", 'value' => array('rounded', 'square', 'outlined', 'square_outlined')),
      ));
      vc_add_param( 'vc_button2', array(
          'type'            => 'textfield',
          'heading'         => __( 'Extra class name', 'dahztheme' ),
          'param_name'      => 'btn_el_class',
          'description'     => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'dahztheme' )
      ));

      /* ======================================================================= */
      /* 12. vc_cta_button                                                       */
      /* ======================================================================= */
      vc_map_update( 'vc_cta_button2', array(
          'name'            => 'Call to Action Button',
          'description'     => __( 'Catch visitors attention with CTA block', 'dahztheme' )
      ));

      vc_remove_param( 'vc_cta_button2', 'h2' );
      vc_remove_param( 'vc_cta_button2', 'h4' );
      vc_remove_param( 'vc_cta_button2', 'style' );
      vc_remove_param( 'vc_cta_button2', 'el_width' );
      vc_remove_param( 'vc_cta_button2', 'txt_align' );
      vc_remove_param( 'vc_cta_button2', 'accent_color' );
      vc_remove_param( 'vc_cta_button2', 'content' );
      vc_remove_param( 'vc_cta_button2', 'link' );
      vc_remove_param( 'vc_cta_button2', 'title' );
      vc_remove_param( 'vc_cta_button2', 'btn_style' );
      vc_remove_param( 'vc_cta_button2', 'color' );
      vc_remove_param( 'vc_cta_button2', 'icon' );
      vc_remove_param( 'vc_cta_button2', 'size' );
      vc_remove_param( 'vc_cta_button2', 'position' );
      vc_remove_param( 'vc_cta_button2', 'css_animation' );
      vc_remove_param( 'vc_cta_button2', 'el_class' );

      vc_add_param( 'vc_cta_button2', array(
          'type'        => 'dropdown',
          'heading'     => __( 'CTA style', 'dahztheme' ),
          'admin_label' => true,
          'param_name'  => 'cta_style',
          'value'       => array(
                              __( 'Rounded', 'dahztheme' ) => 'rounded',
                              __( 'Square', 'dahztheme' ) => 'square',
                              __( 'Outlined', 'dahztheme' ) => 'outlined',
                              __( 'Square Outlined', 'dahztheme' ) => 'square_outlined',
                           ),
          'description' => __( 'Call to action style.', 'dahztheme' )
      ));
      vc_add_param( 'vc_cta_button2', array(
          'type'        => 'colorpicker',
          'heading'     => __( 'Custom Background Color', 'dahztheme' ),
          'param_name'  => 'accent_color',
          'description' => __( 'Select background color for your element.', 'dahztheme' )
      ));
      vc_add_param( 'vc_cta_button2', array(
          'type'        => 'textarea_html',
          'heading'     => __( 'Text', 'dahztheme' ),
          'admin_label' => true,
          'param_name'  => 'content',
          'value'       => __( 'I am promo text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'dahztheme' )
      ));
      // button SC in CTA
      vc_add_param( 'vc_cta_button2', array(
          'type'        => 'vc_link',
          'heading'     => __( 'URL (Link)', 'dahztheme' ),
          'param_name'  => 'link',
          'description' => __( 'Button link.', 'dahztheme' )
      ));
      vc_add_param( 'vc_cta_button2', array(
          'type'        => 'textfield',
          'heading'     => __( 'Text on the button', 'js_composer' ),
          'holder'      => 'button',
          'param_name'  => 'title',
          'description' => __( 'Text on the button.', 'js_composer' )
      ));
          vc_add_param( 'vc_cta_button2', array(
          "type"        => "dropdown",
          "heading"     => __("Button Style", "dahztheme"),
          "param_name"  => "style",
          "value"       => array(
                               __("Rounded", "dahztheme") => 'rounded',
                               __("Square", "dahztheme") => 'square',
                               __("Round", "dahztheme") => 'round',
                               __("Outlined", "dahztheme") => 'outlined',
                               __("3d", "dahztheme") => '3d',
                               __("Square Outlined", "dahztheme") => 'square_outlined',
                           ),
      ));
      vc_add_param( 'vc_cta_button2', array(
          "type"        => "dropdown",
          "heading"     => __("Font Awesome Icon", "dahztheme"),
          "param_name"  => "icon_type",
          "value"       => array(
                               __("No", "dahztheme") => '',
                               __("Yes", "dahztheme") => 'fa_icon',
                           ),
      ));
      vc_add_param( 'vc_cta_button2', array(
          "type"        => "textfield",
          "heading"     => __("Font Awesome", "dahztheme"),
          "param_name"  => "type",
          "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon')),
          "description" => __( 'Check the icon list here <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">Font Awesome</a>, use icon id only. e.g, "adjust" instead "fa-adjust"', 'dahztheme' )
      ));
      vc_add_param( 'vc_cta_button2', array(
          "type"        => "dropdown",
          "heading"     => __("Font Size", "dahztheme"),
          "param_name"  => "size",
          "value"       => array(
                               __("1x", "dahztheme") => '1x',
                               __("2x", "dahztheme") => '2x',
                               __("3x", "dahztheme") => '3x',
                               __("4x", "dahztheme") => '4x',
                               __("5x", "dahztheme") => '5x',
                               __("lg", "dahztheme") => 'lg',
                           ),
          "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon'))
      ));
      vc_add_param( 'vc_cta_button2', array(
          "type"        => "dropdown",
          "heading"     => __("Font Rotate", "dahztheme"),
          "param_name"  => "rotate",
          "value"       => array(
                               __("Normal", "dahztheme") => 'normal',
                               __("Rotate 90 Degree", "dahztheme") => '90',
                               __("Rotate 180 Degree", "dahztheme") => '180',
                               __("Rotate 270 Degree", "dahztheme") => '270'
                           ),
          "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon'))
      ));
      vc_add_param( 'vc_cta_button2', array(
          "type"        => "dropdown",
          "heading"     => __("Font Flip", "dahztheme"),
          "param_name"  => "flip",
          "value"       => array(
                               __("None", "dahztheme") => '',
                               __("Horizontal", "dahztheme") => 'horizontal',
                               __("Vertical", "dahztheme") => 'vertical'
                           ),
          "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon'))
      ));
      vc_add_param( 'vc_cta_button2', array(
          'type'            => 'colorpicker',
          'heading'         => __( 'Font Color', 'dahztheme' ),
          'param_name'      => 'font_color',
          'value'           => '#ffffff',
          'description'     => __( 'Font color.', 'dahztheme' ),
          'dependency'      => Array('element' => "style", 'value' => array('round', 'rounded', 'square', '3d'))
      ));
      vc_add_param( 'vc_cta_button2', array(
          'type'            => 'colorpicker',
          'heading'         => __( 'Button Color', 'dahztheme' ),
          'param_name'      => 'color',
          'value'           => '#999999',
          'description'     => __( 'Button color.', 'dahztheme' ),
          'dependency'      => Array('element' => "style", 'value' => array('round', 'rounded', 'square', '3d', 'outlined', 'square_outlined'))
      ));
      vc_add_param( 'vc_cta_button2', array(
          'type'            => 'colorpicker',
          'heading'         => __( 'Button Color Hover', 'dahztheme' ),
          'param_name'      => 'color_hover',
          'description'     => __( 'Button color hover.', 'dahztheme' ),
          'dependency'      => Array('element' => "style", 'value' => array('round', 'rounded', 'square', 'outlined', 'square_outlined'))

      ));
      vc_add_param( 'vc_cta_button2', array(
          "type"        => "colorpicker",
          "heading"     => __("3d button shadow", "dahztheme"),
          "param_name"  => "btn_shadow_color",
          'dependency'      => Array('element' => "style", 'value' => array('3d'))
      ));

      vc_add_param( 'vc_cta_button2', array(
          'type'            => 'dropdown',
          'heading'         => __( 'Size', 'dahztheme' ),
          'param_name'      => 'btn_size',
          'value'           => getVcShared( 'sizes' ),
          'std'             => 'md',
          'description'     => __( 'Button size.', 'dahztheme' )
      ));
      vc_add_param( 'vc_cta_button2', array(
          'type'            => 'dropdown',
          'heading'         => __( 'Button Position', 'dahztheme' ),
          'param_name'      => 'btn_position',
          'value'           => array(
                                    __( 'Left', 'dahztheme' ) => '',
                                    __( 'Center', 'dahztheme' ) => 'btn_position_center',
                                    __( 'Right', 'dahztheme' ) => 'btn_position_right'
                               ),
          'description'     => __( 'Button position.', 'dahztheme' )
      ));
      vc_add_param( 'vc_cta_button2', array(
          'type'            => 'dropdown',
          'heading'         => __( 'Button Animation', 'dahztheme' ),
          'param_name'      => 'animated_style',
          'value'           => array(
                                    __( 'none', 'dahztheme' ) => '',
                                    __( 'Top to Bottom', 'dahztheme' ) => 'top_to_bottom',
                                    __( 'Opacity Icon Animation Left to Right (button icon only)', 'dahztheme' ) => 'op_icon_animation_ltr',
            
                               ),
          'dependency'      => Array('element' => "style", 'value' => array('rounded', 'square', 'outlined', 'square_outlined')),
      ));
      vc_add_param( 'vc_cta_button2', array(
          'type'            => 'textfield',
          'heading'         => __( 'Extra class name for button', 'dahztheme' ),
          'param_name'      => 'btn_el_class',
          'description'     => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'dahztheme' )
      ));
      //end button SC in CTA

      vc_add_param( 'vc_cta_button2', array(
          'type'            => 'dropdown',
          'heading'         => __( 'CSS Animation', 'dahztheme' ),
          'param_name'      => 'css_animation',
          'admin_label'     => true,
          'value'           => array(
                                  __( 'No', 'dahztheme' ) => '',
                                  __( 'Top to bottom', 'dahztheme' ) => 'top-to-bottom',
                                  __( 'Bottom to top', 'dahztheme' ) => 'bottom-to-top',
                                  __( 'Left to right', 'dahztheme' ) => 'left-to-right',
                                  __( 'Right to left', 'dahztheme' ) => 'right-to-left',
                                  __( 'Appear from center', 'dahztheme' ) => "appear"
                               ),
          'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'dahztheme' )
      ));
      vc_add_param( 'vc_cta_button2', array(
          'type'            => 'textfield',
          'heading'         => __( 'Extra class name for call to action', 'dahztheme' ),
          'param_name'      => 'el_class',
          'description'     => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'dahztheme' )
      ));

      /* ======================================================================= */
      /* 12. vc_accordion                                                       */
      /* ======================================================================= */
      vc_map_update( 'vc_accordion', array(
          'description'     => __( 'Collepsible content panels', 'dahztheme' )
      ));
      /* ======================================================================= */
      /* 13. contact-form-7                                                      */
      /* ======================================================================= */
      if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
            vc_add_param( 'contact-form-7', array(
                'type'            => 'dropdown',
                'heading'         => __( 'Contact Form Style', 'dahztheme' ),
                'param_name'      => 'html_class',
                'admin_label'     => true,
                'value'           => array(
                                        __( 'No', 'dahztheme' ) => '',
                                        __( 'Transparent', 'dahztheme' ) => 'form7_transparent',
                                        __( 'Underline', 'dahztheme' ) => 'form7_underline',
       
                                     ),
                'description' => __( 'Select type of style', 'dahztheme' )
            ));
      }
  }
add_action( 'admin_init', 'df_vc_update_existing_shortcodes' );
}