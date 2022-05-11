<?php get_header() ?>
<main class="site__main">
    <h2>Le département TIM</h2>
        <?php wp_nav_menu(array(
            "menu" => "accueil",
            "container" => "nav"
        )); ?>
        <h2>Les évènements de l'année</h2>
        <?php wp_nav_menu(array(
        "menu" => "evenement",
        "container" => "nav")); ?>
</main>
<?php get_footer() ?>