<?php
/**
 * Tista_Shortcode class
 *
 * @package Tista
 * @subpackage Tista Shortcode
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
if ( ! class_exists( 'Tista_Shortcode' ) ) :
/**
 * Handle shortcode 
 */
class Tista_Shortcode {

	/**
	 * The class constructor.
	 *
	 * @access public
	 */
	public function __construct() {		
		add_shortcode( 'tis_icon_box', array( $this, 'tista_icon_box_first' ) );
		add_shortcode( 'tis_data', array( $this, 'iconbox_format_one' ) );
		add_shortcode( 'tis_brc', array( $this, 'tista_bridecrum' ) );
		add_shortcode( 'tis_icon_box_wrap', array( $this, 'tista_icon_box_two' ) );
		add_shortcode( 'tis_data_2', array( $this, 'iconbox_format_two' ) );
		add_shortcode( 'tis_data_3', array( $this, 'iconbox_format_three' ) );
		add_shortcode( 'tis_data_4', array( $this, 'iconbox_format_four' ) );
		add_shortcode( 'tis_data_5', array( $this, 'iconbox_format_five' ) );
		add_shortcode( 't_t_w', array( $this, 'tista_wrap_tbl' ) );
		add_shortcode( 'h', array( $this, 'tista_thead' ) );
		add_shortcode( 'b', array( $this, 'tista_tbody' ) );
		add_shortcode( 'r', array( $this, 'tista_tr' ) );
		add_shortcode( 'c', array( $this, 'tista_td' ) );
		add_shortcode( 'cc', array( $this, 'tista_th' ) );
		add_shortcode( 'tista_wrap', array( $this, 'tista_content_box' ) );
		add_shortcode( 'tis_con_box', array( $this, 'tista_content_box_text' ) );
		add_shortcode( 'tista_col', array( $this, 'tista_col' ) );
		add_shortcode( 'tista_clear', array( $this, 'tista_clear' ) );
		add_shortcode( 'tista_list', array( $this, 'tista_list' ) );
	}
	/**
	 * Iconbox
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_icon_box_first( $atts, $content = null ){
			$html ='';
			$html .=	$this->tista_wrap_start_one();
			$html .= 	do_shortcode($content);
			$html .= 	$this->tista_wrap_end_one();
			return $html;				 
	}
	/**
	 * shortcode format
	 *	[tis_icon_box][tis_data icon_class="" icon_data="" title="" text="" link="" ][/tis_icon_box]
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function iconbox_format_one($atts,$content=null){
			$args = array(
				"icon_class"=>'icon-pencil',
				"icon_data"=>'&#xe076;',
				"title"=>'name',
				"text"=>'text',
				"link"=>'#',
			);
			extract(shortcode_atts(	$args,$atts));
		return $this->tista_content_format_one( $atts['icon_class'] , $atts['icon_data'],$atts['title'],$atts['text'],$atts['link'] );
	}
	/**
	 * Content format
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_content_format_one( $icon_class=null, $icon_data=null, $title=null,$text=null,$link=null ){
		$html = '';
		ob_start();
	?>
			<div class="col-md-4 col-sm-6">
				  <div class="feature-box1 bmargin">
					<div class="iconbox-tiny left round grayoutline2">
						<span class="<?php echo esc_attr( $icon_class ); ?>" data-icon="<?php echo esc_attr( $icon_data ); ?>">
						</span>
					</div>
					<div class="text-box-right">
					  <h4><?php echo esc_html( $title ); ?></h4>
					  <p><?php echo esc_html( $text ); ?></p>					 
					  <a href="<?php echo esc_url_raw( $link ); ?>" class="read-more">
						<?php echo esc_html__( 'Reade More', 'tista' ); ?>
						<i class="fa fa-angle-double-right"></i>
					  </a> 
					 </div>
				  </div>
				</div>
	<?php
		$html = ob_get_clean();
		return $html;
	}
	/**
	 * Content warraper
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_wrap_start_one(){
		return '<section class="sec-padding"><div class="container"><div class="row">';
	}
	/**
	 * Content warraper
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_wrap_end_one(){
		return '</div></div></section><div class="clearfix"></div>';
	}
	

/****************************************************************************************
| Bridecrum
*****************************************************************************************/	
	/**
	 * shortcode format
	 *	[tis_brc name="" bridecrum_text="" parent_url="" parent="" child_url="" child="" ]
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_bridecrum($atts,$content=null){
			$args = array(
				"name"=>'Icon Boxes',
				"bridecrum_text"=>'Icon Boxes',
				"parent_url"=>'#',
				"parent"=>'Home',
				"child_url"=>'Icon Boxes',
				"child"=>'#',
			);
			extract(shortcode_atts(	$args,$atts));
		return $this->tista_bridecrum_format( $atts['name'] ,$atts['bridecrum_text'] , $atts['parent_url'],$atts['parent'],$atts['child_url'],$atts['child'] );
	}
	
	/**
	 * bridecrum format
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_bridecrum_format( $name=null,$brt=null,$parent_url=null,$parent=null,$child_url=null,$child=null ){
			$html = '';
			ob_start();
		?>
			<section>
				<div class="header-inner two">
				  <div class="inner text-center">
					<h4 class="title text-white uppercase"><?php echo esc_html( $name ); ?></h4>
					<h5 class="text-white uppercase"><?php echo esc_html( $brt ); ?></h5>
				  </div>
				  <div class="overlay bg-opacity-5"></div>
				   </div>
			</section>
			<div class="clearfix"></div>
			<section>
				<div class="pagenation-holder">
				  <div class="container">
					<div class="row">
					  <div class="col-md-6">
						<h3><?php echo esc_html( $name ); ?></h3>
					  </div>
					  <div class="col-md-6 text-right">
						<div class="pagenation_links">
						<a href="<?php echo esc_url_raw( $parent_url ); ?>">
							<?php echo esc_html( $parent ); ?>
						</a>
							<i> / </i> 
						<a href="<?php echo esc_url_raw( $child_url ); ?>">
							<?php echo esc_html( $child ); ?>
						</a>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </section>
			    <div class="clearfix"></div>
		<?php
			$html = ob_get_clean();
			return $html;
	}
	
/****************************************************************************************
| Iconbox Two
*****************************************************************************************/
	
