<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Prime Spa Center
 */

if( ! function_exists( 'prime_spa_center_site_branding' ) ) :
/**
* Site Branding
*
* @since 1.0.0
*/
function prime_spa_center_site_branding() { ?>
  <?php
  $button_txt  = prime_spa_center_get_option( 'header_donate_btn_text' );
  $button_url  = prime_spa_center_get_option( 'header_donate_btn_url' );
  ?>

  <div class="header-main">
    <div class="site-branding">
      <div class="logo">
        <?php 
        if(has_custom_logo()){ ?>
          <div class="site-logo">
            <?php the_custom_logo(); ?> 
          </div>
        <?php } else { ?>
          <div id="site-identity">
            <h1 class="site-title">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">  <?php bloginfo( 'name' ); ?></a>
            </h1>
          </div><!-- #site-identity -->
        <?php } ?>
      </div>
    </div> <!-- .site-branding -->

    <div class="header-right">
      <div class="site-menu">
          <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
              <button type="button" class="menu-toggle">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>

              <?php
              wp_nav_menu( array(
                  'theme_location' => 'primary',
                  'menu_id'        => 'primary-menu',
                  'menu_class'     => 'nav-menu',
                  'fallback_cb'    => 'prime_spa_center_primary_navigation_fallback',
              ) );
              ?>
          </nav><!-- #site-navigation -->
          <?php if ( $button_txt || $button_url ){?>
            <div class="donate-btn">
              <a href="<?php echo esc_url($button_url);?>"><?php echo esc_html($button_txt);?><i class="fas fa-calendar-alt"></i></a>
            </div>
          <?php } ?>
      </div>
    </div>
  </div>
    
<?php }
endif;
add_action( 'prime_spa_center_action_header', 'prime_spa_center_site_branding', 10 );

if ( ! function_exists( 'prime_spa_center_footer_top_section' ) ) :

  /**
   * Top  Footer 
   *
   * @since 1.0.0
   */
  function prime_spa_center_footer_top_section() {
      $footer_sidebar_data = prime_spa_center_footer_sidebar_class();
      $footer_sidebar    = $footer_sidebar_data['active_sidebar'];
      $footer_class      = $footer_sidebar_data['class'];
      if ( empty( $footer_sidebar ) ) {
        return;
      }      ?>
      <div class="footer-widgets-area section-gap <?php echo esc_attr( $footer_class ); ?>"> <!-- widget area starting from here -->
          <div class="wrapper">
            <?php
              for ( $i = 1; $i <= 4 ; $i++ ) {
                if ( is_active_sidebar( 'footer-' . $i ) ) {
                ?>
                  <div class="hentry">
                    <?php dynamic_sidebar( 'footer-' . $i ); ?>
                  </div>
                  <?php
                }
              }
            ?>
            </div>
          
      </div> <!-- widget area starting from here -->
    <?php
 }
endif;

add_action( 'prime_spa_center_action_footer', 'prime_spa_center_footer_top_section', 10 );

if ( ! function_exists( 'prime_spa_center_footer_section' ) ) :

  /**
   * Footer copyright
   *
   * @since 1.0.0
   */
  function prime_spa_center_footer_section() { ?>
    <div class="site-info">
      <?php 
        $copyright_footer = prime_spa_center_get_option('copyright_text'); 
        if ( ! empty( $copyright_footer ) ) {
          $copyright_footer = wp_kses_data( $copyright_footer );
        }
      ?>
      <div class="wrapper">
        <span class="copy-right"><?php echo esc_html($copyright_footer);?></span>
      </div><!-- .wrapper --> 
    </div> <!-- .site-info -->
    
  <?php }

endif;
add_action( 'prime_spa_center_action_footer', 'prime_spa_center_footer_section', 20 );

