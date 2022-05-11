<?php get_header() ?>
<main class="principal">
    <h1>Cours du programme TIM</h1>
    <section class="formation">
        <?php
        if ($ordre = get_query_var('ordre', 'asc')) :
        ?>
        <div class="order">
            <a href="?cletri=title&ordre=asc">A-z</a>
            <a href="?cletri=title&ordre=desc">Z-a</a>
        </div>   
        <?php endif ?>
        <?php wp_nav_menu(array(
            "menu" => "categorie_cours",
            "container" => "nav"
        )) ?>
        <?php
        $ma_categorie = get_category_by_slug($url_categorie_slug);
        echo "<h3>" . $ma_categorie->description . "</h3>";
        ?>
        <h2 class="formation__titre">Cours recheche :</h2>
        <div class="formation__liste">
            <?php if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                    <?php get_template_part('gabarits/content', 'cours'); ?>
                <?php endwhile ?>
            <?php endif ?>
        </div>
    </section>
</main>
<?php get_footer() ?>