	public function tista_icon_box_two( $atts, $content = null ){
			$html ='';
			$html .=	$this->tista_wrap_start_two();
			$html .= 	do_shortcode($content);
			$html .= 	$this->tista_wrap_end_two();
			return $html;				 
	}
	
	/**
	 * shortcode format
	 *	[tis_icon_box_wrap][tis_data_2 icon_class="" title="" text="" link="" ][/tis_icon_box_wrap]
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function iconbox_format_two($atts,$content=null){
			$args = array(
				"icon_class"=>'icon-pencil',
				"title"=>'name',
				"text"=>'text',
				"link"=>'#',
			);
			extract(shortcode_atts(	$args,$atts));
		return $this->tista_content_format_two( $atts['icon_class'] , $atts['title'],$atts['text'],$atts['link'] );
	}
	
	/**
	 * Content format
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_content_format_two( $icon_class=null, $title=null,$text=null,$link=null ){
		$html = '';
		ob_start();
	?>
		<div class="col-md-3 col-sm-6">
          <div class="feature-box7 text-center bmargin"> 
		  <span class="<?php echo esc_attr( $icon_class ); ?>"></span>           
            <h4 class="uppercase tista-margin-top"><?php echo esc_html( $title ); ?></h4>
            <p><?php echo esc_html( $text ); ?></p>            
            <a class="btn btn-border light btn-round" href="<?php echo esc_url_raw( $link ); ?>">
			<?php echo esc_html__( 'Reade More', 'tista' ); ?>
			</a> 
			</div>
        </div>
	<?php
		$html = ob_get_clean();
		return $html;
	}
	/**
	 * Content warraper
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_wrap_start_two(){
		return '<section><div class="container"><div class="divider-line solid light opacity-7"></div><div class="row sec-padding">';
	}
	/**
	 * Content warraper
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_wrap_end_two(){
		return '</div></div></section><div class="clearfix"></div>';
	}
	
	/**
	 * shortcode format
	 *	[tis_icon_box_wrap][tis_data_3 icon_class="" title="" text="" ][/tis_icon_box_wrap]
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function iconbox_format_three($atts,$content=null){
			$args = array(
				"icon_class"=>'icon-pencil',
				"title"=>'name',
				"text"=>'text',
			);
			extract(shortcode_atts(	$args,$atts));
		return $this->tista_content_format_three( $atts['icon_class'] , $atts['title'],$atts['text'] );
	}
	/**
	 * Content format
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_content_format_three( $icon_class=null, $title=null,$text=null ){
		$html = '';
		ob_start();
	?>		
		<div class="col-md-6 col-sm-6">
          <div class="feature-box8">
            <div class="iconbox-small right"><span class="<?php echo esc_attr( $icon_class ); ?>"></span></div>
            <div class="text-box-left">
              <h4 class="less-mar3"><?php echo esc_html( $title ); ?></h4>
              <p><?php echo esc_html( $text ); ?></p>
            </div>
          </div>
        </div>
		
	<?php
		$html = ob_get_clean();
		return $html;
	}
	/**
	 * shortcode format
	 *	[tis_icon_box_wrap][tis_data_4 icon_class="" title="" text="" ][/tis_icon_box_wrap]
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function iconbox_format_four($atts,$content=null){
			$args = array(
				"icon_class"=>'icon-pencil',
				"title"=>'name',
				"text"=>'text',
			);
			extract(shortcode_atts(	$args,$atts));
		return $this->tista_content_format_four( $atts['icon_class'] , $atts['title'],$atts['text'] );
	}
	/**
	 * Content format
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_content_format_four( $icon_class=null, $title=null,$text=null ){
		$html = '';
		ob_start();
	?>		
		<div class="col-md-3">
          <div class="feature-box9 text-center bmargin">
            <div class="iconbox-xlarge grayoutline2">
				<span class="<?php echo esc_attr( $icon_class ); ?>"></span>
			</div>
            <h3 class="tista-margin-top "><?php echo esc_html( $title ); ?></h3>
            <p><?php echo esc_html( $text ); ?></p>
          </div>
        </div>		
	<?php
		$html = ob_get_clean();
		return $html;
	}
	/**
	 * shortcode format
	 *	[tis_icon_box_wrap][tis_data_5 icon_class="" title="" text=""  link="" ][/tis_icon_box_wrap]
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function iconbox_format_five($atts,$content=null){
			$args = array(
				"icon_class"=>'icon-pencil',
				"title"=>'name',
				"text"=>'text',
				"link"=>'#',
			);
			extract(shortcode_atts(	$args,$atts));
		return $this->tista_content_format_five( $atts['icon_class'] , $atts['title'],$atts['text'],$atts['link'] );
	}
	/**
	 * Content format
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_content_format_five( $icon_class=null, $title=null,$text=null,$link=null ){
		$html = '';
		ob_start();
	?>		
		<div class="col-md-4">
			<div class="feature-box20 text-center">
				<div class="iconbox-tiny dark center">
					<span class="<?php echo esc_attr( $icon_class ); ?>"></span>
				</div>
				<h5 class="text-black uppercase"><?php echo esc_html( $title ); ?></h5>
				<p><?php echo esc_html( $text ); ?></p>
				<a class="read-more dark" href="<?php echo esc_url_raw( $link ); ?>">
					<i class="fa fa-angle-double-right"></i> <?php echo esc_html__( 'Reade More', 'tista' ); ?>
				</a>
			</div>
        </div>
	<?php
		$html = ob_get_clean();
		return $html;
	}
	
/****************************************************************************************
| Table 
*****************************************************************************************/
	public function tista_wrap_tbl( $atts, $content = null ){
			$html ='';
			$html .=	$this->tista_wrap_tbl_start();
			$html .= 	do_shortcode($content);
			$html .= 	$this->tista_wrap_tbl_end();
			return $html;				 
	}
	
