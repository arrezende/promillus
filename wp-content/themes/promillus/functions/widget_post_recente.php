<?php
/**
 * Widget de Sobre o Autor
 *
 * @author Thiago Belem <contato@thiagobelem.net>
 * @link http://blog.thiagobelem.net/criando-seu-primeiro-widget-no-wordpress/
 */
class widget_recent_post extends WP_Widget { 
    /**
     * Construtor
     */
    public function widget_recent_post() { parent::WP_Widget(false, $name = 'Tópicos Recentes'); }
     
    /**
     * Exibição final do Widget (já no sidebar)
     *
     * @param array $argumentos Argumentos passados para o widget
     * @param array $instancia Instância do widget
     */
    public function widget($argumentos, $instancia) {
        
        function get_widget_excerpt(){

        $excerpt = get_the_content();
        
        $excerpt = strip_shortcodes($excerpt);
        
        $excerpt = strip_tags($excerpt);
        
        $the_str = substr($excerpt, 0, 90);
        
        echo $the_str;
        
        }
        
        
        
        if (!is_single()) return;
        $autor = array(
            'nome' => get_the_author_meta('display_name'),
            'email' => get_the_author_meta('user_email'),
            'descricao' => get_the_author_meta('description'),
            'link' => get_the_author_meta('user_url')
        );
        
        // Exibe o HTML do Widget
        echo $argumentos['before_widget'];
        echo $argumentos['before_title'] . $argumentos['widget_name'] . $argumentos['after_title'];
        /*echo get_avatar($autor['email'], $size = '59');
        echo "<h4>{$autor['nome']}</h4>";
        echo "<p>{$autor['descricao']}</p>";
        if (isset($instancia['link_autor']) && $instancia['link_autor']) {
            echo '<p>Visite o <a href="'. $autor['link'] .'" title="'. $autor['nome'] .'" rel="nofollow" target="_blank">site do autor</a></p>';
        }
        echo $argumentos['after_widget'];*/
        
        ?>
       
        <?php
             $args = array(
                	'orderby' => 'ID',
                	'order'   => 'DESC',
                	'posts_per_page' => 2,
                	'ignore_sticky_posts' => true
                );
                           
            $aRecentPosts = new WP_Query($args); // 2 é o número de posts recentes que você deseja mostrar
            $sticky=get_option('sticky_posts') ;
		    $lastposts = get_posts('p='.$sticky[0]);
            while($aRecentPosts->have_posts()) : $aRecentPosts->the_post();?>
            
            <ul class="section">
                <li class="col-6"><?php the_post_thumbnail() ?></li>
                <li class="col-6 txt-width">
                    <div class="section">
                        <a href="<?php the_permalink() ?>" title="Link para <?php the_title(); ?> " class="col-12 title-destaque"><?php the_title();?></a>
                        <a href="<?php the_permalink() ?>" title="Link para <?php the_title(); ?> " class="col-12 txt-destaque"><?php get_widget_excerpt();?></a>
                        <a href="<?php the_permalink(); ?>" class="saiba-mais">Saiba Mais!</a>
                    </div>
                </li>
            </ul>
            <?php wp_reset_query(); endwhile; ?>
        
        
        <?php
        echo $argumentos['after_widget'];

    }

     
    /**
     * Salva os dados do widget no banco de dados
     *
     * @param array $nova_instancia Os novos dados do widget (a serem salvos)
     * @param array $instancia_antiga Os dados antigos do widget
     * 
     * @return array $instancia Dados atualizados a serem salvos no banco de dados
     */
    public function update($nova_instancia, $instancia_antiga) {
        $instancia = array_merge($instancia_antiga, $nova_instancia);
         
        return $instancia;
    }

     
    /**
     * Formulário para os dados do widget (exibido no painel de controle)
     *
     * @param array $instancia Instância do widget
     */
    public function form($instancia) {
    $widget['link_autor'] = (boolean)$instancia['link_autor'];
    ?>
    <p><label for="<?php echo $this->get_field_id('link_autor'); ?>"><input id="<?php echo $this->get_field_id('link_autor'); ?>" name="<?php echo $this->get_field_name('link_autor'); ?>" type="checkbox" value="1" <?php if ($widget['link_autor']) echo 'checked="checked"'; ?> /> <?php _e('Exibe o link do autor'); ?></label></p>
    <?php   
    }

    
}

add_action('widgets_init', create_function('', 'return register_widget("widget_recent_post");'));
?>
