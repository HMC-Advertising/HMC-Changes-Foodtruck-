<?php
extract(shortcode_atts(array(
    // button
    'title'         => __( 'Text on the button', "dahztheme" ),
    'icon_type'     => '',
    'type'          => '',
    'rotate'        => '',
    'size'          => '',
    'flip'          => '',
    'font_color'    => '',
    'color'         => '',
    'color_hover'   => '',
    'link'          => '',
    'btn_size'      => '',
    'style'         => '',
    'btn_position'  => '',
    'btn_shadow_color'    => '',
    'animated_style' => '',
    // cta button
    'cta_style'     => '',
    'accent_color'  => '',
    'el_class'      => '',
    'css_animation' => ''
), $atts));

$button = do_shortcode('[vc_button2 title="'.$title.'" icon_type="'.$icon_type.'" type="'.$type.'" rotate="'.$rotate.'" size="'.$size.'" flip="'.$flip.'" font_color="'.$font_color.'" 
                        color="'.$color.'" color_hover="'.$color_hover.'" link="'.$link.'" btn_size="'.$btn_size.'" style="'.$style.'" btn_position="'.$btn_position.'" btn_shadow_color="'.$btn_shadow_color.'" animated_style="'.$animated_style.'" el_class="'.$el_class.'"]');

$class = "vc_call_to_action wpb_content_element";

$link = ($link=='||') ? '' : $link;

$class .= ($cta_style!='') ? ' vc_cta_'.$cta_style : '';

$inline_css = ($accent_color!='') ? ' style="'.vc_get_css_color('background-color', $accent_color).vc_get_css_color('border-color', $accent_color).'"' : '';

$class .= $this->getExtraClass($el_class);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );
$css_class .= $this->getCSSAnimation($css_animation);
?>

<div<?php echo $inline_css; ?> class="<?php echo esc_attr(trim($css_class)); ?>">
    <div class="cta_content"><?php echo wpb_js_remove_wpautop($content, true); ?></div>
    <div class="cta_button"><?php if ($link!='') echo $button; ?></div>
</div>
<?php $this->endBlockComment('.vc_call_to_action') . "\n";