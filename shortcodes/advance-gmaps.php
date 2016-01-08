<?php

function advance_gmaps( $atts, $content = null) {

extract( shortcode_atts( array(
			'height' => '400',
			'latitude' => '',
			'longitude' => '',
			'address' => '',

			'latitude_2' => '',
			'longitude_2' => '',
			'address_2' => '',

			'latitude_3' => '',
			'longitude_3' => '',
			'address_3' => '',

			'zoom' => '14',
			'pan_control' => 'true',
			'draggable' => 'true',
			'zoom_control' => 'true',
			'map_type_control' => 'true',
			'scale_control' => 'true',
			'img' => '',
			'modify_coloring' => 'false',
			'hue' => '#ccc',
			'saturation' => '',
			'lightness' => '',
			'el_class' => '',
			
		), $atts ) );
$output = '';

      $output_img = '';
      $output_img_el = '';
      $img = explode( ',', $img );
      $i = -1;  

        foreach ( $img as $attach_id ) {
            $i++;
            $image_src  = wp_get_attachment_image_src( $attach_id, 'thumbnail-gallery-grid' );
            $output_img .= $image_src[0];
        }

if ( $longitude == '' && $latitude == '') { return null; }

if ( $zoom < 1 ) {
	$zoom = 1;
}

$id = mt_rand(99,9999);

$data = '';
 
	$parallax_class = '';
	$parallax_height = $height;
 
$maps = '';
	$maps .= '<div class="'.$parallax_class.'" style="height:'.$height.'px"><div id="google-map-'.$id.'" class="advanced-gmaps" '.$data.' style="height:'.$parallax_height.'px;width:100%;" data-zoom="'.$zoom.'" data-pin-icon="'.$output_img.'" data-latitude="'.$latitude.'" data-longitude="'.$longitude.'" data-address="'.$address.'" data-latitude2="'.$latitude_2.'" data-longitude2="'.$longitude_2.'" data-address2="'.$address_2.'" data-latitude3="'.$latitude_3.'" data-longitude3="'.$longitude_3.'" data-address3="'.$address_3.'" data-pan-control="'.$pan_control.'" data-zoom-control="'.$zoom_control.'" data-map-type-control="'.$map_type_control.'" data-scale-control="'.$scale_control.'" data-draggable="'.$draggable.'" data-modify-coloring="'.$modify_coloring.'" data-saturation="'.$saturation.'" data-lightness="'.$lightness.'" data-hue="'.$hue.'"></div></div>';

$maps .= '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>';

return $maps;
 
}
    add_shortcode('advanced_gmaps', 'advance_gmaps');

