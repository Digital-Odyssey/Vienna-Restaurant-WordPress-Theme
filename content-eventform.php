<?php

	//retrieve recipient email from $vienna_options
	global $vienna_options;
	
	$opt_event_form_email = $vienna_options['opt-event-form-email'];
	$opt_send_event_confirmation = $vienna_options['opt-send-event-confirmation'];

?>

<div class="row" id="event-form">
    <div class="col-lg-12 pm-column-spacing">
    
        <form action="#" method="post" id="pm-event-form">
                
            <div class="row">
            
                <div class="col-lg-4 col-md-4 col-sm-12">
                
                    <input name="pm-first-name-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('First name','viennatheme'); ?> *" id="event-form-first-name">	
                    
                    <input name="pm-last-name-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Last name','viennatheme'); ?> *" id="event-form-last-name">	
                    
                    <input name="pm-email-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Email address','viennatheme'); ?> *" id="event-form-email-address">	
                
                </div><!-- /.col-lg-4 -->
                
                <div class="col-lg-4 col-md-4 col-sm-12">
                
                    <input name="pm-phone-field" id="event-form-phone-number" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Phone Number','viennatheme'); ?>">	
                    
                    <select name="pm-event-inquiry-field" id="event-form-event-type">
                        <option value=""><?php esc_html_e('-- Event Type --','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('Corporate Party','viennatheme'); ?>"><?php esc_html_e('Corporate Party','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('School Function','viennatheme'); ?>"><?php esc_html_e('School Function','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('Engagement','viennatheme'); ?>"><?php esc_html_e('Engagement','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('Baby Shower','viennatheme'); ?>"><?php esc_html_e('Baby Shower','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('Birthday Party','viennatheme'); ?>"><?php esc_html_e('Birthday Party','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('Social Gathering','viennatheme'); ?>"><?php esc_html_e('Social Gathering','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('Wedding','viennatheme'); ?>"><?php esc_html_e('Wedding','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('Other','viennatheme'); ?>"><?php esc_html_e('Other','viennatheme'); ?></option>
                    </select>
                    
                    <input name="pm-date-of-event-field" class="pm-textfield event-form-datepicker" type="text" placeholder="<?php esc_html_e('Date of Event','viennatheme'); ?> *" id="datepicker">	
                
                </div><!-- /.col-lg-4 -->
                
                <div class="col-lg-4 col-md-4 col-sm-12">
                    
                    <input name="pm-num-of-guests-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Number of Guests','viennatheme'); ?> *" id="event-form-guests-field">
                                                    
                    <input name="pm-time-of-event-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Time of Event (ex. 7:00pm - 9:00pm)','viennatheme'); ?> *" id="event-form-time-field">	
                    
                </div>
                                        
            </div>
        
            <div class="row">
            
                <div class="col-lg-12">
                    <textarea name="pm-additional-info-field" id="pm-additional-info-field" cols="20" rows="10" placeholder="<?php esc_html_e('Additional Information','viennatheme'); ?>" class="pm-form-textarea"></textarea>
                </div>
            
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <div id="pm-event-form-response"></div>
                
                     <input type="submit" class="pm-rounded-submit-btn" value="<?php esc_html_e('Send Request','viennatheme'); ?>" id="pm-event-form-btn" />
                </div>
            </div>
            
            <input type="hidden" name="pm_event_email_address_contact" id="pm_event_email_address_contact" value="<?php echo esc_attr($opt_event_form_email); ?>" />
            <input type="hidden" name="pm_send_event_confirmation" id="pm_send_event_confirmation" value="<?php echo esc_attr($opt_send_event_confirmation); ?>" />
            <input type="hidden" name="pm_display_terms_checkbox" id="pm_display_terms_checkbox" value="0" />
            
            
            <?php wp_nonce_field("pm_ln_nonce_action","pm_ln_event_form_nonce");  ?>
          
        </form>
    
    </div>
</div>