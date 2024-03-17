<?php



	/*

		Template Name: Each Project

	*/



?>

<?php get_header(); the_post(); ?>



	<h1 id="company-name"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>



	<div class="mainContent">

		

		<section id="camera-slides" class="clearfix">

			<?php the_content(); ?>

		</section>

		

		<div id="description">

			<h2><?php the_title(); ?><?php echo ", ". get_post_meta($post->ID, "location", true) ; ?></h2>

			<p><?php echo get_post_meta($post->ID, "details", true) ; ?></p>			

		</div>	

		

	</div>	

		

<?php get_sidebar(project); ?>

<?php get_footer(); ?>