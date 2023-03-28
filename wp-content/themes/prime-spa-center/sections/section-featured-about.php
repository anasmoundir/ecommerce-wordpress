<?php 
/**
 * Template part for displaying Featured About Section
 *
 * @package Prime Spa Center
 */
    $featured_services_section_title      = prime_spa_center_get_option( 'featured_services_section_title' );
    $featured_services_page[] = prime_spa_center_get_option( 'featured_services_page' );
    ?>    
    <div id="service-section" class="section-content">
        <?php $args = array (
            'post_type'     => 'page',
            'post__in'      => $featured_services_page,
            'orderby'       =>'post__in',
            'ignore_sticky_posts' => true,
        );?>
        <?php
        $loop = new WP_Query($args);
        if ( $loop->have_posts() ) :
            while ($loop->have_posts()) : $loop->the_post();?>
            
            <article style="padding: 0 15px;">
                <div class="featured-service-item">
                    <div class="entry-container">
                        <div class="content-image">
                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                <div class="image-container">
                                    <?php the_post_thumbnail( $post->ID ) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="content-details">
                            <header class="entry-header">
                                <?php if( !empty($featured_services_section_title) ):?>
                                <div class="section-short-title">
                                    <h4><?php echo esc_html($featured_services_section_title);?></h4>
                                </div>
                                <?php endif;?>
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>
                            <div class="entry-content">
                                <?php
                                    $excerpt = prime_spa_center_the_excerpt( 100 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->
                            <div class="button-content">
                                <a href="<?php the_permalink(); ?>" class="btn">
                                    <?php esc_html_e('More About Us','prime-spa-center'); ?> <i class="fas fa-arrow-right"></i>
                                </a>
                            </div><!-- .button-content -->
                        </div>
                    </div><!-- .entry-container -->
                </div><!-- .featured-service-item -->
            </article>

            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div><!-- .section-content -->