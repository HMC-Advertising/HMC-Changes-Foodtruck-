<?php
extract( shortcode_atts( array(
	'title' 		=> __( 'Text on the button', "dahztheme" ),
	'icon_type'		=> '',
	'type'			=> '',
	'rotate'		=> '',
	'size'			=> '',
	'flip'			=> '',
	'font_color'	=> '',
	'color' 		=> '',
	'color_hover'	=> '',
	'link' 			=> '',
	'btn_size'		=> '',
	'style' 		=> '',
	'btn_position'	=> '',
	'btn_shadow_color'    => '',
	'animated_style' => '',
	'btn_el_class'	=> '',

), $atts ) );

$logo = '';
if ($type != '') {
	$logo = do_shortcode('[icon type="'.$type.'" size="'.$size.'" rotate="'.$rotate.'" flip="'.$flip.'"]');
}
$class = 'vc_btn';
//parse link
$link = ( $link == '||' ) ? '' : $link;
$link = vc_build_link( $link );
$a_href = $link['url'];
$a_title = $link['title'];
$a_target = $link['target'];

$class .= ( $size != '' ) ? ( ' vc_btn_' . $btn_size . ' vc_btn-' . $btn_size ) : '';
$class .= ( $style != '' ) ? ' vc_btn_' . $style : '';
$class .= ( $animated_style != '' ) ? ' animated ' . $animated_style : '';

$btn_el_class = $this->getExtraClass( $btn_el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ' . $class . $btn_el_class, $this->settings['base'], $atts );

	$data_attr = '';
	if ( '' != $color ) { $data_attr = ' data-button-color="' . $color . '"'; }
	if ( '' != $color_hover ) { $data_attr .= ' data-button-color-hover="' . $color_hover . '"'; }
	if ( '' != $btn_shadow_color ) { $data_attr .= ' data-box-shadow-color="' . $btn_shadow_color . '"'; }
	if ( '' != $style ) { $data_attr .= ' data-button-class="' . $style . '"'; }
	if ( '' != $animated_style ) { $data_attr .= ' data-button-animation="' . $animated_style . '"'; }
	if ( '' != $font_color ) { $data_attr .= ' data-font-color="' . $font_color . '"'; }

?>
<div class="btn_warpper <?php echo $btn_position; ?>">
	<a class="<?php echo esc_attr( trim( $css_class ) ); ?>" href="<?php echo $a_href; ?>" title="<?php echo esc_attr( $a_title ); ?>" target="<?php echo $a_target; ?>" <?php echo $data_attr; ?>>
		<?php if ($animated_style == 'op_icon_animation_ltr' || $animated_style == 'op_icon_animation_rtl'){ ?>
			<span><?php echo $title; ?></span>
		<?php } else { ?>
			<?php echo $title; ?>
		<?php } ?>
		<?php echo $logo; ?>
		<?php if ($style != '3d' && $style != 'round' && $animated_style == 'top_to_bottom' ): ?>
			<span>
				<?php echo $title; ?>
				<?php echo $logo; ?>
			</span> 
		<?php endif ?>

	</a>
</div>
<?php echo $this->endBlockComment( 'vc_button' ) . "\n";