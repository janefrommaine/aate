<?php
/*
 * The partial for the hero component & ACF field group
 */

$intro = isset($intro) ? $intro : get_field('hero_intro');
$image = get_field('hero_image');
$button_link_type = get_field('hero_button_link_type');
$button_link = get_field('hero_button_link_url');
$button_include = get_field('hero_include_cta');
$button_text = get_field('hero_button_link_text');
$button_link_title = get_field('hero_button_link_title');

?>
<!-- Hero -->
<section class="aate-hero" role="banner">
    <div class="container">
        <div class="row">

            <?php if($image): ?>
                <div class="aate-hero_image">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" >
                </div>
                <div class="col-md-6">
            <?php else : ?>
                <div class="col-md-10">
            <?php endif; ?>
            
                <h1><?php the_title(); ?></h1>
                <?php if($intro): ?>
                    <p class="lead"><?php echo $intro ?></p>
                <?php endif; ?>
                <?php if($button_include == true): ?>
                    <a href="<?php echo $button_link; ?>" class="btn btn-outline-dark" title="<?php echo $button_title; ?>" <?php if($button_link_type == 'External'): ?>target="_blank"<?php endif; ?>><?php echo $button_text; ?></a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<!-- /Hero -->