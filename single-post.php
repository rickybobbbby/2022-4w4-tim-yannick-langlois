<?php get_header() ?>
<main class="site__main">
     <h1>---- single-post.php ------</h1>
     <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
          <article class="cours">
               <?php the_post_thumbnail(); ?>
               <h1 class="cours__titre">
                    <?php the_title(); ?>
               </h1>
               <?php the_content(); ?>

          </article>
     <?php endwhile;?>
     <?php endif;?>
</main>
<?php get_footer() ?>