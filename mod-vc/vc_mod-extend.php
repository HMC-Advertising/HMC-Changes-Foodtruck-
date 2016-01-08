<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

$cat_fc_in = array();
$terms_in = get_terms('card-category');

if (is_array($terms_in) && ( count($terms_in) > 0 )) {
    foreach ($terms_in as $k => $v) {
        $cat_fc_in[$v->name] = $v->slug;
    }
}

// Flip Card
vc_map( array(
     "name" => __("Flip Card", "dahztheme"),
     "base" => "flip_card",
     "category" => __('Content', "dahztheme"),
     "icon" => "icon-df_flipcard",
     "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Style", "dahztheme"),
            "param_name" => "style",
            "value" => array('Grid' => 'grid', 'List' => 'list', 'Accordion' => 'accordion'),
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Limit", "dahztheme"),
            "param_name" => "limit",
            "value" => '12',
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Order by", "dahztheme"),
            "param_name" => "orderby",
            "value" => array(
                            __('None', "dahztheme") => "none",
                            __('Date', "dahztheme") => "date",
                            __('Name', "dahztheme") => "name",
                            __('Title', "dahztheme") => "title",
                            __('Random', "dahztheme") => "rand",
                        ),
            "description" => __("Select order", "dahztheme")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Order", "dahztheme"),
            "admin_label" => true,
            "param_name" => "order",
            "value" => array('Descendence' => 'desc', 'Ascendence' => 'asc')
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Category Include", "dahztheme"),
            "param_name" => "categories",
            "admin_label" => true,
            "value" => $cat_fc_in
        )
      )
     ));

// blog
vc_map( array(
     "name" => __("Blog", "dahztheme"),
     "base" => "blog",
     "category" => __('Content', "dahztheme"),
     "icon" => "icon-df_blog",
     "params" => array(

        array(
            "type" => "textfield",
            "heading" => __("Number Post Blog", "dahztheme"),
            "param_name" => "posts",
            "value" => '12',
            "admin_label" => true
        ),
 
        array(
            "type" => "dropdown",
            "heading" => __("Styles", "dahztheme"),
            "param_name" => "styles",
            "value" => array(
            __('List', "dahztheme") => "list",
            __('Grid', "dahztheme") => "grid",
    
            ),
            "description" => __("Select styles", "dahztheme"),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Layout Post Style List", "dahztheme"),
            "param_name" => "layout_list",
            "value" => array(
            __('Image Top', "dahztheme") => "df-standard-image-top",
            __('Image Left', "dahztheme") => "df-standard-image-left",
            __('Image Right', "dahztheme") => "df-standard-image-right",
    
            ),
            "dependency" => Array('element' => "styles", 'value' => array('list')),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Layout Post Style List", "dahztheme"),
            "param_name" => "layout_grid",
            "value" => array(
            __('2 Grid', "dahztheme") => "grid_2_blog",
            __('3 Grid', "dahztheme") => "grid_3_blog",
            __('4 Grid', "dahztheme") => "grid_4_blog",
            __('5 Grid', "dahztheme") => "grid_5_blog",
    
            ),
            "dependency" => Array('element' => "styles", 'value' => array('grid')),
            "admin_label" => true
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Category FIlter", "dahztheme"),
            "param_name" => "filter_grid",
            "value" => array(__("Yes", "dahztheme") => 'true'),
            "dependency" => Array('element' => "styles", 'value' => array('grid')),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Layout Grid Effects", "dahztheme"),
            "param_name" => "layout_grid_eff",
            "value" => array(
            __('Fitrows', "dahztheme") => "fitrows",
            __('Masonry', "dahztheme") => "masonry",
            ),
            "dependency" => Array('element' => "styles", 'value' => array('grid')),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Select Orderby Post", "dahztheme"),
            "param_name" => "order",
            "value" => array(
            __('None', "dahztheme") => "none",
            __('Date', "dahztheme") => "date",
            __('Name', "dahztheme") => "name",
            __('Title', "dahztheme") => "title",
            __('Random', "dahztheme") => "rand",
            __('Comment Count', "dahztheme") => "comment_count",
            // __('Like', "dahztheme") => "meta_value",
 
    
            ),
            "description" => __("Select orderby", "dahztheme"),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Select Order Post", "dahztheme"),
            "param_name" => "orderby",
            "value" => array(
            __('Descending', "dahztheme") => "DESC",
            __('Ascending', "dahztheme") => "ASC",
 
            ),
            "description" => __("Select Order Post", "dahztheme"),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Category Include", "dahztheme"),
            "param_name" => "category",
            "admin_label" => true,
            "description" => __("Insert category slug (seperate with comma if you want to select 2 or more category)", "dahztheme"),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra Class Name", "dahztheme"),
            "param_name" => "extra_class",
            "admin_label" => true,
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "dahztheme")

        ),
      )
));


// portfolio

vc_map( array(
     "name" => __("Portfolio", "dahztheme"),
     "base" => "portfolio",
     "category" => __('Content', "dahztheme"),
     "icon" => "icon-df_portfolio",
     "params" => array(
 
        array(
            "type" => "textfield",
            "heading" => __("Number Post Porfolio", "dahztheme"),
            "param_name" => "posts",
            "value" => '12',
            "admin_label" => true
        ),
 
        array(
            "type" => "dropdown",
            "heading" => __("Styles", "dahztheme"),
            "param_name" => "style_port",
            "value" => array(
            __('Style 1', "dahztheme") => "1",
            __('Style 2', "dahztheme") => "2",
    
            ),
            "description" => __("Select styles", "dahztheme"),
            "admin_label" => true
        ),
 
        array(
            "type" => "dropdown",
            "heading" => __("Layout Grids Portfolio", "dahztheme"),
            "param_name" => "port_grid",
            "value" => array(
            __('2 Grid', "dahztheme") => "grid_2_portfolio",
            __('3 Grid', "dahztheme") => "grid_3_portfolio",
            __('4 Grid', "dahztheme") => "grid_4_portfolio",
            __('5 Grid', "dahztheme") => "grid_5_portfolio",
    
            ),
            "admin_label" => true
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Margin 0 Portfolio", "dahztheme"),
            "param_name" => "margin_port",
            "value" => array(__("Yes", "dahztheme") => 'true'),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Layout Grids Portfolio Style", "dahztheme"),
            "param_name" => "layout_grid_eff",
            "value" => array(
            __('Masonry', "dahztheme") => "masonry",
            __('Fitrow', "dahztheme") => "fitrows",
 
    
            ),
            "admin_label" => true
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Filter Category Portfolio", "dahztheme"),
            "param_name" => "filter_grid",
            "value" => array(__("Yes", "dahztheme") => 'true'),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Select Orderby Post", "dahztheme"),
            "param_name" => "order",
            "value" => array(
            __('None', "dahztheme") => "none",
            __('Date', "dahztheme") => "date",
            __('Name', "dahztheme") => "name",
            __('Title', "dahztheme") => "title",
            __('Random', "dahztheme") => "rand",
            __('Comment Count', "dahztheme") => "comment_count",
            // __('Like', "dahztheme") => "meta_value",
 
    
            ),
            "description" => __("Select orderby", "dahztheme"),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Select Order Post", "dahztheme"),
            "param_name" => "orderby",
            "value" => array(
            __('Descending', "dahztheme") => "DESC",
            __('Ascending', "dahztheme") => "ASC",
 
            ),
            "description" => __("Select Order Post", "dahztheme"),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Category Include", "dahztheme"),
            "param_name" => "category",
            "admin_label" => true,
            "description" => __("Insert category slug (seperate with comma if you want to select 2 or more category)", "dahztheme"),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra Class Name", "dahztheme"),
            "param_name" => "extra_class",
            "admin_label" => true,
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "dahztheme")

        ),
      )
));

