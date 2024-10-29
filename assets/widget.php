<?php
/*
 * Plugin Name: WP Database Fetch Widget
 * Plugin URI: http://coderssociety.in
 * Description: This widget show content in sidebar
 * Version: 1.3.1
 * Author: Coders Society
 * Author URI: http://coderssociety.in
 */

//add function to widget_init to load
add_action( 'widgets_init', 'fetch_data_widget' );

//register widget
function fetch_data_widget() {
	register_widget( 'data_widget' );
}

//widget class
class data_widget extends WP_Widget {
function __construct() {
		parent::__construct(
			'fetch-data', // Base ID
			'WP Database Fetch Widget', // Name
			array( 'description' => 'This widget fetch content in sidebar.' ) // Args
		);
	}

	function widget( $args, $instance ) {
		extract( $args );

		//get values from widget.
		$title = apply_filters('widget_title', $instance['title'] );

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;
			echo do_shortcode('[wpdb-pull]');
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
				
		return $instance;
	}
	
	function form( $instance ) {
	
		$defaults = array(
		'title' => 'WP Database Fetch',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- widget title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		
		
	<?php
	}
}
?>