<?php
/*
Plugin Name: Banner
Plugin URI: http://www.arrezende.com
Description: Banner Rotativo com Full widht
Version: 1.0
Author: Alex R Rezende
Author URI: http://www.arrezende.com
License: GPLv2
*/

/*
<?php echo do_shortcode( '[banner_slider]' );?>
*/

// Verifica se não existe nenhum classe com o mesmo nome
if ( ! class_exists('PluginBanner') ){

    /**
     * Este é o construtor da classe. Tudo aqui será executado quando o 
     * plugin for ativado.
     */
	
	class PluginBanner
	{


		
		public function __construct()
		{
			function banner_scripts() {
				wp_enqueue_style( 'style', plugin_dir_url(__FILE__) . 'css/style.css' );
				wp_enqueue_script( 'cycle2', plugin_dir_url(__FILE__) . 'js/jquery.cycle2.js', array( 'jquery' ) );
			}
			/* Adiciona o shortcode */
			add_shortcode('banner_slider', array( $this, 'banner_slider' ) );
			add_action( 'init', array( $this,'create_post_type_banner') );
			
			//wp_enqueue_script('cycle2', plugin_dir_url(__FILE__) . 'js/jquery.cycle2');
			add_action( 'wp_enqueue_scripts', 'banner_scripts' );

			if (function_exists('add_theme_support')) {

				add_theme_support( 'post-thumbnails' ); //adiciona o suporte ao Post Thumbanils 

				//set_post_thumbnail_size(450, 200, true); // define um valor padrão para o thumbail 

				add_image_size('banner-slider', 1046, 682, true); //cria um novo tamanho de imagem 
				add_image_size('portfolio_mini', 371, 180, true); //cria um novo tamanho de imagem 

			} 
			 
		}

		
		/**
         * Este é um método simples que irá exibir o texto do nosso shortcode
         */
        public function banner_slider () {
            echo '<div class="banner  cycle-slideshow " id="banner">
		    <div class="cycle-pager"></div>
		    <!-- div class="cycle-prev"></div>
		    <div class="cycle-next"></div-->';
		   $args = array( 'post_type' => 'banner', 'posts_per_page' => 4 );
		        $loop = new WP_Query( $args );
		        while ( $loop->have_posts() ) : $loop->the_post();
		        $valor = get_post_custom_values('rel'); 
		        $return_string = the_post_thumbnail('banner-slider ', array( 'rel' => $valor[0] )) ;
		      endwhile;
		    echo '</div>';
		   wp_reset_query();
		   return $return_string;
        }

        function create_post_type_banner() {

	    $labels_banner = array(

	    'name' => _x('banner', 'post type general name'),

	    'singular_name' => _x('banner', 'post type singular name'),

	    'add_new' => _x('Adicionar Novo', 'banner'),

	    'add_new_item' => __('Adicionar novo banner'),

	    'edit_item' => __('Edite o banner'),

	    'new_item' => __('Novo banner'),

	    'all_items' => __('Todos os banner'),

	    'view_item' => __('Veja o banner'),

	    'search_items' => __('Procurar banner'),

	    'not_found' =>  __('Nenhum banner cadastrado'),

	    'not_found_in_trash' => __('Nenhuma banner na lixeira'),

	    'parent_item_colon' => '',

	    'menu_icon' => 'dashicons-format-gallery',

	    'menu_name' => 'banner'

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
	
		
		


       




	}// PluginBanner
	/* Carrega a classe */
	$banner_settings = new PluginBanner();
    
} // class_exists
 


?>