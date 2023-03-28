<?php

$default = prime_spa_center_get_default_theme_options();
/**
* Add Header Top Panel
*/
$wp_customize->add_panel( 'header_top_panel', array(
    'title'          => __( 'Header Top', 'prime-spa-center' ),
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
) );

/** Header contact info section */
$wp_customize->add_section(
    'header_contact_info_section',
    array(
        'title'    => __( 'Contact Info', 'prime-spa-center' ),
        'panel'    => 'header_top_panel',
        'priority' => 10,
    )
);

$wp_customize->add_setting( 'theme_options[header_donate_btn_text]', array(
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_donate_btn_text]',
    array(
        'label'           => __( 'Button Text', 'prime-spa-center' ),
        'description'     => __( 'Enter Button Text.', 'prime-spa-center' ),
        'section'         => 'header_contact_info_section',
    )
);

$wp_customize->add_setting( 'theme_options[header_donate_btn_url]', array(
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_donate_btn_url]',
    array(
        'label'           => __( 'Button URL', 'prime-spa-center' ),
        'description'     => __( 'Enter Button URL.', 'prime-spa-center' ),
        'section'         => 'header_contact_info_section',
    )
);

/** Header social links section */
$wp_customize->add_section(
    'header_social_links_section',
    array(
        'title'    => __( 'Social Links', 'prime-spa-center' ),
        'panel'    => 'header_top_panel',
        'priority' => 20,
    )
);

/** Header social links control */
$wp_customize->add_setting( 
    'theme_options[show_header_social_links]', 
    array(
        'default'           => $default['show_header_social_links'],
        'sanitize_callback' => 'prime_spa_center_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[show_header_social_links]',
    array(
        'label'       => __( 'Show Social Links', 'prime-spa-center' ),
        'section'     => 'header_social_links_section',
        'type'        => 'checkbox',
    )
);

// Setting social_links.
$wp_customize->add_setting( 
    'theme_options[social_link_1]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_1]',
    array(
        'label'           => __( 'Social Link 1', 'prime-spa-center' ),
        'description'     => __( 'Enter valid url.', 'prime-spa-center' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'prime_spa_center_social_links_active',
    )
);

$wp_customize->add_setting( 
    'theme_options[social_link_2]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_2]',
    array(
        'label'           => __( 'Social Link 2', 'prime-spa-center' ),
        'description'     => __( 'Enter valid url.', 'prime-spa-center' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'prime_spa_center_social_links_active',
    )
);

$wp_customize->add_setting( 
    'theme_options[social_link_3]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_3]',
    array(
        'label'           => __( 'Social Link 3', 'prime-spa-center' ),
        'description'     => __( 'Enter valid url.', 'prime-spa-center' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'prime_spa_center_social_links_active',
    )
);

$wp_customize->add_setting( 
    'theme_options[social_link_4]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_4]',
    array(
        'label'           => __( 'Social Link 4', 'prime-spa-center' ),
        'description'     => __( 'Enter valid url.', 'prime-spa-center' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'prime_spa_center_social_links_active',
    )
);