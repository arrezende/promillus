<?php

//Add Custom post type portfolio



add_action( 'init', 'create_post_type_portfolio' );
function create_post_type_portfolio() {

    $labels_portfolio = array(

    'name' => _x('portfolio', 'post type general name'),

    'singular_name' => _x('Portfolio', 'post type singular name'),

    'add_new' => _x('Adicionar Novo', 'Portfolio'),

    'add_new_item' => __('Adicionar novo Portfolio', 'Portfolio'),

    'edit_item' => __('Edite o Portfolio', 'Portfolio'),

    'new_item' => __('Novo Portfolio', 'Portfolio'),

    'all_items' => __('Todos os portfolio', 'Portfolio'),

    'view_item' => __('Veja o Portfolio', 'Portfolio'),

    'search_items' => __('Procurar portfolio', 'Portfolio'),

    'not_found' =>  __('Nenhum Portfolio cadastrado', 'Portfolio'),

    'not_found_in_trash' => __('Nenhuma Portfolio na lixeira', 'Portfolio'),

    'parent_item_colon' => '',

    'menu_name' => 'portfolio'

);

    register_post_type( 'portfolio',

        array(

            'labels' => $labels_portfolio,

            'public' => true,

            'menu_icon' => 'dashicons-archive',

            'has_archive' => true,

            'menu_position' => 5,
            //'taxonomies' => array('category'),

            'supports' => array( 'title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail' ),

        )

    );

}
register_taxonomy( "portfolio-categories", 
    array(  "portfolio" ), 
    array(  "hierarchical" => true,
            "labels" => array('name'=>"Filtros",'add_new_item'=>"Adicionar novo Filtro"), 
            "singular_label" => __( "Field", "field" ), 
            "rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
                            'with_front' => false)
         ) 
);
?>