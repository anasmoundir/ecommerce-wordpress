<?php
/**
 * Home Page Options.
 *
 * @package Prime Spa Center
 */

$default = prime_spa_center_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Homepage Sections', 'prime-spa-center' ),
	'priority'   => 30,
	'capability' => 'edit_theme_options',
	)
);

/**
* Section Customizer Options.
*/
require get_template_directory() . '/inc/customizer/home-sections/featured-slider.php';
require get_template_directory() . '/inc/customizer/home-sections/featured-about.php';