<?php // ----------------------------------
// - REMOVER itens do menu de navegação à esquerda -
// ----------------------------------
 
function pc_remove_links_menu() {
 
     global $menu;
 
     remove_menu_page ('upload.php'); // Mídia
     remove_menu_page ('link-manager.php'); // Links Permanentes
     remove_menu_page ('options-general.php');  // Configurações
     remove_menu_page ('tools.php');  // Ferramentas
}
 
add_action ('admin_menu', 'pc_remove_links_menu');

// ----------------------------
// --  REMOVER ITENS SUB MENUS  --
// ----------------------------
 
function pc_remove_submenus() {
 
  global $submenu;
 
  unset($submenu['themes.php'][5]); // Remove 'Temas'.
  unset($submenu['options-general.php'][15]); // Remove 'Escrita'.
  unset($submenu['options-general.php'][25]); // Remove 'Discussão'.
  unset($submenu['tools.php'][5]); // Remove 'Disponíveis'.
  unset($submenu['tools.php'][10]); // Remove 'Importar'.
  unset($submenu['tools.php'][15]); // Remove 'Exportar'.
}
 
add_action( 'admin_menu', 'pc_remove_submenus' );
 
// Remove Link Aparência > Editor 
 
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
 
add_action('_admin_menu', 'remove_editor_menu', 1);
 
// Remove Link Plugin > Editor
 
function pc_remove_plugin_editor() {
  remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
 
add_action('admin_init', 'pc_remove_plugin_editor'); ?>