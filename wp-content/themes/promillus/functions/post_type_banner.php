<?php 

//Add Custom post type Banners

add_action( 'init', 'create_post_type_banner' );

function create_post_type_banner() {

    $labels_banner = array(

    'name' => _x('banner', 'post type general name'),

    'singular_name' => _x('Banner', 'post type singular name'),

    'add_new' => _x('Adicionar Novo', 'Banner'),

    'add_new_item' => __('Adicionar novo Banner', 'Banner'),

    'edit_item' => __('Edite o Banner', 'Banner'),

    'new_item' => __('Novo Banner', 'Banner'),

    'all_items' => __('Todos os banner', 'Banner'),

    'view_item' => __('Veja o Banner', 'Banner'),

    'search_items' => __('Procurar banner', 'Banner'),

    'not_found' =>  __('Nenhum Banner cadastrado', 'Banner'),

    'not_found_in_trash' => __('Nenhuma Banner na lixeira', 'Banner'),

    'parent_item_colon' => '',

    'menu_icon' => 'dashicons-format-gallery',

    'menu_name' => 'Banner'

);



    $args = array(

    'labels' => $labels_banner,

    'public' => true,

    'publicly_queryable' => true,

    'show_ui' => true, 

    'show_in_menu' => true, 

    'query_var' => true,

    'rewrite' => true,

    'capability_type' => 'post',

    'has_archive' => true, 

    'hierarchical' => false,

    'menu_position' => 5,

    'menu_icon' => 'dashicons-images-alt',
    'taxonomies' => array('category'),

    'supports' => array( 'title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail' ),

  ); 





    register_post_type( 'banner', $args  );

}

register_taxonomy( "banner-categories", 
    array(  "banner" ), 
    array(  "hierarchical" => true,
            "labels" => array('name'=>"Filtros",'add_new_item'=>"Adicionar novo Filtro"), 
            "singular_label" => __( "Field" ), 
            "rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
                            'with_front' => false)
         ) 
);


?>