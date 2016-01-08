<?php

/** 
  * Portfolio
  *   
  * @example
**/

function df_portfolio_latest_sc($atts){
    global $post; 
    
    extract(shortcode_atts(array(
        'posts'       => '12',
        'style_port'  => '1',
        'port_grid'  => 'grid_3_portfolio',
        'margin_port' => '',
        'layout_grid_eff' => 'masonry',
        'filter_grid' => '',
        'order'       => 'DESC',
        'orderby'     => 'date',
        'category'    => '',
        'extra_class'    => '',
    ), $atts)); 
  
  ob_start();



    df_portfolio_no_margin_sc($margin_port);
 
  ?>
<section id="primary" class="content-area <?php echo $extra_class; ?>">
    <!-- Content -->
    <?php
    if ($style_port == '1') {
        $style_class = 'df-porto-style1';
    } else {
        $style_class = 'df-porto-style2';
    }
    ?>
    <?php
    echo '<div class="' . $style_class . ' ' . $port_grid . '" >';
 
    $port_args = array(
        'post_type' => 'portfolio',
        'post_status' => 'publish',
        'posts_per_page' => $posts,
        'order' => $order,
        'orderby' => $orderby,
    );
    if (!empty($category)) {

        $category_inc = '';
        $arr_category = (explode(",",$category));
            
        $port_args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio-gallery',
                'field' => 'slug',
                'terms' => $arr_category,
            )
        );
    }

 
    query_posts($port_args);
    if (have_posts()) :
        df_isotope_category_port_sc($filter_grid, $layout_grid_eff, $category);


// ======================================================================================
// while loop
// ======================================================================================
        echo "<div class='df-portfolio-isotope entry-content '>";
        ?>
    <div class="grid-sizer"></div>

    <?php 
        if ($style_port == '1') {
            while (have_posts()) : the_post();   // main loop  
                df_get_template(df_get_composer(), 'content', 'portfolio-style1');
            endwhile;
        }
        else {
            while (have_posts()) : the_post();   // main loop  
                df_get_template(df_get_composer(), 'content', 'portfolio-style2');
            endwhile;
        }

        echo "</div><div class='clear'></div>";
        wp_reset_query();
    endif;
    ?>

</div><!-- .entry-content -->
 

</section><!-- #primary -->
<?php   
  $portfolio = ob_get_clean();
return $portfolio;
}
add_shortcode('portfolio', 'df_portfolio_latest_sc');

