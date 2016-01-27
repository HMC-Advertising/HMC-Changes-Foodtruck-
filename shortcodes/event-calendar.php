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
 
 	$today = date("m.d.y");
 	$thisyear = date("Y")-1;
 	$nextyear = date("Y");

	$args = array(
		'post_type' 	 => 'tribe_events',
		'start_date' 	 => $start_date,
		//'start_date' 	 => $today,
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
					if($today >= get_the_date() ){
						echo '
							<h1 style="padding-top:50px;">Events</h1>
								<div class="upcoming-event grid_3_event_calendar" style="padding-bottom:50px">';

									echo '<div class="entry-content">';
											while ( have_posts() ) : the_post();
												event_calendar_upcoming_views();
											endwhile;
									echo '</div>
									</div>
							';
					}
					else{
						echo '<div class="past-event ' . $event_calendar_grid . ' no-events">';
							echo "
								<div style='width:50%; margin:auto;display: block;clear: both;overflow: auto;'>
									<h4 style='text-align:center;'>
										Thanks for hanging out with us in ".$thisyear.". We’ll be announcing our lineup of appearances and events for ".$nextyear." over the next few months, so check back soon!
									</h4>
								</div>";
						echo '</div>';
				   	}
				
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
