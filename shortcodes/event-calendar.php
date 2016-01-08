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
					echo '
							<div class="upcoming-event ' . $event_calendar_grid . '"">';
				            while ( have_posts() ) : the_post();
			                 	event_calendar_upcoming_views();
							endwhile;
		            echo '</div>';

					/*echo '<h5 class="upcoming-past-event-title">Past Events</h5>
							<div class="past-event ' . $event_calendar_grid . '"">';
				            while ( have_posts() ) : the_post();
			            		event_calendar_past_views();
							endwhile;
		            echo '</div>';*/
		            echo '<h5 class="upcoming-past-event-title">Past Events</h5>
							<div class="past-event ' . $event_calendar_grid . '"">';
				            echo "There are no upcoming events";
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