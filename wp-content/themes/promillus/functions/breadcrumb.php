<?php function breadcrumb() {

$separador = '</li><li>/</li><li>';
$inicio = 'Início'; // Texto para o link de Início
$antes = '<strong>';
$depois = '</strong>';

if ( !is_home() && !is_front_page() || is_paged() ) {

    echo '<ul class="breadcrumb">';

    global $post;
    $linkInicio = get_bloginfo('url');

    echo '<li> ' . $inicio . ' ' . $separador . ' ';

    if ( is_category() ) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $categoriaMae = get_category($thisCat->parent);
        if ($thisCat->parent != 0) echo(get_category_parents($categoriaMae, TRUE, ' ' . $separador . ' '));
        echo $antes . 'Artigos da Categoria "' . single_cat_title('', false) . '"' . $depois;

    } elseif ( is_day() ) {
echo '' . get_the_time('Y') . ' ' . $separador . ' ';
echo '' . get_the_time('F') . ' ' . $separador . ' ';
echo $antes . get_the_time('d') . $depois;

} elseif ( is_month() ) {
echo '' . get_the_time('Y') . ' ' . $separador . ' ';
echo $antes . get_the_time('F') . $depois;

} elseif ( is_year() ) {
echo $antes . get_the_time('Y') . $depois;

} elseif ( is_single() && !is_attachment() ) {
if ( get_post_type() != 'post' ) {
$post_type = get_post_type_object(get_post_type());
$slug = $post_type->rewrite;
echo '' . $post_type->labels->singular_name . ' ' . $separador . ' ';
echo $antes . get_the_title() . $depois;
} else {
$cat = get_the_category(); $cat = $cat[0];
echo get_category_parents($cat, TRUE, ' ' . $separador . ' ');
echo $antes . get_the_title() . $depois;
}

} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
$post_type = get_post_type_object(get_post_type());
echo $antes . $post_type->labels->singular_name . $depois;

} elseif ( is_attachment() ) {
$parent = get_post($post->post_parent);
$cat = get_the_category($parent->ID); $cat = $cat[0];
echo is_wp_error( $cat_parents = get_category_parents($cat, TRUE, '' . $delimiter . '') ) ? '' : $cat_parents;
echo '' . $parent->post_title . ' ' . $separador . ' ';
echo $antes . get_the_title() . $depois;

} elseif ( is_page() && !$post->post_parent ) {
echo $antes . get_the_title() . $depois;

} elseif ( is_page() && $post->post_parent ) {
$parent_id = $post->post_parent;
$breadcrumbs = array();
while ($parent_id) {
$page = get_page($parent_id);
$breadcrumbs[] = '' . get_the_title($page->ID) . '';
$parent_id = $page->post_parent;
}
$breadcrumbs = array_reverse($breadcrumbs);
foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $separador . ' ';
echo $antes . get_the_title() . $depois;

} elseif ( is_search() ) {
echo $antes . 'Pesquisa pelo termo ' . get_search_query() . '' . $depois;

} elseif ( is_tag() ) {
echo $antes . 'Artigos com a etiqueta ' . single_tag_title('', false) . '' . $depois;

} elseif ( is_author() ) {
global $author;
$userdata = get_userdata($author);
echo $antes . 'Artigos publicados por ' . $userdata->display_name . $depois;

} elseif ( is_404() ) {
echo $antes . 'Página não encontrada!' . $depois;
}

if ( get_query_var('paged') ) {
if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
echo __('Page') . ' ' . get_query_var('paged');
if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
}

echo '</ul>';

}
}?>