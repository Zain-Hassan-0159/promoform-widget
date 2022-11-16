<?php
/**
 * Plugin Name:       promoform-widget
 * Plugin URI:        https://hassanzain.com
 * Description:       This is the custom elementor plugin widget extention.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zain Hassan
 * Author URI:        https://hassanzain.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       promoform
 */

if(!defined('ABSPATH')){
    exit;
}


/**
 *  Elementor Custom Widget
*/
function register_promoform_widget_widgets( $widgets_manager ) {

	require_once( __DIR__ . '/promo-form-widget.php' );
	$widgets_manager->register( new \PromoFormWidget );


}

add_action( 'elementor/widgets/register', 'register_promoform_widget_widgets' );