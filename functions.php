<?php

function add_css() {
    wp_enqueue_style('font-awe', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css');
	wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper@7/swiper-bundle.min.css');	
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@100&display=swap');

	wp_enqueue_style('cg-css', get_stylesheet_directory_uri().'/css/cg.css');
	wp_enqueue_style('cg-card', get_stylesheet_directory_uri().'/css/cg-card.css');
    wp_enqueue_style('cg-projects', get_stylesheet_directory_uri().'/css/cg-projects.css');
}
add_action( 'wp_enqueue_scripts', 'add_css');

function add_js() {
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper@7/swiper-bundle.min.js');
    wp_enqueue_script('script', get_template_directory_uri() . '/js/cg-card.js');
}
add_action( 'wp_enqueue_scripts', 'add_js');

function wp_cg_card_register_theme_customizer( $wp_customize ) {
    $wp_customize->add_panel( 'customize', array(
        'priority'       => 10,
        'theme_supports' => '',
        'title'          => __( 'Customizations', 'wp-cg-card' ),
        'description'    => __( 'Set editable text for certain content.', 'wp-cg-card' ),
    ) );
    // Add section.
    $wp_customize->add_section( 'custom_card_settings' , array(
        'title'    => __('Card Settings','wp-cg-card'),
        'panel'    => 'customize',
        'priority' => 10
    ) );
    // Add setting
    $wp_customize->add_setting( 'customize_text_block', array(
         'default'           => __( 'Default text', 'wp-cg-card' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'custom_card_settings',
            array(
                'label'    => __( 'About Text', 'wp-cg-card' ),
                'section'  => 'custom_card_settings',
                'settings' => 'customize_text_block',
                'type'     => 'text'
            )
        )
    );

    // Add setting
    $wp_customize->add_setting( 'customize_linkedin_link', array(
        'default'           => __( 'https://linkedin.com/', 'wp-cg-card' ),
        'sanitize_callback' => 'sanitize_text'
    ) );
    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'custom_linkedin_settings',
            array(
                'label'    => __( 'LinkedIn Link', 'wp-cg-card' ),
                'section'  => 'custom_card_settings',
                'settings' => 'customize_linkedin_link',
                'type'     => 'url'
            )
        )
   );

    // Add setting
    $wp_customize->add_setting( 'customize_github_link', array(
    'default'           => __( 'https://github.com/', 'wp-cg-card' ),
    'sanitize_callback' => 'sanitize_text'
    ) );
    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'custom_github_settings',
            array(
                'label'    => __( 'Github Link', 'wp-cg-card' ),
                'section'  => 'custom_card_settings',
                'settings' => 'customize_github_link',
                'type'     => 'url'
            )
        )
   );

    // Add setting
    $wp_customize->add_setting( 'customize_email_link', array(
    'default'           => __( '@ .com', 'wp-cg-card' ),
    'sanitize_callback' => 'sanitize_text'
    ) );
    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'custom_email_settings',
            array(
                'label'    => __( 'Email Link', 'wp-cg-card' ),
                'section'  => 'custom_card_settings',
                'settings' => 'customize_email_link',
                'type'     => 'url'
            )
        )
    );

    $wp_customize->add_setting( 'rear_image', array(
        'default' => get_theme_file_uri('assets/image/logo.jpg'), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rear_image_change', array(
        'label' => 'Upload Rear Image',
        'priority' => 20,
        'section' => 'custom_card_settings',
        'settings' => 'rear_image',
        'button_labels' => array(
                    'select' => 'Select Logo',
                    'remove' => 'Remove Logo',
                    'change' => 'Change Logo',
                    )
    )));
  
    // Sanitize text
    function sanitize_text( $text ) {
        return sanitize_text_field( $text );
    }
}
add_action( 'customize_register', 'wp_cg_card_register_theme_customizer' );

function about_me_field(){
    echo get_theme_mod('customize_text_block');
}
add_action('about_me_text', 'about_me_field');

function github_link(){
    echo get_theme_mod('customize_github_link');
}
add_action('github_text', 'github_link');

function email_link(){
    echo get_theme_mod('customize_email_link');
}
add_action('email_text', 'email_link');

function linkedin_link(){
    echo get_theme_mod('customize_linkedin_link');
}
add_action('linkedin_text', 'linkedin_link');

function rear_img(){
    echo get_theme_mod('rear_image');
}
add_action('rear_img_link', 'rear_img');



add_theme_support( 'post-thumbnails', array( 'project' ) ); // Not sure why i need this

