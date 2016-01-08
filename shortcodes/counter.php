<?php
/** 
  * Counter
  *
  * Show Counter
  *   
  * @example
  * [df_stat_counter counter_title="" counter_value="" counter_sep="" counter_decimal=", or ." counter_color_txt="#fff" font_size_counter="" counter_title_color_txt="" font_size_title="" speed="" el_class=""]
**/

function df_counter_sc($atts){
	// enqueue js
	wp_enqueue_script( 'df-appear' );
	wp_enqueue_script( 'df-custom' );
	wp_enqueue_script( 'df-countup' );

	$counter_title = $counter_value = $font_size_title = $font_size_counter = $counter_font = $title_font = $speed = $el_class = $counter_sep = $counter_decimal = $counter_color_txt = '';
		extract(shortcode_atts( array(
			'counter_title' 			=>'',
			'counter_value' 			=>'',
			'counter_sep' 				=>'',
			'counter_decimal' 			=>'',
			'counter_color_txt'			=>'', // counter font color text
			'font_size_counter' 		=>'', // counter font size text
			'counter_title_color_txt'	=>'', // counter font title color text
			'font_size_title' 			=>'', // counter font title size text
			'speed'						=>'', // counter speed count
			'el_class'					=>''
		),$atts));			 
				
		$class = $style = '';
		
		// style counter text font color
		if($counter_color_txt !== ''){
			$counter_color = 'color:'.$counter_color_txt.';';
		} else {
			$counter_color = '';
		}
		
		// style counter title font color
		if($counter_title_color_txt !== ''){
			$counter_title_color = 'color:'.$counter_title_color_txt.';';
		} else {
			$counter_title_color = '';
		}

		// style font size
		$counter_font = 'font-size:'.$font_size_counter.'px;';
		$title_font = 'font-size:'.$font_size_title.'px;';

		// el class
		if($el_class != ''){
			$class.= ' '.$el_class;
		}
		
		// counter HTML
		$output = '<div class="stats-block '.$class.'">';
			$id = 'counter_'.rand();
			if( $counter_sep == "" ){
				$counter_sep = 'none';
			}
			if( $counter_decimal == "" ){
				$counter_decimal = 'none';
			}
			
		$output .= '<div class="stats-desc">';
		$output .= '<div id="'.$id.'" data-id="'.$id.'" class="stats-number" style="'.$counter_font.' '.$counter_color.'" data-speed="'.$speed.'" data-counter-value="'.$counter_value.'" data-separator="'.$counter_sep.'" data-decimal="'.$counter_decimal.'">0</div>';
		$output .= '<div class="stats-text" style="'.$title_font.' '.$counter_title_color.'">'.$counter_title.'</div>';
		$output .= '</div>';
		$output .= '</div>';

	return $output;		
}
add_shortcode('df_stat_counter', 'df_counter_sc');