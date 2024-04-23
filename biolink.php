<?php
/**
 * Plugin Name: Bio Link
 * Description: A custom Elementor widget to allow users to build custom container with a default widget to add bio sections on pages.
 * Version: 1.0
 * Author: Emmanuel Chekumbe
 * Requires at least: 5.9
 * Requires PHP: 7.4
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: biolink
 * 
 * Requires Plugins: elementor
 * Elementor tested up to: 3.20.3
 * Elementor Pro tested up to: 3.20.2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register Bio Link
 */
function register_bio_link( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/bio-link-container.php' );

    $widgets_manager->register( new \Bio_Link_Widget() );
    
}

add_action( 'elementor/widgets/register', 'register_bio_link' );


/**
 * Remove controls that come by default with Elementor
 */

function unregister_controls( $controls_manager ) {
    $controls_manager->unregister( '_position' );
}

add_action( 'elementor/controls/register', 'unregister_controls' );

/**
 * Register Scripts and Styles for Bio Link Widget
 */
function bio_link_dependancies() {
    wp_register_style( 'biolink-style', plugins_url('assets/css/bio-link.css', __FILE__) );

    // Add Font Awesome 6
    wp_register_style( 'font-awesome-6', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), '6.5.2' );
    
}
add_action( 'wp_enqueue_scripts', 'bio_link_dependancies' );