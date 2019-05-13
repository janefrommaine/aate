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

<!--
    <button class="btn d-lg-none" type="button" data-toggle="collapse" data-target="#example-collapse">
        <span class="navbar-light"><span class="navbar-toggler-icon"></span></span>
    </button>
-->

<button class="btn d-lg-none" type="button" data-toggle="collapse" data-target="#mepr-account-nav" style="background:red;">
    See Sub Nav
</button>
<div <?php post_class('row'); ?> id="post-<?php the_ID(); ?>">
    <?php the_content(); ?>
</div><!-- .row #post-## -->