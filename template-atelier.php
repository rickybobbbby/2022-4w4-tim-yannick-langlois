<?php
    /**
     * Template Name: atelier
     * 
     * @package WordPress
     * @subpackage cidw-4w4
     */
?>
<?php get_header(); ?>
<main class="site__main">
    <article class="atelier">
    <!-- <h1>---- page.php ------</h1> -->
    <?php if (have_posts()) : the_post(); ?>
        <h1><?php the_title() ?></h1>
        <section class="evenement__resume">
            <?php the_field('Description de l’atelier'); ?>   
        </section>
        <p class="evenement__endroit">
            <?php the_field('Local ou se déroulera l’atelier'); ?>
        </p>
        <p class="evenement__date">
            <?php the_field('Date de debut'); ?>
        </p>
        <p class="evenement__heure">
            <?php the_field('Date de fin'); ?>
        </p>
        <p><?php the_field('Animateur'); ?></p>
        <?php endif; ?>
        

    <?php endif; ?>
    </article>
</main>
<?php get_footer() ?>