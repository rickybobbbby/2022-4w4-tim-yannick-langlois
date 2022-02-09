<?php
function cidw_4w4_enqueue() {
    wp_enqueue_style('style_css', 
    get_template_directory_uri() . '/style.css',
    array(),
    filemtime(get_template_directory() . '/style.css'),
    false);

    wp_enqueue_style( 'wpb-google-fonts',
        'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,700,300',
        false ); 
}

add_action("wp_enqueue_scripts", "cidw_4w4_enqueue");


function cidw_4w4_enregistre_mon_menu() {
    register_nav_menus(
        array(
        'principal'=> __( 'menu_principal', 'cidw_4w4' ),
        'footer' => __( 'menu_footer', 'cidw_4w4' )
        ) 
    );
}
add_action( 'after_setup_theme', 'cidw_4w4_enregistre_mon_menu' );

/* ------ filtré chacun ------*/
function cidw_4w4_filtre_le_menu($mon_object){
    foreach($mon_object as $cle => $valeur){
        /*$valeur->title = substr($valeur->title, 0, 7);*/
        $valeur->title = wp_trim_words($valeur->title, 3, "...");
    }
    return $mon_object;
}
add_filter("wp_nav_menu_objects","cidw_4w4_filtre_le_menu");
?>