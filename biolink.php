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

    require_once( __DIR__ . '/widgets/bio-link-widget.php' );

    $widgets_manager->register( new \Bio_Link_Widget() );
    
}

add_action( 'elementor/widgets/register', 'register_bio_link' );