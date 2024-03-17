<?php get_header(); the_post(); ?>
<?php get_sidebar(); ?>

	<div class="mainContent">

		<h2 id="page-title"><?php the_title(); ?></h2>		

		<div class="core">

		<?php the_content(); ?>

		</div> <!-- end of core -->
	  
	</div> <!-- end of mainContent -->
		
<?php get_footer(); ?>