<?php
/**
 * Register Blocks
 * @see https://www.billerickson.net/building-gutenberg-block-acf/#register-block
 *
 */
function understrap_register_blocks() {
	
	if( ! function_exists( 'acf_register_block_type' ) )
        return;

    // Feature Box List / Card List
	acf_register_block_type( array(
		'name'			=> 'card-list',
		'title'			=> __( 'Feature Box List', 'aate' ),
		'render_template'	=> 'partials/block-card-list.php',
		'category'		=> 'formatting',
		'icon'			=> 'id-alt',
		'mode'			=> 'auto',
		'keywords'		=> array( 'feature', 'card', 'box' )
	));
}
add_action('acf/init', 'understrap_register_blocks' );