<?php

/**  
 * Show Social Icon
 * 
 * @example
 *    
 * [social_icon icon="" url="" target="_self or _blank" bg_color="" bg_color_hover="" color="" color_hover="" type="normal, square, outline-round, outline-square or round" size="big, medium or small"]
**/
function df_social_icon_sc($atts ) {
  extract(shortcode_atts(array(
    'icon'          => 'fa fa-twitter',
    'url'           => '',
    'target'        => '_blank',
    'color'         => '#fff',
    'color_hover'   => '#000',
    'bg_color'      => '#ae9364',
    'bg_color_hover'=> '#ff0000',
    'type'          => 'square',
    'size'          => 'medium'
  ), $atts));

    // class options
    if ($size == 'small') {
        switch ($type) {
          case 'normal':
            $class = 'social-sc social_icon_small normal';
            break;
          case 'square':
            $class = 'social-sc social_icon_small square';
            break;
          case 'round':
            $class = 'social-sc social_icon_small round';
            break;
          case 'outline-round':
            $class = 'social-sc social_icon_small outline-round';
            break;
          case 'outline-square':
            $class = 'social-sc social_icon_small outline-square';
            break;
          default:
            $class = 'social-sc social_icon_small normal';
            break;
        }
    } else if ($size == 'medium') {
      switch ($type) {
          case 'normal':
            $class = 'social-sc social_icon_medium normal';
            break;
          case 'square':
            $class = 'social-sc social_icon_medium square';
            break;
          case 'round':
            $class = 'social-sc social_icon_medium round';
            break;
          case 'outline-round':
            $class = 'social-sc social_icon_medium outline-round';
            break;
          case 'outline-square':
            $class = 'social-sc social_icon_medium outline-square';
            break;
          default:
            $class = 'social-sc social_icon_medium normal';
            break;
        }
    } else if ($size == 'big') {
      switch ($type) {
          case 'normal':
            $class = 'social-sc social_icon_big normal';
            break;
          case 'square':
            $class = 'social-sc social_icon_big square';
            break;
          case 'round':
            $class = 'social-sc social_icon_big round';
            break;
          case 'outline-round':
            $class = 'social-sc social_icon_big outline-round';
            break;
          case 'outline-square':
            $class = 'social-sc social_icon_big outline-square';
            break;
          default:
            $class = 'social-sc social_icon_big normal';
            break;
        }
    }

    if ($bg_color != '') {
        $border_color = $bg_color;
    } else {
        $border_color = $color;
        $bg_color = '#ffffff';
    }

    // css style
    echo '<style>
            .social_icon_small:hover, .social_icon_medium:hover, .social_icon_big:hover{
                background-color: '.$bg_color_hover.' !important;
                color: '.$color_hover.' !important;
                border-color: '.$bg_color_hover.' !important;
            }
            .social_icon_small.outline-square:hover, .social_icon_medium.outline-square:hover, .social_icon_big.outline-square:hover{
                background-color: transparent !important;
                border-color: '.$color_hover.' !important;
            }
            .social-sc.outline-round em:before,
            .social-sc.round em:before{
              background:'.$bg_color.'!important;
             }
          </style>';
      if ($type == 'round' || $type == "outline-round" ) {
        $em = '<em class="'.$icon.'"></em>';
      } else{
        $em = '';

      }
    // social icon html
    $social_icon = '    
      <a href="'.$url.'" target="'.$target.'" class="fa '.$class.' '.$icon.'" style="border-color:'.$border_color.'; background-color:'.$bg_color.'; color:'.$color.';">
      '.$em.'
      </a>';
    
  return $social_icon;
}
add_shortcode('social_icon', 'df_social_icon_sc');




/*-----------------------------------------------------------------------------------*/
/*  Facebook Connect                                                                 */
/*-----------------------------------------------------------------------------------*/
function df_facebook_login_sc( $atts, $content = null ){
  extract( shortcode_atts( array(
    'text' => 'Login / Register with Facebook',
  ), $atts ) );
    ob_start();
    global $post;
?>
  <a href="<?php echo wp_login_url(); ?>?loginFacebook=1&redirect=<?php echo the_permalink(); ?>" class="button facebook-button" onclick="window.location = '<?php echo wp_login_url(); ?>?loginFacebook=1&redirect='+window.location.href; return false;"><i class="icon-facebook"></i> <?php echo $text; ?></a>
<?php
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}
add_shortcode('facebook_login_button', 'df_facebook_login_sc');