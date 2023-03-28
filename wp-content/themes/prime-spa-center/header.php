<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prime Spa Center
 */
/**
* Hook - prime_spa_center_action_doctype.
*
* @hooked prime_spa_center_doctype -  10
*/
do_action( 'prime_spa_center_action_doctype' );
?>
<head>
    <?php
    /**
    * Hook - prime_spa_center_action_head.
    *
    * @hooked prime_spa_center_head -  10
    */
    do_action( 'prime_spa_center_action_head' );
    ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php do_action( 'wp_body_open' ); ?>

    <?php

    /**
    * Hook - prime_spa_center_action_before.
    *
    * @hooked prime_spa_center_page_start - 10
    */
    do_action( 'prime_spa_center_action_before' );

    /**
    *
    * @hooked prime_spa_center_header_start - 10
    */
    do_action( 'prime_spa_center_action_before_header' );

    /**
    *
    *@hooked prime_spa_center_site_branding - 10
    *@hooked prime_spa_center_header_end - 15 
    */
    do_action('prime_spa_center_action_header');

    /**
    *
    * @hooked prime_spa_center_content_start - 10
    */
    do_action( 'prime_spa_center_action_before_content' );

    /**
     * Banner start
     * 
     * @hooked prime_spa_center_banner_header - 10
    */
    do_action( 'prime_spa_center_banner_header' );  