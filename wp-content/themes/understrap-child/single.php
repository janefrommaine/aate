<?php
/**
 * The template for displaying all single posts.
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

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>

					<?php understrap_post_nav(); ?>

					<?php endwhile; // end of the loop. ?>
			</div><!-- #primary -->

	</div><!-- .row end -->
</main><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>

