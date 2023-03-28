<?php
/**
 * Boutique Garment Store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Boutique Garment Store
 */

if ( ! defined( 'DIGITAL_STOREFRONT_URL' ) ) {
    define( 'DIGITAL_STOREFRONT_URL', esc_url( 'https://www.themagnifico.net/themes/free-boutique-wordpress-theme/', 'boutique-garment-store') );
}
if ( ! defined( 'DIGITAL_STOREFRONT_TEXT' ) ) {
    define( 'DIGITAL_STOREFRONT_TEXT', __( 'Boutique Store Pro','boutique-garment-store' ));
}

function boutique_garment_store_enqueue_styles() {
    
    $parentcss = 'digital-storefront-style';
    $theme = wp_get_theme(); wp_enqueue_style( $parentcss, get_template_directory_uri() . '/style.css', array(), $theme->parent()->get('Version'));
    wp_enqueue_style( 'boutique-garment-store-style', get_stylesheet_uri(), array( $parentcss ), $theme->get('Version'));

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );  
    
    wp_enqueue_style( 'flatly-css', esc_url(get_template_directory_uri()) . '/assets/css/flatly.css');
}

add_action( 'wp_enqueue_scripts', 'boutique_garment_store_enqueue_styles' );

function boutique_garment_store_customize_register($wp_customize){    
    //Product
    $wp_customize->add_section('boutique_garment_store_new_product',array(
        'title' => esc_html__('New Arrival Product','boutique-garment-store'),
        'description' => esc_html__('Here you have to select product category which will display perticular new arrival product in the home page.','boutique-garment-store')
    ));

    $wp_customize->add_setting('boutique_garment_store_new_product_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('boutique_garment_store_new_product_title',array(
        'label' => esc_html__('Title','boutique-garment-store'),
        'section' => 'boutique_garment_store_new_product',
        'setting' => 'boutique_garment_store_new_product_title',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('boutique_garment_store_new_product_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('boutique_garment_store_new_product_text',array(
        'label' => esc_html__('Text','boutique-garment-store'),
        'section' => 'boutique_garment_store_new_product',
        'setting' => 'boutique_garment_store_new_product_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('boutique_garment_store_new_product_number',array(
        'default' => '',
        'sanitize_callback' => 'absint'
    )); 
    $wp_customize->add_control('boutique_garment_store_new_product_number',array(
        'label' => esc_html__('No of Product','boutique-garment-store'),
        'section' => 'boutique_garment_store_new_product',
        'setting' => 'boutique_garment_store_new_product_number',
        'type'  => 'number'
    ));

    $args = array(
       'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories( $args );
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        } 
        $cats[$category->slug] = $category->name;
    }
    $wp_customize->add_setting('boutique_garment_store_new_product_category',array(
        'sanitize_callback' => 'boutique_garment_store_sanitize_select',
    ));
    $wp_customize->add_control('boutique_garment_store_new_product_category',array(
        'type'    => 'select',
        'choices' => $cats,
        'label' => __('Select Product Category','boutique-garment-store'),
        'section' => 'boutique_garment_store_new_product',
    ));
}
add_action('customize_register', 'boutique_garment_store_customize_register');

if ( ! function_exists( 'boutique_garment_store_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function boutique_garment_store_setup() {

        add_theme_support( 'responsive-embeds' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        add_image_size('boutique-garment-store-featured-header-image', 2000, 660, true);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'boutique_garment_store_custom_background_args', array(
            'default-color' => '',
            'default-image' => '',
        ) ) );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 50,
            'width'       => 50,
            'flex-width'  => true,
        ) );

        add_editor_style( array( '/editor-style.css' ) );

        add_theme_support( 'align-wide' );

        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'boutique_garment_store_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function boutique_garment_store_widgets_init() {
        register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'boutique-garment-store' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'boutique-garment-store' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'boutique_garment_store_widgets_init' );

function boutique_garment_store_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'digital_storefront_color_option' );
    $wp_customize->remove_section( 'digital_storefront_general_settings' );
}
add_action( 'customize_register', 'boutique_garment_store_remove_customize_register', 11 );

function boutique_garment_store_remove_my_action() {
    remove_action( 'admin_menu','digital_storefront_themepage' );
    remove_action( 'after_switch_theme','digital_storefront_setup_options' );
}
add_action( 'init', 'boutique_garment_store_remove_my_action');

function boutique_garment_store_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}