	public function tista_thead( $atts, $content = null ){
			$html ='';
			$html .=	'<thead>';
			$html .= 	do_shortcode($content);
			$html .=	'</thead>';
			return $html;				 
	}
	
	public function tista_tbody( $atts, $content = null ){
			$html ='';
			$html .=	'<tbody>';
			$html .= 	do_shortcode($content);
			$html .=	'</tbody>';
			return $html;				 
	}
	
	public function tista_tr( $atts, $content = null ){
			$html ='';
			$html .=	'<tr>';
			$html .= 	do_shortcode($content);
			$html .=	'</tr>';
			return $html;				 
	}
	public function tista_th( $atts, $content = null ){
			$html ='';
			$html .=	'<th>';
			$html .= 	do_shortcode($content);
			$html .=	'</th>';
			return $html;				 
	}
	public function tista_td( $atts, $content = null ){
			$html ='';
			$html .=	'<td>';
			$html .= 	do_shortcode($content);
			$html .=	'</td>';
			return $html;				 
	}
	/**
	 * Content warraper
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_wrap_tbl_start(){
		return '<section class="sec-padding"><div class="container"><div class="row"><div class="domain-pricing-table-holder"><table class="table-style-2">';
	}
	/**
	 * Content warraper
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_wrap_tbl_end(){
		return '</table></div></div></div></section><div class="clearfix"></div>';
	}
	
		
/****************************************************************************************
| Content Boxes [tista_wrap][tis_con_box col="" img="" title="" link="" ] text here [/tis_con_box][/tista_wrap]
*****************************************************************************************/
	public function tista_content_box( $atts, $content = null ){
			$html ='';
			$html .=	$this->tista_wrap_content_box_start();
			$html .= 	do_shortcode($content);
			$html .= 	$this->tista_wrap_content_box_end();
			return $html;				 
	}
		
