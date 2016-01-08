<?php
/** 
  * Show the Member
  *   
  * @example
  * [member name="Your Name" role="Role" img="you image" twitter="your twitter account" facebook="your facebook account" google="your google account" tumblr="your tumblr account" mail="yourmail]your content[/member]
  *  
**/

function df_member_sc( $atts, $content = null) {
    extract( shortcode_atts( array(
        'styles'    => 'style1',
        'img'       => '',
        'name'      => '',
        'role'      => '',
        'twitter'   => '',
        'facebook'  => '',
        'google'    => '',
        'mail'      => '',
        'link'      => '',
        'link_color' => ''
    ), $atts));
 
      $output_img = '';
      $output_img_el = '';
      $img = explode( ',', $img );
      $i = -1;  

        foreach ( $img as $attach_id ) {
            $i++;
            $image_src  = wp_get_attachment_image_src( $attach_id, 'thumbnail-gallery-grid' );
            $output_img .= $image_src[0];
        }
      
        if( $output_img == '') {
            $return = "<a href='".$link." target='_blank'><img src=".get_template_directory_uri().'/includes/images/presets/post-formats/big/image.jpg'."></a>"; 
        } else {
            $return = "<a href='".$link."' target='_blank'><img src='".$output_img."' /></a>";
        }
      
        if( $twitter != '' || $facebook != '' || $google != ''  || $mail != '' ){
            $return7 = '<div class="member-social"><ul>';
            $return8 = '</ul></div>';
        
            if($twitter != '') {
                $return2 = '<li><a href="' .$twitter. '" class="fa fa-twitter" target="_blank" title="Twitter"></a></li>';
            } else {
                $return2 = ''; 
            }
            
            if($facebook != '') {
                $return3 = '<li><a href="' .$facebook. '" target="_blank"class="fa fa-facebook" title="Facebook"></a></li>';
            } else {
                $return3 = ''; 
            }
         
            if($google != '') {
                $return4 = '<li><a href="' .$google. '" target="_blank"class="fa fa-google-plus" title="Google+"></a></li>';
            } else {
                $return4 = ''; 
            }
            
            if($mail != '') {
                $return6 = '<li><a href="mailto:' .$mail. ' "class="fa fa-envelope-o" title="Mail"></a></li>';
            } else {
                $return6 = ''; 
            }
        } else {
          $return2 = '';
          $return3 = ''; 
          $return4 = ''; 
          $return6 = ''; 
          $return7 = '';
          $return8 = ''; 
        }

        if ($styles == 'style1') {
            $class = ' style1';
            $link_color = '';
            $member_content = ' <p class="member-divider"></p>
                    <p class="member-content">' . do_shortcode($content) . '</p>' 
                    .$return7. '' .$return2. '' .$return3. '' .$return4. '' .$return6. '' .$return8.'';

        } else {
            $class = ' style2';
            $member_content = '';
        }

        $out = '<div class="member'.$class.'">
                  <div class="member-image">' .$return. '</div>
                  <div class="member-desc-warp">
                    <h3 class="title-sc member-name"><a href="'.$link.'" style="color:'.$link_color.'">' .$name. '</a></h3>
                    <p class="member-role" style="color:'.$link_color.'">' .$role. '</p>
                   '.$member_content.'
                  </div>
                </div>';

      return $out;
}
add_shortcode('member', 'df_member_sc');