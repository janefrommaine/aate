<?php
/**
 * Understrap Theme Settings
 * Extending/Overriding functions from understrap/inc/theme-settings.php
 * Check and setup theme's default settings
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'understrap_setup_theme_default_settings' ) ) {
	function understrap_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$understrap_posts_index_style = get_theme_mod( 'understrap_posts_index_style' );
		if ( '' == $understrap_posts_index_style ) {
			set_theme_mod( 'understrap_posts_index_style', 'default' );
		}

		// Sidebar position.
		$understrap_sidebar_position = get_theme_mod( 'understrap_sidebar_position' );
		if ( '' == $understrap_sidebar_position ) {
			set_theme_mod( 'understrap_sidebar_position', 'right' );
		}

		// Container width.
		$understrap_container_type = get_theme_mod( 'understrap_container_type' );
		if ( '' == $understrap_container_type ) {
			set_theme_mod( 'understrap_container_type', 'container' );
		}

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'understrap' ),
					'shortName' => __( 'S', 'understrap' ),
					'size'      => 13,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'understrap' ),
					'shortName' => __( 'M', 'understrap' ),
					'size'      => 16,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'understrap' ),
					'shortName' => __( 'L', 'understrap' ),
					'size'      => 24,
					'slug'      => 'large',
				)
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Blue', 'understrap' ),
					'slug'  => 'blue',
					'color' => '#3d79a8',
				),
				array(
					'name'  => __( 'Teal', 'understrap' ),
					'slug'  => 'teal',
					'color' => '#3CA8A5',
				),
				array(
					'name'  => __( 'Dark Teal', 'understrap' ),
					'slug'  => 'dark-teal',
					'color' => '#2B7875',
				),
				array(
					'name'  => __( 'Dark Gray', 'understrap' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'understrap' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'understrap' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);
	}
}

/**
* Remove page templates inherited from the parent theme (understrap/page-templates).
*
* @param array $page_templates List of currently active page templates.
*
* @return array Modified list of page templates.
*/
function understrap_remove_page_template( $page_templates ) {
	unset( $page_templates['page-templates/blank.php'] );
	unset( $page_templates['page-templates/both-sidebarspage.php'] );
	unset( $page_templates['page-templates/empty.php'] );
	unset( $page_templates['page-templates/left-sidebarpage.php'] );
	unset( $page_templates['page-templates/right-sidebarpage.php'] );
	return $page_templates;
}
add_filter( 'theme_page_templates', 'understrap_remove_page_template' );

function understrap_change_logo_class( $html ) {
	// if we need to add the site name back to the logo
	/*
	$site_name = get_bloginfo( 'name', 'display' );
	$replacement_html = $site_name . '</a>';
	$html = str_replace( '</a>', $replacement_html, $html );
	*/

	$html = str_replace( 'class="custom-logo"', 'class="img-fluid"', $html );
	$html = str_replace( 'class="custom-logo-link"', 'class="navbar-brand custom-logo-link"', $html );
	$html = str_replace( 'alt=""', 'title="Home" alt="logo"', $html );	

    return $html;
}
add_filter( 'get_custom_logo', 'understrap_change_logo_class' );
