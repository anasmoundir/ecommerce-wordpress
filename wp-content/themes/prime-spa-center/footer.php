<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prime Spa Center
 */

/**
 *
 * @hooked prime_spa_center_footer_start
 */
do_action( 'prime_spa_center_action_before_footer' );

/**
 * Hooked - prime_spa_center_footer_top_section -10
 * Hooked - prime_spa_center_footer_section -20
 */
do_action( 'prime_spa_center_action_footer' );

/**
 * Hooked - prime_spa_center_footer_end. 
 */
do_action( 'prime_spa_center_action_after_footer' );

wp_footer(); ?>

</body>  
</html>