<?php
if ( ! function_exists( 'dahztheme_testimonials_shortcode' ) ) {
    /**
     * The shortcode function.
     * @since  1.0.0
     * @param  array  $atts    Shortcode attributes.
     * @param  string $content If the shortcode is a wrapper, this is the content being wrapped.
     * @return string          Output using the template tag.
     */
    function dahztheme_testimonials_shortcode( $atts, $content = null ) {
        $args = (array)$atts;

        $defaults = array(
            'limit'             => 5,
            'per_row'           => null,
            'orderby'           => 'menu_order',
            'order'             => 'DESC',
            'id'                => 0,
            'display_author'    => false,
            'display_avatar'    => false,
            'display_url'       => false,
            'effect'            => 'fade', // Options: 'fade', 'none'
           // 'pagination'        => false,
            'echo'              => false,
            'size'              => 60,
            'category'          => 0,
            'position'          => 'left', //  Options: 'left', 'center', 'right'
            'id_testimonial_slider' => 0,
            'testimonial_slider' => false, 
            'el_class' => '', 
        );

        $args = shortcode_atts( $defaults, $atts );

        // Make sure we return and don't echo.
        $args['echo'] = false;

        // Fix integers.
        if ( isset( $args['limit'] ) ) $args['limit'] = intval( $args['limit'] );
        if ( isset( $args['size'] ) &&  ( 0 < intval( $args['size'] ) ) ) $args['size'] = intval( $args['size'] );
        if ( isset( $args['category'] ) && is_numeric( $args['category'] ) ) $args['category'] = intval( $args['category'] );

        // Fix booleans.
        foreach ( array( 'display_author', 'display_url', 'pagination', 'display_avatar') as $k => $v ) {
            if ( isset( $args[$v] ) && ( 'true' == $args[$v] ) ) {
                $args[$v] = true;
            } else {
                $args[$v] = false;
            }
        }

        return dahztheme_testimonials( $args );
    } // End dahztheme_testimonials_shortcode()
}

add_shortcode( 'dahz_testimonial', 'dahztheme_testimonials_shortcode' );