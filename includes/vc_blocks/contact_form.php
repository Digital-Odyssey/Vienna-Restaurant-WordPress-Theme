<?php

if(!class_exists('WPBakeryShortCode')) return;

class WPBakeryShortCode_pm_ln_contact_form extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        //$custom_css = $el_class = $title = $icon = $output = $s_content = $number = '' ;

        extract(shortcode_atts(array(
			"email_address" => 'info@microthemes.ca',
			"alert_message" => 'Your email address will be held strictly confidential. Required fields are marked *',
			"button_text" => 'Submit',
			"text_color" => 'red',
        ), $atts));


        /* ================  Render Shortcodes ================ */

        ob_start();

        ?>
        
        <?php 
			//$img = wp_get_attachment_image_src($el_image, "large"); 
			//$imgSrc = $img[0];
		?>

        <!-- Element Code start -->
        
        <div class="pm-contact-form-container">
        
			<p class="pm-required" style="color:<?php esc_attr_e($text_color); ?>;"><?php esc_attr_e($alert_message); ?></p>
            
			<form action="#" method="post" id="pm-contact-form">
				<input name="pm_s_full_name" id="pm_s_full_name" type="text" placeholder="<?php esc_html_e('Name *', 'viennatheme'); ?>" class="pm-form-textfield">
				<input name="pm_s_email_address" id="pm_s_email_address" type="text" placeholder="<?php esc_html_e('Email *', 'viennatheme'); ?>" class="pm-form-textfield">
				<input name="pm_s_subject" id="pm_s_subject" type="text" placeholder="<?php esc_html_e('Subject *', 'viennatheme'); ?>" class="pm-form-textfield">
				<textarea name="pm_s_message" id="pm_s_message" cols="20" rows="6" placeholder="<?php esc_html_e('Inquiry *', 'viennatheme'); ?>" class="pm-form-textarea"></textarea>
                
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
                
                <input name="pm-form-submit-btn" class="pm-rounded-submit-btn" type="button" value="<?php esc_attr_e($button_text); ?>" id="pm-contact-form-btn">
                
                <div id="pm-contact-form-response"></div>	
                
				<input type="hidden" value="pm-contact-form-submitted" />
				<input type="hidden" name="pm_s_email_address_contact" id="pm_s_email_address_contact" value="<?php esc_attr_e($email_address); ?>" />
				
				<?php wp_nonce_field('pm_ln_nonce_action','pm_ln_send_contact_nonce'); ?>
				
			</form>
		</div>
        
        <!-- Element Code / END -->

        <?php

        $output = ob_get_clean();

        /* ================  Render Shortcodes ================ */

        return $output;

    }

}

vc_map( array(

    "base"      => "pm_ln_contact_form",
    "name"      => __("Contact Form", 'viennatheme'),
    "class"     => "",
    "icon"      => "icon-wpb-de_service",
    "category"  => __("Vienna Shortcodes", 'viennatheme'),
    "params"    => array(

		array(
            "type" => "textfield",
            "heading" => __("Recipient email address", 'viennatheme'),
            "param_name" => "email_address",
            "description" => __("Enter the email address where the message will be sent to.", 'viennatheme'),
			"value" => 'info@microthemes.ca'
        ),
		
		array(
            "type" => "textfield",
            "heading" => __("Form Message", 'viennatheme'),
            "param_name" => "alert_message",
            //"description" => __("Enter a CSS class if required.", 'viennatheme'),
			"value" => 'Your email address will be held strictly confidential. Required fields are marked *'
        ),
		
		array(
            "type" => "textfield",
            "heading" => __("Button Text", 'viennatheme'),
            "param_name" => "button_text",
            //"description" => __("Enter a CSS class if required.", 'viennatheme'),
			"value" => 'Submit'
        ),
		
		array(
            "type" => "colorpicker",
            "heading" => __("Text Color", 'viennatheme'),
            "param_name" => "text_color",
            //"description" => __("Enter a CSS class if required.", 'viennatheme'),
			"value" => 'red'
        ),	


    )

));