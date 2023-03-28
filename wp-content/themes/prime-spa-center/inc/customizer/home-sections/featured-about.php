<?php
/**
 * Services Section options.
 *
 * @package Prime Spa Center
 */

$default = prime_spa_center_get_default_theme_options();

// About Section
$wp_customize->add_section( 'section_featured_services',
	array(
	'title'      => __( 'About Section', 'prime-spa-center' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'home_page_panel',
	)
);

// Enable Section
$wp_customize->add_setting('theme_options[enable_featured_services_section]', 
	array(
	'default' 			=> $default['enable_featured_services_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_spa_center_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_featured_services_section]', 
	array(		
	'label' 	=> __('Enable Section', 'prime-spa-center'),
	'section' 	=> 'section_featured_services',
	'settings'  => 'theme_options[enable_featured_services_section]',
	'type' 		=> 'checkbox',	
	)
);
// Section Title
$wp_customize->add_setting('theme_options[featured_services_section_title]', 
	array(
	'default'           => $default['featured_services_section_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[featured_services_section_title]', 
	array(
	'label'       => __('Section Title', 'prime-spa-center'),
	'section'     => 'section_featured_services',   
	'settings'    => 'theme_options[featured_services_section_title]',	
	'active_callback' => 'prime_spa_center_featured_services_active',		
	'type'        => 'text'
	)
);

// Page
$wp_customize->add_setting('theme_options[featured_services_page]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_spa_center_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[featured_services_page]', 
	array(
	'label'       	  => __('Select Page', 'prime-spa-center'),
	'section'     	  => 'section_featured_services',   
	'settings'    	  => 'theme_options[featured_services_page]',
	'type'        	  => 'dropdown-pages',
	'active_callback' => 'prime_spa_center_featured_services_active',
	)
);