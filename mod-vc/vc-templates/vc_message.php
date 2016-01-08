<?php
$output = $color = $el_class = $css_animation = '';
	extract(shortcode_atts(array(
		'icon_type'		=> '',
		'type'			=> '',
		'size'			=> '',
		'rotate'		=> '',
		'flip'			=> '',
	    'color' 		=> 'alert-info',
	    'el_class' 		=> '',
	    'style' 		=> '',
	    'css_animation' => ''
	), $atts));
$el_class = $this->getExtraClass($el_class);

$class = "";
$logo = do_shortcode('[icon type="'.$type.'" size="'.$size.'" rotate="'.$rotate.'" flip="'.$flip.'"]');
//$style = "square_outlined";
$class .= ($style!='') ? ' vc_alert_'.$style : '';
$class .= ( $color != '' && $color != "alert-block") ? ' wpb_'.$color : '';

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_alert wpb_content_element' . $class . $el_class, $this->settings['base'], $atts );

$css_class .= $this->getCSSAnimation($css_animation);
?>
<div class="<?php echo $css_class; ?>">
	<div class="messagebox_text fa_icon"><?php echo $logo ?><?php echo wpb_js_remove_wpautop($content, true); ?></div>
</div>
<?php echo $this->endBlockComment('alert box')."\n";