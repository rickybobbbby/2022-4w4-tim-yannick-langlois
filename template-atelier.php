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
        <h1>Atelier : <?php the_title() ?></h1>
        <section class="atelier__info">
            <h2>Description de l'atelier</h2>
            <p>L'animateur de l'atelier : <?php the_field('animateur'); ?></p>
            <p> Lieu : <?php the_field('Local ou se déroulera l’atelier'); ?></p>
            <p><?php the_field('Description de l’atelier'); ?> </p>
        </section>
        <section class="atelier__horaire">
        <h2>horaire de l'atelier</h2>
        <p>Date de debut : <?php the_field('Date de debut'); ?> </p>
        <p>Deta de fin : <?php the_field('Date de fin'); ?></p>
        <p>Heure de debut : <?php the_field('heure_de_debut'); ?></p>
        <p>Heure de fin : <?php the_field('heure_de_fin'); ?></p>
        <p> le <?php the_field('Jours de la semaine de l’atelier'); ?> de la semaine</p>
        <p><?php the_field('Durée d’une séance d’atelier'); ?> heure</p>
        </section>
    <?php endif; ?>
    </article>
</main>
<?php get_footer() ?>