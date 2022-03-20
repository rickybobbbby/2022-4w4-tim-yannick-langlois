<?php get_header() ?>
<main class="site__main">
    <section class="page__standard">
        <?php if (have_posts()): while(have_posts()): the_post(); ?>
        <div class="page__standard__titre">
            <h1><?php the_title() ?></h1>
        </div>
        <div class="page__standard__contenu">
            <?php the_content() ?>
        </div>
        <?php endwhile ?>
        <?php endif ?>
    </section>
</main>
<?php get_footer() ?>