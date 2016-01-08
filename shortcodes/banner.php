<?php
/** 
  * BANNER
  *   
  * @example
  * [banner url="" target="_self or _blank" border="yes or no" border_color="" back_image="true or false" img="image id" height="0..n" background=""]
**/

function df_banner_sc( $atts, $content = null) {
    extract( shortcode_atts( array(
        'link'          => '',
        'border'        => 'yes',
        'border_color'  => '',
        'back_image'    => 'true',
        'img'           => '',
        'height'        => '',
        'background'    => '#eeeeee',
        'el_class'      => ''
    ), $atts ));

    $output_img = '';
    $img = explode( ',', $img );
    $i = -1;  
            
      foreach ( $img as $attach_id ) {
          $i++;
          $image_src  = wp_get_attachment_image_src( $attach_id, 'full' );
          $output_img .= $image_src[0];
      }

      if( $output_img == '') {
          $return_img = get_template_directory_uri().'/includes/images/presets/post-formats/big/image.jpg'; 
      } else {
          $return_img = $output_img;
      }

      $link = ( $link == '||' ) ? '' : $link;
      $link = vc_build_link( $link );
      $a_href = $link['url'];
      $a_title = $link['title'];
      $a_target = $link['target'];

      if ($border != 'yes') {
          $border_color = 'transparent';
      } else {
          $border_color;
      }

      $height = 'height: '.$height.'px';

        if ( $back_image == 'false') {
             return '<div class="banner-warpper '.$el_class.'">
                       <div class="banner-warpper-inner">
                          <a href="'.$a_href.'" target="'.$a_target.'" title="'.$a_title.'">
                             <div class="banner-background" style=" background-color:'.$background.';"></div>
                             <div class="banner-inner">
                                 <div class="banner-content" style="border-color:'.$border_color.'; '.$height.';">'.do_shortcode($content).'</div>
                             </div>
                          </a>
                       </div>
                     </div>';
        } else {
             return '<div class="banner-warpper '.$el_class.'">
                       <div class="banner-warpper-inner">
                           <a href="'.$a_href.'" target="'.$a_target.'" title="'.$a_title.'">
                             <div class="banner-background" style=" background-image: url('.$return_img.');"></div>
                             <div class="banner-inner">
                                 <div class="banner-content" style="border-color:'.$border_color.'; '.$height.';">'.do_shortcode($content).'</div>
                             </div>
                           </a>
                       </div>
                     </div>';

        }
}
add_shortcode('df_banner', 'df_banner_sc');