<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?><?php

class Tista_Widget_Sidebar_Post extends WP_Widget {

	
	public function __construct() {

		$widget_options = array(
			'classname' => 'tista_sidebar_widget_post',
			'description' => __('Latest Sidebar Post widget.','tista')
		);

		$control_options = array(    
			'width' => 200,
			'height' => 400,
			'id_base' => 'tista_sidebar_widget_post'
		);

			parent::__construct( 'tista_sidebar_widget_post',  __('Tista -Sidebar Post Widget','tista'), $widget_options, $control_options );
	
	}

	public function widget( $args, $instance ) {
		
		extract( $args );
		global $post;
		
		$title = apply_filters('widget_title', $instance['title'] );
		$posts_number = $instance['posts_number'];
		$category_select = $instance['category_select'];
		
		$allCategories = $this->tista_getcategory();
		
		if( $allCategories != ''):
			$key = array_search($category_select, $allCategories);
			
		$output = '';
		ob_start();		
		echo  wp_kses_post( $before_widget ) ;
		
		if ( $title )
		{			
			echo  wp_kses_post( $before_title ) ;
			echo esc_html( $title );
			echo  wp_kses_post( $after_title ) ;
		}
		
		if ($key != '') {
				$args = array('posts_per_page' => $posts_number, 'order'=> 'DESC', 'orderby' => 'post_date', 'cat' => $key );		
		} else {
				$args = array('posts_per_page' => $posts_number, 'order'=> 'DESC', 'orderby' => 'post_date');
			}
		$port_query = new WP_Query( $args );
			   
		if( $port_query->have_posts() ) : 
			while( $port_query->have_posts() ) : 
					$port_query->the_post(); 
			
					$imagethumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'widget_post' );		
					?>					
					<div class="blog1-sidebar-posts">
					  <div class="image-left">
					  <?php if( $imagethumb[0] != '' ):?>
						<img src="<?php echo esc_url_raw( $imagethumb[0] ); ?>" alt="<?php echo esc_attr(get_the_title( $post->ID )); ?>"/>
					  <?php endif; ?>
					  </div>
					  <div class="text-box-right">
						<h6 class="less-mar3 uppercase dosis nopadding"><a href="<?php  the_permalink() ;?>"><?php echo $this->tista_title_excerpt( '19',$post ); ?></a></h6>
						 <p><?php echo $this->tista_post_excerpt( '25',$post->ID ); ?></p>						
						<div class="post-info"> <span><i class="fa fa-user"></i> <?php echo __( 'By', 'tista' )?> <?php the_author_posts_link(); ?></span> <span><i class="fa fa-calendar"></i> <?php echo get_the_time('Y/m/d g:i A', $post->ID ); ?> </span> </div>
					  </div>
					</div>
		<?php endwhile; ?>	
		<?php wp_reset_postdata(); ?>
		<?php else: endif; ?>	
		 <div class="clearfix"></div>
		<?php   echo  wp_kses_post( $after_widget ) ; 
		$output .= ob_get_clean();
		echo $output;
		endif;
		
	}
	
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title']    = $new_instance['title'];
		$instance['posts_number']  = $new_instance['posts_number'];
		$instance['category_select']    = $new_instance['category_select'];
		return $instance;

	}

	public function form( $instance ) {  

			$defaults = array(
			'title' => __( 'Featured ', 'tista' ),
			'posts_number' => __( '10 ', 'tista' ),
			);
			$instance = wp_parse_args( (array) $instance, $defaults ); 
			
			$valuesCategories = $this->tista_getcategory();
			

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
		
		<?php if ($valuesCategories): ?>
		<label for="<?php echo esc_html( $this->get_field_id('category_select') ); ?>">
        <?php _e('Category (if none is choosen, all will be taken):','tista'); ?>
          <select name="<?php echo esc_html( $this->get_field_name('category_select') ); ?>" 
                  id="<?php echo esc_html( $this->get_field_id('category_select') ); ?>"
                class="widefat">
                <option value=""><?php __( 'Select Category ', 'tista' ); ?></option>
          <?php foreach ( $valuesCategories as $value ): ?>		  
		  <?php $modon = isset($instance['category_select']) ? $instance['category_select'] : '' ;?>
                <option <?php if ( $modon == $value):
					echo 'selected="selected"'; endif; ?>   value="<?php echo esc_html( $value ); ?>"><?php echo esc_html( $value ); ?></option>
              <?php endforeach; ?>
          </select> 
        </label>
		<?php endif; ?>
				
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
	public function tista_post_excerpt($length,$post_id){
		$summary_length = $length;
		if ($summary_length != '') {
			$postSummary = get_post_field('post_content',$post_id);
			if (strlen($postSummary) > $summary_length)
			{
				$postSummary = substr($postSummary,0,$summary_length);
			}
				return $postSummary ;
		}else{
			return false;
		}
	}
	public function tista_title_excerpt($length,$post){
		$summary_length = $length;
		if ($summary_length != '') {
			$postSummary = esc_html($post->post_title);
			if (strlen($postSummary) > $summary_length)
			{
				$postSummary = substr($postSummary,0,$summary_length);
			}
				return $postSummary ;
		}else{
			return false;
		}
	}
}