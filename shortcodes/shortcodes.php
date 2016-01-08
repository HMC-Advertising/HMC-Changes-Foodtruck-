<?php 
/*-----------------------------------------------------------------------------------*/
/* Column 
/*-----------------------------------------------------------------------------------*/
function df_columns_sc( $atts, $content = null, $tag ) {
    extract( shortcode_atts(  array(
        // extra classes
        'class' => ''
    ), $atts ) );
    if ( $class != '' )
        $class = ' ' . $class;
    $last = '';
    // check the shortcode tag to add a "last" class
    if ( strpos( $tag, '_last' ) !== false )
        $tag = str_replace( '_last', ' last', $tag);
    $html = '<div class="' . $tag . $last . $class . '">' . do_shortcode( $content ) . '</div>';
    return apply_filters( 'df_columns_html', $html );
}

$columns = array(
    'twocol_one', // 1/2
    'twocol_one_last', 
    'threecol_one', // 1/3
    'threecol_one_last',
    'fourcol_one', // 1/4
    'fourcol_one_last',
    'threecol_two', // 2/3
    'threecol_two_last',
    'fourcol_three', // 3/4
    'fourcol_three_last',
    'fivecol_one', // 1/5
    'fivecol_one_last'
);
foreach( $columns as $column ) {
    add_shortcode( $column, 'df_columns_sc' );
}

/*-----------------------------------------------------------------------------------*/
/*  Dropcap
/*-----------------------------------------------------------------------------------*/
function df_dropcap_sc ( $atts, $content = null ) {
  $defaults = array(
      'background_color' => '',
      'color' => '',
      'size' => 'normal'
    );

  extract( shortcode_atts( $defaults, $atts ) );
  $html = '';
  if ($background_color != '') {
    $html .= '<span class="dropcap" style="color:'.$color.'; background-color:'.$background_color.'; padding:2px 6px; font-weight:'.$size.' ">' . do_shortcode($content) . '</span><!--/.dropcap-->';

  } elseif ($background_color == '') {
    
    $html .= '<span class="dropcap" style="color:'.$color.'; font-weight:'.$size.'">' . do_shortcode($content) . '</span><!--/.dropcap-->';
  }
  

  return apply_filters( 'df_dropcap_html', $html );
} 

add_shortcode( 'dropcap', 'df_dropcap_sc' );

/*-----------------------------------------------------------------------------------*/
/*  Gap 
/*-----------------------------------------------------------------------------------*/

function df_gap_sc( $atts, $content = null) {

extract( shortcode_atts( array(
      'height'  => '20'
      ), $atts ) );
      
      if($height == '') {
      $return = '';
    }
    else{
      $return = 'style="height: '.$height.'px;"';
    }
      
      $html = '<div class="clear"></div><div class="gap" ' . $return . '></div>';

      return apply_filters( 'df_gap_html', $html );
}

add_shortcode( 'gap', 'df_gap_sc' );

/*-----------------------------------------------------------------------------------*/
/*  Highlight 
/*-----------------------------------------------------------------------------------*/
function df_highlight_sty ( $atts, $content = null ) {
  $defaults = array(
    'background' => '',
    'color' => ''
    );

  extract( shortcode_atts( $defaults, $atts ) );

  return '<span class="shortcode-highlight"  style="background-color:'.$background.';color:'.$color.';">' .do_shortcode($content) . '</span><!--/.shortcode-highlight-->';
} // End df_shortcode_highlight()

add_shortcode( 'highlight_sty', 'df_highlight_sty' );

/*-----------------------------------------------------------------------------------*/
/*  Blockquote 
/*-----------------------------------------------------------------------------------*/
function df_blockquote_sty ( $atts, $content = null ) {
  $defaults = array(
    'border_size' => '4px',
    'color' => '#000',
    'ver' => '1',
    );

  extract( shortcode_atts( $defaults, $atts ) );
  if ($ver == '2') {
  return '<blockquote class="blk2" style="border-left:'.$border_size.' solid '.$color.';">' . do_shortcode($content). '</blockquote> ';

  }
  else {
  return '<blockquote class="blk">' . do_shortcode($content). '</blockquote> ';

  }
}  

add_shortcode( 'blockquote_sty', 'df_blockquote_sty' );

/*-----------------------------------------------------------------------------------*/
/*  icon list item
/*-----------------------------------------------------------------------------------*/
function df_list_style_sc( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'border_color' => '',
      'border' => '', 
      'border_style' => ''
      ), $atts));
  $out = '<ul class="style-list" style="border:'.$border.';border-style:'.$border_style.';border-color:'.$border_color.'">'. do_shortcode($content) . '</ul>';
    return $out;
}
add_shortcode( 'list', 'df_list_style_sc' );

