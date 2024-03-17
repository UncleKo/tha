<?php get_header(); the_post(); ?>
<?php get_sidebar(); ?>

<div class="mainContent">	

	<h2 id="page-title">Blog</h2>
	
	<div class="core">
	
	<section class="page-nav">
		<?php previous_post_link( '%link', '&laquo; %title' ); ?> |
		<?php next_post_link( '%link', '%title &raquo;' );  ?>
	</section>
	
	<hr>
	
	<h2 class="page-title"><span><?php the_title(); ?></span></h2>	

	<?php get_template_part( 'inc/meta' ); ?>
	
	<?php the_post_thumbnail('blog-post-thumb'); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">			

				<div class="entry">
					
					<?php the_content(); ?>

					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
					
					<?php the_tags( 'Tags: ', ', ', ''); ?>

				</div>
				
				<?php edit_post_link('Edit this entry','','.'); ?>
				
			</div> <!-- end of post -->

	<?php comments_template(); ?>
	
	<hr>
	
	<section class="page-nav clear">
		<?php previous_post_link( '%link', '&laquo; %title' ); ?> |
		<?php next_post_link( '%link', '%title &raquo;' );  ?>
	</section>
		
	</div> <!-- end of core -->

</div> <!-- End of main Content -->	

<?php get_footer(); ?>