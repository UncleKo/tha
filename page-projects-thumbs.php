
<?php
/**
 * Template Name: Projects Thumbs
 * Template Post Type: page
 */
?>


<?php get_header();
the_post(); ?>

<?php get_sidebar(); ?>

<div class="mainContent">

  <div class="core">

    <?php

    $parent_id = $post->ID;

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    query_posts("posts_per_page=4&post_type=page&post_parent=$parent_id&paged=$paged");

    if (have_posts()) : while (have_posts()) : the_post(); ?>


        <section class="each-project clearfix">

          <?php the_post_thumbnail('square-thumb'); ?>

            <a href="<?php the_permalink(); ?>" class="project-title"><h2><?php the_title(); ?></h2></a>
        </section>

      <?php endwhile;
      get_template_part('inc/nav');
      wp_reset_query();

    else : ?>

      <h2 class="coming-soon">Coming Soon</h2>

    <?php endif; ?>

  </div> <!-- end of core -->

</div> <!-- end of mainContent -->

<?php get_footer(); ?>