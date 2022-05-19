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
        <section class="atelier__resume">
            <?php the_field('Description de l’atelier'); ?>   
        </section>
        <p class="=atelier__endroit">
            <?php the_field('Local ou se déroulera l’atelier'); ?>
        </p>
        <p class="atelier__date">
            <?php the_field('Date de debut'); ?>
        </p>
        <p class="atelier__date_fin">
            <?php the_field('Date de fin'); ?>
        </p>
        <p><?php the_field('heure_de_debut'); ?></p>
        <p><?php the_field('heure_de_fin'); ?></p>
        <p><?php the_field('animateur'); ?></p>
        <p><?php the_field('Jours de la semaine de l’atelier'); ?></p>
        <p><?php the_field('Durée d’une séance d’atelier'); ?></p>
    <?php endif; ?>
    </article>
</main>
<?php get_footer() ?>