// Member
vc_map( array(
     "name" => __("Member", "dahztheme"),
     "base" => "member",
     "category" => __('Content', "dahztheme"),
     "icon" => "icon-df_member",
     "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Style", "dahztheme"),
            "param_name" => "styles",
            "value" => array(
            __('Style 1', "dahztheme") => "style1",
            __('Style 2', "dahztheme") => "style2",    
            ),
        ),
        array(
            "type" => "attach_image",
            "heading" => __("Box Image", "dahztheme"),
            "admin_label" => true,
            "param_name" => "img",
        ), 
        array(
            "type" => "textfield",
            "heading" => __("Name", "dahztheme"),
            "param_name" => "name",
            "description" => __("Insert member name", "dahztheme"),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Role", "dahztheme"),
            "param_name" => "role",
            "description" => __("Insert role", "dahztheme"),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link", "dahztheme"),
            "param_name" => "link",
        ),
        array(
            "type" => "textarea_html",
            "heading" => __("Description", "dahztheme"),
            "param_name" => "content",
            "dependency" => Array('element' => "styles", 'value' => array('style1'))

        ),
        array(
            "type" => "textfield",
            "heading" => __("Facebook Link", "dahztheme"),
            "param_name" => "facebook",
            "description" => __("Insert role", "dahztheme"),
            "dependency" => Array('element' => "styles", 'value' => array('style1'))
        ),
        array(
            "type" => "textfield",
            "heading" => __("Twitter", "dahztheme"),
            "param_name" => "twitter",
            "description" => __("Insert role", "dahztheme"),
            "dependency" => Array('element' => "styles", 'value' => array('style1'))
        ),
        array(
            "type" => "textfield",
            "heading" => __("Google Plus", "dahztheme"),
            "param_name" => "google",
            "description" => __("Insert role", "dahztheme"),
            "dependency" => Array('element' => "styles", 'value' => array('style1'))
        ),
        array(
            "type" => "textfield",
            "heading" => __("Mail", "dahztheme"),
            "param_name" => "mail",
            "description" => __("Insert role", "dahztheme"),
            "dependency" => Array('element' => "styles", 'value' => array('style1'))
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Color", "dahztheme"),
            "param_name" => "link_color",
            "value" => "#333333",
            "description" => __("Give it a nice paint!", "dahztheme"),
            "dependency" => Array("element" => "styles","value" => array("style2")),                       
        ),
      )
));

 

// Table
vc_map(array(
    "name" => __("Table", "dahztheme"),
    "base" => "table",
    "category" => __('Content', "dahztheme"),
    "icon" => "icon-df_table",
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Version", "dahztheme"),
            "param_name" => "ver",
            "value" => array(
            __('default', "dahztheme") => "default",
            __('Version 1', "dahztheme") => "1",
            __('Version 2', "dahztheme") => "2",    
            ),
            "admin_label" => true
        ),
 
        array(
            "type" => "textarea_html",
            "heading" => __("Table Content", "dahztheme"),
            "param_name" => "content",
            "value" => '[table_tr][table_td]Content 1[/table_td] [table_td]Content 2[/table_td][table_td]Content 3[/table_td][table_td]Content 4[/table_td][/table_tr][table_tr][table_td]list[/table_td] [table_td]list[/table_td][table_td]list[/table_td][table_td]list[/table_td][/table_tr][table_tr][table_td]list[/table_td][table_td]list[/table_td][table_td]list[/table_td][table_td]list[/table_td][/table_tr][table_tr][table_td]list[/table_td][table_td]list[/table_td][table_td]list[/table_td][table_td]list[/table_td][/table_tr]'
        )
    )
));

// Testimonial
vc_map(array(
    "name" => __("Testimonial", "dahztheme"),
    "base" => "dahz_testimonial",
    "category" => __('Content', "dahztheme"),
    "icon" => "icon-df_testimonial",
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Max Post", "dahztheme"),
            "param_name" => "limit",
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Order", "dahztheme"),
            "param_name" => "order",
            "value" => array(
                            __('None', "dahztheme") => "none",
                            __('Date', "dahztheme") => "date",
                            __('Name', "dahztheme") => "name",
                            __('Title', "dahztheme") => "title",
                            __('Random', "dahztheme") => "rand",
                            __('Comment Count', "dahztheme") => "comment_count"
                        ),
            "description" => __("Select order", "dahztheme")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Order by", "dahztheme"),
            "param_name" => "orderby",
            "value" => array(
            __('Descending', "dahztheme") => "DESC",
            __('Ascending', "dahztheme") => "ASC",
 
            ),
            "description" => __("Select order by", "dahztheme")
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Display Author", "dahztheme"),
            "param_name" => "display_author",
            "admin_label" => true,
            "value" => array(__("Yes", "dahztheme") => 'true')
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Display Avatar", "dahztheme"),
            "param_name" => "display_avatar",
            "admin_label" => true,
            "value" => array(__("Yes", "dahztheme") => 'true')
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Display url", "dahztheme"),
            "param_name" => "display_url",
            "admin_label" => true,
            "value" => array(__("Yes", "dahztheme") => 'true')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Image Size", "dahztheme"),
            "param_name" => "size",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Category Include", "dahztheme"),
            "param_name" => "category",
            "description" => __("Fill name category or id category you want to show", "dahztheme")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Position", "dahztheme"),
            "param_name" => "position",
            "description" => __("Testimonial position", "dahztheme"),
            "value" => array(
                            __('Left', "dahztheme") => "left",
                            __('Right', "dahztheme") => "right",
                            __('Center', "dahztheme") => "center"
                        )
        ),
  
        array(
            "type" => "dropdown",
            "heading" => __("Slider Testimonial", "dahztheme"),
            "param_name" => "testimonial_slider",
            "admin_label" => true,
            "value" => array(
                            __('No', "dahztheme") => "false",
                            __('Yes', "dahztheme") => "true",
                        )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Unique Id Testimonial Slider", "dahztheme"),
            "param_name" => "id_testimonial_slider",
            "dependency" => Array('element' => "testimonial_slider", 'value' => array('true'))
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra Class", "dahztheme"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "dahztheme")
        )
    )
));

