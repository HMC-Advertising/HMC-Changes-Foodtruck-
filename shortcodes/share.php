<?php

/**  
 * Show Social Icon
 * 
 * @example
 *    
 *  
**/
function df_share($atts ) {
  extract(shortcode_atts(array(
    'twitter'      => '',
    'facebook'     => '',
    'email'        => '',
    'google'       => '',
    'pinterest'    => '',
    'share'        => '',
    'share_text'   => 'share',
    'border_round'   => '',
    'icon_color'   => '',
    'icon_color_hover'   => '',
  ), $atts));
  global $global_icon_color_sc, $global_icon_color_hover_sc;
  $global_icon_color_sc = $icon_color;
  $global_icon_color_hover_sc = $icon_color_hover;
  
  echo '<style type="text/css">
        .border-round li a{
          border-color:'.$global_icon_color_sc.';
        }
        .border-round li a:hover{
          border-color:'.$global_icon_color_hover_sc.';
        }
        .df-share-shortcode li a{
          color:'.$global_icon_color_sc.';
        }
        .df-share-shortcode li a:hover{
          color:'.$global_icon_color_hover_sc.';
        }
      </style>';

$output = '';

    
if ($border_round == 'true') {
  $output .= '<ul class="df-share-shortcode border-round">';
}else if ($border_round == 'false'){
  $output .= '<ul class="df-share-shortcode">';
}
if ($share && isset($share_text)) {
  $output .= '<li class="df-share-text">'.$share_text.'</li>';
}
if ($twitter == 'true') {
  $output .= '<li><a href="http://twitter.com/share?text='.get_the_title().'&url='.get_the_permalink(get_the_ID()).'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
}
if ($facebook == 'true') {
  $output .= '<li><a href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink(get_the_ID()).'" target="_blank"><i class="fa-facebook fa"></i>  </a></li>';
}
if ($google == 'true') {
  $output .= '<li><a href="https://plus.google.com/share?url='.get_the_permalink(get_the_ID()).'" target="_blank"><i class="fa-google-plus fa"></i></a></li>';
}
if ($pinterest == 'true') {
  $output .= '<li><a href="https://pinterest.com/pin/create/button/?url='.get_the_permalink(get_the_ID()).'" target="_blank"><i class="fa fa-pinterest "></i></a></li>';
}
if ($email == 'true') {
  $output .= '<li><a href="mailto:?subject='.get_the_permalink(get_the_ID()).'" target="_top"><i class="fa-envelope-o fa"></i> </a></li>';
}
$output .= '</ul>';

return $output;
 
}
add_shortcode('share_social', 'df_share');

 
 