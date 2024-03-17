<?php get_header(); ?>
<?php get_sidebar(); ?>

	<div class="mainContent">
	
	<h2 id="page-title">Blog</h2>
	
	<div class="core">

		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h2 class="page-title"><span><?php single_cat_title(); ?></a></h2>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2 class="page-title"><span>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</a></h2>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2 class="page-title"><span>Archive for <?php the_time('F jS, Y'); ?></a></h2>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2 class="page-title"><span>Archive for <?php the_time('F, Y'); ?></a></h2>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="page-title"><span>Archive for <?php the_time('Y'); ?></a></h2>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="page-title"><span>Author Archive</a></h2>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="page-title"><span>Blog Archives</a></h2>
			
			<?php } ?>		
		
			

			<?php while (have_posts()) : the_post(); ?>				
				
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				
				<?php get_template_part( 'inc/meta' ); ?>
				
				<?php the_post_thumbnail('blog-post-thumb'); ?>
					
				<div <?php post_class() ?>>
					
					<?php the_content('Read More'); ?>					

				</div>
				
				<hr>

			<?php endwhile; ?>

			<?php get_template_part( 'inc/nav' ); ?>
			
	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>
	
		</div> <!-- end of core -->
	
	</div> <!-- end of mainContent -->

<?php get_footer(); ?>