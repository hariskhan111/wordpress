<?php
/**
 * _s functions and definitions
 *
 * @package unite
 *
 * Enqueue script and styles for child theme
 */
 
 
/*function woodmart_child_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'unite-style' ) );
}
add_action( 'wp_enqueue_scripts', 'unite_child_enqueue_styles', 1000 );
*/

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
?>