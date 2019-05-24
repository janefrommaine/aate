<?php
/*
 * The partial for the featured members component & ACF field group
 */

$fm_title = isset($fm_title) ? $fm_title : get_field('featured_members_title');
$fm_body = isset($fm_body) ? $fm_body : get_field('featured_members_body');
$button_link_type = get_field('featured_members_button_link_type');
$button_link = get_field('featured_members_button_link_url');
$button_include = get_field('featured_members_include_cta');
$button_text = get_field('featured_members_button_link_text');
$button_link_title = get_field('featured_members_button_link_title');

?>
<?php if($fm_title): ?>
    <!-- Featured Members -->
    <section class="aate-featured-members">
        <div class="container">
            <?php if($fm_title): ?>
                <h3><?php echo $fm_title ?></h3>
            <?php endif; ?>

            <?php if($fm_body): ?>
                <?php echo $fm_body ?>
            <?php endif; ?>

            <?php if( have_rows('featured_member_logo_list') ): ?>
                <div class="aate-featured-members_logos mb-4">
                    <?php while ( have_rows('featured_member_logo_list') ) : the_row(); 
                        $logo = get_sub_field('featured_member_logo');
                    ?>
                        <?php echo wp_get_attachment_image( $logo, 'full' ); ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?> 

            <?php if($button_include == true): ?>
                <a href="<?php echo $button_link; ?>" class="btn btn-outline-light" title="<?php echo $button_title; ?>" <?php if($button_link_type == 'External'): ?>target="_blank"<?php endif; ?>><?php echo $button_text; ?></a>
            <?php endif; ?>
        </div>
    </section>
    <!-- /Featured Members -->
<?php endif; ?>