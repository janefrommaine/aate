<?php
/**
 * Partial template for account content in page.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<button class="aate-account-nav-btn btn btn-link d-lg-none" type="button" data-toggle="collapse" data-target="#mepr-account-nav">
In this Section
</button>
<div <?php post_class('row'); ?> id="post-<?php the_ID(); ?>">
    <?php the_content(); ?>
</div><!-- .row #post-## -->
