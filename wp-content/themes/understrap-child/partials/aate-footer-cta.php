<?php
/*
 * The partial for the hero component & ACF field group
 */

$footer_title = isset($footer_title) ? $footer_title : get_field('footer_cta_title');
$footer_body = isset($footer_body) ? $footer_body : get_field('footer_cta_body');
$button_link_type = get_field('footer_cta_button_link_type');
$button_link = get_field('footer_cta_button_link_url');
$button_include = get_field('footer_cta_include_cta');
$button_text = get_field('footer_cta_button_link_text');
$button_link_title = get_field('footer_cta_button_link_title');

?>
<!-- Footer CTA -->
<section class="jumbotron aate-footer-cta text-center"
    style="background-color:#3CA8A5; font-size: 1.75rem; padding: 2rem 1rem;">
    <div class="container">
        <?php if($footer_title): ?>
            <h3><?php echo $footer_title ?></h3>
        <?php endif; ?>
        <?php if($footer_body): ?>
            <p><?php echo $footer_body ?></p>
        <?php endif; ?>
        <?php if($button_include == true): ?>
            <a href="<?php echo $button_link; ?>" class="btn btn-outline-dark" title="<?php echo $button_title; ?>" <?php if($button_link_type == 'External'): ?>target="_blank"<?php endif; ?>><?php echo $button_text; ?></a>
        <?php endif; ?>
    </div>
</section>
<!-- /Footer CTA -->