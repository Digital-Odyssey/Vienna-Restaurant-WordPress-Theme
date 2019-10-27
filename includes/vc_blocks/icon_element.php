<?php

if(!class_exists('WPBakeryShortCode')) return;

class WPBakeryShortCode_pm_ln_icon_element extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        //$custom_css = $el_class = $title = $icon = $output = $s_content = $number = '' ;

        extract(shortcode_atts(array(
			"icon" => 'typcn typcn-device-tablet',
			"color" => '#EF5438',
			"margin_top" => 0,
			"margin_bottom" => 20,
			"size" => 4
        ), $atts));


        /* ================  Render Shortcodes ================ */

        ob_start();

        ?>
        
        <?php 
			//$img = wp_get_attachment_image_src($el_image, "large"); 
			//$imgSrc = $img[0];
		?>

        <!-- Element Code start -->
        
        <div class="pm-icon-box" style="margin-top:<?php esc_attr_e($margin_top); ?>px; margin-bottom:<?php esc_attr_e($margin_bottom); ?>px;"><span class="<?php esc_attr_e($icon); ?> typcn-size<?php esc_attr_e($size); ?>" style="color:<?php esc_attr_e($color); ?>;"></span></div>
        
        <!-- Element Code / END -->

        <?php

        $output = ob_get_clean();

        /* ================  Render Shortcodes ================ */

        return $output;

    }

}

vc_map( array(

    "base"      => "pm_ln_icon_element",
    "name"      => __("Icon Element", 'viennatheme'),
    "class"     => "",
    "icon"      => "icon-wpb-de_service",
    "category"  => __("Vienna Shortcodes", 'viennatheme'),
    "params"    => array(


		array(
            "type" => "textfield",
            "heading" => __("Icon", 'viennatheme'),
            "param_name" => "icon",
            "description" => __("Accepts a Typicon icon value.", 'viennatheme'),
			"value" => 'typcn typcn-device-tablet'
        ),
	
		
		array(
            "type" => "colorpicker",
            "heading" => __("Icon Color", 'viennatheme'),
            "param_name" => "color",
            //"description" => __("Accepts a FontAwesome 4 or Lineicons value.", 'viennatheme'),
			"value" => '#EF5438'
        ),
		
		array(
            "type" => "textfield",
            "heading" => __("Margin Top", 'viennatheme'),
            "param_name" => "margin_top",
            "description" => __("Accepts a Typicon icon value.", 'viennatheme'),
			"value" => 0
        ),
		
		array(
            "type" => "textfield",
            "heading" => __("Margin Bottom", 'viennatheme'),
            "param_name" => "margin_bottom",
            "description" => __("Accepts a Typicon icon value.", 'viennatheme'),
			"value" => 20
        ),
		
		array(
            "type" => "textfield",
            "heading" => __("Icon Size", 'viennatheme'),
            "param_name" => "size",
            "description" => __("Accepts a positive integer value.", 'viennatheme'),
			"value" => 4
        ),

    )

));