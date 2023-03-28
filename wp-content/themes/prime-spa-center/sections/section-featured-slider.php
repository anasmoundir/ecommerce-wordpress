<?php 
/**
 * Template part for displaying Slider Section
 *
 *@package Prime Spa Center
 */

    $show_social                             = prime_spa_center_get_option( 'show_header_social_links' );
    $data_slick_speed                        = prime_spa_center_get_option( 'data_slick_speed' );
    $data_slick_infinite                     = prime_spa_center_get_option( 'data_slick_infinite' );
    $data_slick_arrows                       = prime_spa_center_get_option( 'data_slick_arrows' );
    $data_slick_autoplay                     = prime_spa_center_get_option( 'data_slick_autoplay' );
    $data_slick_draggable                    = prime_spa_center_get_option( 'data_slick_draggable' );
    $data_slick_fade                         = prime_spa_center_get_option( 'data_slick_fade' );
    $featured_slider_content_type            = prime_spa_center_get_option( 'featured_slider_content_type' );
    $featured_slider_readmore_text           = prime_spa_center_get_option( 'featured_slider_readmore_text' );
    $number_of_featured_slider_items         = prime_spa_center_get_option( 'number_of_featured_slider_items' );

    if( $featured_slider_content_type == 'featured_slider_page' ) :
        for( $i=1; $i<=$number_of_featured_slider_items; $i++ ) :
            $featured_slider_posts[] = prime_spa_center_get_option( 'featured_slider_page_'.$i );
        endfor;  
    elseif( $featured_slider_content_type == 'featured_slider_post' ) :
        for( $i=1; $i<=$number_of_featured_slider_items; $i++ ) :
            $featured_slider_posts[] = prime_spa_center_get_option( 'featured_slider_post_'.$i );
        endfor;
    endif;
    ?>

    <?php
        if( $data_slick_infinite == 0 )
            $data_slick_infinite = 'false';
        else
            $data_slick_infinite = 'true';
    ?>
    
    <?php
        if( $data_slick_arrows == 0 )
            $data_slick_arrows = 'false';
        else
            $data_slick_arrows = 'true';
    ?>

    <?php
        if( $data_slick_autoplay == 0 )
            $data_slick_autoplay = 'false';
        else
            $data_slick_autoplay = 'true';
    ?>

    <?php
        if( $data_slick_draggable == 0 )
            $data_slick_draggable = 'false';
        else
            $data_slick_draggable = 'true';
    ?>

    <?php
        if( $data_slick_fade == 0 )
            $data_slick_fade = 'false';
        else
            $data_slick_fade = 'true';
    ?>

    <?php if( $featured_slider_content_type == 'featured_slider_page' ) : ?>
        <div class="section-content" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": <?php echo esc_attr( $data_slick_infinite ); ?>, "speed": <?php echo esc_attr( $data_slick_speed ); ?>, "arrows": <?php echo esc_attr( $data_slick_arrows ); ?>, "autoplay": <?php echo esc_attr( $data_slick_autoplay ); ?>, "draggable": <?php echo esc_attr( $data_slick_draggable ); ?>, "fade": <?php echo esc_attr( $data_slick_fade ); ?> }'>
            <?php $args = array (
                'post_type'     => 'page',
                'posts_per_page' => absint( $number_of_featured_slider_items ),
                'post__in'      => $featured_slider_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0; 
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;

                $class='';
                if ($i==0) {
                    $class='display-block';
                } else{
                    $class='display-none';}
                ?>        
                
                <article class="<?php echo esc_attr($class); ?>" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                    <div class="overlay"></div>

                    <div class="wrapper">
                        <div class="entry-container">
                            <div class="slid-content">
                                <header class="entry-header">
                                    <h2 class="entry-title"><?php the_title();?></h2>
                                </header>
    
                                <div class="entry-content">
                                    <?php
                                        $excerpt = prime_spa_center_the_excerpt( 30 );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->
    
                                <?php $featured_slider_readmore_text = prime_spa_center_get_option( 'readmore_text' );?>
                                <?php if (!empty($featured_slider_readmore_text) ) :?>
                                    <div class="read-more">
                                        <a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($featured_slider_readmore_text);?> <i class="fas fa-arrow-right"></i></a>
                                    </div><!-- .read-more -->
                                <?php endif; ?>
                            </div><!-- .entry-container -->
                        </div>
                        <?php if ( $show_social ){ ?>
                            <div class="social-links">
                                <?php 
                                    $social_link1 = prime_spa_center_get_option( 'social_link_1' );
                                    $social_link2 = prime_spa_center_get_option( 'social_link_2' );
                                    $social_link3 = prime_spa_center_get_option( 'social_link_3' );
                                    $social_link4 = prime_spa_center_get_option( 'social_link_4' );
                                    if ( ! empty( $social_link1 ) ) {
                                        echo '<a href="' . esc_url( $social_link1 ) . '" target="_blank"></a>';
                                    }
                                    if ( ! empty( $social_link2 ) ) {
                                        echo '<a href="' . esc_url( $social_link2 ) . '" target="_blank"></a>';
                                    } 
                                    if ( ! empty( $social_link3 ) ) {
                                        echo '<a href="' . esc_url( $social_link3 ) . '" target="_blank"></a>';
                                    }
                                    if ( ! empty( $social_link4 ) ) {
                                        echo '<a href="' . esc_url( $social_link4 ) . '" target="_blank"></a>';
                                    }
                                ?>
                            </div>
                        <?php } ?>
                    </div><!-- .wrapper -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    
    <?php else: ?>
        <div class="section-content" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": <?php echo esc_attr( $data_slick_infinite ); ?>, "speed": <?php echo esc_attr( $data_slick_speed ); ?>, "arrows": <?php echo esc_attr( $data_slick_arrows ); ?>, "autoplay": <?php echo esc_attr( $data_slick_autoplay ); ?>, "draggable": <?php echo esc_attr( $data_slick_draggable ); ?>, "fade": <?php echo esc_attr( $data_slick_fade ); ?> }'>
            <?php $args = array (
                'post_type'     => 'post',
                'posts_per_page' => absint( $number_of_featured_slider_items ),
                'post__in'      => $featured_slider_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );        
            $loop = new WP_Query($args);
            if ( $loop->have_posts() ) :
            $i=-1; $j=0; 
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;

                $featured_slider_post_readmore_text[$j] = prime_spa_center_get_option( 'featured_slider_post_readmore_text_'.$j );

                $class='';
                if ($i==0) {
                    $class='display-block';
                } else{
                    $class='display-none';}
                ?>            
                
                <article class="<?php echo esc_attr($class); ?>" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                <div class="overlay"></div>

                    <div class="wrapper">
                        <div class="entry-container">
                            <div class="slid-content">
                                <header class="entry-header">
                                    <h2 class="entry-title"><?php the_title();?></h2>
                                </header>
    
                                <div class="entry-content">
                                    <?php
                                        $excerpt = prime_spa_center_the_excerpt( 30 );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->
    
                                <?php $featured_slider_readmore_text = prime_spa_center_get_option( 'readmore_text' );?>
                                <?php if (!empty($featured_slider_readmore_text) ) :?>
                                    <div class="read-more">
                                        <a href="<?php the_permalink();?>" class="btn"> <span> <?php echo esc_html($featured_slider_readmore_text);?></span></a>
                                    </div><!-- .read-more -->
                                <?php endif; ?>
                            </div><!-- .entry-container -->
                        </div>
                        <?php if ( $show_social ){ ?>
                            <div class="social-links">
                                <?php 
                                    $social_link1 = prime_spa_center_get_option( 'social_link_1' );
                                    $social_link2 = prime_spa_center_get_option( 'social_link_2' );
                                    $social_link3 = prime_spa_center_get_option( 'social_link_3' );
                                    $social_link4 = prime_spa_center_get_option( 'social_link_4' );
                                    if ( ! empty( $social_link1 ) ) {
                                        echo '<a href="' . esc_url( $social_link1 ) . '" target="_blank"></a>';
                                    }
                                    if ( ! empty( $social_link2 ) ) {
                                        echo '<a href="' . esc_url( $social_link2 ) . '" target="_blank"></a>';
                                    } 
                                    if ( ! empty( $social_link3 ) ) {
                                        echo '<a href="' . esc_url( $social_link3 ) . '" target="_blank"></a>';
                                    }
                                    if ( ! empty( $social_link4 ) ) {
                                        echo '<a href="' . esc_url( $social_link4 ) . '" target="_blank"></a>';
                                    }
                                ?>
                            </div>
                        <?php } ?>
                    </div><!-- .wrapper -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    <?php endif;