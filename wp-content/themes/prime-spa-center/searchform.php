<?php
/**
 * Template for displaying search forms
 *
 * @package Prime Spa Center
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'prime-spa-center' ) ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr( 'Search ...', 'placeholder', 'prime-spa-center' ) ?>" value="<?php the_search_query() ?>" name="s" title="<?php echo esc_attr( 'Search for:', 'label', 'prime-spa-center' ) ?>" />
    </label>
    <button type="submit" class="search-submit" value="<?php echo esc_attr( 'Search', 'submit button', 'prime-spa-center' ) ?>"><i class="fas fa-search"></i></button>
</form>