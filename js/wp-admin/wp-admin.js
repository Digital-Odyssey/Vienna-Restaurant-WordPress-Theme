// JavaScript Document

(function($) {
	
	$(document).ready(function(e) {
		
		if( $('#pm-reviews-post-breakdown-entry-add-btn').length > 0 ){
			
			//apply to existing buttons on page
			methods.bindRemoveBreakdownEntryClickEvent();
			methods.bindDatePicker();
		
			$('#pm-reviews-post-breakdown-entry-add-btn').on('click', function(e) {
				
				e.preventDefault();
				
				//Get counter value based on last input field in container
				if( $('#pm-reviews-post-breakdown-entries-container').find('.pm-reviews-post-breakdown-field-container:last-child').length > 0 ){
					
					//Append to last field found
					var counterValue = $('.pm-reviews-post-breakdown-field-container:last-child').attr('id'),
					counterValueId = counterValue.substring(counterValue.lastIndexOf('_') + 1),
					counterValueIdFinal = ++counterValueId;
					
				} else {
					
					//Clear the container
					counterValueIdFinal = 0;
					$('#pm-reviews-post-breakdown-entries-container').html('');
					
				}
				
				//Append new breakdown entry field
				var wrapperStart = '<div class="pm-reviews-post-breakdown-field-container" id="pm_reviews_post_breakdown_field_container_'+counterValueIdFinal+'">';
				
				var field1 = '<input type="text" class="datepicker_menu_item_start" value="" placeholder="Start Date" name="pm_menu_date_range_start_entries[]" id="pm_reviews_post_breakdown_title_'+counterValueIdFinal+'" />';
				
				var field2 = '<input type="text" class="datepicker_menu_item_end" value="" placeholder="End Date" maxlength="3" name="pm_menu_date_range_end_entries[]" id="pm_reviews_post_breakdown_desc_'+counterValueIdFinal+'" />';
				
				var field3 = '&nbsp; <input type="button" value="Remove Entry" class="button button-primary pm_reviews_post_remove_breakdown_button" id="pm_reviews_post_remove_breakdown_btn_'+counterValueIdFinal+'" />';
				
				var wrapperEnd = '</div>';
				
				$('#pm-reviews-post-breakdown-entries-container').append(wrapperStart + field1 + field2 + field3 + wrapperEnd);
				
				methods.bindDatePicker();
				methods.bindRemoveBreakdownEntryClickEvent();
				
			});
			
		}
		
		
		//Time selector
		if( $('input[name="pm_event_start_time_meta"]').length > 0 ){
			$('input[name="pm_event_start_time_meta"]').ptTimeSelect();
			$('input[name="pm_event_end_time_meta"]').ptTimeSelect();
		}
		
		if( $('input[name="pm_schedule_start_time_meta"]').length > 0 ){
			$('input[name="pm_schedule_start_time_meta"]').ptTimeSelect();
			$('input[name="pm_schedule_end_time_meta"]').ptTimeSelect();
		}
		        
		//Header image preview
		if( $('.pm-admin-upload-field').length > 0 ){
	
			var value = $('.pm-admin-upload-field').val();
			
			if (value !== '') {
				
				$('.pm-admin-upload-field-preview').html('<img src="'+ value +'" />');
				
			}
	
		}
		
		//Featured Post image preview
		if( $('.pm-featured-image-upload-field').length > 0 ){
	
			var value = $('.pm-featured-image-upload-field').val();
			
			if (value !== '') {
				
				$('.pm-featured-image-preview').html('<img src="'+ value +'" />');
				
			}
	
		}
		
		//Staff Header image preview
		if( $('.pm-admin-staff-header-upload-field').length > 0 ){
	
			var value = $('.pm-admin-staff-header-upload-field').val();
			
			if (value !== '') {
				
				$('.pm-staff-header-image-preview').html('<img src="'+ value +'" />');
				
			}
	
		}
		
		//Staff image preview
		if( $('.pm-staff-admin-upload-field').length > 0 ){
	
			var value = $('.pm-staff-admin-upload-field').val();
			
			if (value !== '') {
				
				$('.pm-admin-upload-staff-preview').html('<img src="'+ value +'" />');
				
			}
	
		}
		
		//Gallery image preview
		if( $('.pm-gallery-admin-upload-field').length > 0 ){
	
			var value = $('.pm-gallery-admin-upload-field').val();
			
			if (value !== '') {
				
				$('.pm-admin-upload-gallery-preview').html('<img src="'+ value +'" />');
				
			}
	
		}
		
		//Event image preview
		if( $('.pm-event-admin-upload-field').length > 0 ){
	
			var value = $('.pm-event-admin-upload-field').val();
			
			if (value !== '') {
				
				$('.pm-admin-upload-event-preview').html('<img src="'+ value +'" />');
				
			}
	
		}
		
		//Menu image preview
		if( $('.pm-menu-admin-upload-field').length > 0 ){
	
			var value = $('.pm-menu-admin-upload-field').val();
			
			if (value !== '') {
				
				$('.pm-admin-upload-menu-preview').html('<img src="'+ value +'" />');
				
			}
	
		}
		
		//iPhone switches
		if( $('#pm_post_featured_switch').length > 0 ){
			
			var currValue = $('input[name=pm_post_featured_meta]').val();
			//alert(currValue);
			
			$('#pm_post_featured_switch').iphoneSwitch(currValue, 
			  function() {
				   //alert('on');
				   $('input[name=pm_post_featured_meta]').val("on");
			  },
			  function() {
				   $('input[name=pm_post_featured_meta]').val("off");
			  },
			  {
				switch_on_container_path: adminRootObject.adminRoot + '/wp-content/themes/quantum-theme/js/wp-admin/switch/iphone_switch_container_off.png'
			});
				
		}
		
		//Remove page header button
		if( $('#remove_page_header_button').length > 0 ){
	
			$('#remove_page_header_button').click(function(e) {
				
				$('#img-uploader-field').val('');
				$('.pm-admin-upload-field-preview').empty();
				
			});
	
		}
		
		//Remove menu image button
		if( $('#remove_menu_image_button').length > 0 ){
	
			$('#remove_menu_image_button').click(function(e) {
				
				$('#featured-img-uploader-field').val('');
				$('.pm-admin-upload-menu-preview').empty();
				
			});
	
		}
		
		//Remove Event featured image button
		if( $('#remove_event_featured_img_button').length > 0 ){
	
			$('#remove_event_featured_img_button').click(function(e) {
				
				$('#featured-img-uploader-field').val('');
				$('.pm-admin-upload-event-preview').empty();
				
			});
	
		}
		
		//Remove Staff image button
		if( $('#remove_staff_image_button').length > 0 ){
	
			$('#remove_staff_image_button').click(function(e) {
				
				$('#featured-img-uploader-field').val('');
				$('.pm-admin-upload-staff-preview').empty();
				
			});
	
		}
		
		//Remove Gallery image button
		if( $('#remove_gallery_img_button').length > 0 ){
	
			$('#remove_gallery_img_button').click(function(e) {
				
				$('#featured-img-uploader-field').val('');
				$('.pm-admin-upload-gallery-preview').empty();
				
			});
	
		}
			
		
		
		//Datepicker
		if( $('#datepicker').length > 0 ){
			$( "#datepicker" ).datepicker({
				  dateFormat: "yyyy-mm-dd"
			});
		}
		
				
		
		//Theme verification - marketplace selection
		if( $('#pm_ln_verify_marketplace_selection').length > 0 ){
	
			$('#pm_ln_verify_marketplace_selection').on('change', function(e) {		
			
				
				var val = $(this).val();
				
				if(val === 'themeforest'){
					
					$('#pm_ln_micro_themes_purchase_code_themeforest').addClass('active');
					$('#pm_ln_micro_themes_purchase_code_mojo').removeClass('active');		
									
					
				} else if(val === 'mojo') {
					
					$('#pm_ln_micro_themes_purchase_code_mojo').addClass('active');	
					$('#pm_ln_micro_themes_purchase_code_themeforest').removeClass('active');			
							
				} else {
					
					$('#pm_ln_micro_themes_purchase_code_themeforest').removeClass('active');
					$('#pm_ln_micro_themes_purchase_code_mojo').removeClass('active');	
						
				}
				
			});
	
		}
			
		
    });
	
	
	/* ==========================================================================
	   Methods
	   ========================================================================== */
	   var methods = {
			
			bindRemoveBreakdownEntryClickEvent : function(e) {
				
				$('.pm_reviews_post_remove_breakdown_button').each(function(index, element) {
                    
					$(this).on('click', function(e) {
						
						e.preventDefault();
						
						var btnId = $(this).attr('id'),
						targetBreakdownFieldID = btnId.substring(btnId.lastIndexOf('_') + 1);
						
						var targetBreakdownFieldContainer = $('#pm_reviews_post_breakdown_field_container_' + targetBreakdownFieldID).remove();
						//targetTextField = $('#pm_slider_system_post_'+targetTextFieldID).remove(),
						//targetLibraryBtn = $('#pm_slider_system_post_btn_'+targetTextFieldID).remove();
						
						$(this).remove();
						
					});
					
                });
				
			},		
			
			bindDatePicker : function(e) {
				
				$( ".datepicker_menu_item_start" ).datepicker({
					  dateFormat: "yy-mm-dd"
				});
				
				$( ".datepicker_menu_item_end" ).datepicker({
					  dateFormat: "yy-mm-dd"
				});
				
			},
			
		}
	
})(jQuery);