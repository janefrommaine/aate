<?php
/**
 * Template Name: AATE: Job Listings Page
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
    <div class="row">
        <div class="col-md-12 content-area" id="primary">
		    <?php while ( have_posts() ) : the_post(); ?>

			    <?php get_template_part( 'loop-templates/content', 'page' ); ?>

		    <?php endwhile; // end of the loop. ?>
        </div><!-- #primary -->

	</div><!-- .row end -->
</main><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