if (class_exists('Dahzhotelbooking')) {

// Hotel accomodation
$cat_ha_in = array();
$terms_in = get_terms('room-catagories');

if (is_array($terms_in) && ( count($terms_in) > 0 )) {
    foreach ($terms_in as $k => $v) {
        $cat_ha_in[$v->name] = $v->slug;
    }
}

vc_map(array(
    "name" => __("Accommodation hotel", "dahztheme"),
    "base" => "accommodation",
    "category" => __('Content', "dahztheme"),
    "icon" => "icon-df_accommodation",
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Layout", "dahztheme"),
            "param_name" => "layout",
            "value" => array(
            __('Grid', "dahztheme") => "grid",
            __('List', "dahztheme") => "list",
    
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style Layout", "dahztheme"),
            "param_name" => "style_layout",
            "value" => array(
            __('style 1', "dahztheme") => "style1",
            __('style 2', "dahztheme") => "style2",
    
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Max Posts", "dahztheme"),
            "param_name" => "max_posts",
             
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Category Include", "dahztheme"),
            "param_name" => "categories",
            "value" => $cat_ha_in,
            "admin_label" => true
        )
    )
));

// Offer

vc_map(array(
    "name" => __("Offer", "dahztheme"),
    "base" => "offer",
    "category" => __('Content', "dahztheme"),
    "icon" => "icon-df_offer",
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "dahztheme"),
            "param_name" => "title",
             
        ),
        array(
            "type" => "textfield",
            "heading" => __("Max Posts", "dahztheme"),
            "param_name" => "max_posts",
             
        ),
 
        
        array(
            "type" => "checkbox",
            "heading" => __("Excerpt", "dahztheme"),
            "param_name" => "excerpt",
            "admin_label" => true,
            "value" => array(__("Yes", "dahztheme") => 'yes')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Excerpt Length", "dahztheme"),
            "param_name" => "excerpt_length",
            "dependency" => Array('element' => "excerpt", 'value' => array('yes'))
             
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Category", "dahztheme"),
            "param_name" => "category",
            "admin_label" => true,
            "value" => array(__("Yes", "dahztheme") => 'yes')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Category Includes", "dahztheme"),
            "param_name" => "category_includes",
            "description" => __("insert category slug", "dahztheme"),
            "dependency" => Array('element' => "category", 'value' => array('yes'))
            
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Readmore", "dahztheme"),
            "param_name" => "readmore",
            "admin_label" => true,
            "value" => array(__("Yes", "dahztheme") => 'yes')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Ids", "dahztheme"),
            "param_name" => "ids",
            "description" => __("insert ID post offer (optional)", "dahztheme"),
            
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Order", "dahztheme"),
            "param_name" => "order",
            "value" => array(
            __('None', "dahztheme") => "none",
            __('Date', "dahztheme") => "date",
            __('Name', "dahztheme") => "name",
            __('Title', "dahztheme") => "title",
            __('Random', "dahztheme") => "rand",
            __('Comment Count', "dahztheme") => "comment_count",
            ),
            "description" => __("Select order", "dahztheme"),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Order by", "dahztheme"),
            "param_name" => "orderby",
            "value" => array(
            __('Descending', "dahztheme") => "DESC",
            __('Ascending', "dahztheme") => "ASC",
 
            ),
            "description" => __("Select order by", "dahztheme"),
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Slider", "dahztheme"),
            "param_name" => "slider",
            "admin_label" => true,
            "value" => array(__("Yes", "dahztheme") => 'yes')
        ),
    )
));
} /*end if class dahzhotelbooking*/

if ( class_exists( 'TribeEvents' ) ) {
   vc_map( array(
     "name"         => __("Events", "dahztheme"),
     "base"         => "events",
     "category"     => __('Content', "dahztheme"),
     "icon"         => "icon-df_event",
     "description"  => "Adds event calendar in your content",
     "params"       => array(
            array(
                "type"        => "textfield",
                "heading"     => __("Start Date", "dahztheme"),
                "param_name"  => "start_date",
                "admin_label" => true,
                "description" => __("Set the start date for upcoming event grid. e.g. dd-mm-yyyy", "dahztheme")
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("End Date", "dahztheme"),
                "param_name"  => "end_date",
                "admin_label" => true,
                "description" => __("Set the end date for upcoming event grid. e.g. dd-mm-yyyy", "dahztheme")
            ),
            array(
                "type"        => "dropdown",
                "heading"     => __("Grid Columns", "dahztheme"),
                "param_name"  => "grid",
                "admin_label" => true,
                "value"       => array(
                                    __('3 Columns', "dahztheme") => "3",
                                    __('4 Columns', "dahztheme") => "4"
                                 )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => __("Views", "dahztheme"),
                "param_name"  => "views",
                "admin_label" => true,
                "value"       => array(
                                    __('All Events', "dahztheme") => "all",
                                    __('Upcoming & Past Events', "dahztheme") => "upcoming-past"
                                )
            )
    ))); 
}

