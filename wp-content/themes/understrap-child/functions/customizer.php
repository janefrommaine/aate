<?php
/**
 * Understrap Theme Customizer
 * Extending/Overriding functions from understrap/inc/customizer.php
 *
 * @package understrap
 */

 function understrap_theme_customize_register($wp_customize) {

    /* Footer logo */
    $wp_customize->add_setting('understrap_footer_logo');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'understrap_footer_logo', array(
        'label' => __( 'Upload Footer Logo', 'understrap' ),
        'description' => __( 'Upload a logo that will appear in the footer area', 'understrap' ),
        'section' => 'title_tagline', //this is the section where the footer-logo from WordPress is
        'settings' => 'understrap_footer_logo',
        'priority' => 8 // show it just below the custom-logo
    )));

    /* Footer Text */
    $wp_customize->add_setting('understrap_footer_text', array(
        'capability' => 'edit_theme_options',
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
      ));

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'understrap_footer_text',
            array(
                'label'       => __( 'Footer Text', 'understrap' ),
                'description' => __( 'Enter an address or other text in the footer area', 'understrap' ),
                'section'     => 'title_tagline',
                'settings'    => 'understrap_footer_text',
                'type'        => 'textarea',
                'priority'    => '10',
            )
        )
    );    
}

add_action('customize_register', 'understrap_theme_customize_register');