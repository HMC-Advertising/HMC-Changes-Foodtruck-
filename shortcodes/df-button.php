<?php
function df_button_mce( $atts ) {
	$title = $font_color = $color_hover = $color = $link = $target = $link_title = $btn_size = $style = $btn_position = '';
	extract( shortcode_atts( array(
		'title' 		=> '',
		'font_color'	=> '',
		'color' 		=> '',
		'color_hover'	=> '',
		'link' 			=> '',
		'target'		=> '_blank',
		'link_title'	=> '',
		'btn_size'		=> '',
		'btn_position'	=> ''
	), $atts ) );
	//ob_start();

	$class = 'vc_btn vc_btn_square';
	$class .= ( $btn_size != '' ) ? ( ' vc_btn_' . $btn_size . ' vc_btn-' . $btn_size ) : '';
	
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $atts );

	$data_attr = '';
	if ( '' != $color ) { $data_attr = ' data-button-color="' . $color . '" '; }
	if ( '' != $color_hover ) { $data_attr .= ' data-button-color-hover="' . $color_hover . '" '; }
	if ( '' != $font_color ) { $data_attr .= ' data-font-color="' . $font_color . '" '; } 

	$output .='
	
	<div class="btn_warpper '.$btn_position .'">
		<a class="fp_yellow_button '. trim( $css_class ).'" href="'.$link. ' " title="'.$link_title.'" target="'.$target.'" '.$data_attr.'>
			'.$title. '
		</a>
	</div>
	';

	//return ob_get_clean();
	return $output;
}
add_shortcode('df_button', 'df_button_mce');