<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?><?php

class Tista_Search_Box extends WP_Widget {

		public function __construct() {

		$widget_options = array(
			'classname' => 'tista_search_box_widget',
			'description' => __('Tista Search Box widget.','tista')
		);

		$control_options = array(    
			'width' => 200,
			'height' => 400,
			'id_base' => 'tista_search_box_widget'
		);

			parent::__construct( 'tista_search_box_widget',  __('Tista -Search Box Widget','tista'), $widget_options, $control_options );
	
	}

	public function widget( $args, $instance ) {
		
		extract( $args );
				
		$title = apply_filters('widget_title', $instance['title'] );
		$output = '';
		ob_start();		
		echo  wp_kses_post( $before_widget ) ;
		
		if ( $title )
		{		
			echo  wp_kses_post( $before_title ) ;
			echo esc_html( $title );
			echo  wp_kses_post( $after_title ) ;
		}
		?>
		<?php $this->tista_wpbsearchform( ); ?>	  
		 <div class="clearfix"></div>
		<?php   echo  wp_kses_post( $after_widget ) ;
		$output .= ob_get_clean();
		echo $output;						
	}
	
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title']    = $new_instance['title'];
		return $instance;

	}

	public function form( $instance ) {  

			$defaults = array(
			'title' => __( '', 'tista' ),
			);
			$instance = wp_parse_args( (array) $instance, $defaults );

		 ?>
			<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>">
			<?php _e('Title:','tista'); ?>
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" 
					 value="<?php echo esc_html( $instance['title'] ); ?>" />
			</label>				
		<?php
	}

	public function tista_wpbsearchform(  ) {
		echo '<form action="' . home_url( '/' ) . '" class="search-form clearfix" id="searchform">
					<input class="blog1-sidebar-serch_input" type="text" name="s" value="' . get_search_query() . '" id="s" placeholder="Search...">
					<input type="submit" class="blog1-sidebar-serch-submit" value="Search">
			</form>';	
	}
}