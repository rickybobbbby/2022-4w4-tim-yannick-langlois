<?php 

require_once("options/apparence.php");

//!!custom library pour compiler se qui nous permette de compiler du scss changer par notre costumizer!!
require_once(get_stylesheet_directory() . '/lib/scssphp/scss.inc.php');

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

/* -------------------------------------------------- compilage du customizer */

/*---------------------
//!!custom function pour compiler notre couleur dans le preview du customizer!!
---------------------*/
if (is_customize_preview()) {
	add_action('wp_head', function() {
		$compiler = new ScssPhp\ScssPhp\Compiler();

        //variable de localisation qui nous saire de target et conteneur
		$source_scss = get_stylesheet_directory() . '/sass/style.scss';
		$scssContents = file_get_contents($source_scss);
		$import_path = get_stylesheet_directory() . '/sass';
		$compiler->addImportPath($import_path);

        //refete a nos variable dans couleurs.scss
		$variables = [
			'$color__principal__blanc' => get_theme_mod('principal_blanc', '#ffffff'),
            '$color__principal__noir' => get_theme_mod('principal_noir', '#000000'),
            '$color__principal__coloration' => get_theme_mod('principal_coloration', '#ff5353')
		];

        //script de compilation qui nous retourn les valeur en live 
        //(A NOTER: sa nous permet de passer outre le probleme de live visalisation)
		$compiler->setVariables($variables);
		$css = $compiler->compile($scssContents);
		if (!empty($css) && is_string($css)) {
			echo '<style type="text/css">' . $css . '</style>';
		}
	});
}

/*---------------------
//!!custom function pour compiler notre difinitevement
---------------------*/
/* !! A NOTER: cela ne override aucunement le scss source, 
    donc si nous compilons le code source avec LIVE SASS COMPILER, 
    on retour au theme d'origine !! 

    LE BUT: ne pas avoir a faire des balise style dans le html
*/
add_action('customize_save_after', function() {
	$compiler = new ScssPhp\ScssPhp\Compiler();

        //variable de localisation qui nous saire de target et conteneur
	    $source_scss = get_stylesheet_directory() . '/sass/style.scss';
		$scssContents = file_get_contents($source_scss);
		$import_path = get_stylesheet_directory() . '/sass';
		$compiler->addImportPath($import_path);
	    $target_css = get_stylesheet_directory() . '/style.css';
 
	$variables = [
		'$color__principal__blanc' => get_theme_mod('principal_blanc', '#ffffff'),
        '$color__principal__noir' => get_theme_mod('principal_noir', '#000000'),
        '$color__principal__coloration' => get_theme_mod('principal_coloration', '#ff5353')
	];
    //script de compilation qui compile les choix fait 
	$compiler->setVariables($variables);
	$css = $compiler->compile($scssContents);
	if (!empty($css) && is_string($css)) {
		file_put_contents($target_css, $css);
	}
});

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