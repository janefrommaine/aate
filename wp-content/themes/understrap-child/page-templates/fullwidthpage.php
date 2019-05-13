<?php
/**
 * Template Name: AATE: Full Width Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<?php get_template_part( 'partials/aate', 'hero' ); ?>
<main class="site-main <?php echo esc_attr( $container ); ?>" id="main-content" role="main">
    <div class="row">

			<div class="col-md-12 content-area" id="primary">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>
			</div><!-- #primary -->

	</div><!-- .row end -->
</main><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
