<?php get_header() ?>
<main class="principal">
    <h1>----front-page.php---</h1>
    <?php if (have_posts()): the_post() ?>  
            <?php
                the_title();
                the_content();
            ?>
    <?php endif ?>
</main>
<?php get_footer() ?>