<aside>			

  <div class="flex-order">

		<h1 class="company-name"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>

		<?php wp_nav_menu(array('menu' => 'Main Nav Menu',  'container' => 'nav', 'container_id' => 'main-menu', 'container_class' => 'collapse main-menu')); ?>
  
  </div>

		<section class="widgets">

			<article class="blogPost">

			<h3><a href="/blog/">BLOG</a></h3>

			<p class="latest-blog-post">Latest Blog Post</p>

				<?php query_posts("post_per_page=1"); the_post(); ?>

					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 

					<p id="date"><?php the_date(); ?></p>

					<?php the_excerpt(); ?>

			</article>

			<?php wp_reset_query(); ?>

					

			<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>



			<!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->



			<?php endif; ?>

			

		</section>		

		

</aside>







