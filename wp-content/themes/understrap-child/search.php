<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php 
$page_title = 'Search';
$intro = sprintf(
    /* translators: %s: query term */
    esc_html__( 'Search Results for: %s', 'understrap' ),
    '<span>' . get_search_query() . '</span>'
);
include( locate_template( 'partials/aate-hero.php', false, false ) ); 
?>

<main class="site-main <?php echo esc_attr( $container ); ?>" id="main-content" role="main">
    <div class="row">

	    <div class="col-md-12 content-area" id="primary">    

                <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php
                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part( 'loop-templates/content', 'search' );
                        ?>

                    <?php endwhile; ?>

                <?php else : ?>

                    <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                <?php endif; ?>
        </div>

    </div>        
</main><!-- #main -->

<!-- The pagination component -->
<?php understrap_pagination(); ?>


<?php get_footer(); ?>