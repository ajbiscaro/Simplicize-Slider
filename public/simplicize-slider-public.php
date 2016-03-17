<?php
/**
 * Front-end functionality of the plugin.
 *
 * @package 	Simplicize-slider
 * @subpackage 	Simplicize-slider/public
 * @author 		Ardel John S. Biscaro
 */

/***
** Register scripts
***/

function simplicize_slider_scripts_public() {

	// Enqueue Scripts
	wp_deregister_script('jquery');
	wp_enqueue_script( 'custom-jquery', plugin_dir_url( __FILE__ ) . 'js/jquery-1.10.2.min.js', array(), 1, false );
	
	// Enqueue Basic Slider Scripts
	wp_enqueue_script( 'basic-slider-js', plugin_dir_url( __FILE__ ) . 'js/bjqs-1.3.min.js', array('custom-jquery'), 1, false );
	

}
add_action( 'wp_enqueue_scripts', 'simplicize_slider_scripts_public' );

/***
** Register styles
***/

function simplicize_slider_styles_public() {
	
	// Enqueue Styles
	wp_enqueue_style( 'style', plugin_dir_url( __FILE__ ) . 'css/simplicize-slider-public.css', array(), 1, 'all' );

	// Enqueue Basic Slider Styles
	wp_enqueue_style( 'basic-slider-style', plugin_dir_url( __FILE__ ) . 'css/bjqs.css', array(), 1, 'all' );

}
add_action( 'wp_enqueue_scripts', 'simplicize_slider_styles_public' );

/***
** Display Shortcode
***/

function simplicize_shortcode( $template ) {
		$file = plugin_dir_path( __FILE__ ) . 'templates/simplicize-slider-public-display.php';

		//Check if file exist
		if( file_exists( $file ) ) {
			include($file);
		}
}
add_shortcode( 'simplicize_slider', 'simplicize_shortcode' );
