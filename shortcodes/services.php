<?php
/** 
 * Services   
 * 
 * @example
 *    
 * [our_services icon="First Image URL" style="style1/style2" title="First Item Title" link_name="" link_url="" align="" title=""]  
 *    Description Goes Here
 * [/our_services]
**/

function df_services_sc($atts, $content = null){
	// enqueue js
	// wp_enqueue_script('df-appear');
	wp_enqueue_script('df-custom');

	// enqueue css

	extract(shortcode_atts(array(
		'icon_type'				=> 'fa_icon',
		'type' 					=> '', // font awesome type
		'size'		 			=> '', // font awesome size lg, 1x, 2x, 3x, 4x, 5x
		'rotate'				=> '', // font awesome rotation style
		'flip'					=> '', // font awesome flip style
		'img' 					=> '', // icon using user image id
		'img_width' 			=> '', // image width
		'icon_color'			=> '#000000',
		'icon_style'			=> 'simple', // type of icon such as simple (no background), square, rounded, or design owner
		'icon_bg_color'			=> 'transparent', // background color of icon
		'border_style'			=> '',
		'border_width'			=> '',
		'border_radius'			=> '',
		'border_color'			=> '',
		'icon_animation' 		=> '',
		'hover_effect'			=> '',
		'title'	  				=> 'title',
		'link'	   				=> '#',
		'position'    			=> '',
		'el_class'	  			=> ''
	), $atts ));
			
	$logo = do_shortcode('[icon type="'.$type.'" size="'.$size.'" rotate="'.$rotate.'" flip="'.$flip.'"]');
	
	$output_img = $style = '';
    $img = explode( ',', $img );
    $i = -1;  
            
	foreach ( $img as $attach_id ) {
		$i++;
		$image_src  = wp_get_attachment_image_src( $attach_id, 'full' );
		$output_img .= $image_src[0];
	}

	if( $output_img == '') {
		$return_img = '<img src="'.get_template_directory_uri().'/includes/images/presets/post-formats/big/image.jpg'.'" style="width:'.$img_width.'px;" alt="Service Image"/>'; 
	} else {
		$return_img = '<img src="'.$output_img.'" style="width:'.$img_width.'px;" alt="Service Image"/>';
	}

	$link = ( $link == '||' ) ? '' : $link;
  	$link = vc_build_link( $link );
  	$a_href = $link['url'];
  	$a_title = $link['title'];
  	$a_target = $link['target'];

	$output = '';

	if ($position == 'left') {
		$layout = 'layout-left';
	} else if($position == 'icon_left') {
		$layout = 'layout-icon-left';
	} else if($position == 'top') {
		$layout = 'layout-top';
	}

	if ($icon_style == 'simple') {
		$style = 'color: '.$icon_color.';';
	} else if ($icon_style == 'square') {
		$style = 'background-color: '.$icon_bg_color.'; color: '.$icon_color.';';
	} else if ($icon_style == 'rounded') {
		$style = 'background-color: '.$icon_bg_color.'; border-radius: 50%; color: '.$icon_color.';';
	} else if ($icon_style == 'own') {
		$style = 'background-color: '.$icon_bg_color.'; border-radius: '.$border_radius.'px; border-style: '.$border_style.'; border-color: '.$border_color.'; border-width: '.$border_width.'px; color: '.$icon_color.';';
	}

	if ($icon_animation !='') {
		
		$output .= '<div class="service-component animated-service" data-animation-service="'.$icon_animation.'">';

		
	}
	else {
		
		$output .= '<div class="service-component">';
	}

	// condition position
	if ($position == 'left' || $position == 'top') {
		$output	.= '<div class="service '.$layout.'">';
		
		// condition icon type : font awesome icon or image icon
		if ($icon_type == 'fa_icon') {
			$output .= '<div class="service-icon  '.$hover_effect.'" style="'.$style.'">'.$logo.'</div>';
		} else if ($icon_type == 'image_icon') {
			$output .= '<div class="service-icon '.$hover_effect.'">'.$return_img.'</div>';
		}

	  	$output	.= '<div class="service-desc">
	  					<div class="service-header"><h3 class="title"><a href="'.$a_href.'" title="'.$a_title.'">'.$title.'</a></h3></div>
	  					<div class="service-content">'.do_shortcode($content).'</div>
					</div></div>';
	} else {
		$output	.= '<div class="service '.$layout.'">
						<div class="service-icon-header">';
			
			 // condition icon type : font awesome icon or image icon
			 if ($icon_type == 'fa_icon') {
				$output .= '<div class="service-icon '.$hover_effect.'" style="'.$style.'">'.$logo.'</div>';
			 } else if ($icon_type == 'image_icon') {
				$output .= '<div class="service-icon '.$hover_effect.'">'.$return_img.'</div>';
			 }

			$output .= '<div class="service-header"><h3 class="title"><a href="'.$a_href.'" title="'.$a_title.'">'.$title.'</a></h3></div></div>
					  	<div class="service-desc">
					  	  	<div class="service-content">'.do_shortcode($content).'</div>
					  	</div>
				  	</div>';
	}
	
	$output	.= '</div>';

	return $output;
}
add_shortcode('df_services', 'df_services_sc' );