// advance google maps
vc_map(array(
     "name" => __("Advanced Google Maps", "dahztheme"),
     "base" => "advanced_gmaps",
     "category" => __('Social', 'dahztheme'),
     "icon"     => "icon-df_gmaps",
     "params" => array(

          array(
               "type" => "textfield",
               "heading" => __("Address 1 : Latitude", "dahztheme"),
               "param_name" => "latitude",
               "value" => "",
               "description" => __('Enter your Google Map coordinates to display a map on the Contact Form page template. You can get these details from <a href="http://itouchmap.com/latlong.html">Google Maps</a>', "dahztheme")
          ),
          array(
               "type" => "textfield",
               "heading" => __("Address 1 : Longitude", "dahztheme"),
               "param_name" => "longitude",
               "value" => "",
               "description" => __('Enter your Google Map coordinates to display a map on the Contact Form page template. You can get these details from <a href="http://itouchmap.com/latlong.html">Google Maps</a>', "dahztheme")
                
          ),
          array(
               "type" => "textfield",
               "heading" => __("Address 1 : Full Address Text (shown in tooltip)", "dahztheme"),
               "param_name" => "address",
               "value" => "",
                
          ),

          array(
               "type" => "textfield",
               "heading" => __("Address 2 : Latitude", "dahztheme"),
               "param_name" => "latitude_2",
               "value" => "",
               "description" => __('Enter your Google Map coordinates to display a map on the Contact Form page template. You can get these details from <a href="http://itouchmap.com/latlong.html">Google Maps</a>', "dahztheme")
                
          ),
          array(
               "type" => "textfield",
               "heading" => __("Address 2 : Longitude", "dahztheme"),
               "param_name" => "longitude_2",
               "value" => "",
               "description" => __('Enter your Google Map coordinates to display a map on the Contact Form page template. You can get these details from <a href="http://itouchmap.com/latlong.html">Google Maps</a>', "dahztheme")
                
          ),
          array(
               "type" => "textfield",
               "heading" => __("Address 2 : Full Address Text (shown in tooltip)", "dahztheme"),
               "param_name" => "address_2",
               "value" => "",
                
          ),



          array(
               "type" => "textfield",
               "heading" => __("Address 3 : Latitude", "dahztheme"),
               "param_name" => "latitude_3",
               "value" => "",
               "description" => __('Enter your Google Map coordinates to display a map on the Contact Form page template. You can get these details from <a href="http://itouchmap.com/latlong.html">Google Maps</a>', "dahztheme")
                
          ),
          array(
               "type" => "textfield",
               "heading" => __("Address 3 : Longitude", "dahztheme"),
               "param_name" => "longitude_3",
               "value" => "",
               "description" => __('Enter your Google Map coordinates to display a map on the Contact Form page template. You can get these details from <a href="http://itouchmap.com/latlong.html">Google Maps</a>', "dahztheme")
                
          ),
          array(
               "type" => "textfield",
               "heading" => __("Address 3 : Full Address Text (shown in tooltip)", "dahztheme"),
               "param_name" => "address_3",
               "value" => "",
                
          ),



          array(
               "type" => "attach_image",
               "heading" => __("Upload Marker Icon", "dahztheme"),
               "param_name" => "img",
               "value" => "",
               "description" => __("If left blank Google Default marker will be used.", "dahztheme")
          ),
          array(
               "type" => "textfield",
               "heading" => __("Map height", "dahztheme"),
               "param_name" => "height",
               "description" => __('Enter map height in pixels. Example: 200).', "dahztheme")
          ),
 
 
          array(
               "type" => "textfield",
               "heading" => __("Zoom", "dahztheme"),
               "param_name" => "zoom",
               "description" => __('Insert number from 1 to 19', "dahztheme")
          ),
        array(
               "type" => "dropdown",
                "heading" => __("Pan Control", "dahztheme"),
               "param_name" => "pan_control",
               "value" => array(
                    __("No", "dahztheme") => "false",
                    __("Yes", "dahztheme") => "true"
               ),
          ),
         array(
               "type" => "dropdown",
                "heading" => __("Draggable", "dahztheme"),
               "param_name" => "draggable",
               "value" => array(
                    __("No", "dahztheme") => "false",
                    __("Yes", "dahztheme") => "true"
               ),
          ),        
         array(
               "type" => "dropdown",
                "heading" => __("Zoom Control", "dahztheme"),
               "param_name" => "zoom_control",
               "value" => array(
                    __("No", "dahztheme") => "false",
                    __("Yes", "dahztheme") => "true"
               ),
          ),        
          array(
               "type" => "dropdown",
                "heading" => __("Map Type Control", "dahztheme"),
               "param_name" => "map_type_control",
               "value" => array(
                    __("No", "dahztheme") => "false",
                    __("Yes", "dahztheme") => "true"
               ),
          ),        
          array(
               "type" => "dropdown",
                "heading" => __("Scale Control", "dahztheme"),
               "param_name" => "scale_control",
               "value" => array(
                    __("No", "dahztheme") => "false",
                    __("Yes", "dahztheme") => "true"
               ),
          ),
 
 
          array(
               "type" => "dropdown",
               "heading" => __("Modify Google Maps Hue, Saturation, Lightness", "dahztheme"),
               "param_name" => "modify_coloring",
               "value" => array(
                    __("No", "dahztheme") => "false",
                    __("Yes", "dahztheme") => "true"
               ),
               "description" => __("", "dahztheme")
          ),
          array(
               "type" => "colorpicker",
               "heading" => __("Hue", "dahztheme"),
               "param_name" => "hue",
               "description" => __("Sets the hue of the feature to match the hue of the color supplied. Note that the saturation and lightness of the feature is conserved, which means, the feature will not perfectly match the color supplied .", "dahztheme"),
               "dependency" => array(
                    'element' => "modify_coloring",
                    'value' => array(
                         'true'
                    )
               )
          ),

          array(
               "type" => "textfield",
               "heading" => __("Saturation", "dahztheme"),
               "param_name" => "saturation",
               "description" => __('Shifts the saturation of colors by a percentage of the original value if decreasing and a percentage of the remaining value if increasing. Valid values: [-100, 100].', "dahztheme"),
               "dependency" => array(
                    'element' => "modify_coloring",
                    'value' => array(
                         'true'
                    )
               )
          ),
          array(
               "type" => "textfield",
               "heading" => __("Lightness", "dahztheme"),
               "param_name" => "lightness",
               "description" => __('Shifts lightness of colors by a percentage of the original value if decreasing and a percentage of the remaining value if increasing. Valid values: [-100, 100].', "dahztheme"),
               "dependency" => array(
                    'element' => "modify_coloring",
                    'value' => array(
                         'true'
                    )
               )
          ),
          array(
               "type" => "textfield",
               "heading" => __("Extra class name", "dahztheme"),
               "param_name" => "el_class",
               "value" => "",
               "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "dahztheme")
          )
     )
));

