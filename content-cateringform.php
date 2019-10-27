<?php

	//retrieve recipient email from $vienna_options
	global $vienna_options;
	
	$opt_catering_form_email = $vienna_options['opt-catering-form-email'];
	$opt_send_catering_confirmation = $vienna_options['opt_send_catering_confirmation'];

?>

<div class="row" id="catering-form">
    <div class="col-lg-12 pm-column-spacing">
    
        <form action="#" method="post" id="pm-catering-form">
                    
            <div class="row">
            
                <div class="col-lg-4 col-md-4 col-sm-12">
                
                    <input name="pm-first-name-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('First name','viennatheme'); ?> *" id="catering-form-first-name" required>	
                    
                    <input name="pm-last-name-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Last name','viennatheme'); ?> *" id="catering-form-last-name" required>	
                    
                    <input name="pm-email-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Email address','viennatheme'); ?> *" id="catering-form-email-address" required>	
                
                </div><!-- /.col-lg-4 -->
                
                <div class="col-lg-4 col-md-4 col-sm-12">
                
                    <input name="pm-phone-field" class="pm-textfield" id="catering-form-phone-number" type="text" placeholder="<?php esc_html_e('Phone Number','viennatheme'); ?>">	
                    
                    <select name="pm-event-inquiry-field" id="catering-form-event-type" required>
                        <option value=""><?php esc_html_e('-- Event Type --','viennatheme'); ?> </option>
                        <option value="<?php esc_html_e('Wedding','viennatheme'); ?>"><?php esc_html_e('Wedding','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('Corporate','viennatheme'); ?>"><?php esc_html_e('Corporate','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('School Function','viennatheme'); ?>"><?php esc_html_e('School Function','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('Banquet','viennatheme'); ?>"><?php esc_html_e('Banquet','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('Stag','viennatheme'); ?>"><?php esc_html_e('Stag','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('Engagement','viennatheme'); ?>"><?php esc_html_e('Engagement','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('Backyard party','viennatheme'); ?>"><?php esc_html_e('Backyard party','viennatheme'); ?></option>
                        <option value="<?php esc_html_e('Other','viennatheme'); ?>"><?php esc_html_e('Other','viennatheme'); ?></option>
                    </select>
                    
                    <input name="pm-date-of-event-field" class="pm-textfield catering-form-datepicker" type="text" placeholder="<?php esc_html_e('Date of Event','viennatheme'); ?> *" id="datepicker">
                
                </div><!-- /.col-lg-4 -->
                
                <div class="col-lg-4 col-md-4 col-sm-12">
                    
                    <input name="pm-num-of-guests-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Number of Guests','viennatheme'); ?> *" id="catering-form-guests-field" required>
                    
                    <input name="pm-event-location-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Event Location','viennatheme'); ?> *" id="catering-form-location-field" required>	
                    
                    <input name="pm-time-of-event-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Time of Event (ex. 7:00pm - 9:00pm)','viennatheme'); ?> *" id="catering-form-time-field" required>	
                    
                </div>
                                        
            </div>

            <div class="row">
            
                <div class="col-lg-12">
                    <textarea name="pm-additional-info-field" id="pm-additional-info-field" cols="20" rows="10" placeholder="<?php esc_html_e('Additional Information','viennatheme'); ?>" class="pm-form-textarea"></textarea>
                </div>
            
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <div id="pm-catering-form-response"></div>
                
                    <input type="submit" class="pm-rounded-submit-btn" value="<?php esc_html_e('Send Request','viennatheme'); ?>" id="pm-catering-form-btn" />
                    
                    <input type="hidden" name="pm_event_email_address_contact" id="pm_event_email_address_contact" value="<?php echo esc_attr($opt_catering_form_email); ?>" />
                    <input type="hidden" name="pm_send_catering_confirmation" id="pm_send_catering_confirmation" value="<?php echo esc_attr($opt_send_catering_confirmation); ?>" />
            		<input type="hidden" name="pm_display_terms_checkbox" id="pm_display_terms_checkbox" value="0" />
                    
                </div>
            </div>
            
            <?php wp_nonce_field("pm_ln_nonce_action","pm_ln_catering_form_nonce");  ?>
          
        </form>
    
    </div>
</div>