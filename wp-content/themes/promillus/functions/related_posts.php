<?php
// Add Shortcode
function recent_posts_shortcode( $atts , $content = null ) {

    // Attributes
    extract( shortcode_atts(
        array(
            'posts' => '5',
        ), $atts )
    );

    // Code
$output = '<ul>';
$the_query = new WP_Query( array ( 'posts_per_page' => $posts ) );
while ( $the_query->have_posts() ):
    $the_query->the_post();
    $output = '<li>' . get_the_title() . '</li>';
endwhile;
wp_reset_postdata();
$output = '</ul>';
return $output;

}
add_shortcode( 'recent-posts', 'recent_posts_shortcode' );


?>