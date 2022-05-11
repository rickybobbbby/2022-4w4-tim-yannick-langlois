<?php get_header() ?>
<main class="site__main">
    <h2>Le département TIM</h2>
        <?php wp_nav_menu(array(
            "menu" => "accueil",
            "container" => "nav"
        )); ?>
        <div class="event__panel">
            <h2>Les évènements de l'année</h2>
            <?php wp_nav_menu(array(
            "menu" => "evenement",
            "container" => "nav")); ?>
        </div>
</main>
<?php get_footer() ?>