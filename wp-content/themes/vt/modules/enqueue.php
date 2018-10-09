<?php
/**
 * Created by PhpStorm.
 * User: ALEX
 * Date: 06.10.2018
 * Time: 17:47
 */

function vt_styles() {
//	wp_register_style('libs-styles', get_template_directory_uri() . '/public/css/libs.css');
//	wp_enqueue_style('libs-styles');
//	wp_register_style('main-styles', get_template_directory_uri() . '/public/css/main.css');
//	wp_enqueue_style('main-styles');
	wp_enqueue_style(
		'fonts',
		get_template_directory_uri() . '/public/fonts/fonts.css' ,
		array(),
		filemtime(get_template_directory() . '/public/fonts/fonts.css')
	);

	wp_enqueue_style(
		'icomoon',
		get_template_directory_uri() . '/public/icomoon/style.css' ,
		array(),
		filemtime(get_template_directory() . '/public/icomoon/style.css')
	);

	wp_enqueue_style(
		'vt-style',
		get_stylesheet_uri() ,
		array(),
		filemtime(get_template_directory() . '/style.css')
	);


	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', array(), '', false );
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array(), false, false );
//	wp_enqueue_script(
//		'bootstrap',
//		( get_template_directory_uri() . '/public/js/snap.svg-min.js' ),
//		array(),
//		filemtime( ( get_template_directory() . '/public/js/snap.svg-min.js' ) ),
//		false
//	);


	wp_enqueue_script('main-scripts', get_template_directory_uri() . '/public/js/main.js', array(), '', false);
}
add_action( 'wp_enqueue_scripts', 'vt_styles' );
