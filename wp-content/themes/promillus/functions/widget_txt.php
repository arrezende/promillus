<?php
/**
 * Widget de Sobre o Autor
 *
 * @author Thiago Belem <contato@thiagobelem.net>
 * @link http://blog.thiagobelem.net/criando-seu-primeiro-widget-no-wordpress/
 */
class widget_txt extends WP_Widget { 
    /**
     * Construtor
     */
    public function widget_txt() { parent::WP_Widget(false, $name = 'Texto Categorias -  Header'); }
     
    /**
     * Exibição final do Widget (já no sidebar)
     *
     * @param array $argumentos Argumentos passados para o widget
     * @param array $txt Instância do widget
     */
    public function widget($argumentos, $txt) {
         // Exibe o HTML do Widget
        echo $argumentos['before_widget'];
        echo $argumentos['before_title'] . '<a href="' . $txt['link'] .'">' . $txt['titulo'] . '</a>' . $argumentos['after_title'];

        ?>
        <div class="textwidget">
        <?php echo $txt['txt'];?>
        </div>    
        
        
        <?php
        echo $argumentos['after_widget'];

    }

     
    /**
     * Salva os dados do widget no banco de dados
     *
     * @param array $nova_instancia Os novos dados do widget (a serem salvos)
     * @param array $txt_antiga Os dados antigos do widget
     * 
     * @return array $instancia Dados atualizados a serem salvos no banco de dados
     */
    public function update($nova_instancia, $instancia_antiga) {
        $txt = array_merge($instancia_antiga, $nova_instancia);
         
        return $txt;
        
    }

     
    /**
     * Formulário para os dados do widget (exibido no painel de controle)
     *
     * @param array $instancia Instância do widget
     */
    public function form($txt) {
        $widget_txt['link'] = (boolean)$txt['link'];
         $widget_txt['txt'] = (boolean)$txt['txt'];
         $widget_txt['titulo'] = (boolean)$txt['titulo'];
        ?>
        Título: <br>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id('titulo'); ?>" name="<?php echo $this->get_field_name('titulo'); ?>" value="<?php echo $txt['titulo']?>" />
        <br>Descrição: <br>
        <textarea class="widefat" rows="16" cols="20" name="<?php echo $this->get_field_name('txt'); ?>"/><?php echo $txt['txt']?></textarea>
       <br> Link: <br>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" value="<?php echo $txt['link']?>" />
     <?php 
    }

    
}

add_action('widgets_init', create_function('', 'return register_widget("widget_txt");'));
?>
