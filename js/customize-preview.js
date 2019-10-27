/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

(function( $ ) {

	// Collect information from customize-controls.js about which panels are opening.
	wp.customize.bind( 'preview-ready', function() {

		// Initially hide the theme option placeholders on load
		$( '.panel-placeholder' ).hide();

		wp.customize.preview.bind( 'section-highlight', function( data ) {

			// Only on the front page.
			if ( ! $( 'body' ).hasClass( 'procast_theme-front-page' ) ) {
				return;
			}

			// When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
			if ( true === data.expanded ) {
				$( 'body' ).addClass( 'highlight-front-sections' );
				$( '.panel-placeholder' ).slideDown( 200, function() {
					$.scrollTo( $( '#panel1' ), {
						duration: 600,
						offset: { 'top': -70 } // Account for sticky menu.
					});
				});

			// If we've left the panel, hide the placeholders and scroll back to the top.
			} else {
				$( 'body' ).removeClass( 'highlight-front-sections' );
				// Don't change scroll when leaving - it's likely to have unintended consequences.
				$( '.panel-placeholder' ).slideUp( 200 );
			}
		});
	});
	
	//Header textfields
	wp.customize( 'headerPostsListSelector', function( value ) {
		value.bind( function( to ) {
			$( '#pro-cast-posts-selector li.activator' ).text( to );
		});
	});
	
	//Reviews textfields
	wp.customize( 'keyRating1Text', function( value ) {
		value.bind( function( to ) {
			$( '.pro-cast-review-rating-score-bar.level-one p' ).text( to );
		});
	});
	
	
	//Footer textfields
	wp.customize( 'newsletterFieldText', function( value ) {
		value.bind( function( to ) {
			$( '.pro-cast-newsletter-field' ).val( to );
		});
	});
		
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		});
	});
		
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		});
	});

	
	
	//Header Colors
	wp.customize( 'microNavColor', function( value ) {								
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				//do nothing
			} else {	
				//alert(to);	
				$( '.pro-cast-header-row-wrapper-micro-nav' ).css({
					backgroundColor : to
				});	
				
				/*$( '.pro-cast-social-icons li' ).css({
					borderLeft : '1px solid' + to
					borderRight : '1px solid' + to
					borderBottom : '1px solid' + to
				});*/
				
				/*$( '.pro-cast-general-info' ).css({
					color : to
				});	*/
				
			}			
		});		
	});	
	//end Header Colors
	
	//Header slider options	
	
	wp.customize( 'headerHeight', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
	
				$( 'header' ).css({
					height : to + 'px',
					//opacity : to / 100
				});				
			}			
		});		
	});
	
	wp.customize( 'headerPadding', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
	
				$( 'header' ).css({
					paddingTop : to + 'px',
					paddingBottom : to  + 'px'
					//opacity : to / 100
				});				
			}			
		});		
	});
	
	wp.customize( 'subHeaderHeight', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
	
				$( '.pm-sub-header-container' ).css({
					height : to + 'px',
					//opacity : to / 100
				});				
			}			
		});		
	});
	
	//Footer slider options	
	wp.customize( 'footerPadding', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				$( 'footer' ).css({
					paddingTop : to + 'px',
					paddingBottom : to  + 'px'
					//opacity : to / 100
				});				
			}			
		});		
	});
	
	wp.customize( 'footerNavPadding', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				$( '.footer_info' ).css({
					paddingTop : to + 'px',
					paddingBottom : to  + 'px'
					//opacity : to / 100
				});				
			}			
		});		
	});
	
	wp.customize( 'footerInfoPadding', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				$( '.pm_footer_info' ).css({
					paddingTop : to + 'px',
					paddingBottom : to  + 'px'
					//opacity : to / 100
				});				
			}			
		});		
	});
	
	
	
	wp.customize( 'primaryColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				$( '.pm-rounded-btn.transparent' ).css({
					color : to 
				});	
				
				$( '.pm-staff-item-img-container' ).css({
					borderBottom : "4px solid" + to 
				});	
				
				$( '.pm-rounded-btn.transparent' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-search-field-mobile' ).css({
					backgroundColor : to 
				});	
				
				$( '.pm-staff-social-icons li a' ).css({
					backgroundColor : to 
				});	
				
				$( '.pm-isotope-filter-system-expand' ).css({
					backgroundColor : to 
				});	
				
				$( '.pm-primary' ).css({
					color : to 
				});	
				
				$( '.pm-menu-item-title' ).css({
					color : to 
				});	
				
				$( '.pm-event-item-title' ).css({
					color : to 
				});	
				
				$( '.pm-event-widget-desc-title' ).css({
					color : to 
				});	
				
				$( '.pm-event-widget-desc-excerpt a' ).css({
					color : to 
				});	
				
				$( '.pm-already-in-cart i' ).css({
					color : to 
				});	
				
				$( '.pm-sticky-post' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-dropmenu-active ul li a' ).css({
					borderTop : "2px solid" + to 
				});	
				
				$( '.pm-news-post-title' ).css({
					backgroundColor : to 
				});	
				
				$( '.pm-news-post-image' ).css({
					borderBottom : "4px solid" + to 
				});	
				
				$( '.pm-event-item-img-container' ).css({
					borderBottom : "4px solid" + to 
				});	
				
				$( '.pm-fat-footer h6' ).css({
					borderBottom : "3px solid" + to 
				});	
				
				$( '.pm-sidebar .pm-widget h6' ).css({
					borderBottom : "3px solid" + to 
				});	
				
				$( '.widget.woocommerce .pm-widget-spacer > h6' ).css({
					borderBottom : "3px solid" + to 
				});	
				
				$( '.pm-recent-blog-post-details .pm-comment-count i' ).css({
					color : to 
				});	
				
				$( '.pm-event-widget-img' ).css({
					borderBottom : "4px solid" + to 
				});	
				
				$( '.pm-event-widget-date-container' ).css({
					backgroundColor : to 
				});
				
				$( '.nav-tabs > li.active > a' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-gallery-item-img-container' ).css({
					borderBottom : "4px solid" + to 
				});
				
				$( '.pm-event-item-date' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-store-item-date' ).css({
					backgroundColor : to 
				});
				
				$( '.quantity .minus' ).css({
					backgroundColor : to 
				});
				
				$( '.quantity .plus' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-event-item-img-container' ).css({
					borderBottom : "4px solid" + to 
				});
				
				$( '.pm-menu-item-price' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-featured-header-container' ).css({
					borderTop : "4px solid" + to 
				});
				
				$( '.pm-isotope-filter-system li a.current' ).css({
					borderTop : "3px solid" + to,
					color : to 
				});
				
				$( '.pagination_multi li' ).css({
					backgroundColor : to 
				});
				
				$( '.product_meta .posted_in a' ).css({
					color : to 
				});
				
				$( '.product_meta .tagged_as a' ).css({
					color : to 
				});
				
				$( '.pm-pagination li.current' ).css({
					backgroundColor : to 
				});
				
				$( '.comment-text .meta strong' ).css({
					color : to 
				});
				
				$( '.woocommerce #respond input#submit.alt' ).css({
					backgroundColor : to 
				});
				
				$( '.woocommerce a.button.alt' ).css({
					backgroundColor : to 
				});
				
				$( '.woocommerce button.button.alt' ).css({
					backgroundColor : to 
				});
				
				$( '.woocommerce input.button.alt' ).css({
					backgroundColor : to 
				});
				
				$( '.woocommerce #respond input#submit' ).css({
					backgroundColor : to 
				});
				
				$( '.woocommerce a.button' ).css({
					backgroundColor : to 
				});
				
				$( '.woocommerce button.button' ).css({
					backgroundColor : to 
				});
				
				$( '.woocommerce input.button' ).css({
					backgroundColor : to 
				});
				
				$( '.widget_shopping_cart_content .buttons .wc-forward' ).css({
					backgroundColor : to 
				});
				
				$( '.description_tab.active' ).css({
					backgroundColor : to 
				});
				
				$( '.additional_information_tab.active' ).css({
					backgroundColor : to 
				});
				
				$( '.reviews_tab.active' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-product-social-icons li a' ).css({
					backgroundColor : to 
				});
				
				$( '#pm-product-img-single' ).css({
					borderBottom : "4px solid" + to 
				});
				
				$( 'input.button[type="submit"]' ).css({
					backgroundColor : to 
				});
				
				$( '.checkout-button' ).css({
					backgroundColor : to 
				});
				
				$( '.remove' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-product-img-container' ).css({
					borderBottom : "3px solid" + to 
				});
				
				$( '.flex-direction-nav a' ).css({
					backgroundColor : to 
				});
				
				$( '.panel-title i' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-nav-tabs > li.active > a' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-image-border' ).css({
					borderBottom : "4px solid" + to 
				});
				
				$( '.pm-testimonials-widget-controls li a' ).css({
					color : to 
				});
				
				$( '.ui-widget-header' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-rounded-btn' ).css({
					backgroundColor : to 
				});
				
				$( '.form-row input[type=submit]' ).css({
					backgroundColor : to 
				});
				
				$( '.tweet_container' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-sidebar .tagcloud a' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-widget-footer .tagcloud a' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-sidebar-search-container i' ).css({
					color : to 
				});
				
				$( '.pm-rounded-submit-btn' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-form-textfield.invalid_field' ).css({
					backgroundColor : to ,
					border : "1px solid" + to 
				});
				
				$( '.pm-form-textarea.invalid_field' ).css({
					backgroundColor : to ,
					border : "1px solid" + to 
				});
				
				$( '.pm-rounded-btn.pm-comment-reply' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-single-post-img-container' ).css({
					borderBottom : "5px solid" + to 
				});
				
				$( '.pm-single-post-title' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-single-post-share-list li a' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-single-post-share-container' ).css({
					borderBottom : "3px solid" + to,
					borderTop : "3px solid" + to 
				});
				
				$( '.pm-likes-title span' ).css({
					color : to 
				});
				
				$( '.pm-tags-list li a' ).css({
					color : to 
				});
				
				$( '.pm-comment-date a' ).css({
					color : to 
				});
				
				$( '.pm-comment-name' ).css({
					color : to 
				});
				
				$( '.logged-in-as a' ).css({
					color : to 
				});
				
				$( '.form-submit input[type=submit]' ).css({
					backgroundColor : to 
				});
				
				$( '.comment-reply-link' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-footer-copyright a' ).css({
					color : to 
				});
				
				$( '.pm-page-social-icons li a' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-sub-header-breadcrumbs-ul p' ).css({
					color : to 
				});
				
				$( '.pm-sub-header-breadcrumbs-ul p.current' ).css({
					color : to 
				});
				
				$( '.pm-footer-subscribe-submit-btn' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-footer-subscribe-field' ).css({
					borderColor : to 
				});
				
				$( '.pm-footer-social-icons li a i' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-footer-social-info-container' ).css({
					borderTop : "3px solid" + to 
				});
				
				$( '.pm-footer-subscribe-container' ).css({
					borderTop : "3px solid" + to 
				});
				
				$( '#back-top' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-sub-menu-book-event a' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-sub-menu-info p i' ).css({
					color : to 
				});
				
				$( '.pm-dropmenu i' ).css({
					color : to 
				});
				
				$( '.pm-sub-navigation a i' ).css({
					color : to 
				});
				
				$( '.sf-menu ul' ).css({
					borderTop : "3px solid" + to 
				});
				
				$( '.sf-menu ul li' ).css({
					borderBottom : "1px solid" + to 
				});
				
				$( '.pm-search-container' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-dots span' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-textfield.invalid_field' ).css({
					backgroundColor : to,
					border : "1px solid" + to 
				});
				
				$( '.pm-gallery-item-name' ).css({
					color : to 
				});
				
				$( '.single_add_to_cart_button' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-menu-item-img-container' ).css({
					borderBottom : "4px solid" + to 
				});
							
			}			
		});		
	});
	
				
				
				
	wp.customize( 'secondaryColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				$( '.pm-secondary' ).css({
					color : to 
				});	
				
				$( '.woocommerce-error' ).css({
					borderTopColor : to 
				});	
				
				$( '.woocommerce-info' ).css({
					borderTopColor : to 
				});		
				
				$( '.woocommerce div.product .woocommerce-tabs ul.tabs li' ).css({
					backgroundColor : to 
				});	
				
				$( '.pm-rounded-btn.pm-add-to-cart' ).css({
					backgroundColor : to 
				});	
				
				$( '.panel-default > .panel-heading' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-nav-tabs > li > a' ).css({
					backgroundColor : to 
				});	
				
				$( '.pm-nav-tabs' ).css({
					borderBottom : "1px solid" + to 
				});
				
				$( '.pm-rounded-btn.event-fan-page' ).css({
					backgroundColor : to 
				});	
				
				$( '.pm-rounded-btn.prettyPhoto-btn' ).css({
					backgroundColor : to 
				});
				
				$( '.pm-rounded-btn.event-fan-page' ).css({
					backgroundColor : to 
				});
				
			}			
		});		
	});
	
	
	wp.customize( 'subMenuBackgroundColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				/*$( '.pm-secondary' ).css({
					color : to 
				});	
				
				$( '.woocommerce-info' ).css({
					borderTopColor : to 
				});	*/	
				
				$( '.pm-sub-menu-container' ).css({
					backgroundColor : to 
				});	
				
			}			
		});		
	});	
	
	wp.customize( 'subpageHeaderBackgroundColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( '.pm-sub-header-container' ).css({
					backgroundColor : to 
				});	
				
			}			
		});		
	});	
	
	
	wp.customize( 'boxedModeContainerColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( '.pm-boxed-mode' ).css({
					backgroundColor : to 
				});	
				
			}			
		});		
	});	
	
	wp.customize( 'dividerColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( '.cart_item .product-quantity .quantity .qty' ).css({
					border : "1px solid" + to 
				});	
				
				$( '.shop_table thead' ).css({
					border : "1px solid" + to 
				});	
				
				$( '.pm-news-post-container' ).css({
					border : "1px solid" + to 
				});	
				
				$( '.pm-comment-box-container' ).css({
					border : "1px solid" + to
				});	
				
				$( '.pm-comment' ).css({
					borderTop : "1px solid" + to,
					borderBottom : "1px solid" + to
				});	
				
				$( '.pm-textarea' ).css({
					border : "1px solid" + to 
				});
				
				$( '.pm-comment-form-textarea' ).css({
					border : "1px solid" + to 
				});
				
				$( 'blockquote' ).css({
					borderColor : to 
				});
				
				$( '.pm-single-meta-divider' ).css({
					backgroundColor : to
				});	
				
				$( '.pm-sidebar-search-container' ).css({
					border : "1px solid" + to 
				});
				
				$( '.pm-woocom-item-short-description' ).css({
					borderTop : "1px solid" + to,
					borderBottom : "1px solid" + to
				});
				
				$( '.product_meta' ).css({
					borderTop : "1px solid" + to
				});
				
				$( '.pm-product-share-container' ).css({
					borderTop : "1px solid" + to
				});
				
				$( '.pm-cart-count' ).css({
					borderBottom : "1px solid" + to
				});
				
				$( '.shop_table .cart-subtotal' ).css({
					borderTop : "1px solid" + to
				});
				
				$( '.shop_table .shipping' ).css({
					borderTop : "1px solid" + to
				});
				
				$( '.shop_table .order-total' ).css({
					borderTop : "1px solid" + to
				});
				
				$( '.cart_totals .order-total' ).css({
					borderTop : "1px solid" + to
				});
				
				$( '.pm-checkout-tabs li' ).css({
					borderTop : "1px solid" + to,
					borderLeft : "1px solid" + to,
					borderRight : "1px solid" + to
				});
				
				$( '.product_list_widget li' ).css({
					borderBottom : "1px solid" + to
				});
				
				$( '.product_list_widget li' ).css({
					borderBottom : "1px solid" + to
				});
				
				$( '.pm-menu-item-container' ).css({
					border : "1px solid" + to
				});
				
				$( '.pm-event-item-container' ).css({
					border : "1px solid" + to
				});
				
				$( '.pm-event-item-divider' ).css({
					backgroundColor : to
				});
				
				$( '.pm-store-item-divider' ).css({
					backgroundColor : to
				});
				
				$( '.pm-gallery-item-container' ).css({
					border : "1px solid" + to
				});
				
				$( '.pm-divider' ).css({
					backgroundColor : to
				});
				
				$( '.pm_quick_contact_field.Light' ).css({
					border : "1px solid" + to
				});
				
				$( '.pm_quick_contact_textarea.Light' ).css({
					border : "1px solid" + to
				});
				
				$( '.pm-widget-footer .widget_categories ul li' ).css({
					borderBottom : "1px solid" + to
				});
				
				$( '.single_variation' ).css({
					borderTop : "1px solid" + to
				});
				
				
			}			
		});		
	});	
	
	
	wp.customize( 'commentBoxColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( '.pm-comment-box-container' ).css({
					backgroundColor : to
				});
				
			}			
		});		
	});	
	
	wp.customize( 'isotopeMenuBackground', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( '.pm-isotope-filter-container' ).css({
					backgroundColor : to
				});
				
			}			
		});		
	});	
	
	wp.customize( 'postMetaIconColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( '.pm-meta-options-list li i' ).css({
					color : to
				});
				
				$( '.pm-single-meta-options-list li i' ).css({
					color : to
				});
				
			}			
		});		
	});	
	
	wp.customize( 'mobileMenuDropColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( '#menu-mobile-navigation li ul' ).css({
					backgroundColor : to
				});
				
			}			
		});		
	});	
	
	wp.customize( 'mobileMenuToggleColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( '.pm-main-menu-btn i' ).css({
					backgroundColor : to
				});
				
			}			
		});		
	});	
	
	wp.customize( 'sale_box_color', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( '.pm-added-to-cart-icon' ).css({
					backgroundColor : to
				});
				
				$( '#pm-product-img-single .onsale' ).css({
					backgroundColor : to
				});
				
				$( '.woocommerce span.onsale' ).css({
					backgroundColor : to
				});
				
				
				
			}			
		});		
	});	
	
	wp.customize( 'form_background', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( '.nav-tabs > li > a' ).css({
					backgroundColor : to
				});
				
				$( '.tab-content' ).css({
					backgroundColor : to
				});
				
			}			
		});		
	});	
	
	wp.customize( 'buttonColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( '.pm-slide-btn' ).css({
					backgroundColor : to
				});
				
				
			}			
		});		
	});	
	
	wp.customize( 'newsletterFieldColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( '.pm-footer-subscribe-field' ).css({
					backgroundColor : to
				});
				
				
			}			
		});		
	});	


	wp.customize( 'fatFooterBackgroundColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( '.pm-fat-footer' ).css({
					backgroundColor : to
				});
				
				
			}			
		});		
	});	
	
	wp.customize( 'footerBackgroundColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( '.pm-footer-copyright' ).css({
					backgroundColor : to
				});
				
				
			}			
		});		
	});	
	
	wp.customize( 'subFooterBackgroundColor', function( value ) {								
		value.bind( function( to ) {			
			if ( 'blank' === to ) {
				//do nothing
			} else {
				
				$( 'footer' ).css({
					backgroundColor : to
				});
				
				
			}			
		});		
	});	


	

	// Page layouts.
	/*wp.customize( 'page_layout', function( value ) {
		value.bind( function( to ) {
			if ( 'one-column' === to ) {
				$( 'body' ).addClass( 'page-one-column' ).removeClass( 'page-two-column' );
			} else {
				$( 'body' ).removeClass( 'page-one-column' ).addClass( 'page-two-column' );
			}
		} );
	} );*/
	
	//convertHex('#A7D136',50)
	function convertHex(hex,opacity){
		hex = hex.replace('#','');
		r = parseInt(hex.substring(0,2), 16);
		g = parseInt(hex.substring(2,4), 16);
		b = parseInt(hex.substring(4,6), 16);
	
		result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
		return result;
	}

	// Whether a header image is available.
	function hasHeaderImage() {
		var image = wp.customize( 'header_image' )();
		return '' !== image && 'remove-header' !== image;
	}

	// Whether a header video is available.
	function hasHeaderVideo() {
		var externalVideo = wp.customize( 'external_header_video' )(),
			video = wp.customize( 'header_video' )();

		return '' !== externalVideo || ( 0 !== video && '' !== video );
	}

	// Toggle a body class if a custom header exists.
	/*$.each( [ 'external_header_video', 'header_image', 'header_video' ], function( index, settingId ) {
		wp.customize( settingId, function( setting ) {
			setting.bind(function() {
				if ( hasHeaderImage() ) {
					$( document.body ).addClass( 'has-header-image' );
				} else {
					$( document.body ).removeClass( 'has-header-image' );
				}

				if ( ! hasHeaderVideo() ) {
					$( document.body ).removeClass( 'has-header-video' );
				}
			} );
		} );
	} );*/

} )( jQuery );