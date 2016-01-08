<?php

/** 
  * Blog
  *   
  * @example
  * [blog posts="1,2,3,4,...,n" styles="list or grid" order="ASC or DESC"]
**/

function df_blog_latest_sc($atts){
    global $post; 
    
    extract(shortcode_atts(array(
        'posts'       => '6',
        'styles'      => 'list',
        'layout_list' => '',
        'layout_grid' => '',
        'layout_grid_eff' => '',
        'filter_grid' => '',
        'order'       => 'DESC',
        'orderby'     => 'date',
        'category'    => '',
        'extra_class'     => '',
    ), $atts));

    global $styles_global_grid_sc;
    $styles_global_grid_sc = $styles;
    if($category != 'all'){
        // string to array
        $str = $category;
        $arr = explode(',', $str);
      
        $args['tax_query'][] = array(
          'taxonomy'  => 'category',
          'field'     => 'slug',
          'terms'     => $arr
        );
    } 
  ob_start();
    df_isotope_category_blog_sc($styles, $filter_grid, $layout_grid_eff, $category);

    ?>

<section id="primary" class="content-area">
    
<?php

    if ($styles == 'list') {
      echo '<div class="'.$layout_list .' '. $extra_class.'">';
    } else if ($styles == 'grid') {
      echo '<div class="df-blog-grid-standard '.$layout_grid .' '. $extra_class.'">';
    }
    else {
        echo '<div class="df-standard-image-top '.$extra_class.'">';
    }
?>

    <div class="entry-content" >

<?php
    $args = array(
      'post_type'       => 'post',
      'posts_per_page'  => $posts,
      'order'           => $order,
      'orderby'         => $orderby,
      'category_name'   => $category,
      'post_status'     => 'publish'
    );

    query_posts( $args );

    if( have_posts() ) : ?>
      <div class="grid-sizer"></div>

<?php while ( have_posts() ) : the_post();
        df_get_template( df_get_composer(), 'content', get_post_format() );
      endwhile;
    
      wp_reset_query();
  
    endif; ?>

    </div> 
  </div>
</section>
<?php 
  $blog = ob_get_clean();
return $blog;
}
add_shortcode('blog', 'df_blog_latest_sc');


/* ----------------------------------------------------------------------------------- */
/* Isotope Category blog shortcode                                                     */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_isotope_category_blog_sc')) :

    function df_isotope_category_blog_sc($styles, $filter_grid, $layout_grid_eff, $category){
 
      
        if ($filter_grid && $styles == 'grid') {
            
            $arr_category = (explode(",",$category));
            
            // category inculde blog
            $cat_count_inc = count($arr_category);
            if ($cat_count_inc > 0) {
                foreach ($arr_category as $catinc) {
                    $term = get_term_by('slug', $catinc , 'category'); 
                    $category_inc[] = $term->term_id;

                }
            }

            $terms = get_terms( 'category', array(
                'include' => $category_inc,

             ) );

            $html = '<ul id="options-blog-sort">';
            $html .= '<li> ' . __('Filter By :', 'dahztheme') . '</li>';
            $html .= '<li><a href="#" data-option-value="*" data-filter="*" class="selected">' . __('All', 'dahztheme') . '</a></li>';

            foreach ($terms as $term) {
                $html .= "<li><a href='#' data-filter='.category-{$term->slug}'>{$term->name}</a></li>";
            }

            $html .= '</ul><div class="clear"></div>';

            echo $html;
        }
        if ($layout_grid_eff == 'fitrows') {
            ?>
            <script>
                jQuery(window).ready(function($) {
                    // isotope blog   
                    var mycontainer = jQuery('.df-blog-grid-standard');
                    mycontainer.isotope({
                        itemSelector: '.df-blog-grid-standard .post',
                        layoutMode: 'fitRows',
                    });
                    mycontainer.imagesLoaded( function() {
                      mycontainer.isotope('layout');
                    });
                    jQuery('#options-blog-sort a').click(function() {
                        var selector = jQuery(this).attr('data-filter');
                        mycontainer.isotope({filter: selector});
                        return false;
                    });

                    var $links = jQuery('#options-blog-sort a');
                    $links.click(function() {
                        $links.removeClass('current').addClass('link');
                        jQuery(this).removeClass('link').addClass('current');

                        var divname = this.name;
                        jQuery("#" + divname).show("normal").siblings().hide("normal");
                    });
                });

            </script>

            <?php
        } else if ($layout_grid_eff == 'masonry') {
            ?>
            <script>


                jQuery(window).ready(function($) {
                    // isotope blog  
                    var mycontainer = jQuery('.df-blog-grid-standard');
                    mycontainer.isotope({
                        itemSelector: '.df-blog-grid-standard .post',
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

                    var $links = jQuery('#options-blog-sort a');
                    $links.click(function() {
                        $links.removeClass('current').addClass('link');
                        jQuery(this).removeClass('link').addClass('current');

                        var divname = this.name;
                        jQuery("#" + divname).show("normal").siblings().hide("normal");
                    });
                });

            </script>

            <?php
        }
    }

endif;