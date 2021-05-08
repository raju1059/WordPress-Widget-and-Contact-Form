<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?><?php

class Tista_Widget_Sidebar_Category extends WP_Widget {

	
	public function __construct() {

		$widget_options = array(
			'classname' => 'tista_sidebar_widget_cat',
			'description' => __('Sidebar Category widget.','tista')
		);
		$control_options = array(    
			'width' => 200,
			'height' => 400,
			'id_base' => 'tista_sidebar_widget_cat'
		);
		parent::__construct( 'tista_sidebar_widget_cat',  __('Tista -Sidebar Category Widget','tista'), $widget_options, $control_options );
	}

	public function widget( $args, $instance ) {
	
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
		$posts_number = $instance['posts_number'];
		$allCategories = $this->tista_getcategory();
		$counter = 1;
		$output = '';
		ob_start();		
		echo wp_kses_post( $before_widget ) ;
		
		if ( $title )
		{			
			echo wp_kses_post( $before_title ) ;
			echo esc_html( $title );
			echo  wp_kses_post( $after_title ) ;
		}	
	?>
			 <ul class="category-links">
				<?php foreach( $allCategories as $cat_id => $cat_name ): ?>
					<?php if( $posts_number < $counter ):?>
						<?php break; ?>		
					<?php endif; ?>		
					<?php $cat_link = get_category_link( $cat_id ); ?>
					<li><a href="<?php echo esc_url_raw( $cat_link ); ?>"><?php echo esc_html( $cat_name ); ?></a></li>  
				<?php $counter++; ?>
				<?php endforeach; ?>			
			</ul>
			<div class="clearfix"></div>
	<?php  
			echo  wp_kses_post( $after_widget ) ; 
			$output .= ob_get_clean();
			echo $output;
	}
	
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title']    = $new_instance['title'];
		$instance['posts_number']  = $new_instance['posts_number'];
		return $instance;

	}

	public function form( $instance ) {  

		$defaults = array(
		'title' => 'Category',
		'posts_number' => '3',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
	 ?>
		<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>">
		<?php _e('Title:','tista'); ?>
		<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" 
				 name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" 
				 value="<?php echo esc_html( $instance['title'] ); ?>" />
		</label>
																													
		<label for="<?php echo esc_html( $this->get_field_id( 'posts_number' ) ); ?>">
		<?php _e('Number of posts:','tista'); ?>
		<input class="widefat" type="text" id="<?php echo esc_html( $this->get_field_id( 'posts_number' ) ); ?>" 
				 name="<?php echo esc_html( $this->get_field_name( 'posts_number' ) ); ?>" 
				 value="<?php echo esc_html( $instance['posts_number'] ); ?>" />
		</label>
			
	<?php
	}
	
	public function tista_getcategory() {	
		$allcategories = get_categories();
		$allCategoriesArray = array();
		if($allcategories) {
			foreach($allcategories as $singleCategory)
			{ 	
				$allCategoriesArray[$singleCategory->cat_ID] = $singleCategory->name;						
			}
		return $allCategoriesArray;
		}
	}
}