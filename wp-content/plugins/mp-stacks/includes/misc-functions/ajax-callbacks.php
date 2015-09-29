<?php
/**
 * This file contains various functions
 *
 * @since 1.0.0
 *
 * @package    MP Stacks
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2015, Mint Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */

/**
 * Ajax callback for Create New Stack button
 *
 * @since    1.0.0
 * @link     http://codex.wordpress.org/Function_Reference/add_editor_style
 * @see      get_bloginfo()
 * @param    array $wp See link for description.
 * @return   void
 */
function mp_stacks_add_new_stack_ajax() {	

	//Check nonce
	if ( !check_ajax_referer( 'mp-stacks-nonce-action-name', 'mp_stacks_nonce', false ) ){
		echo __('Ajax Security Check', 'mp_stacks');
		die();
	}

	$new_stack_name = $_POST['mp_stacks_new_stack_name'];
	$mp_stacks_new_stack_source_type = $_POST['mp_stacks_new_stack_source_type'];
	$new_stack_duplicate_id = $_POST['mp_stacks_new_stack_duplicate_id'];
	$new_stack_template_slug = $_POST['mp_stacks_new_stack_template_slug'];

	if( !empty( $new_stack_name ) && current_user_can('edit_theme_options') ) {
		
		//If the user wants to duplicate an existing stack
		if ( $mp_stacks_new_stack_source_type == 'duplicate-stack-option' ){
			
			//Duplicate the stack id passed to ajax
			$new_stack_id = mp_stacks_duplicate_stack( $new_stack_duplicate_id, $new_stack_name );
			
		}
		//If the user want to make a stack from a template
		else if ( $mp_stacks_new_stack_source_type == 'template-stack-option' ){
			$new_stack_id = mp_stacks_create_stack_from_template( $new_stack_template_slug(), $new_stack_name );
		}
		//If the user wants to make a blank stack
		else{
			//Make new stack
			$new_stack_array = wp_insert_term(
				$new_stack_name, // the term 
				'mp_stacks' // the taxonomy
			);
			
			//If there was an error making the stack, echo that error
			if ( is_wp_error( $new_stack_array ) ){
				$error_string = $new_stack_array->get_error_message();
   				echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
				die();
			}
			
			$new_stack_id = $new_stack_array['term_id'];
		}
		
		//Get the updated Stacks Table
		$wp_list_table = _get_list_table('WP_Terms_List_Table', array( 'screen' => 'edit-mp_stacks' ) );
		
		ob_start();
		
		$wp_list_table->display_rows_or_placeholder();
		
		$updated_stacks_table = ob_get_clean();
		
		echo json_encode( array(
			'new_stack_id' => $new_stack_id,
			'updated_stacks_table' => $updated_stacks_table
		) );
			
	}

	die(); // this is required to return a proper result
	
}
add_action( 'wp_ajax_mp_stacks_make_new_stack', 'mp_stacks_add_new_stack_ajax' );

/**
 * Ajax callback for Dismissing the double click tip
 *
 * @since    1.0.0
 * @param    void
 * @return   void
 */
function mp_stacks_dismiss_double_click_tip() {	

	//Check nonce
	if ( !check_ajax_referer( 'mp-stacks-nonce-action-name', 'mp_stacks_nonce', false ) ){
		echo __('Ajax Security Check', 'mp_stacks');
		die();
	}

	 //Set the value of the user meta for this tip to be true - that it is dismissed
	 update_user_meta( get_current_user_id(), 'mp_stacks_dis_doubleclick_tip', true);
	 
	 die();
	
}
add_action( 'wp_ajax_mp_stacks_dismiss_double_click_tip', 'mp_stacks_dismiss_double_click_tip' );


/**
 * Ajax callback for links to Bricks in the TinyMCE Link Button
 *
 * @since    1.0.0
 * @param    void
 * @return   void
 */
function mp_stacks_link_to_bricks_ajax() {	

	//Check nonce
	if ( !check_ajax_referer( 'mp-stacks-nonce-action-name', 'mp_stacks_nonce', false ) ){
		echo __('Ajax Security Check', 'mp_stacks');
		die();
	}
	
	//If a stack id has been passed to the URL
	if ( isset( $_POST['mp_stack_id'] ) ){
				
		//Get all the brick titles in this stack
		$brick_titles_in_stack = mp_stacks_get_brick_titles_in_stack( $_POST['mp_stack_id'] );
		
	}
	else{
		
		$brick_titles_in_stack = array();
	}	
	
	ob_start(); 
	?>
	<p class="howto"><a href="#" id="wp-link-search-toggle"><?php echo __( 'Link to Bricks in this Stack', 'mp_stacks' ); ?></a></p>
    <div id="search-panel">
        <div id="most-recent-results" class="query-results" tabindex="0">
            <ul>
            	<?php
				foreach ( $brick_titles_in_stack as $brick_in_stack ){
					echo '<li class="mp-stacks-brick-url">' . $brick_in_stack . '</li>';
				}
				?>
            </ul>
        </div>
    </div>
    
	<?php
	
	echo json_encode( array( 'output' => ob_get_clean() ) ); 
	
	die();
	
}
add_action( 'wp_ajax_mp_stacks_link_to_bricks_ajax', 'mp_stacks_link_to_bricks_ajax' );