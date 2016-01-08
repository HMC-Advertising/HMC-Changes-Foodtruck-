<?php
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $output_bg_image =  $width =  $height = $return_img_plx = '';
extract(shortcode_atts(array(
    'el_class'        => '',
    'type'            => '',
    'content_type'    => '',
    'bg_image'        => '',
    'bg_color'        => '',
    'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
    'margin_bottom'   => '',

    'bg_video_mp4' => '',
	'bg_video_ogv' => '',
	'bg_video_webm' => '',
    
    'padding_top'  			=> '',
    'padding_bottom'	 	=> '',
    'margin_top' 			=> '',
    'margin_bottom' 		=> '',
    'bg_image_position' 	=> '',
    'bg_image_attachment'  	=> 'false',
    'bg_image_cover'  		=> 'auto',
    'visibility' => '',

	'enable_parallax' 		=> '',
	'parallax_speed' 		=> '',

	'anchor' => '',
	'min_height' => ''
), $atts));


wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass($el_class);

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ''.get_row_css_class().$el_class, $this->settings['base']);

$content_style = array();
$content_data_attr = array();

$anchor = str_replace( '#', '', $anchor );
$anchor = $anchor ? $anchor : '';

 
            $bg_image = explode( ',', $bg_image );
            $i = -1;  
            foreach ( $bg_image as $attach_id ) {
            $i++;
            $image_src  = wp_get_attachment_image_src( $attach_id, 'full' );



            $output_bg_image .= $image_src[0];
            $width  .= $image_src[1];
            $height .= $image_src[2];

           }

if( $type ) {
	$bg_image_attachment = in_array( $bg_image_attachment, array( 'false', 'fixed', 'true' ) ) ? $bg_image_attachment : 'false';

	if ( $bg_color ) {
		$style[] = 'background-color: ' . $bg_color;
	}

	if ( $output_bg_image && !in_array($output_bg_image, array('none') ) ) {

		$style[] = 'background-image: url(' . esc_url($output_bg_image) . ')';
		
	}

	if ( $bg_image_position ) {
		$style[] = 'background-position: ' . $bg_image_position;
	}

	if ( $bg_image_repeat ) {
		$style[] = 'background-repeat: ' . $bg_image_repeat;
	}

	if ( 'false' != $bg_image_attachment ) {
		$style[] = 'background-attachment: fixed';
	} else {
		$style[] = 'background-attachment: scroll';
	}

	if ( $bg_image_cover ) {
		$style[] = 'background-size: ' . $bg_image_cover;
	} 


		$style[] = 'padding-top: ' . intval($padding_top) . 'px';
		$style[] = 'padding-bottom: ' . intval($padding_bottom) . 'px';
		$style[] = 'margin-top: ' . intval($margin_top) . 'px';
		$style[] = 'margin-bottom: ' . intval($margin_bottom) . 'px';

    $style = implode(';', $style);

	$row_classes = array( 'custom-row' );
	$row_classes[] = 'row-style-' . esc_attr($type);
	

	if ($visibility) {
		$row_classes[] = esc_attr($visibility) ;
	}

	// video bg
	$bg_video = '';
	$bg_video_args = array();

	if ( $bg_video_mp4 ) {
		$bg_video_args['mp4'] = $bg_video_mp4;
	}

	if ( $bg_video_ogv ) {
		$bg_video_args['ogv'] = $bg_video_ogv;
	}

	if ( $bg_video_webm ) {
		$bg_video_args['webm'] = $bg_video_webm;
	}

	if ( !empty($bg_video_args) ) {
		$attr_strings = array(
			'loop="1"',
			'preload="1"'
		);

		if ( $output_bg_image && !in_array( $output_bg_image, array('none') ) ) {

			$attr_strings[] = 'poster="' . esc_url($output_bg_image) . '"';
		}

		$bg_video .= sprintf( '<video %s controls="controls" class="row-video-bg">', join( ' ', $attr_strings ) );

		$source = '<source type="%s" src="%s" />';
		foreach ( $bg_video_args as $video_type=>$video_src ) {

			$video_type = wp_check_filetype( $video_src, wp_get_mime_types() );
			$bg_video .= sprintf( $source, $video_type['type'], esc_url( $video_src ) );

		}

		$bg_video .= '</video>';

		$row_classes[] = 'row-video-bg';
	}

   if ( $style ) {
		$style = wp_kses( $style, array() );
		$style = ' style="' . esc_attr($style) . '"';
	}
    

	$data_attr = '';
	if ( $anchor ) {
		$data_attr .= ' data-anchor="#' . esc_attr( $anchor ) . '"';
		$data_attr .= ' id="' . esc_attr( $anchor ) . '"';
	}
	
	if ( '' != $parallax_speed && $enable_parallax ) {
		$parallax_speed = floatval($parallax_speed);
		if ( false == $parallax_speed ) {
			$parallax_speed = 0;
		}

		$row_classes[] = 'row-parallax-bg';
		$data_attr .= ' data-prlx-speed="' . $parallax_speed . '"';
	}

	if ( '' !== $min_height ) {
		$data_attr .= ' data-min-height="' . esc_attr( $min_height ) . '"';
	}

	$output .= '<div class="' . esc_attr(implode(' ', $row_classes)) . '"' . $data_attr .' '. $style . '>';
	$output .= $bg_video;
} else {

	$content_style[] = 'margin-top: ' . intval($margin_top) . 'px';
	$content_style[] = 'margin-bottom: ' . intval($margin_bottom) . 'px';

	if ( $anchor ) {
		$content_data_attr[] = 'data-anchor="#' . esc_attr( $anchor ) . '"';
		$content_data_attr[] = 'id="' . esc_attr( $anchor ) . '"';
	}

	if ( '' !== $min_height ) {
		$content_data_attr[] = 'data-min-height="' . esc_attr( $min_height ) . '"';
	}

}

$contentCol = '';	
if('full_width_content' == $content_type) {
	$contentCol = 'full-width-content';
}

if( !empty($font_color) ) {
       $content_style[] = 'color: '. esc_attr($font_color) . '' ;
 }

$content_style = ' style="' . esc_attr( implode(';', $content_style) ) . '"';
$content_data_attr = ' ' . implode(' ', $content_data_attr);


$output .= '<div class="'.$contentCol.' '.$css_class.'" '. $content_data_attr .' '. $content_style .'>';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div>'.$this->endBlockComment('row');

if ($type) {
	$output .= '</div>';
}

echo $output;