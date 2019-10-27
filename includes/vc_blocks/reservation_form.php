<?php

if(!class_exists('WPBakeryShortCode')) return;

class WPBakeryShortCode_pm_ln_reservation_form extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        //$custom_css = $el_class = $title = $icon = $output = $s_content = $number = '' ;

        extract(shortcode_atts(array(
			"recipient_email" => 'info@microthemes.ca',
			"display_terms_checkbox" => 'yes',
			"send_email_confirmation" => ''
        ), $atts));


        /* ================  Render Shortcodes ================ */

        ob_start();
		
        ?>
        
        <?php 
			//$img = wp_get_attachment_image_src($el_image, "large"); 
			//$imgSrc = $img[0];
		?>

        <!-- Element Code start -->
        
        <form action="#" method="post" id="pm-reservation-form">
                    
            <div class="row">
            
                <div class="col-lg-4 col-md-4 col-sm-12">
                
                    <input name="pm-first-name-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('First name','viennatheme'); ?> *" id="reservation-form-first-name">
                    
                    <input name="pm-last-name-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Last name','viennatheme'); ?> *" id="reservation-form-last-name">
                    
                    <input name="pm-email-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Email address','viennatheme'); ?> *" id="reservation-form-email-address">
                
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-12">
                
                    <input name="pm-phone-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Phone Number *','viennatheme'); ?>" id="reservation-phone">                   
                    
                    <input name="pm-date-of-reservation-field" class="pm-textfield reservation-form-datepicker" type="text" placeholder="<?php esc_html_e('Date of Reservation','viennatheme'); ?> *" id="datepicker">
                    
                    <input name="pm-num-of-seats-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Number of seats','viennatheme'); ?> *" id="reservation-form-num-of-seats-field">
                
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-12">
                    
                    <input name="pm-restaurant-location-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Restaurant Location','viennatheme'); ?> *" id="reservation-form-location-field">
                    
                    <input name="pm-time-of-reservation-field" class="pm-textfield" type="text" placeholder="<?php esc_html_e('Time of Reservation (ex. 7:00pm - 9:00pm)','viennatheme'); ?> *" id="reservation-form-time-field">	
                    
                </div>
                                        
            </div>
    
            <div class="row">
            
                <div class="col-lg-12">
                    <textarea name="pm-additional-info-field" id="pm-additional-info-field" cols="20" rows="10" placeholder="<?php esc_html_e('Additional Information','viennatheme'); ?>" class="pm-form-textarea"></textarea>
                </div>
            
            </div>            
            
            <?php 
				$randNum1 = rand(5, 15);
				$randNum2 = rand(5, 15);
			?>
            
            <p class="pm-form-security-question"><?php esc_attr_e('Security question', 'viennatheme'); ?> : </p> 
                
            <ul class="pm-form-security-question-list">
            
                <li><strong><?php esc_attr_e($randNum1); ?></strong> + <strong><?php esc_attr_e($randNum2); ?></strong> = </li>
                <li><input type="text" maxlength="2" class="pm-form-textfield security-field property-post" name="pm_contact_form_security_question" id="pm_contact_form_security_question" /></li>
            
            </ul>
        
            <input type="hidden" value="<?php echo $randNum1 + $randNum2; ?>" id="pm_contact_form_security_answer" name="pm_contact_form_security_answer">
            
            
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <?php if( $display_terms_checkbox === 'yes' ){ ?>
                        <p class="pm-terms-checkbox"><input type="checkbox" id="pm_terms_checkbox"> <?php esc_html_e('I agree to the Terms and Conditions','viennatheme'); ?></p>	
                    <?php } ?>
                    
                                    
                    <input type="submit" class="pm-rounded-submit-btn" value="<?php esc_html_e('Send Request','viennatheme'); ?>" id="pm-reservation-form-btn" />
                    
                    <div id="pm-reservation-form-response"></div>
                    
                    <input type="hidden" name="pm_reservation_email_address_contact" id="pm_reservation_email_address_contact" value="<?php esc_attr_e($recipient_email); ?>" />
                    <input type="hidden" name="pm_send_reservation_confirmation" id="pm_send_reservation_confirmation" value="<?php esc_attr_e($send_email_confirmation); ?>" />
                    <input type="hidden" name="pm_display_terms_checkbox" id="pm_display_terms_checkbox" value="<?php esc_attr_e($display_terms_checkbox); ?>" />
                    
                </div>
            </div>
            
            <?php wp_nonce_field("pm_ln_nonce_action","pm_ln_reservation_form_nonce"); ?>
          
        </form>
        
        <!-- Element Code / END -->

        <?php

        $output = ob_get_clean();

        /* ================  Render Shortcodes ================ */

        return $output;

    }

}

vc_map( array(

    "base"      => "pm_ln_reservation_form",
    "name"      => __("Reservation Form", 'viennatheme'),
    "class"     => "",
    "icon"      => "icon-wpb-de_service",
    "category"  => __("Vienna Shortcodes", 'viennatheme'),
    "params"    => array(

		array(
            "type" => "textfield",
            "heading" => __("Recipient Email", 'viennatheme'),
            "param_name" => "recipient_email",
            "description" => __("Enter the target email address of the receiver.", 'viennatheme'),
			"value"      => 'info@microthemes.ca', //Add default value in $atts
        ),

		array(
            "type" => "dropdown",
            "heading" => __("Display Terms Checkbox?", 'viennatheme'),
            "param_name" => "display_terms_checkbox",
            "description" => __("Enable or disable the Terms and Conditions agree checkbox.", 'viennatheme'),
			"value"      => array( 'yes' => 'yes', 'no' => 'no' ), //Add default value in $atts
        ),
		
		array(
            "type"       => "checkbox",
            "class"      => "",
            "heading" => __("Send email confirmation to customer?", 'viennatheme'),
            "param_name" => "send_email_confirmation",
            //"value"      => array( '1' => '1' )
        ),
		
    )

));