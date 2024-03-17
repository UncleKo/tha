<?php



	/*

		Template Name: Projects-All Categories 2nd

	*/



?>



<?php get_header(); the_post(); ?>

<?php get_sidebar(); ?>



<h1 id="company-name"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>



<nav id="categories-menu"><?php wp_nav_menu(array('menu' => 'Categories Nav Menu')); ?></nav>



	<div id="projectsContent">



		<h2 id="page-title"><?php the_title(); ?></h2>

		

		<div class="core">



		<?php

		

			$gen1_ids = 13;

			$gen2 = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE $wpdb->posts.post_parent IN ($gen1_ids) AND $wpdb->posts.post_type = 'page' AND $wpdb->posts.post_status = 'publish' ORDER BY $wpdb->posts.ID ASC");

			$gen2_ids = implode($gen2,', ');

			$gen3 = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE $wpdb->posts.post_parent IN ($gen2_ids) AND $wpdb->posts.post_type = 'page' AND $wpdb->posts.post_status = 'publish' ORDER BY $wpdb->posts.ID ASC");

			$gen3_ids = implode($gen3,', ');

			

			//echo "<h2>"; print_r ($gen2); print_r($gen3); echo "</h2>";	



			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;			

			

			$args=array(

			  'post__in' => $gen3,

			  'post_type' => 'page',

			  'post_status' => 'publish',

			  'posts_per_page' => -1,

			  'caller_get_posts'=> 1,

			  'paged'=>$paged

			);

			$my_query = null;

			$my_query = new WP_Query($args);

			if( $my_query->have_posts() ) {

			  

			  while ($my_query->have_posts()) : $my_query->the_post(); 

			  

			  if($post->post_parent) {

			  

				  $category_title = get_the_title($post->post_parent);

				  $permalink = get_permalink($post->post_parent);

					

				echo "<h2 class='category-link'><a href='$permalink'>" . $category_title . "</a><span>Click for More " . $pieces[0] . "</span></h2>"; 

			}

		?>

			

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



			<?php endwhile; get_template_part( 'inc/nav' ); } wp_reset_query(); ?>



		</div> <!-- end of core -->

	  

	</div> <!-- end of mainContent -->

		

<?php get_footer(); ?>