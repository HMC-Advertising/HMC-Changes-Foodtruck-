<?php
/**
 * This file containing :
 *   	- theme events calender shortcode
 */

// ==========================================================================
// theme events calender shortcode
// ==========================================================================

// [events start_date="yyyy-mm-dd" end_date="yyyy-mm-dd" grid="3/4" views="all/upcoming-past"]
function tribe_events_paged($atts){
	extract(shortcode_atts(array(
       	'start_date' => '',
       	'end_date' 	 => '',
       	'grid'		 => '',
       	'views'		 => ''
    ), $atts));

    ob_start();

	event_calendar_fitrows();
    
    global $post;

    $event_calendar_grid = '';
	if ($grid == '3') {
		$event_calendar_grid = 'grid_3_event_calendar';		
	} else {
		$event_calendar_grid = 'grid_4_event_calendar';		
	}

	$args = array(
		'post_type' 	 => 'tribe_events',
		'start_date' 	 => $start_date,
		'end_date'  	 => $end_date,
		'orderby'	  	 => 'date',
		'order'	  		 => 'asc',
		'eventDisplay'   => 'custom',
		'post_status'    => 'publish',
    );

    query_posts( $args );

	if( have_posts() ) :?>
			<?php 
			switch ($views) {
	            case 'all':
	            	echo '<div class="all-event ' . $event_calendar_grid . '">';
			            while ( have_posts() ) : the_post();
			                event_calendar_all_views();
						endwhile;
					echo '</div>';
                break;
	            case 'upcoming-past':
	            //<h5 class="upcoming-past-event-title">Upcoming Events</h5>
				
					echo '<div class="upcoming-event ' . $event_calendar_grid . '"">
							<div class="wpb_text_column wpb_content_element ">
						<div class="wpb_wrapper">
							<h1 style="text-align: center;">Events</h1>
						</div>';

					echo '<div class="vc_empty_space __web-inspector-hide-shortcut__" style="height: 32px"><span class="vc_empty_space_inner"></span></div>';
				            while ( have_posts() ) : the_post();
			                 	event_calendar_upcoming_views();
							endwhile;
		            echo '</div></div>';

					/*echo '<h5 class="upcoming-past-event-title">Past Events</h5>
							<div class="past-event ' . $event_calendar_grid . '"">';
				            while ( have_posts() ) : the_post();
			            		event_calendar_past_views();
							endwhile;
		            echo '</div>';*/
		            echo '<div class="past-event ' . $event_calendar_grid . ' no-events" style="background:url(http://dev.goodfoodtruckvt.org/wp/wp-content/uploads/2016/01/events-header.png)">';
				            echo "
				            	<div style='width:50%; margin:auto;display: block;clear: both;overflow: auto;'>
				            <h5 style='text-align:center; line-height: 26px;'>Thanks for hanging out with us in 2015. We’ll be announcing our lineup of appearances and events for 2016 over the next few months, so check back soon!</h5></div>";
		            echo '</div>';
                break;
	        }
			?>

	<?php 

	wp_reset_query();
	
	endif;

	event_calendar_fitrows();

	return ob_get_clean();
}
add_shortcode('events', 'tribe_events_paged');
