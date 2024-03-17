<?php
/**
 * Template Name: Project
 * Template Post Type:  project
 */
?>
<?php get_header(); the_post(); ?>
<?php get_sidebar(); ?>

	<div class="mainContent">

		<div class="core">

		<?php the_content(); ?>

		<h2 class="project-title"><?php the_title(); ?></h2>		

    <h3 class="location">Location: <?php echo get_post_meta($post->ID, "location", true) ; ?></h3>

		<p><?php echo get_post_meta($post->ID, "details", true) ; ?></p>			

		</div> <!-- end of core -->
	  
	</div> <!-- end of mainContent -->
		
<?php get_footer(); ?>