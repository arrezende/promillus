<?php
/**
 * Widget de Sobre o Autor
 *
 * @author Thiago Belem <contato@thiagobelem.net>
 * @link http://blog.thiagobelem.net/criando-seu-primeiro-widget-no-wordpress/
 */
class widget_image extends WP_Widget { 
    /**
     * Construtor
     */
    public function widget_image() { parent::WP_Widget(false, $name = 'Imagem'); }
     
    /**
     * Exibição final do Widget (já no sidebar)
     *
     * @param array $argumentos Argumentos passados para o widget
     * @param array $link Instância do widget
     */
    public function widget($argumentos, $link) {
         // Exibe o HTML do Widget
        echo $argumentos['before_widget'];
        echo $argumentos['before_title'] . $argumentos['after_title'];

        ?>
       
      <a href="<?php echo $link['link_url'];?>" ><img src="<?php echo $link['link_img'];?>" /></a>
            
        
        
        <?php
        echo $argumentos['after_widget'];

    }

     
    /**
     * Salva os dados do widget no banco de dados
     *
     * @param array $nova_instancia Os novos dados do widget (a serem salvos)
     * @param array $link_antiga Os dados antigos do widget
     * 
     * @return array $instancia Dados atualizados a serem salvos no banco de dados
     */
    public function update($nova_instancia, $instancia_antiga) {
        $link = array_merge($instancia_antiga, $nova_instancia);
         
        return $link;
    }

     
    /**
     * Formulário para os dados do widget (exibido no painel de controle)
     *
     * @param array $instancia Instância do widget
     */
    public function form($link) {
         $widget['link_img'] = (boolean)$link['link_img'];
         $widget['link_url'] = (boolean)$link['link_url'];
        ?>
        Título: <br>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id('link_img'); ?>" name="<?php echo $this->get_field_name('link_img'); ?>" value="<?php echo $link['link_img']?>" />
        <br> Link: <br>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id('link_url'); ?>" name="<?php echo $this->get_field_name('link_url'); ?>" value="<?php echo $link['link_url']?>" />

     <?php 
    }

    
}

add_action('widgets_init', create_function('', 'return register_widget("widget_image");'));
?>
