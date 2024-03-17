<?php get_header(); ?>
<?php get_sidebar(); ?>

	<div class="mainContent">

		<h2 id="page-title">Blog</h2>		

		<div class="core">		
		
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>			

			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			
			<?php get_template_part( 'inc/meta' ); ?>
			
			<?php the_post_thumbnail('blog-post-thumb'); ?>
			
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">						

				<?php the_content('[Read More]'); ?>

			</div>
			
			<hr>

	<?php endwhile; ?>

	<?php get_template_part( 'inc/nav' ); ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>

		</div> <!-- end of core -->
	  
	</div> <!-- end of mainContent -->
		
<?php get_footer(); ?>
	