	/**
	 * Content format
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_content_box_text( $atts,$content=null ){
		$args = array(
				"col"=>'8',
				"img"=>'',
				"title"=>'',				
				"link"=>'#',
			);
			extract( shortcode_atts( $args, $atts ) );			
			$col = $atts['col'];
			$img = $atts['img'];
			$title = $atts['title'];
			$text = do_shortcode($content);
			$link = $atts['link'];
		
		$html = '';
		ob_start();
	?>			
		<div class="col-md-<?php echo esc_attr( $col ); ?>">
			  <div class="text-box border padding-4">
			  <img src="<?php echo esc_url_raw( $img ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="img-responsive"/>			  
			  <h4><?php echo esc_html( $title ); ?></h4>
			 <p><?php echo esc_html( $text ); ?></p>			  
			  <a class="btn btn-yellow-3 dark btn-round" href="<?php echo esc_url_raw( $link ); ?>">
				<?php echo esc_html__( 'Reade More', 'tista' ); ?></a>			  
			  </div>
		 </div>
	<?php
		$html = ob_get_clean();
		return $html;
	}
	
	/**
	 * Content warraper
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_wrap_content_box_start(){
		return '<section class="sec-padding"><div class="container"><div class="row">';
	}
	/**
	 * Content warraper
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_wrap_content_box_end(){
		return '</div></div></section><div class="clearfix"></div>';
	}

/****************************************************************************************
| Content Boxes [tista_wrap][tista_col col="" title="" ][/tista_col][/tista_wrap]
*****************************************************************************************/
	public function tista_col( $atts, $content = null ){
		$args = array(
				"col"=>'6',
				"title"=>'title',
			);
			extract( shortcode_atts( $args, $atts ) );
			$title = $atts['col'];
			$title = $atts['title'];
			
			$html ='';
			$html .=	$this->tista_col_start( $col,$title );
			$html .= 	do_shortcode($content);
			$html .= 	$this->tista_col_end( $col );
			return $html;				 
	}
	/**
	 * Content warraper
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_col_start( $col, $title ){
		return '<div class="col-md-'.esc_attr( $col ).'"><h4>'.esc_html( $title ).'</h4>';
	}
	/**
	 * Content warraper
	 *
	 * @since 1.0.0
	 * @codeCoverageIgnore
	 */
	public function tista_col_end( $col ){
		if( $col == 12 ){
			return '</div><div class="clearfix"></div>';
		}else{
			return '</div>';
		}		
	}
	public function tista_clear(  ){
		return '<div class="clearfix"></div>';
	}
/****************************************************************************************
| List Style [tista_list s_1="" s_2="" s_3="" icon=""]text here[/tista_list]
*****************************************************************************************/
	public function tista_list( $atts, $content = null ){
		$args = array(
				"s_1"=>'',
				"s_2"=>'',
				"s_3"=>'',				
				"icon"=>'',
			);
			extract( shortcode_atts( $args, $atts ) );			
			$s_1 = $atts['s_1'];
			$s_2 = $atts['s_2'];
			$s_3 = $atts['s_3'];
			$icon = $atts['icon'];
			$text = do_shortcode($content);		
		$html = '';
		ob_start();
	?>			
		<div class="list-style-<?php echo esc_attr( $s_1 ); ?> <?php echo esc_attr( $s_2 ); ?>">
			  <div class="icon <?php echo esc_attr( $s_3 ); ?>"><i class="fa fa-<?php echo esc_attr( $icon ); ?>"></i></div>
			  <div class="text"><?php echo esc_html( $text ); ?></div>
	   </div>
	<?php
		$html = ob_get_clean();
		return $html;				 
	}
}
endif;
new Tista_Shortcode;