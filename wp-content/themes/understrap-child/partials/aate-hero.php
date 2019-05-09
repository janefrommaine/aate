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
<div class="aate-hero-three mb-4" role="banner">
    <div class="container pt-7 pb-6">

        <div class="row">
            <div class="col-md" style="padding-bottom: 2rem; padding-top: 2rem;">

                <h1><?php the_title(); ?></h1>

                <?php if($intro): ?>
                    <p class="lead"><?php echo $intro ?></p>
                <?php endif; ?>

                <?php if($button_include == true): ?>
                    <a href="<?php echo $button_link; ?>" class="btn btn-outline-primary" title="<?php echo $button_title; ?>" <?php if($button_link_type == 'External'): ?>target="_blank"<?php endif; ?>><?php echo $button_text; ?></a>
                <?php endif; ?>
            </div>

            <?php if($image): ?>
                <div class="col-md">

                    <div class="skew-wrapper">
                        <div class="skew-3">
                            <div class="unskew-3" role="img"
                                    aria-label="<?php echo $image['alt']; ?>"
                                    title="<?php echo $image['title']; ?>" 
                                    style="background-image: url('<?php echo $image['url']; ?>');"></div>
                            <!--<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />-->
                        </div>
                    </div>

                </div>
            <?php endif; ?>
        </div>

    </div>
</div>
<!-- /Hero -->