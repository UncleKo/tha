<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<!-- www.phpied.com/conditional-comments-block-downloads/ -->
    <!--[if IE]><![endif]-->
	<script> document.documentElement.className = 'js'; </script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	
	<meta name="description" content="<?php bloginfo('description'); ?>">	
	
	<meta name="viewport" content="width=device-width,initial-scale=1">	
	<meta name="apple-mobile-web-app-capable" content="yes" />	
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet'>			
	
	<?php if ( is_page_template('page-project1.php') ) { ?>
	
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/project1.css">	
		
	<?php } else { ?>	
	
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">	
		
	<?php } ?>	
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if ( is_single() ) wp_enqueue_script('comment-reply'); ?>
	
	<?php wp_head(); ?>	
	
    <!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr.js"></script>
    <![endif]-->  	
	
</head>

<body <?php body_class(); ?>>
	
	<div class="container">
