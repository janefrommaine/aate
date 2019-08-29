<?php
/**
 * Template Name: AATE: Memberpress Account Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<?php get_template_part( 'partials/aate', 'hero' ); ?>
<main class="site-main <?php echo esc_attr( $container ); ?>" id="main-content" role="main">
	    <?php while ( have_posts() ) : the_post(); ?>

		    <?php get_template_part( 'loop-templates/aate-account', 'page' ); ?>

	    <?php endwhile; // end of the loop. ?>
</main><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
