<?php
/**
 * Tista address-info class.
 * @author     TistaTeam
 * @package    Tista
 * @subpackage Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?><?php

class Tista_Address extends WP_Widget {

		public function __construct() {

		$widget_options = array(
			'classname' => 'tista_address_name',
			'description' => __('Tista Address widget.','tista')
		);

		$control_options = array(    
			'width' => 200,
			'height' => 400,
			'id_base' => 'tista_address_name'
		);

			parent::__construct( 'tista_address_name',  __('Tista -Address Widget','tista'), $widget_options, $control_options );
	
	}

	public function widget( $args, $instance ) {
		
		extract( $args );
				
		$title = apply_filters('widget_title', $instance['title'] );
		$address = $instance['address'];
		$phone_1 = $instance['phone_1'];
		$phone_2 = $instance['phone_2'];
		$fax = $instance['fax'];
		$email = $instance['email'];
		
		$output = '';
		ob_start();			
		echo  wp_kses_post( $before_widget ) ;
		
		if ( $title )
		{			
			echo  wp_kses_post( $before_title ) ;
			echo wp_kses_post( $title );
			echo  wp_kses_post( $after_title ) ;
		}?>		 
			<ul class="address-info no-border">    
				<li><i class="fa fa-home"></i> <?php _e('Address:','tista'); ?> <?php echo wp_kses_post( $address ); ?> </li>
				<li><i class="fa fa-phone"></i> <?php _e('Phone(Home):','tista'); ?> <?php echo wp_kses_post( $phone_1 ); ?> </li>
				<li><i class="fa fa-phone"></i> <?php _e('Phone(Office):','tista'); ?> <?php echo wp_kses_post( $phone_2 ); ?> </li>
				<li><i class="fa fa-fax"></i> <?php _e('Fax:','tista'); ?> <?php echo wp_kses_post( $fax ); ?> </li>
				<li class="last"><i class="fa fa-envelope"></i> <?php _e('Email:','tista'); ?> <?php echo wp_kses_post( $email ); ?> </li>
			</ul>
			<div class="clearfix"></div>
		<?php   echo  wp_kses_post( $after_widget ) ;
		$output .= ob_get_clean();
		echo $output;
				
	}
	
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title']    = $new_instance['title'];
		$instance['address']  = $new_instance['address'];
		$instance['phone_1']  = $new_instance['phone_1'];
		$instance['phone_2']  = $new_instance['phone_2'];
		$instance['fax']  = $new_instance['fax'];
		$instance['email']  = $new_instance['email'];
		return $instance;

	}

	public function form( $instance ) {  

			$defaults = array(
			'title' => __( 'Address', 'tista' ),
			'address' => __( '', 'tista' ),
			'phone_1' => __( '', 'tista' ),
			'phone_2' => __( '', 'tista' ),
			'fax' => __( '', 'tista' ),
			'email' => __( '', 'tista' ),
			);
			$instance = wp_parse_args( (array) $instance, $defaults );

		 ?>
			<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>">
			<?php _e('Title:','tista'); ?>
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" 
					 value="<?php echo esc_html( $instance['title'] ); ?>" />
			</label>
			
			<label for="<?php echo esc_html( $this->get_field_id( 'address' ) ); ?>">
			<?php _e('Address:','tista'); ?>
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'address' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'address' ) ); ?>" 
					 value="<?php echo esc_html( $instance['address'] ); ?>" />
			</label>
			<label for="<?php echo esc_html( $this->get_field_id( 'phone_1' ) ); ?>">
			<?php _e('Phone(Home):','tista'); ?>
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'phone_1' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'phone_1' ) ); ?>" 
					 value="<?php echo esc_html( $instance['phone_1'] ); ?>" />
			</label>
			<label for="<?php echo esc_html( $this->get_field_id( 'phone_2' ) ); ?>">
			<?php _e('Phone(Office):','tista'); ?>
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'phone_2' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'phone_2' ) ); ?>" 
					 value="<?php echo esc_html( $instance['phone_2'] ); ?>" />
			</label>
			<label for="<?php echo esc_html( $this->get_field_id( 'fax' ) ); ?>">
			<?php _e('Fax:','tista'); ?>
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'fax' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'fax' ) ); ?>" 
					 value="<?php echo esc_html( $instance['fax'] ); ?>" />
			</label>
			<label for="<?php echo esc_html( $this->get_field_id( 'email' ) ); ?>">
			<?php _e('Email:','tista'); ?>
			<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'email' ) ); ?>" 
					 name="<?php echo esc_html( $this->get_field_name( 'email' ) ); ?>" 
					 value="<?php echo esc_html( $instance['email'] ); ?>" />
			</label>
		<?php
	}
}