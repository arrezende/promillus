<?php 
//Remove a barra do admim para usuarios logados

show_admin_bar(false);



//Ativa Thumbnails

//verifica se a função existe 

if (function_exists('add_theme_support')) {

add_theme_support( 'post-thumbnails' ); //adiciona o suporte ao Post Thumbanils 

//set_post_thumbnail_size(450, 200, true); // define um valor padrão para o thumbail 

add_image_size('banner-slider', 1046, 682, true); //cria um novo tamanho de imagem
add_image_size('mini-banner', 170, 143, true); //cria um novo tamanho de imagem  
add_image_size('portfolio_mini', 371, 180, true); //cria um novo tamanho de imagem 

} 

//menu

function header_menu() {

  register_nav_menu('header-menu',__( 'Header Menu' ));

}

add_action( 'init', 'header_menu' );



function footer_menu() {

  register_nav_menu('footer-menu',__( 'Footer Menu' ));

}
add_action( 'init', 'footer_menu' );

//Define o tamanho do resumo/excerpt

function get_the_box_excerpt($n){

$excerpt = get_the_excerpt();

$excerpt = strip_shortcodes($excerpt);

$excerpt = strip_tags($excerpt);

$the_str = substr($excerpt, 0, $n);

return $the_str;

}

// Widget Sidebar

    register_sidebar(array(

        'name' => __( 'Widget 1', 'widget' ),

        'id' => '1-widget-area',

        'description' => __( '1 area de widget', 'widget' ),

        'before_widget' => '<div id="%1$s" class="%2$s sidebar-widget">',

        'after_widget' => '</div>',

        'before_title' => '<span class="title-widget">',

        'after_title' => '</span>',

    ));



        register_sidebar(array(

        'name' => __( 'Widget 2', 'widget' ),

        'id' => '2-widget-area',

        'description' => __( '2 area de widget' , 'widget'),

        'before_widget' => '<div id="%1$s" class="%2$s sidebar-widget">',

        'after_widget' => '</div>',

        'before_title' => '<span class="title-widget">',

        'after_title' => '</span>',

    ));



        register_sidebar(array(

        'name' => __( 'Widget 3', 'widget' ),

        'id' => '3-widget-area',

        'description' => __( '3 area de widget', 'widget' ),

        'before_widget' => '<div id="%1$s" class="%2$s sidebar-widget">',

        'after_widget' => '</div>',

        'before_title' => '<span class="title-widget">',

        'after_title' => '</span>',

    ));



        register_sidebar(array(

        'name' => __( 'Widget 4', 'widget' ),

        'id' => '4-widget-area',

        'description' => __( '4 area de widget' , 'widget'),

        'before_widget' => '<div id="%1$s" class="%2$s sidebar-widget">',

        'after_widget' => '</div>',

        'before_title' => '<strong class="title">',

        'after_title' => '</strong>',

    ));
//Mini Banner da Home
 register_sidebar(array(

        'name' => __( 'Mini Banner da Home', 'banner-home' ),

        'id' => 'mini-banner-home',

        'description' => __( 'Mini Banner da Home', 'widget' ),

        'before_widget' => '<div id="%1$s" class="%2$s sidebar-widget">',

        'after_widget' => '</div>',

        'before_title' => '<span class="title-widget">',

        'after_title' => '</span>',

    ));

    //sidebar Header
    register_sidebar(array(

        'name' => __( 'Header sidebar', 'widget' ),

        'id' => 'header-widget-area',

        'description' => __( '1° item do header', 'widget' ),

        'before_widget' => '<div id="%1$s" class="%2$s">',

        'after_widget' => '</div>',

        'before_title' => '<h2 class="title-widget">',

        'after_title' => '</h2>',

    ));

    register_sidebar(array(

        'name' => __( 'Header sidebar 2', 'widget' ),

        'id' => 'header-widget-area2',

        'description' => __( '2° item do header', 'widget' ),

        'before_widget' => '<div id="%1$s" class="%2$s">',

        'after_widget' => '</div>',

        'before_title' => '<h2 class="title-widget">',

        'after_title' => '</h2>',

    ));

    register_sidebar(array(

        'name' => __( 'Header sidebar 3', 'widget' ),

        'id' => 'header-widget-area3',

        'description' => __( '3° item do header', 'widget' ),

        'before_widget' => '<div id="%1$s" class="%2$s">',

        'after_widget' => '</div>',

        'before_title' => '<h2 class="title-widget">',

        'after_title' => '</h2>',

    ));

    register_sidebar(array(

        'name' => __( 'Header sidebar 4', 'widget' ),

        'id' => 'header-widget-area4',

        'description' => __( '4° item do header', 'widget' ),

        'before_widget' => '<div id="%1$s" class="%2$s">',

        'after_widget' => '</div>',

        'before_title' => '<h2 class="title-widget">',

        'after_title' => '</h2>',

    ));
