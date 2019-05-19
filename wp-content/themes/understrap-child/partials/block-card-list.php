<?php
/**
 * Feature box list / Card list block
 *
 * @package      ClientName
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/*
$name = get_field( 'name' );
$title = get_field( 'title' );
$photo = get_field( 'photo' );
$description = get_field( 'description' );

echo '<div class="team-member">';
	echo '<div class="team-member--header">';
		if( !empty( $photo ) )
			echo wp_get_attachment_image( $photo['ID'], 'thumbnail', null, array( 'class' => 'team-member--avatar' ) );
		if( !empty( $name ) )
			echo '<h4>' . esc_html( $name ) . '</h4>';
		if( !empty( $title ) )
			echo '<h6 class="alt">' . esc_html( $title ) . '</h6>';
	echo '</div>';
	echo '<div class="team-member--content">' . apply_filters( 'ea_the_content', $description ) . '</div>';
echo '</div>';
*/



$title = get_field( 'card_list_title' );
?>
<!-- Feature box list -->
<section class="container pt-5 pb-5 text-center">
    <h3><?php echo $title ?></h3>
    <!-- Loop through feature boxes -->
    <?php if( have_rows('card_list') ): ?>
        <div class="card-deck">

        <?php while ( have_rows('card_list') ) : the_row(); ?>
            <?php 
                $card_title = get_sub_field('card_title'); 
                $card_text = get_sub_field('card_text');
                $image = get_sub_field('card_image');
                $button_link_type = get_sub_field('card_button_link_type');
                $button_link_url = get_sub_field('card_button_link_url');
                $button_link = ($button_link_type == 'External') ? $button_link_url : get_permalink($button_link_url);
                $button_include = get_sub_field('card_include_cta');
                $button_text = get_sub_field('card_button_link_text');
                $button_link_title = get_sub_field('card_button_link_title');
            ?>
            <div class="card">
                <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $card_title ?></h5>
                    <p class="card-text"><?php echo $card_text ?></p>
                    <?php if($button_include == true): ?>
                        <a href="<?php echo $button_link; ?>" class="btn btn-primary" title="<?php echo $button_title; ?>" <?php if($button_link_type == 'External'): ?>target="_blank"<?php endif; ?>><?php echo $button_text; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>

        </div>
    <?php endif; ?>    
    <!-- /Loop through feature boxes -->
</section>
<!-- /Feature box list -->
