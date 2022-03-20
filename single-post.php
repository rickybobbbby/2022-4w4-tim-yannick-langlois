<?php get_header() ?>
<main class="site__main">
     <?php if (have_posts()) : while(have_posts()) : the_post(); ?>

          <?php
          
          $titre = get_the_title();
          $titreFiltreCours = substr($titre, 7, -6);
          $nbHeures = substr($titre, -6);
          $sigleCours = substr($titre, 0, 7);
          ?>

          <article class="single__cours">
               <div class="single__cours__intro">
                    <h1 class="single__cours__titre"><?= $titreFiltreCours; ?></h1>
                    <div class="cours__nbre-heure"> Durée: <?= $nbHeures; ?></div>
                    <p class="single__cours__sigle"> Code: <?= $sigleCours; ?> </p>
               </div>
               <div class="single__cours__contenu">
                    <div class="single__cours__image">
                         <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="single__cours__description">
                         <h2>Description</h2>
                         <?php the_content(); ?>
                    </div>
               </div>
          </article>
     <?php endwhile;?>
     <?php endif;?>
</main>
<?php get_footer() ?>