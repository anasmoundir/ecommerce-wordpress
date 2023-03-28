<?php
/**
 * The template for displaying home page.
 * @package Prime Spa Center
 */

if ( 'posts' != get_option( 'show_on_front' ) ) { 
    get_header(); ?>
    <?php $enabled_sections = prime_spa_center_get_sections();
    if( is_array( $enabled_sections ) ) { ?>
        <div id="content" class="site-content">
            <?php foreach( $enabled_sections as $section ) {

                if( $section['id'] == 'featured-slider' ) { ?>
                    <?php $enable_featured_slider_section = prime_spa_center_get_option( 'enable_featured_slider_section' );
                    if(true ==$enable_featured_slider_section): ?>
                        <section id="<?php echo esc_attr( $section['id'] ); ?>">  
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </section>
                    <?php endif; ?>

                <?php } 
                
            } ?> 
            <?php
            foreach( $enabled_sections as $section ) {

                if( $section['id'] == 'featured-about' ) { ?>
                    <?php $enable_featured_services_section = prime_spa_center_get_option( 'enable_featured_services_section' );
                    if(true ==$enable_featured_services_section): ?>
                        <section id="<?php echo esc_attr( $section['id'] ); ?>" class="section-gap">  
                            <div class="wrapper">
                                <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                            </div>
                        </section>
                    <?php endif; ?>
            
                <?php }
                
            } ?>
        </div> 
    <?php }
    if( true == prime_spa_center_get_option('enable_frontpage_content') ) { ?>
        <div id="content" class="wrapper section-gap">
            <?php include( get_page_template() ); ?>
        </div>
    <?php }
    get_footer();
} 
elseif ('posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} 