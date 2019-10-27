<?php 
	global $vienna_options;
	
	$slides = '';
	
	if( isset($vienna_options['opt-pulse-slides']) && !empty($vienna_options['opt-pulse-slides']) ){
		$slides = $vienna_options['opt-pulse-slides'];
	}
?>

<?php 

	if(is_array($slides)) :

		$sliderCounter = 0;
	
		if(count($slides) > 0){
			
			echo '<div class="pm-pulse-container" id="pm-pulse-container">';
			
				echo '<div id="pm-pulse-loader"><img src="'.get_template_directory_uri().'/js/pulse/img/ajax-loader.gif" alt="slider loading" /></div>';
				
				echo '<div id="pm-slider" class="pm-slider'. ($enableFixedHeight === 'false' ? ' scalable' : '') .'">';
				
					echo '<div id="pm-slider-progress-bar"></div>';
					
					echo '<ul class="pm-slides-container" id="pm_slides_container">';
					
						foreach($slides as $s) {
							
							$btnText = '';
							$btnUrl = '';
							
							if(!empty($s['url'])){
								$pieces = explode(" - ", $s['url']);
								$btnText = $pieces[0];
								$btnUrl = $pieces[1];
							}
							
							echo '<li data-thumb="'.$s['image'].'" class="pmslide_'.$sliderCounter.'"><img src="'.$s['image'].'" alt="img01" />';
				
								echo '<div class="pm-holder'. ($enableFixedHeight === 'false' ? ' scalable' : '') .'">';
									echo '<div class="pm-caption'. ($enableFixedHeight === 'false' ? ' scalable' : '') .'">';
									
										  if( !empty($s['title']) ){
											  echo '<h1><span>'.esc_html__($s['title'], 'viennatheme').'</span></h1>';
										  }
										  if( !empty($s['description']) ){
											  echo '<span class="pm-caption-decription'. ($enableFixedHeight === 'false' ? ' scalable' : '') .'">';
												echo esc_html__($s['description'], 'viennatheme');
											  echo '</span>';
										  }
										  
										  if($btnText !== ''){
											 echo '<a href="'.$btnUrl.'" class="pm-slide-btn animated'. ($enableFixedHeight === 'false' ? ' scalable' : '') .'">'.esc_html__($btnText, 'viennatheme').' <i class="fa fa-chevron-right"></i></a>'; 
										  }
										  
									echo '</div>';
								echo '</div>';
							
							echo '</li>';
							
							$sliderCounter++;
									
						}
													
					echo '</ul>';
				
				echo '</div>';
			
			echo '</div>';
			
		}//end of if
	
	endif;

?> 

<!-- PULSE SLIDER end -->