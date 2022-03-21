<?php get_header() ?>
<main class="site__main">
<div class="carousel__nav">
        <?php $pages = get_pages();
        foreach($pages as $page): ?>
                <button class="carousel__indicateur"><?= $page->post_title ?></button> 
        <?php endforeach ?>
    </div>
    <div class="carousel">
        <div class="carousel__conteneur">
            <div class="carousel__list">
                <?php foreach($pages as $page):?>
                <div class="carousel__list__slide" id="page__<?=$page->ID?>">
                    <div class="carousel__list__slide__image">
                        
                         <?php //temporairement tout le meme
                          the_post_thumbnail(); 
                        ?>
                    </div>
                    <div class="carousel__list__slide__message">
                        <h2><?= $page->post_title ?></h2>
                        <p></p>
                        <button class="bouton" id="bouton__<?=$page->ID?>" type="button"><a href=""><?= $page->post_title ?></a></button>
                    </div>
                 </div>  
                <?php endforeach ?>
                </div>
        </div>
    </div>
</main>
<?php get_footer() ?>