function df_item_list_sc( $atts, $content = null ) {
  extract(shortcode_atts(array(
        'icon'      => 'fa-check',
        
    ), $atts));


  $out = '<li> <i class="fa '.$icon.'"></i>'. do_shortcode($content) . '</li>';
  
    return $out;
}
add_shortcode( 'list_item', 'df_item_list_sc' );


/*-----------------------------------------------------------------------------------*/
/*  Tool tip
/*-----------------------------------------------------------------------------------*/
function df_tooltip_sc( $atts, $content = null ) {
  extract(shortcode_atts(array(
      'text' => '',
      'link' => '',
      'tooltip' => '',
      'target' => '_self',
      'color' => '',
      'bg_color' => ''
    ), $atts));

wp_enqueue_script('jquery-ui-tooltip');

echo '<style>.ui-tooltip{color: '.$color.';background: '.$bg_color.';}
        .ui-tooltip:before{border-bottom: 5px solid '.$bg_color.';}</style>';

  $out = '<a class="tltp" href="'.$link.'" target="'.$target.'" title="'.$tooltip.'" > '. $text . '</a>';
  
    return $out;
}
add_shortcode( 'tooltip', 'df_tooltip_sc' );

/*-----------------------------------------------------------------------------------*/
/*  Google Font
/*-----------------------------------------------------------------------------------*/
function df_googlefont_sc( $atts, $content = null, $google) {
extract( shortcode_atts( array(
        'font' => 'Open Sans',
        'size' => '36px',
        'margin' => '0px',
        'color' => '',
        'float' => 'none',
        'line_height' => '1.2',
        'font_weight' => '',
        'align' => 'left',
      ), $atts ) );
      


      $google = preg_replace("/ /","+",$font);
      add_action('wp_enqueue_scripts', 'df_googlefont_sc_enqueue');

      return '<div class="googlefont" style="font-family:\'' .$font. '\', serif !important; font-size:' .$size. ' !important; margin: ' .$margin. ' !important; color:'.$color.';line-height:'.$line_height.'; float:'.$float.';text-align:'.$align.';font-weight:'.$font_weight.';">' . do_shortcode($content) . '</div>  ';
}

add_shortcode( 'googlefont', 'df_googlefont_sc');

function df_googlefont_sc_enqueue() {
      wp_enqueue_style( 'df_google_fonts_' . vc_build_safe_css_class( $google ), '//fonts.googleapis.com/css?family=' . $google );
      // wp_enqueue_style( 'df_google_fonts_' . vc_build_safe_css_class( $google ));

}
// add_action('wp_enqueue_scripts', 'df_googlefont_sc_enqueue');
 
/*-----------------------------------------------------------------------------------*/
/*  Font Awesome 
/*-----------------------------------------------------------------------------------*/
function df_fontawesome_sc($atts) {
    extract(shortcode_atts(array(
    'type'  => '',
    'size' => '',
    'rotate' => '',
    'flip' => '',
    'pull' => '',
    'animated' => '',
 
    ), $atts));
     
    $type = ($type) ? 'fa-'.$type. '' : '';
    $size = ($size) ? 'fa-'.$size. '' : '';
    $rotate = ($rotate) ? 'fa-rotate-'.$rotate. '' : '';
    $flip = ($flip) ? 'fa-flip-'.$flip. '' : '';
    $pull = ($pull) ? 'pull-'.$pull. '' : '';
    $animated = ($animated) ? 'fa-spin' : '';
 
    $html = '<i class="fa '.sanitize_html_class($type).' '.sanitize_html_class($size).' '.sanitize_html_class($rotate).' '.sanitize_html_class($flip).' '.sanitize_html_class($pull).' '.sanitize_html_class($animated).'"></i>';
     
    return apply_filters( 'df_fontawesome_html', $html );
}
 
add_shortcode('icon', 'df_fontawesome_sc');

$shortcodes = array(
      'banner.php',
      'blog.php',
      'countdown.php',
      'counter.php',
      'member.php',
      'modal.php',
      'services.php',
      'social.php',
      'table.php',
      'testimonial.php',
      'advance-gmaps.php',
      'share.php',
      'portfolio.php',
      'df-slider.php',
      'df-button.php',
      'event-calendar.php'
);

foreach ($shortcodes as $sc ) {
  require_once $sc;
}

 
/*-----------------------------------------------------------------------------------*/
/*  hex to rgba
/*-----------------------------------------------------------------------------------*/
if(!function_exists('ultimate_hex2rgb')){
  function ultimate_hex2rgb($hex,$opacity=1) {
     $hex = str_replace("#", "", $hex);
     if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
     } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
     }
     $rgba = 'rgba('.$r.','.$g.','.$b.','.$opacity.')';
     //return implode(",", $rgb); // returns the rgb values separated by commas
     return $rgba; // returns an array with the rgb values
  }
}

//add_filter('the_content', 'do_shortcode', 7);