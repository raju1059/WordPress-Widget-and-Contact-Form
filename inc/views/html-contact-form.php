<?php
/**
 * Contact form
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>	
		<?php 	if ( function_exists( 'tista_assistant' ) ) : ?>
		<?php $tista_contact = new Tista_Contact(); ?>
		<div class="smart-forms bmargin">	
		<?php if ( ! Tista()->settings->get( 'general_email' ) ): ?>		
		<div class="warning-box alert">
				<span>
				<i class="fa fa-exclamation"></i> &nbsp; &nbsp;<?php esc_html_e( 'Please setup the email address in the theme option for contact form work', 'tista' ); ?>
				</span> <a class="mboxes_close" href="#"><i class="fa fa-times"></i></a> 
		</div>			
		<?php endif; ?>						
		<?php if ( $tista_contact->has_error ) : ?>
		 <div class="error-box alert"> 
			 <span>
			 <i class="fa fa-exclamation-triangle"></i> &nbsp; &nbsp;<?php esc_html_e( 'Please check if you\'ve filled all the fields with valid information. Thank you.', 'tista' ); ?>
			 </span> <a class="mboxes_close" href="#"><i class="fa fa-times"></i></a>
		 </div>
		<?php endif; ?>						
		<?php if ( $tista_contact->email_sent ) : ?>		
		 <div class="success-box alert">
			 <span><i class="fa fa-thumbs-o-up"></i> &nbsp; &nbsp;
			 <?php printf( esc_attr__( 'Thank you %s for contact! Your email was successfully sent!', 'tista' ), '<strong>' . esc_attr( $tista_contact->name ) . '</strong>' ); ?>
			 </span> <a class="mboxes_close" href="#"><i class="fa fa-times"></i></a> 
		 </div>				
		<?php endif; ?>			
		<form method="post" action="" id="smart-form">
		  <div>
			<div class="section">
			  <label class="field prepend-icon">
				<input type="text" name="contact_name" id="contact_name" class="gui-input" placeholder="Enter name Required">
				<span class="field-icon"><i class="fa fa-user"></i></span> </label>
			</div>            
		   <div class="section">
			  <label class="field prepend-icon">
				<input type="email" name="email" id="email" class="gui-input" placeholder="Email address Required">
				<span class="field-icon"><i class="fa fa-envelope"></i></span> </label>
			</div>                
			
			<div class="section colm colm6">
			  <label class="field prepend-icon">
				<input type="tel" name="mob" id="mob" class="gui-input" placeholder="Mobile Required">
				<span class="field-icon"><i class="fa fa-phone-square"></i></span> </label>
			</div>            
		   <div class="section">
			  <label class="field prepend-icon">
				<input type="text" name="url" id="url" class="gui-input" placeholder="Enter subject Required">
				<span class="field-icon"><i class="fa fa-lightbulb-o"></i></span> </label>
			</div>       
			<div class="section">
			  <label class="field prepend-icon">
				<textarea class="gui-textarea" id="msg" name="msg" placeholder="Enter message Required"></textarea>
				<span class="field-icon"><i class="fa fa-comments"></i></span> <span class="input-hint"> <strong><?php esc_html_e( 'Hint', 'tista' ); ?>: </strong><?php esc_html_e( 'Please enter between 80 - 300 characters.', 'tista' ); ?></span> </label>
			</div>                
			<div class="result"></div>                 
		  </div>           
		  <div class="form-footer">
			<button name="submit" type="submit" data-btntext-sending="Sending..." class="button btn-primary yellow-green"><?php esc_html_e( 'Submit', 'tista' ); ?></button>
			<button type="reset" class="button">  <?php esc_html_e( 'Cancel', 'tista' ); ?></button>
		  </div>          
		</form>
	  </div>
	  <?php endif; ?>