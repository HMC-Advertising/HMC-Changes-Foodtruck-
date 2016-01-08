<?php
extract( shortcode_atts( array(
	'el_width' 		=> '',
	'style' 		=> '',
	'height'		=> '',
	'color' 		=> '',
	'accent_color' 	=> '',
	'border_size'	=> '',
	'padding'		=> '',
	'position'		=> '',
	'el_class' 		=> ''
), $atts ) );

echo do_shortcode( '[vc_text_separator style="' . $style . '" height="' . $height . '" color="' . $color . '" accent_color="' . $accent_color . '" el_width="' . $el_width . '" el_class="' . $el_class . '" border_size="'.$border_size.'" padding="'.$padding.'" position="'.$position.'"]' );