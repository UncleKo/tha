<?php

	/*
		Template Name: Blog Home
	*/

?>

<?php get_header(); the_post(); ?>
<?php get_sidebar(); ?>

	<div class="blogContent">

		<h1><?php the_title(); ?></h1>		

		<div class="core">
		
		<?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $ppp = 3;

        query_posts("posts_per_page=$ppp&paged=$paged"); ?>		
		
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

			<?php get_template_part( 'inc/meta' ); ?>
			
			<?php the_post_thumbnail(); ?>

			<?php
					global $more;
					$more = 0;
			?>
			
			<?php the_content('<p class="readMore">Read More</p>'); ?>


		</div>

	<?php endwhile; ?>

	<?php get_template_part( 'inc/nav' ); ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>

		</div> <!-- end of core -->
	  
	</div> <!-- end of mainContent -->
		
<?php get_footer(); ?>