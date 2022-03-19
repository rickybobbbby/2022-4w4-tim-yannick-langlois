<?php get_header() ?>
<main class="principal">
    <section class="formation">
        <h2 class="formation__titre">Liste des cours du programme TIM</h2>
        <div class="formation__liste">
            <?php if (have_posts()):
                while (have_posts()): the_post(); ?>
                <article class="formation__cours">
                        <?php
                        $titre = get_the_title();
                        $titreFiltreCours = substr($titre, 7, -6);
                        $nbHeures = substr($titre, -6);
                        $sigleCours = substr($titre, 0, 7);
                        $descCours = get_the_excerpt();
                        ?>
                        <?php the_post_thumbnail('thumbnail'); ?>

                        <div class="formation__cours__affiche">
                            <h3 class="cours__titre"><?= $titreFiltreCours; ?></h3>
                            <p class="cours__sigle"><?= $sigleCours; ?> </p>
                            <?php get_permalink(); ?>
                        </div>

                        <div class="formation__cours__description">
                            <h3 class="cours__titre">  
                                <a href="<?php echo get_permalink(); ?>">
                                    <?= $titreFiltreCours; ?>
                                </a>
                            </h3>
                            <div class="cours__nbre-heure"><?= $nbHeures; ?></div>
                            <p class="cours__sigle"><?= $sigleCours; ?> </p>
                            <p class="cours__desc"> <?= $descCours; ?></p>
                            <?php get_permalink(); ?>
                        </div>
                    </article>
                <?php endwhile ?>
                <?php endif ?>
        </div>
    </section>
</main>
<?php get_footer() ?>