// Banner
vc_map( array(
     "name"         => __("Banner", "dahztheme"),
     "base"         => "df_banner",
     "category"     => __('Content', "dahztheme"),
     "icon"         => "icon-df_banner",
     "description"  => __("Adds banner in your content", "dahztheme"),
     "params"       => array(
            array(
                "type"        => "dropdown",
                "heading"     => __("Background Image", "dahztheme"),
                "param_name"  => "back_image",
                "admin_label" => true,
                "description" => __("Choose your background style", "dahztheme"),
                "value"       => array(
                                 __("No", "dahztheme") => 'false',
                                 __("Yes", "dahztheme") => 'true'
                                )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => __("Background Color", "dahztheme"),
                "admin_label" => true,
                "param_name"  => "background",
                "dependency"  => Array('element' => "back_image", 'value' => array('false'))
            ),
            array(
                "type"        => "attach_image",
                "heading"     => __("Image", "dahztheme"),
                "admin_label" => true,
                "param_name"  => "img",
                "dependency"  => Array('element' => "back_image", 'value' => array('true'))
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Height", "dahztheme"),
                "admin_label" => true,
                "param_name"  => "height",
                "value"       => 400
            ),
            array(
                "type"        => "dropdown",
                "heading"     => __("Border", "dahztheme"),
                "admin_label" => true,
                "param_name"  => "border",
                "value"       => array(
                                       __("No", "dahztheme") => 'no',
                                       __("Yes", "dahztheme") => 'yes'
                                 )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => __("Border Color", "dahztheme"),
                "admin_label" => true,
                "param_name"  => "border_color",
                "dependency"  => Array('element' => "border", 'value' => array('yes'))
            ),
            array(
                'type'        => 'vc_link',
                'heading'     => __( 'URL (Link)', 'dahztheme' ),
                "admin_label" => true,
                'param_name'  => 'link'
            ),
            array(
                "type"        => "textarea_html",
                "heading"     => __("Content", "dahztheme"),
                "admin_label" => true,
                "param_name"  => "content"
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Extra class name", "dahztheme"),
                "admin_label" => true,
                "param_name"  => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "dahztheme")
            )

    )
));

// Counter
vc_map( array(
     "name"     => __("Counter", "dahztheme"),
     "base"     => "df_stat_counter",
     "category" => __('Content', "dahztheme"),
     "icon"     => "icon-df_counter",
     "params"   => array(
            array(
                "type"        => "textfield",
                "heading"     => __("Counter Title", "dahztheme"),
                "param_name"  => "counter_title"
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Counter value", "dahztheme"),
                "param_name"  => "counter_value",
                "value"       => 1000
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Counter Separator", "dahztheme"),
                "param_name"  => "counter_sep"
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Counter Decimal", "dahztheme"),
                "param_name"  => "counter_decimal"
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => __("Counter Text Color", "dahztheme"),
                "param_name"  => "counter_color_txt"
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Counter Font Size", "dahztheme"),
                "param_name"  => "font_size_counter",
                "value"       => 18
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => __("Counter Title Color", "dahztheme"),
                "param_name"  => "counter_title_color_txt"
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Counter Title Font Size", "dahztheme"),
                "param_name"  => "font_size_title",
                "value"       => 28
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Counter Speed", "dahztheme"),
                "param_name"  => "speed",
                "value"       => 0.1
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Extra Class", "dahztheme"),
                "param_name"  => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "dahztheme")

            ),
    )
));

