<?php
	
	if (!function_exists('get_cdn')) { 
	
		function get_cdn() {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
				wp_enqueue_script( 'jquery' );					
		}
	}
	 
	add_action('wp_enqueue_scripts', 'get_cdn');
	
	if (!function_exists('mainScript')) { 
	
		function mainScript() {
								
			wp_register_script('main',
				   get_template_directory_uri() . "/js/script.js",
				   array('jquery'),false,true
			);				   
		   wp_enqueue_script('main');		
		   
		}
			
	}
			
	add_action('wp_enqueue_scripts', 'mainScript');		
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h3>',
    		'after_title'   => '</h3>'
    	));
    }
    
	add_theme_support( 'nav-menus' );
		
    if (function_exists('register_nav_menus')) {
	    register_nav_menus(
	    	array(
	    		'main_nav' => 'Main Nav Menu' ,
				'categories_nav' => 'Categories Nav Menu' 
	    	)    	
	    );
	}
	

	// ADD PAGE NAME TO THE BODY
	add_filter('body_class', 'add_slug_to_body_class');
	function add_slug_to_body_class($classes) {
		global $post;
			$classes[] = $post->post_name;
		return $classes;
	}
	
	//CHANGE THE LENGTH OF EXCERPT
	function custom_excerpt_length( $length ) {
		return 25;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	//Add post-thumbnails and custom thumbnail sizes
	function setup() {  
		add_theme_support( 'post-thumbnails' ); 
		add_image_size( 'square-thumb', 400, 400, true );  
		//add_image_size( 'slider-thumb-small', 50, 30, true );  
	    //add_image_size( 'slider-thumb', 100, 70, true );
		add_image_size( 'blog-post-thumb', 620, 160, true );
	    //add_image_size('thumbnail-bw', 480, 0, false);
	    add_image_size('blog-img', 700, 0, false);
	}  
	add_action( 'after_setup_theme', 'setup' );  
	
	//Add custom thumbnail sizes to Media Gallery
	function custom_image_sizes_choose( $sizes ) {  
		$custom_sizes = array(  
			'square-thumb' => 'Square Thumb' ,
			//'slider-thumb' => 'Slider Thumb Small' ,
		    //'slider-thumb' => 'Slider Thumb' ,
			'blog-post-thumb' => 'Blog Post Thumb' ,
		   //'thumbnail-bw' => 'Thumbnail BW',
		    'blog-img' => 'Blog Insert Image'
		);  
		return array_merge( $sizes, $custom_sizes );  
	} 
	add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );  			
	
	// //Attach bw filter to Thumbnail BW
	// function bw_images_filter($meta) {
	// 	$file = wp_upload_dir();
	// 	$file = trailingslashit($file['path']).$meta['sizes']['thumbnail-bw']['file'];
	// 	list($orig_w, $orig_h, $orig_type) = @getimagesize($file);
	// 	$image = wp_load_image($file);
	// 	imagefilter($image, IMG_FILTER_GRAYSCALE);
	// 	switch ($orig_type) {
	// 		case IMAGETYPE_GIF:
	// 			$file = str_replace(".gif", "-bw.gif", $file);
	// 			imagegif( $image, $file );
	// 			$meta['sizes']['thumbnail-bw']['file'] = str_replace(".gif", "-bw.gif", $meta['sizes']['thumbnail-bw']['file']);
	// 			break;
	// 		case IMAGETYPE_PNG:
	// 			$file = str_replace(".png", "-bw.png", $file);
	// 			imagepng( $image, $file );
	// 			$meta['sizes']['thumbnail-bw']['file'] = str_replace(".png", "-bw.png", $meta['sizes']['thumbnail-bw']['file']);
	// 			break;
	// 		case IMAGETYPE_JPEG:
	// 			$file = str_replace(".jpg", "-bw.jpg", $file);
	// 			imagejpeg( $image, $file );
	// 			$meta['sizes']['thumbnail-bw']['file'] = str_replace(".jpg", "-bw.jpg", $meta['sizes']['thumbnail-bw']['file']);
	// 			break;
	// 		}
	// 	return $meta;
	// }
	// add_filter('wp_generate_attachment_metadata','bw_images_filter');
	
	
	// CUSTOM ADMIN LOGIN HEADER LOGO    
	function my_custom_login_logo() {  
		echo '<style  type="text/css"> 
			.login h1 a { 
			background: url(images/company02.png) center no-repeat; !important; 		
			background-size: auto; width: auto;
			margin-bottom: 40px;
			}						
			#login {
				background: #fff;
				padding: 6% 0 3%;
				// font-family: meiryo,verdana,helvetica,arial
			}
			.login form, .login .message {
				-webkit-box-shadow: none;
				box-shadow: none;
			}
			// body{font-family: verdana, helvetica, arial, sans-serif;}
		</style>';  
	}  
	add_action('login_head',  'my_custom_login_logo');  

	// CUSTOM ADMIN LOGIN LOGO LINK 	  
	function change_wp_login_url() {  
		return home_url();  // OR ECHO YOUR OWN URL  
	}
	add_filter('login_headerurl', 'change_wp_login_url');  
	  
	// CUSTOM ADMIN LOGIN LOGO & ALT TEXT  	  
	function change_wp_login_title() {  
		return get_option('blogname'); // OR ECHO YOUR OWN ALT TEXT  
	}
	add_filter('login_headertitle', 'change_wp_login_title');  
	
	//CLEAN UP DASHBOARD
	 add_action('after_setup_theme','wpce_setup');
	 
	 function wpce_setup() {
		add_action('admin_menu','customize_meta_boxes'); 
	}
	
	function customize_meta_boxes() {
		//remove_meta_box('postcustom','page','normal'); 
		remove_meta_box('postcustom','post','normal'); 
		remove_meta_box('commentsdiv','page','normal'); 
		add_meta_box('commentsdiv','post','normal'); 
	}	

  // function wporg_custom_post_type() {
  //   register_post_type('wporg_product',
  //     array(
  //       'labels'      => array(
  //         'name'          => __( 'Projects', 'textdomain' ),
  //         'singular_name' => __( 'Project', 'textdomain' ),
  //       ),
  //       'public'      => true,
  //       'has_archive' => true,
  //       'rewrite'     => array( 'slug' => 'projects' ), // my custom slug
  //     )
  //   );
  // }
  // add_action('init', 'wporg_custom_post_type');

	
?>