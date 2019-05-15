<?php
/**
 * Understrap Menu
 * Extending/Overriding functions from understrap/inc/class-wp-bootstrap-navwalker.php
 *
 * @package understrap
 */

function register_menus() {
    register_nav_menus(
      array(
        'top-menu' => __( 'Top Menu', 'understrap' ),
        'footer-menu' => __( 'Footer Menu', 'understrap' ),
        'social-menu' => __( 'Social Menu', 'understrap' ),
      )
    );
  }
  add_action( 'init', 'register_menus' );

  // The Footer Menu - Social Media
function aate_footer_social_links() {
  wp_nav_menu(array(
      'container_class' => 'aate-footer_social-list',
      'container' 		    => 'nav',
      'menu_class' => '',                             // Adding custom nav class
      'theme_location' => 'social-menu',           // Where it's located in the theme
      'depth' => 0,                                   // Limit the depth of the nav
      'fallback_cb' => '',                           // Fallback function
      'link_before'    => '<span class="sr-only">',
      'link_after'    => '</span>',
  ));
} /* End Footer Menu */

/**
 * Detects the social network from a URL and returns the SVG code for its icon.
 */
function understrap_get_social_link_svg( $uri, $size = 24 ) {
	return Understrap_SVG_Icons::get_social_link_svg( $uri, $size );
}

/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function understrap_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social-menu' === $args->theme_location ) {
		$svg = understrap_get_social_link_svg( $item->url, 26 );
		if ( empty( $svg ) ) {
      //$svg = twentynineteen_get_icon_svg( 'link' );
      $svg = '';
		}
		$item_output = str_replace( $args->link_after, '</span>' . $svg, $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'understrap_nav_menu_social_icons', 10, 4 );

class Understrap_SVG_Icons {

	/**
	 * Gets the SVG code for a given icon.
	 */
	public static function get_svg( $group, $icon, $size ) {
		if ( 'ui' == $group ) {
			$arr = self::$ui_icons;
		} elseif ( 'social' == $group ) {
			$arr = self::$social_icons;
		} else {
			$arr = array();
		}
		if ( array_key_exists( $icon, $arr ) ) {
			$repl = sprintf( '<svg class="svg-icon" width="%d" height="%d" aria-hidden="true" role="img" focusable="false" ', $size, $size );
			$svg  = preg_replace( '/^<svg /', $repl, trim( $arr[ $icon ] ) ); // Add extra attributes to SVG code.
			$svg  = preg_replace( "/([\n\t]+)/", ' ', $svg ); // Remove newlines & tabs.
			$svg  = preg_replace( '/>\s*</', '><', $svg ); // Remove white space between SVG tags.
			return $svg;
		}
		return null;
	}

	/**
	 * Detects the social network from a URL and returns the SVG code for its icon.
	 */
	public static function get_social_link_svg( $uri, $size ) {
		static $regex_map; // Only compute regex map once, for performance.
		if ( ! isset( $regex_map ) ) {
			$regex_map = array();
			$map       = &self::$social_icons_map; // Use reference instead of copy, to save memory.
			foreach ( array_keys( self::$social_icons ) as $icon ) {
				$domains            = array_key_exists( $icon, $map ) ? $map[ $icon ] : array( sprintf( '%s.com', $icon ) );
				$domains            = array_map( 'trim', $domains ); // Remove leading/trailing spaces, to prevent regex from failing to match.
				$domains            = array_map( 'preg_quote', $domains );
				$regex_map[ $icon ] = sprintf( '/(%s)/i', implode( '|', $domains ) );
			}
		}
		foreach ( $regex_map as $icon => $regex ) {
			if ( preg_match( $regex, $uri ) ) {
				return self::get_svg( 'social', $icon, $size );
			}
		}
		return null;
	}  

	/**
	 * Social Icons – domain mappings.
	 *
	 * By default, each Icon ID is matched against a .com TLD. To override this behavior,
	 * specify all the domains it covers (including the .com TLD too, if applicable).
	 *
	 * @var array
	 */
	static $social_icons_map = array(
		'amazon'      => array(
			'amazon.com',
			'amazon.cn',
			'amazon.in',
			'amazon.fr',
			'amazon.de',
			'amazon.it',
			'amazon.nl',
			'amazon.es',
			'amazon.co',
			'amazon.ca',
		),
		'facebook'    => array(
			'facebook.com',
			'fb.me',
		),
		'feed'        => array(
			'feed',
		),
		'google-plus' => array(
			'plus.google.com',
		),
  );
  
  	/**
	 * Social Icons – svg sources.
	 *
	 * @var array
	 */
	static $social_icons = array(
    'facebook'    => '<i class="fa fa-facebook-square"></i>',
    'google-plus' => '<i class="fa fa-google-plus-square"></i>',
		'google'      => '<i class="fa fa-google"></i>',
		'instagram'   => '<i class="fa fa-instagram" aria-hidden="true"></i>',
		'linkedin'    => '<i class="fa fa-linkedin-square"></i>',
		'pinterest'   => '<i class="fa fa-pinterest-square"></i>',
		'snapchat'    => '<i class="fa fa-snapchat-square"></i>',
		'tumblr'      => '<i class="fa fa-tumblr-square"></i>',
		'twitter'     => '<i class="fa fa-twitter-square"></i>',
		'vimeo'       => '<i class="fab fa-vimeo-square"></i>',
		'youtube'     => '<i class="fa fa-youtube"></i>',
  );
}