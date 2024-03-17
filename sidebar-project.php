<aside>	

	

	<nav id="nav1">

	

		<?php if($post->post_parent) {

			 $parent = $wpdb->get_row("SELECT post_title FROM $wpdb->posts WHERE ID = $post->post_parent");

			 $parent_link = get_permalink($post->post_parent); ?>

			 <a href="<?php echo $parent_link; ?>"><?php echo $parent->post_title; ?></a>

		<?php } ?>


		<a href="<?php echo home_url(); ?>/">Home</a>
		

		<a id="details">Details</a>
		

	</nav>

		

</aside>



<div id="admin">

	<?php edit_post_link('Edit this post...', '<p>', '</p>');?>	

</div>





