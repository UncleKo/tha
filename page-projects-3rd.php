<?php



	/*

		Template Name: Projects-All Categories

	*/



?>



<?php get_header(); the_post(); ?>

<?php get_sidebar(); ?>



<nav id="categories-menu"><?php wp_nav_menu(array('menu' => 'Categories Nav Menu')); ?></nav>



	<div id="projectsContent">



		<h2 id="page-title"><?php the_title(); ?></h2>

		

		<div class="core">



		<?php

		

		$categoriesCF = get_post_meta($post->ID, "categories", true);

		// example value = "Residential|60, Mixed-Use|64"

		

		$allCategories = explode(",", $categoriesCF);

		// $allCategories[0] = "Residential|60"

		// $allCategories[1] = "Mixed-Use|64"

 

		foreach ($allCategories as $category) {



			$pieces = explode("|", $category);

			// $pieces[0] = "Residential"

			// $pieces[1] = 60

					

			$link = get_permalink($pieces[1]);				



			query_posts("posts_per_page=3&post_type=page&post_parent=$pieces[1]");			



			if (have_posts()) : while (have_posts()) : the_post(); 

			

			echo "<h2 class='category-link'><a href='$link'>" . $pieces[0] . "</a><span>Click for More " . $pieces[0] . "</span></h2>"; ?>

			

			<section class="each-project clearfix">			



					<a href="<?php the_permalink(); ?>" class="project-link" ><?php the_post_thumbnail('square-thumb'); ?> </a>			  



					<h3 class="latest-project">

						<span>Latest Project</span>

							<a href="<?php the_permalink(); ?>" class="project-link" >

								<?php the_title(); ?>

							</a>

					</h3>					



					<p class="details"><span><?php echo get_post_meta($post->ID, "details", true) ; ?></span></p>

					

			 </section>



			<?php endwhile; endif; wp_reset_query();			



		};

	?>



		</div> <!-- end of core -->

	  

	</div> <!-- end of mainContent -->

		

<?php get_footer(); ?>