if ( ! function_exists( 'prime_spa_center_footer_sidebar_class' ) ) :
  /**
   * Count the number of footer sidebars to enable dynamic classes for the footer
   *
   * @since prime_spa_center 0.1
   */
  function prime_spa_center_footer_sidebar_class() {
    $data = array();
    $active_sidebar = array();
      $count = 0;

      if ( is_active_sidebar( 'footer-1' ) ) {
        $active_sidebar[]   = 'footer-1';
          $count++;
      }

      if ( is_active_sidebar( 'footer-2' ) ){
        $active_sidebar[]   = 'footer-2';
          $count++;
    }

      if ( is_active_sidebar( 'footer-3' ) ){
        $active_sidebar[]   = 'footer-3';
          $count++;
      }

      if ( is_active_sidebar( 'footer-4' ) ){
        $active_sidebar[]   = 'footer-4';
          $count++;
      }

      $class = '';

      switch ( $count ) {
          case '1':
            $class = 'col-1';
            break;
          case '2':
            $class = 'col-2';
            break;
          case '3':
            $class = 'col-3';
            break;
            case '4':
            $class = 'col-4';
            break;
      }

    $data['active_sidebar'] = $active_sidebar;
    $data['class']        = $class;

      return $data;
  }
endif;

if( ! function_exists( 'prime_spa_center_banner_header' ) ) :
    /**
     * Page Header
    */
    function prime_spa_center_banner_header() { 

      $show_header_image  = prime_spa_center_get_option( 'show_header_image' );
      $show_page_title    = prime_spa_center_get_option( 'show_page_title' );

      if ( is_front_page() && ! is_home() )
          return;
      $header_image = get_header_image();
      if ( is_singular() ) :
          $header_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $header_image;
      endif;
      ?>

      <div id="page-site-header" class="<?php echo esc_attr($show_header_image); ?> <?php echo esc_attr($show_page_title); ?>" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
      <div class="overlay"></div>
        <header class='page-header'>
          <div class="wrapper">
            <?php prime_spa_center_banner_title();?>
          </div><!-- .wrapper -->
        </header>
      </div><!-- #page-site-header -->
      <?php echo '<div id="content" class= "wrapper section-gap">';
    }
endif;
add_action( 'prime_spa_center_banner_header', 'prime_spa_center_banner_header', 10 );

if( ! function_exists( 'prime_spa_center_banner_title' ) ) :
/**
 * Page Header
*/
function prime_spa_center_banner_title(){ 
    if ( ( is_front_page() && is_home() ) || is_home() ){ 
        $your_latest_posts_title = prime_spa_center_get_option( 'your_latest_posts_title' );?>
        <h2 class="page-title"><?php echo esc_html($your_latest_posts_title); ?></h2><?php
    }

    if( is_singular() ) {
        the_title( '<h2 class="page-title">', '</h2>' );
    }       

    if( is_archive() ){
        the_archive_description( '<div class="archive-description">', '</div>' );
        the_archive_title( '<h2 class="page-title">', '</h2>' );
    }

    if( is_search() ){ ?>
        <h2 class="page-title"><?php esc_html( 'Search Results for: %s', 'prime-spa-center' ); get_search_query(); ?></h2>
    <?php }
    
    if( is_404() ) {
        echo '<h2 class="page-title">' . esc_html__( 'Error 404', 'prime-spa-center' ) . '</h2>';
    }
}
endif;

if ( ! function_exists( 'prime_spa_center_posts_tags' ) ) :
  /**
   * Prints HTML with meta information for the current post-date/time and author.
   */
  function prime_spa_center_posts_tags() {
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() && has_tag() ) { ?>
      <div class="tags-links">
        <?php /* translators: used between list items, there is a space after the comma */
        $tags = get_the_tags();
        if ( $tags ) {

          foreach ( $tags as $tag ) {
            echo '<span><a href="' . esc_url( get_tag_link( $tag->term_id ) ) .'">' . esc_html( $tag->name ) . '</a></span>'; // WPCS: XSS OK.
          }
        } ?>
      </div><!-- .tags-links -->
    <?php } 
  }
endif;