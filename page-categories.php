<?php



	/*

		Template Name: Each Category

	*/



?>



<?php get_header(); the_post(); ?>

<?php get_sidebar(); ?>



	<nav id="categories-menu"><?php wp_nav_menu(array('menu' => 'Categories Nav Menu')); ?></nav>



	<div id="projectsContent">



		<h2 id="page-title"><?php the_title(); ?></h2>

		

		<div class="core">

		

		<?php

		

		//$category = get_post_meta($post->ID, "categories", true);		

		

			//$category_id = explode("|", $category);

			// $pieces[0] = "Residential"

			// $pieces[1] = 60

					

			//$link = get_permalink($category_id[1]);		



			//$category_id = get_the_ID();

			$category_id = $post->ID;

			

			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;			



			query_posts("posts_per_page=-1&post_type=page&post_parent=$category_id&paged=$paged");



			if (have_posts()) : while (have_posts()) : the_post(); ?>

			

			<h2 class="project-title"><a href="<?php the_permalink(); ?>" class="project-link" ><?php the_title(); ?></a></h2>

			

			<section class="each-project clearfix">



					 <a href="<?php the_permalink(); ?>" class="project-link" ><?php the_post_thumbnail('square-thumb'); ?></a>			 

					 

					 <h3 class="location">

						 <span>Location</span>

							<a href="<?php the_permalink(); ?>" class="project-link" >

								<?php echo get_post_meta($post->ID, "location", true) ; ?>

							</a>

					 </h3>					 

					 

					 <p class="details"><span><?php echo get_post_meta($post->ID, "details", true) ; ?></span></p>

			 

			 </section>



			<?php endwhile; get_template_part( 'inc/nav' ); wp_reset_query();	



			else : ?>

			

			<h2 class="coming-soon">Coming Soon</h2>

			

			<?php endif; ?>



		</div> <!-- end of core -->

	  

	</div> <!-- end of mainContent -->

		

<?php get_footer(); ?>