//Paginação

function wordpress_pagination() {
            global $wp_query;
 
            $big = 999999999;
 
            echo paginate_links( array(
                  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                  'format' => '?paged=%#%',
                  'current' => max( 1, get_query_var('paged') ),
                  'total' => $wp_query->max_num_pages,

            ) );
      }


//Mostrar número de visualizações da postagem
function getPostViews($postID){
    $count_key = '_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = '_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// remove opções

//include_once ('functions/remove-admin.php');

// Admin Menu

require_once ('admin/index.php');

// shortcode grid

include_once('functions/grid.php');

include_once('functions/related_posts.php');

//breadcrumb
include_once('functions/breadcrumb.php');

//widget post recente
include_once('functions/widget_post_recente.php');

//widget post recente
include_once('functions/widget_image.php');

//widget post recente
include_once('functions/widget_txt.php');
// Add Shortcode
function posts_recentes_categoria( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'posts' => '5',
			'categoria' => '',
		), $atts )
	);

	// Code
$output = '<div class="col-12">
	            <ul class="cat-grid">';
$the_query = new WP_Query( array ( 'posts_per_page' => $posts, 'category_name' => $categoria ) );
while ( $the_query->have_posts() ):
	$the_query->the_post();
$link = get_the_permalink();
$content = get_the_box_excerpt('146'); //get_the_excerpt();
	$output .= '<li class="col-4 item"><div><figure class="thumbnail thumbnail__portfolio"> ' .get_the_post_thumbnail().'</figure><div class="container caption"> 
						<h2 class="title-destaque"><a href="' . $link . '">' . get_the_title() . '</a></h2><p class="txt-destaque">'.$content.'</p><a href="'.$link.' "class="saiba-mais">Saiba Mais!</a>
					</div> 

				</div>  
			</li>  
	';
//$output .= '<li class="col-4 item"><div><a href="'.$link.'" ><figure class="thumbnail thumbnail__portfolio">'.get_the_post_thumbnail().'</figure></a></div></li>';

	
	wp_reset_postdata();
	
endwhile;

$output .= '</ul>';
return $output;


}
add_shortcode( 'posts_recentes_categoria', 'posts_recentes_categoria' );

function custom_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' : ?>
            <li <?php comment_class('section'); ?> id="comment<?php comment_ID(); ?>">
                <div class="back-link">< ?php comment_author_link(); ?></div>
        <?php break;
        default : ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <article <?php comment_class(); ?> class="comment section">
                    <div class="comment-body col-2">
                        <div class="author vcard">
                            <?php echo get_avatar( $comment, 100 ); ?>
                        </div><!-- .vcard -->
                    </div><!-- comment-body -->

                    <footer class="comment-footer col-10">
                        <span class="author-name"><strong><?php comment_author(); ?></strong></span>
                        <?php comment_text(); ?>
                        <time <?php comment_time( 'c' ); ?> class="comment-time">
                            <span class="date"><?php comment_date(); ?></span>
                            <span class="time"><?php comment_time(); ?></span>
                        </time>
                        <div class="reply">
                            <?php 
                            comment_reply_link( array_merge( $args, array( 
                                'reply_text' => 'Responder',
                                'after' => ' <span></span>', 
                                'depth' => $depth,
                                'max_depth' => $args['max_depth'] 
                            ) ) ); ?>
                        </div><!-- .reply -->
                    </footer><!-- .comment-footer -->
                </article><!-- #comment-<?php comment_ID(); ?> -->
        <?php // End the default styling of comment
        break;
    endswitch;
}