// Services
vc_map( array(
     "name"     => __("Services", "dahztheme"),
     "base"     => "df_services",
     "category" => __('Content', "dahztheme"),
     "icon"     => "icon-df_services",
     "params"   => array(
            array(
                "type"        => "dropdown",
                "heading"     => __("Service Layout", "dahztheme"),
                "value"       => array(
                                       __("Icon at Left with heading", "dahztheme") => 'icon_left',
                                       __("Icon at Left", "dahztheme") => 'left',
                                       __("Icon at Top", "dahztheme") => 'top'
                                      ),
                "param_name"  => "position"
            ),
            array(
                "type"        => "dropdown",
                "heading"     => __("Icon Type", "dahztheme"),
                "param_name"  => "icon_type",
                "value"       => array(
                                     __("None", "dahztheme") => '',
                                     __("Font Awesome", "dahztheme") => 'fa_icon',
                                     __("Upload Icon", "dahztheme") => 'image_icon'
                                 ),
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Font Awesome", "dahztheme"),
                "param_name"  => "type",
                "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon')),
                "description" => __( 'Check the icon list here <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">Font Awesome</a>, use icon id only. e.g, "adjust" instead "fa-adjust"', 'dahztheme' )
            ),
            array(
                "type"        => "dropdown",
                "heading"     => __("Font Size", "dahztheme"),
                "param_name"  => "size",
                "value"       => array(
                                     __("lg", "dahztheme") => 'lg',
                                     __("1x", "dahztheme") => '1x',
                                     __("2x", "dahztheme") => '2x',
                                     __("3x", "dahztheme") => '3x',
                                     __("4x", "dahztheme") => '4x',
                                     __("5x", "dahztheme") => '5x'
                                 ),
                "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon'))
            ),
            array(
                "type"        => "dropdown",
                "heading"     => __("Font Rotate", "dahztheme"),
                "param_name"  => "rotate",
                "value"       => array(
                                     __("Normal", "dahztheme") => 'normal',
                                     __("Rotate 90 Degree", "dahztheme") => '90',
                                     __("Rotate 180 Degree", "dahztheme") => '180',
                                     __("Rotate 270 Degree", "dahztheme") => '270'
                                 ),
                "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon'))
            ),
            array(
                "type"        => "dropdown",
                "heading"     => __("Font Flip", "dahztheme"),
                "param_name"  => "flip",
                "value"       => array(
                                     __("None", "dahztheme") => '',
                                     __("Horizontal", "dahztheme") => 'horizontal',
                                     __("Vertical", "dahztheme") => 'vertical'
                                 ),
                "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon'))
            ),
            array(
                "type"        => "attach_image",
                "heading"     => __("Upload Icon", "dahztheme"),
                "param_name"  => "img",
                "dependency"  => Array('element' => "icon_type", 'value' => array('image_icon'))
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Image Width", "dahztheme"),
                "param_name"  => "img_width",
                "value"       => 48,
                "dependency"  => Array('element' => "icon_type", 'value' => array('image_icon'))
            ),
            array(
                "type"        => "dropdown",
                "heading"     => __("Style Your Icon", "dahztheme"),
                "param_name"  => "icon_style",
                "value"       => array(
                                     __("Simple", "dahztheme") => 'simple',
                                     __("Square", "dahztheme") => 'square',
                                     __("Rounded", "dahztheme") => 'rounded',
                                     __("Style Your Own Icon", "dahztheme") => 'own'
                                 ),
                "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon'))
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => __("Font Color", "dahztheme"),
                "param_name"  => "icon_color",
                "dependency"  => Array('element' => "icon_type", 'value' => array('fa_icon'))
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => __("Font Background Color", "dahztheme"),
                "param_name"  => "icon_bg_color",
                "dependency"  => Array('element' => "icon_style", 'value' => array('square', 'rounded', 'own'))
            ),
            array(
                "type"        => "dropdown",
                "heading"     => __("Border Style", "dahztheme"),
                "param_name"  => "border_style",
                "value"       => array(
                                     __("None", "dahztheme") => '',
                                     __("Solid", "dahztheme") => 'solid',
                                     __("Dashed", "dahztheme") => 'dashed',
                                     __("Dotted", "dahztheme") => 'dotted',
                                     __("Double", "dahztheme") => 'double',
                                     __("Inset", "dahztheme") => 'inset',
                                     __("Outset", "dahztheme") => 'outset'
                                 ),
                "dependency"  => Array('element' => "icon_style", 'value' => array('own'))
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Border Width", "dahztheme"),
                "param_name"  => "border_width",
                "dependency"  => Array('element' => "border_style", 'value' => array('solid', 'dashed', 'dotted', 'double', 'inset', 'outset'))
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Border Radius", "dahztheme"),
                "param_name"  => "border_radius",
                "dependency"  => Array('element' => "border_style", 'value' => array('solid', 'dashed', 'dotted', 'double', 'inset', 'outset'))
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => __("Border Color", "dahztheme"),
                "param_name"  => "border_color",
                "dependency"  => Array('element' => "border_style", 'value' => array('solid', 'dashed', 'dotted', 'double', 'inset', 'outset'))
            ),
            array(
                "type"        => "dropdown",
                "class"       => "",
                "heading"     => __("Select Hover Effect type", "dahztheme"),
                "param_name"  => "hover_effect",
                "value"       => array(
                                     __("No Effect", "dahztheme") => 'style_1',
                                     __("Icon Zoom", "dahztheme") => 'style_2',
                                     __("Icon Bounce Up", "dahztheme") => 'style_3',
                                 ),
                "description" => __("Select the type of effct you want on hover", "dahztheme")
            ),
            array(
                "type"        => "dropdown",
                "heading"     => __("Animation Your Icon","dahztheme"),
                "param_name"  => "icon_animation",
                "value"       => array(
                                    __("No Animation","dahztheme") => "",
                                    __("Fade In","dahztheme") => "fadeIn",
                                    __("Fade In Up","dahztheme") => "fadeInUp",
                                    __("Fade In Down","dahztheme") => "fadeInDown",
                                    __("Fade In Left","dahztheme") => "fadeInLeft",
                                    __("Fade In Right","dahztheme") => "fadeInRight",
                                ),
                "description" => __("Like CSS3 Animations? We have several options for you!","smile")
            ),
            array(
                'type'        => 'vc_link',
                'heading'     => __( 'URL (Link)', 'dahztheme' ),
                "admin_label" => true,
                'param_name'  => 'link'
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Title", "dahztheme"),
                "param_name"  => "title"
            ),
            array(
                "type"        => "textarea_html",
                "heading"     => __("Content", "dahztheme"),
                "param_name"  => "content"
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Extra Class", "dahztheme"),
                "param_name"  => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "dahztheme")

            ),
    )
));

// Countdown
vc_map( array(
     "name"     => __("Countdown", "dahztheme"),
     "base"     => "df_countdown",
     "category" => __('Content', "dahztheme"),
     "icon"     => "icon-df_countdown",
     "params"   => array(
            array(
                "type"        => "textfield",
                "heading"     => __("Target Time For Countdown", "dahztheme"),
                "param_name"  => "datetime",
                "value"       => "yyyy/mm/dd hh:mm:ss", 
                "description" => __("Date and time format (yyyy/mm/dd hh:mm:ss).", "dahztheme")
            ),
            array(
                "type"        => "dropdown",
                "heading"     => __("Countdown Timer Depends on", "dahztheme"),
                "param_name"  => "timezone",
                "value"       => array(
                                    __("WordPress Defined Timezone","dahztheme") => "df-wptz",
                                    __("User's System Timezone","dahztheme") => "df-usrtz"
                                 )
            ),
            array(
                "type"        => "checkbox",
                "heading"     => __("Select Time Units To Display In Countdown Timer", "dahztheme"),
                "param_name"  => "countdown_opts",
                "value"       => array(
                                    __("Years","dahztheme") => "syear",
                                    __("Months","dahztheme") => "smonth",
                                    __("Weeks","dahztheme") => "sweek",
                                    __("Days","dahztheme") => "sday",
                                    __("Hours","dahztheme") => "shr",
                                    __("Minutes","dahztheme") => "smin",
                                    __("Seconds","dahztheme") => "ssec"
                                 )
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => __("Timer Digit Text Color", "dahztheme"),
                "param_name"  => "tick_col"
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Timer Digit Text Size", "dahztheme"),
                "param_name"  => "tick_size"
            ),
            array(
                "type"        => "dropdown",
                "heading"     => __("Timer Digit Text Style", "dahztheme"),
                "value"       => array(
                                    __("Normal","dahztheme") => "",
                                    __("Bold","dahztheme") => "bold",
                                    __("Italic","dahztheme") => "italic",
                                    __("Bold & Italic","dahztheme") => "boldnitalic"
                                 ),
                "param_name"  => "tick_style"
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => __("Timer Unit Text Color", "dahztheme"),
                "param_name"  => "tick_sep_col"
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Timer Unit Text Size", "dahztheme"),
                "param_name"  => "tick_sep_size",
                "value"       => 13
            ),
            array(
                "type"        => "dropdown",
                "heading"     => __("Timer Unit Text Style", "dahztheme"),
                "param_name"  => "tick_sep_style",
                "value"       => array(
                                    __("Normal","dahztheme") => "",
                                    __("Bold","dahztheme") => "bold",
                                    __("Italic","dahztheme") => "italic",
                                    __("Bold & Italic","dahztheme") => "boldnitalic"
                                ),
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => __("Timer Digit Background Color", "dahztheme"),
                "param_name"  => "timer_bg_color"
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Extra Class", "dahztheme"),
                "param_name"  => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "dahztheme")

            ),
            
    )
));

