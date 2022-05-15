<?php 

require_once("options/apparence.php");


function cidw_4w4_enqueue(){
    wp_enqueue_style('4w4-le-style', 
        get_template_directory_uri() . '/style.css',
        array(), filemtime(get_template_directory() . '/style.css'),
        false);

    wp_register_script('cidw-4w4-boite-modale',
        get_template_directory_uri() . '/javascript/boite-modale.js',
        array(),
        filemtime(get_template_directory() . '/javascript/boite-modale.js'),
        true); // true pour intégrer le js en bas du document

    wp_register_script('cidw-4w4-carrousel-gallerie', 
        get_template_directory_uri() . '/javascript/carrousel-gallerie.js',
        array(),
        filemtime(get_template_directory() . '/javascript/carrousel-gallerie.js'),
        true);

        if (is_category(['cours','web','design','creation3d','utilitaire','jeu','video'])){
            wp_enqueue_script('cidw-4w4-boite-modale');
        }
        if (is_front_page()){
            wp_enqueue_script('cidw-4w4-carrousel-gallerie');
        }
}

add_action("wp_enqueue_scripts", "cidw_4w4_enqueue");

/* -------------------------------------------------- Enregistré le menu */
function cidw_4w4_register_nav_menu(){
    register_nav_menus( array(
        'menu_principal' => __( 'Menu principal', 'cidw_4w4' ),
        'menu_footer'  => __( 'Menu footer', 'cidw_4w4' ),
        'menu_lien_externe'  => __( 'Menu lien externe', 'cidw_4w4' ),
        'menu_categorie_cours'  => __( 'Menu categorie cours', 'cidw_4w4' ),
        'menu_accueil'  => __( 'Menu accueil', 'cidw_4w4' ),
        'menu_accueil_evenement'  => __( 'Menu accueil evenement', 'cidw_4w4' )
    ) );
}
add_action( 'after_setup_theme', 'cidw_4w4_register_nav_menu', 0 );

/* ---------------------------------------------------------------------- filtré les choix du menu principal */
function cidw_4w4_filtre_choix_menu($obj_menu){
    
    foreach($obj_menu as $cle => $value)
    {
       $value->title = wp_trim_words($value->title,3,"...");
    }
    return $obj_menu;
}
add_filter("wp_nav_menu_objects","cidw_4w4_filtre_choix_menu");

/*--------------------------------------------------Ajout de la description dans le menu */
function prefix_nav_description( $item_output, $item) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( '</a>',
        '<span class="menu-item-description">' . $item->description . '</span><div class="menu-item-icone"></div></a>',
              $item_output );
    }
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 2 );


//-------------------------------------------------------
/* -----------------------------------------------------------   add_theme_support() */
function cidw_4w4_add_theme_support()
{
    add_theme_support('post-thumbnails');

    add_theme_support( 'custom-logo', array(
        "width" => 100,
        "height" => 100
    ));
}
 
add_action( 'after_setup_theme', 'cidw_4w4_add_theme_support' );

//function remove_admin_login_header() {remove_action('wp_head', '_admin_bar_bump_cb'); } add_action('get_header', 'remove_admin_login_header');

/*---------------------------------------------------------- Enregistrement des sidebar */

function my_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'pied_page_colonne_1',
            'name'          => __( 'Pied de page colonne 1' ),
            'description'   => __( 'Colonne de pied de page' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'id'            => 'pied_page_colonne_2',
            'name'          => __( 'Pied de page colonne 2' ),
            'description'   => __( 'Colonne de pied de page' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'id'            => 'pied_page_colonne_3',
            'name'          => __( 'Pied de page colonne 3' ),
            'description'   => __( 'Colonne de pied de page' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'id'            => 'pied_page_ligne_1',
            'name'          => __( 'Pied de page ligne 1' ),
            'description'   => __( 'Colonne de pied de page' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}

add_action( 'widgets_init', 'my_register_sidebars' );

//ajout reference au script OLD
// OLD wp_enqueue_script( 'js-file', get_template_directory_uri() . '/js/carousel.js');

//ajout script pour les query
function cidw_4w4_pre_get_posts(WP_Query $query)
{
    /* On filtre avec une condition*/
    if (is_admin() || !$query->is_main_query() || !$query->is_category(array('web','cours','design','video','utilitaire','creation-3d','jeu'))) 
    {
        return $query;
    }
    else
        {
        $ordre = get_query_var('ordre', 'asc');
        $cle = get_query_var('cletri', 'title');
  
        $query->set('order',  $ordre);
        $query->set('orderby', $cle);

        $query->set('posts_per_page', -1);
        return $query;
    }
}
function cidw_4w4_query_vars($params){
    

    $params[] = "cletri";
    $params[] = "ordre";
    return $params;
}
add_action('pre_get_posts', 'cidw_4w4_pre_get_posts');
add_filter('query_vars', 'cidw_4w4_query_vars' );
?>