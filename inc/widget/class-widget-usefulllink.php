<?php
/**
 * Tista usefull links class.
 * @author     TistaTeam
 * @package    Tista
 * @subpackage Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?><?php

class Tista_Usefull_Link extends WP_Widget {

		public function __construct() {

		$widget_options = array(
			'classname' => 'tista_usefull_links',
			'description' => __('Tista Usefull Links.','tista')
		);

		$control_options = array(    
			'width' => 200,
			'height' => 400,
			'id_base' => 'tista_usefull_links'
		);

			parent::__construct( 'tista_usefull_links',  __('Tista -Usefull Links Widget','tista'), $widget_options, $control_options );
	
	}

	public function widget( $args, $instance ) {
		
		extract( $args );				
		$title = apply_filters('widget_title', $instance['title'] );
		$link_1 = $instance['link_1'];
		$url_1 = $instance['url_1'];
		
		$link_2 = $instance['link_2'];		
		$url_2 = $instance['url_2'];
		
		$link_3 = $instance['link_3'];		
		$url_3 = $instance['url_3'];
		
		$link_4 = $instance['link_4'];		
		$url_4 = $instance['url_4'];		
		$output = '';
		ob_start();			
		echo  wp_kses_post( $before_widget ) ;
		
		if ( $title )
		{			
			echo  wp_kses_post( $before_title ) ;
			echo wp_kses_post( $title );
			echo  wp_kses_post( $after_title ) ;
		}?>			
			<ul class="usefull-links orange2">
				<li>
					<a href="<?php echo wp_kses_post( esc_url( $url_1 ) ); ?>">
						<i class="fa fa-angle-right"></i><?php echo wp_kses_post( $link_1 ); ?>
					</a>
				</li>
				<li>
					<a href="<?php echo wp_kses_post( esc_url( $url_2 ) ); ?>">
						<i class="fa fa-angle-right"></i><?php echo wp_kses_post( $link_2 ); ?>
					</a>
				</li>
				<li>
					<a href="<?php echo wp_kses_post( esc_url( $url_3 ) ); ?>">
						<i class="fa fa-angle-right"></i><?php echo wp_kses_post( $link_3 ); ?>
					</a>
				</li>
				<li>
					<a href="<?php echo wp_kses_post( esc_url( $url_4 ) ); ?>">
						<i class="fa fa-angle-right"></i><?php echo wp_kses_post( $link_4 ); ?>
					</a>
				</li>
			</ul>			
			<div class="clearfix"></div>
		<?php   echo  wp_kses_post( $after_widget ) ;
		$output .= ob_get_clean();
		echo $output;				
	}
	
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title']    = $new_instance['title'];
		$instance['link_1']  = $new_instance['link_1'];
		$instance['url_1']  = $new_instance['url_1'];
		$instance['link_2']  = $new_instance['link_2'];
		$instance['url_2']  = $new_instance['url_2'];
		$instance['link_3']  = $new_instance['link_3'];
		$instance['url_3']  = $new_instance['url_3'];
		$instance['link_4']  = $new_instance['link_4'];
		$instance['url_4']  = $new_instance['url_4'];
		return $instance;

	}

	public function form( $instance ) {  

			$defaults = array(
				'title' => __( 'Usefull Links', 'tista' ),
				'link_1' => __( '', 'tista' ),
				'url_1' => __( '', 'tista' ),
				'link_2' => __( '', 'tista' ),
				'url_2' => __( '', 'tista' ),
				'link_3' => __( '', 'tista' ),
				'url_3' => __( '', 'tista' ),
				'link_4' => __( '', 'tista' ),
				'url_4' => __( '', 'tista' ),
			);
			$instance = wp_parse_args( (array) $instance, $defaults );

		 ?>
			<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>">
			<?php _e('Title:','tista'); ?>
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" 
					 value="<?php echo esc_html( $instance['title'] ); ?>" />
			</label>	
			
			<label for="<?php echo esc_html( $this->get_field_id( 'link_1' ) ); ?>">
			<?php _e('Link-1:','tista'); ?>
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'link_1' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'link_1' ) ); ?>" 
					 value="<?php echo esc_html( $instance['link_1'] ); ?>" placeholder="<?php _e('Enter Name','tista'); ?>" />					 
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'url_1' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'url_1' ) ); ?>" 
					 value="<?php echo esc_html( $instance['url_1'] ); ?>" placeholder="<?php _e('Enter Url','tista'); ?>" />
			</label>
			
			<label for="<?php echo esc_html( $this->get_field_id( 'link_2' ) ); ?>">
			<?php _e('Link-2:','tista'); ?>
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'link_2' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'link_2' ) ); ?>" 
					 value="<?php echo esc_html( $instance['link_2'] ); ?>" placeholder="<?php _e('Enter Name','tista'); ?>" />					 
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'url_2' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'url_2' ) ); ?>" 
					 value="<?php echo esc_html( $instance['url_2'] ); ?>" placeholder="<?php _e('Enter Url','tista'); ?>" />
			</label>
			
			<label for="<?php echo esc_html( $this->get_field_id( 'link_3' ) ); ?>">
			<?php _e('Link-3:','tista'); ?>
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'link_3' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'link_3' ) ); ?>" 
					 value="<?php echo esc_html( $instance['link_3'] ); ?>" placeholder="<?php _e('Enter Name','tista'); ?>" />					 
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'url_3' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'url_3' ) ); ?>" 
					 value="<?php echo esc_html( $instance['url_3'] ); ?>" placeholder="<?php _e('Enter Url','tista'); ?>" />
			</label>
			
			<label for="<?php echo esc_html( $this->get_field_id( 'link_4' ) ); ?>">
			<?php _e('Link-4:','tista'); ?>
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'link_4' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'link_4' ) ); ?>" 
					 value="<?php echo esc_html( $instance['link_4'] ); ?>" placeholder="<?php _e(' Enter Name','tista'); ?>" />					 
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'url_4' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'url_4' ) ); ?>" 
					 value="<?php echo esc_html( $instance['url_4'] ); ?>" placeholder="<?php _e('Enter Url','tista'); ?>" />
			</label>
		<?php
	}
}