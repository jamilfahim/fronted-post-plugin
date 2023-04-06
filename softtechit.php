<?php
/**
 * Plugin Name:       Soft Tech IT
 * Plugin URI:        https://softtech-it.com/
 * Description:       This is a Jquery create post.
 * Version:           1.0.0
 * Author:            jhfahim
 * Author URI:        https://jhfahim.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       softtechit
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Enqueue script
 */
function enqueue_script()
{   
		
    wp_enqueue_style( 'style-js', plugin_dir_url( __FILE__ ) . 'assets/css/style.css', array(), '1.0.0', 'all' );
   wp_enqueue_script( 'custom-js', plugin_dir_url( __FILE__ ) . 'assets/js/custom.js',array(), '1.0.0', true );
   wp_enqueue_script( 'jq-custom-js', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.js',array('jquery'), '1.0.0', true );
	//  wp_localize_script( 'custom-js', 'additionalaData', array(
	// 	'nonce' => wp_create_nonce( 'wp_rest' ),
	// 	'siteURL' => site_url(),
	//  ) );
   //  wp_localize_script( 'custom-js', 'additionalaData', array(
   //     'home_url' => home_url(),
	// 	 'nonce' => wp_create_nonce('wp_rest')
   //  ));

	 wp_localize_script( 'jq-custom-js', 'ajax_var', array(
		'root_url' => home_url(),
		'nonce' => wp_create_nonce('wp_rest')
	));
	 
}
add_action('wp_enqueue_scripts', 'enqueue_script');


/**
 * Include shortcode for deshboard widget
 */
require plugin_dir_path( __FILE__ ) . 'inc/shortcode.php';

/**
 * rest api
 *
 */
add_action('rest_api_init', function(){

	register_rest_route('softtechit/v1', '/posts/(?P<id>\d+)', array( 
		'methods' => 'GET',
		'callback' => function( WP_REST_Request $request){
	
			$id =$request->get_param('id');
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'p' => $id,   // id of the post you want to query
		  );
			$query = new WP_Query( $args );

			return $query;
	
		}
	));


});






