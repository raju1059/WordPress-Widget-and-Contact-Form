<?php
/**
 * Tista tags cloud class.
 * @author     TistaTeam
 * @package    Tista
 * @subpackage Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?><?php

class Tista_Tags extends WP_Widget {

		public function __construct() {

		$widget_options = array(
			'classname' => 'tista_tags_cloud',
			'description' => __('Tista Tag Cloud widget.','tista')
		);

		$control_options = array(    
			'width' => 200,
			'height' => 400,
			'id_base' => 'tista_tags_cloud'
		);

			parent::__construct( 'tista_tags_cloud',  __('Tista -Tag Cloud Widget','tista'), $widget_options, $control_options );
	
	}

	public function widget( $args, $instance ) {
		
		extract( $args );
				
		$title = apply_filters('widget_title', $instance['title'] );
		$number = $instance['number'];
		
		$output = '';
		ob_start();			
		echo  wp_kses_post( $before_widget ) ;
		
		if ( $title )
		{			
			echo  wp_kses_post( $before_title ) ;
			echo wp_kses_post( $title );
			echo  wp_kses_post( $after_title ) ;
		}
		 if ( function_exists( 'wp_tag_cloud' ) ) : 
		 
			$tista_tags = array(
				'taxonomy' =>'post_tag',
				'smallest'   => 8,
				'largest'    => 22,
				'unit'       => 'pt',
				'number'     => $number,
				'orderby'    => 'name',
				'post_type'  => 'post',
				'order'      => 'ASC',
			);			
			?>		
				<ul class="tags" >
					<li><?php wp_tag_cloud( $tista_tags ); ?></li>
				</ul>				 
			<?php endif; ?> 
			<div class="clearfix"></div>
		<?php   echo  wp_kses_post( $after_widget ) ;
		$output .= ob_get_clean();
		echo $output;
				
	}
	
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title']    = $new_instance['title'];
		$instance['number']  = $new_instance['number'];
		return $instance;

	}

	public function form( $instance ) {  

			$defaults = array(
			'title' => __( 'Tag Cloud', 'tista' ),
			'number' => __( '6', 'tista' ),
			);
			$instance = wp_parse_args( (array) $instance, $defaults );

		 ?>
			<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>">
			<?php _e('Title:','tista'); ?>
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" 
					 value="<?php echo esc_html( $instance['title'] ); ?>" />
			</label>
			
			<label for="<?php echo esc_html( $this->get_field_id( 'number' ) ); ?>">
			<?php _e('Numbers:','tista'); ?>
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'number' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'number' ) ); ?>" 
					 value="<?php echo esc_html( $instance['number'] ); ?>" />
			</label>
		<?php
	}
}