/* ----------------------------------------------------------------------------------- */
/* Isotope Category portfolio  shortcode                                               */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_isotope_category_port_sc')) :

    function df_isotope_category_port_sc($filter_grid, $layout_grid_eff, $category) {
        if ($filter_grid) {
            // init
            $category_inc = array();
            
            $arr_category = (explode(",",$category));
            
            // category inculde blog
            $cat_count_inc = count($arr_category);
            if ($cat_count_inc > 0) {
                foreach ($arr_category as $catinc) {
                    $term = get_term_by('slug', $catinc , 'portfolio-gallery'); 
                    $category_inc[] = $term->term_id;

                }
            }
 

 
            $terms = get_terms( 'portfolio-gallery', array(
                'include' => $category_inc,

             ) );

            $html = '<ul id="options-portfolio-sort">';
            $html .= '<li> ' . __('Filter By :', 'dahztheme') . '</li>';
            $html .= '<li><a href="#" data-option-value="*" data-filter="*" class="selected">' . __('All', 'dahztheme') . '</a></li>';
            if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                foreach ($terms as $term) {
                    $html .= "<li><a href='#' data-filter='.{$term->slug}'>{$term->name}</a></li>";
                }
            }

            $html .= '</ul><div class="clear"></div>';

            echo $html;
        }
        if ($layout_grid_eff == 'fitrows') {
            ?>
            <script>
                jQuery(window).ready(function($) {
                    // isotope portfolio   
                    var mycontainer = jQuery('.df-portfolio-isotope');
                    mycontainer.isotope({
                        itemSelector: '.portfolio',
                        layoutMode: 'fitRows',
                    });
                    mycontainer.imagesLoaded( function() {
                      mycontainer.isotope('layout');
                    });
                    jQuery('#options-portfolio-sort a').click(function() {
                        var selector = jQuery(this).attr('data-filter');
                        mycontainer.isotope({filter: selector});
                        return false;
                    });

                    var $links = jQuery('#options-portfolio-sort a');
                    $links.click(function() {
                        $links.removeClass('current').addClass('link');
                        jQuery(this).removeClass('link').addClass('current');

                        var divname = this.name;
                        jQuery("#" + divname).show("normal").siblings().hide("normal");
                    });
                });

            </script>

            <?php
        } /* end if layout_grid_eff */ else if ($layout_grid_eff == 'masonry') {
            ?>
            <script>
                jQuery(window).ready(function($) {
                    // isotope portfolio   
                        var mycontainer = jQuery('.df-portfolio-isotope');
                        mycontainer.isotope({
                            itemSelector: '.portfolio',
                            masonry: {
                                columnWidth: ".grid-sizer"
                            }
                        });
                    mycontainer.imagesLoaded( function() {
                      mycontainer.isotope('layout');
                    });
                    jQuery('#options-blog-sort a').click(function() {
                        var selector = jQuery(this).attr('data-filter');
                        mycontainer.isotope({filter: selector});
                        return false;
                    });
                    // filter items when filter link is clicked
                    jQuery('#options-portfolio-sort a').click(function() {
                        var selector = jQuery(this).attr('data-filter');
                        mycontainer.isotope({filter: selector});
                        return false;
                    });

                    var $links = jQuery('#options-portfolio-sort a');
                    $links.click(function() {
                        $links.removeClass('current').addClass('link');
                        jQuery(this).removeClass('link').addClass('current');

                        var divname = this.name;
                        jQuery("#" + divname).show("normal").siblings().hide("normal");
                    });
                });

            </script>

            <?php
        }/* end else if layout_grid_eff */
    }

endif;

/* ----------------------------------------------------------------------------------- */
/* Portfolio no margin                                                                 */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_portfolio_no_margin_sc')) :

    function df_portfolio_no_margin_sc($margin_port) {
        if ($margin_port) {
            ?>
            <style>
                .df-layout-grand .grid_2_portfolio .portfolio.big_port_class,
                .df-layout-grand .grid_3_portfolio .portfolio.big_port_class,
                .df-layout-grand .grid_4_portfolio .portfolio.big_port_class,
                .df-layout-grand .grid_5_portfolio .portfolio.big_port_class,
                .df-layout-grand .grid_2_portfolio .portfolio,
                .df-layout-grand .grid_3_portfolio .portfolio,
                .df-layout-grand .grid_4_portfolio .portfolio,
                .df-layout-grand .grid_5_portfolio .portfolio{
                    margin-right: 0;
                    margin-bottom: 0;
                    padding: 0px;
                    position: relative;
                }  
                .df-pict-slider, .df-pict-slider li {
                    margin-bottom: 0px!important
                }
                @media only screen and (min-width: 768px) {
                    .df-layout-grand .df-portfolio-isotope{
                        width: 100%;
                        padding: 0px;
                        margin: 0px;
                    }
                    .df-layout-grand .grid_2_portfolio .portfolio{
                        width: 50%;
                    }
                    .df-layout-grand .grid_3_portfolio .portfolio{
                        width: 32.99999%;
                    }
                    .df-layout-grand .grid_4_portfolio .portfolio{
                        width: 25%;
                    }
                    .df-layout-grand .grid_5_portfolio .portfolio{
                        width: 20%;
                         
                    }

                    .df-layout-grand .grid_2_portfolio .portfolio.big_port_class{
                        width: 100%;
                    }
                    .df-layout-grand .grid_3_portfolio .portfolio.big_port_class{
                        width: 66.666666%;
                    }
                    .df-layout-grand .grid_4_portfolio .portfolio.big_port_class{
                        width: 50%;
                    }
                    .df-layout-grand .grid_5_portfolio .portfolio.big_port_class{
                        width: 40%;
                    }
                }
            </style>
            <?php
        }
    }

endif; 