// modal
vc_map( 
    array(
        "name"      => __("Modal Box", "dahztheme"),
        "base"      => "df_modal",
        "icon"      => "icon-df_modal_box",
        "class"    => "modal_box",
        "category"  => __("Content", "dahztheme"),
        "description" => "Adds bootstrap modal box in your content",
        "controls" => "full",
        "show_settings_on_create" => true,
        "params" => array(
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Icon to display:", "dahztheme"),
                "param_name" => "icon_type",
                "value" => array(
                    "No Icon" => "none",
                    "Font Icon Manager" => "selector",
                    "Custom Image Icon" => "custom",
                ),
                "description" => __("Use <a href='admin.php?page=font-icon-Manager' target='_blank'>existing font icon</a> or upload a custom image.", "dahztheme")
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Insert Icon ","dahztheme"),
                "param_name" => "icon",
                "value" => "",
                "description" => __("Insert Icon Class", "dahztheme"),
                "dependency" => Array("element" => "icon_type","value" => array("selector")),
            ),
            array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Upload Image Icon:", "dahztheme"),
                "param_name" => "icon_img",
                "value" => "",
                "description" => __("Upload the custom image icon.", "dahztheme"),
                "dependency" => Array("element" => "icon_type","value" => array("custom")),
            ),
            // Modal Title
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Modal Box Title", "dahztheme"),
                "param_name" => "modal_title",
                "admin_label" => true,
                "value" => "",
                "description" => __("Provide the title for modal box.", "dahztheme"),
            ),
            // Add some description
            array(
                "type" => "textarea_html",
                "class" => "",
                "heading" => __("Modal Content", "dahztheme"),
                "param_name" => "content",
                "value" => "",
                "description" => __("Content that will be displayed in Modal Popup.", "dahztheme")
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("What's in Modal Popup?", "dahztheme"),
                "param_name" => "modal_contain",
                "value" => array(
                    "Miscellaneous Things" => "ult-html",
                    "Youtube Video" => "ult-youtube",
                    "Vimeo Video" => "ult-vimeo",
                ),
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Display Modal On -", "dahztheme"),
                "param_name" => "modal_on",
                "value" => array(
                    "Button" => "ult-button",
                    "Image" => "image",
                    "Text" => "text",
                    "On Page Load" => "onload",
                ),
                "description" => __("When should the popup be initiated?", "dahztheme")
            ),
            array(
                "type"=>"textfield",
                "class"=>'',
                "heading"=>"Delay in Popup Display",
                "param_name"=>"onload_delay",
                "description"=>__("Time delay before modal popup on page load (in seconds)","dahztheme"),
                "dependency"=>Array("element"=>"modal_on","value"=>array("onload"))
                ),
            array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Upload Image", "dahztheme"),
                "param_name" => "btn_img",
                "admin_label" => true,
                "value" => "",
                "description" => __("Upload the custom image / image banner.", "dahztheme"),
                "dependency" => Array("element" => "modal_on","value" => array("image")),
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Button Size", "dahztheme"),
                "param_name" => "btn_size",
                "value" => array(
                    "Small" => "sm",
                    "Medium" => "md",
                    "Large" => "lg",
                    "Block" => "block",
                ),
                "description" => __("How big the button would you like?", "dahztheme"),
                "dependency" => Array("element" => "modal_on","value" => array("ult-button")),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Button Background Color", "dahztheme"),
                "param_name" => "btn_bg_color",
                "value" => "#333333",
                "description" => __("Give it a nice paint!", "dahztheme"),
                "dependency" => Array("element" => "modal_on","value" => array("ult-button")),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Button Text Color", "dahztheme"),
                "param_name" => "btn_txt_color",
                "value" => "#FFFFFF",
                "description" => __("Give it a nice paint!", "dahztheme"),
                "dependency" => Array("element" => "modal_on","value" => array("ult-button")),
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Alignment", "dahztheme"),
                "param_name" => "modal_on_align",
                "value" => array(
                    "Center" => "center",
                    "Left" => "left",
                    "Right" => "right",
                ),
                "dependency"=>Array("element"=>"modal_on","value"=>array("button","image","text")),
                "description" => __("Selector the alignment of button/text/image", "dahztheme")
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Text on Button", "dahztheme"),
                "param_name" => "btn_text",
                "admin_label" => true,
                "value" => "",
                "description" => __("Provide the title for this button.", "dahztheme"),
                "dependency" => Array("element" => "modal_on","value" => array("ult-button")),
            ),
            // Custom text for modal trigger
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Enter Text", "dahztheme"),
                "param_name" => "read_text",
                "value" => "",
                "description" => __("Enter the text on which the modal box will be triggered.", "dahztheme"),
                "dependency" => Array("element" => "modal_on","value" => array("text")),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Text Color", "dahztheme"),
                "param_name" => "txt_color",
                "value" => "#f60f60",
                "description" => __("Give it a nice paint!", "dahztheme"),
                "dependency" => Array("element" => "modal_on","value" => array("text")),
            ),
            // Modal box size
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Modal Size", "dahztheme"),
                "param_name" => "modal_size",
                "value" => array(
                    "Small" => "small",
                    "Medium" => "medium",
                    "Large" => "container",
                    "Block" => "block",
                ),
                "description" => __("How big the modal box would you like?", "dahztheme"),
            ),
            // Modal Style
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Modal Box Style",
                "param_name" => "modal_style",
                "value" => array(
                    // "Corner Bottom Left" => "overlay-cornerbottomleft",
                    // "Corner Bottom Right" => "overlay-cornerbottomright",
                    // "Corner Top Left" => "overlay-cornertopleft",
                    // "Corner Top Right" => "overlay-cornertopright",
                    // "Corner Shape" => "overlay-show-cornershape",
                    // "Door Horizontal" => "overlay-doorhorizontal",
                    // "Door Vertical" => "overlay-doorvertical",
                    "Fade" => "overlay-fade",
                    // "Genie" => "overlay-show-genie",
                    // "Little Boxes" => "overlay-show-boxes",
                    // "Simple Genie" => "overlay-simplegenie",
                    "Slide Down" => "overlay-slidedown",
                    "Slide Up" => "overlay-slideup",
                    "Slide Left" => "overlay-slideleft",
                    "Slide Right" => "overlay-slideright",
                    // "Zoom in" => "overlay-zoomin",
                    // "Zoom out" => "overlay-zoomout",
                ),
            ),
            // array(
            //     "type" => "colorpicker",
            //     "class" => "",
            //     "heading" => __("Overlay Background Color", "dahztheme"),
            //     "param_name" => "overlay_bg_color",
            //     "value" => "#333333",
            //     "description" => __("Give it a nice paint!", "dahztheme"),
            // ),
            // array(
            //     "type" => "textfield",
            //     "class" => "",
            //     "heading" => __("Overlay Background Opacity", "dahztheme"),
            //     "param_name" => "overlay_bg_opacity",
            //     "description" => __("Insert opacity of overlay background e.g(80%).", "dahztheme"),
            // ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Content Background Color", "dahztheme"),
                "param_name" => "content_bg_color",
                "value" => "",
                "description" => __("Give it a nice paint!", "dahztheme"),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Content Text Color", "dahztheme"),
                "param_name" => "content_text_color",
                "value" => "",
                "description" => __("Give it a nice paint!", "dahztheme"),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Header Background Color", "dahztheme"),
                "param_name" => "header_bg_color",
                "value" => "",
                "description" => __("Give it a nice paint!", "dahztheme"),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Header Text Color", "dahztheme"),
                "param_name" => "header_text_color",
                "value" => "#333333",
                "description" => __("Give it a nice paint!", "dahztheme"),
            ),
            // Modal box size
            // array(
            //     "type" => "dropdown",
            //     "class" => "",
            //     "heading" => __("Modal Box Border", "dahztheme"),
            //     "param_name" => "modal_border_style",
            //     "value" => array(
            //         "None" => "",
            //         "Solid" => "solid",
            //         "Double" => "double",
            //         "Dashed" => "dashed",
            //         "Dotted" => "dotted",
            //         "Inset" => "inset",
            //         "Outset" => "outset",
            //     ),
            //     "description" => __("Do you want to give border to the modal content box?", "dahztheme"),
            // ),
            // array(
            //     "type" => "textfield",
            //     "class" => "",
            //     "heading" => __("Border Width", "dahztheme"),
            //     "param_name" => "modal_border_width",
            //     "description" => __("Insert size of border e.g(3px). ", "dahztheme"),
            //     "dependency" => Array("element" => "modal_border_style","not_empty" => true),
            // ),
            // array(
            //     "type" => "colorpicker",
            //     "class" => "",
            //     "heading" => __("Border Color", "dahztheme"),
            //     "param_name" => "modal_border_color",
            //     "value" => "#333333",
            //     "description" => __("Give it a nice paint!", "dahztheme"),
            //     "dependency" => Array("element" => "modal_border_style","not_empty" => true),
            // ),
            // array(
            //     "type" => "textfield",
            //     "class" => "",
            //     "heading" => __("Border Radius", "dahztheme"),
            //     "param_name" => "modal_border_radius",
                 
            //     "description" => __("Insert size of border radius e.g(30px). ", "dahztheme"),
            //     "dependency" => Array("element" => "modal_border_style","not_empty" => true),
            // ),
            // Customize everything
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Extra Class", "dahztheme"),
                "param_name" => "el_class",
                "value" => "",
                "description" => __("Add extra class name that will be applied to the modal popup, and you can use this class for your customizations.", "dahztheme"),
            ),
        ) // end params array
    ) // end vc_map array
); // end vc_map


