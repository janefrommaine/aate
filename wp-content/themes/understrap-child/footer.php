<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
$footer_logo = get_theme_mod( 'understrap_footer_logo' );
$footer_text = get_theme_mod( 'understrap_footer_text' );
?>

<?php get_template_part( 'partials/aate', 'footer-cta' ); ?>
<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<footer class="aate-footer">
    <div class="container">

        <div class="row">
            <div class="col-md-2">
				<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
					<img class="aate-footer_logo" src="<?php echo $footer_logo ?>">
				</a>	
            </div>
            <div class="col-md-10">
				<nav class="navbar navbar-expand-md navbar-dark">
					<!-- The Footer Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'footer-menu',
							'container_class' => 'aate-footer-menu',
							'container_id'    => '',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'footer-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				</nav>
            </div>
        </div><!-- row end -->
		
        <div class="row aate-footer_bottom">
			<div class="col-md-6">
				<?php aate_footer_social_links(); ?>
			</div>
            <div class="col-md-6 text-right">
                <p>
					<?php echo $footer_text ?>
                </p>
            </div>
        </div><!-- row end -->

    </div><!-- container end -->
</footer>

<?php wp_footer(); ?>

</body>

</html>

