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
        'top-menu' => __( 'Top Menu' ),
        'footer-menu' => __( 'Footer Menu' ),
      )
    );
  }
  add_action( 'init', 'register_menus' );