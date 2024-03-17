<?php
	if (!function_exists('move_slides')) { 
		
			function move_slides() {
									
						wp_register_script('scrollTo',
							   get_template_directory_uri() . "/js/jquery.scrollTo-min.js",
							   array('jquery'),false,true
						);				   
					   wp_enqueue_script('scrollTo');
					   
					   wp_register_script('localScroll',
							   get_template_directory_uri() . "/js/jquery.localscroll-min.js",
							   array('jquery'),false,true
						);				   
					   wp_enqueue_script('localScroll');
						
						wp_register_script('galleria',
							   get_template_directory_uri() . "/js/galleria-1.2.5.min.js",
							   array('jquery'),false,true
						);				   
					   wp_enqueue_script('galleria');
				}
		}
		 
		add_action('wp_enqueue_scripts', 'move_slides');		
?>