/** -------------------------- WooCommerce -------------------------------- **/

    if (class_exists('WooCommerce')):


        vc_map( array(
           "name" => _x("Products", 'backend vc' ,"dahztheme"),
           "base" => "df_products_sc",
           "class" => "",
           "category" => __('Content', "dahztheme"),
           "icon" => "icon-df_shop-product",
           "params" => array(
            array(
                  "type" => "dropdown",
                  "heading" => __("Column Width", "dahztheme"),
                  "param_name" => "widths",
                  "value" => array(
                    "1/1" => "1/1",
                    "2/3" => "2/3",
                    "1/2" => "1/2",
                    "1/4" => "1/4"
                    ),
                  "description" => __("This Column it must be the same with row column you create", "dahztheme"),
                  "admin_label" => true
              ),
               array(
                  "type" => "dropdown",
                  "heading" => __("Product Type", "dahztheme"),
                  "param_name" => "product_type",
                  "value" => array(
                    __('Best Sellers', "dahztheme") => "best-sellers",
                    __('Latest Products', "dahztheme") => "latest-products",
                    __('Top Rated', "dahztheme") => "top-rated",
                    __('Sale Products', "dahztheme") => "sale-products",
                    __('Recently Viewed', "dahztheme") => "recently-viewed",
                    __('Featured Products', "dahztheme") => "featured-products",
                    __('SKUs/IDs', "dahztheme") => "sku-id"
                    ),
                  "description" => __("Select the order of products you'd like to show.", "dahztheme"),
                  "admin_label" => true
              ),
                array(
                  "type" => "dropdown",
                  "heading" => __("Carousel", "dahztheme"),
                  "param_name" => "carousel",
                  "value" => array(
                    __('Yes', "dahztheme") => "yes",
                    __('No', "dahztheme") => "no",
                    ),
                  "description" => __("Select if you'd like the asset to be a carousel.", "dahztheme"),
                  "admin_label" => true
              ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Number of items", "dahztheme"),
                    "param_name" => "item_perpage",
                    "value" => "12",
                    "description" => __("The number of products to show.", "dahztheme"),
                    "admin_label" => true
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Number of your product ID's", "dahztheme"),
                    "param_name" => "ids",
                    "value" => "",
                    "description" => __("Multiple Products ID with separator \",\" (100,200,300) ", "dahztheme"),
                    "admin_label" => true,
                     "dependency" => Array('element' => "product_type", 'value' => array('sku-id'))
                ),
                    array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Number of your product SKU's", "dahztheme"),
                    "param_name" => "skus",
                    "value" => "",
                    "description" => __("Multiple Products SKU with separator \",\" (ABC,DEF,GHI) ", "dahztheme"),
                    "admin_label" => true,
                    "dependency" => Array('element' => "product_type", 'value' => array('sku-id'))
                ),
              
           ),
        ) );

    endif;