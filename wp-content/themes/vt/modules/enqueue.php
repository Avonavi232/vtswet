<?php
/**
 * Created by PhpStorm.
 * User: ALEX
 * Date: 06.10.2018
 * Time: 17:47
 */

/**
 * Регистрация стилей
 */
function vt_styles() {
	wp_register_style('libs-styles', get_template_directory_uri() . '/public/css/libs.css');
	wp_enqueue_style('libs-styles');
	wp_register_style('main-styles', get_template_directory_uri() . '/public/css/main.css');
	wp_enqueue_style('main-styles');
	wp_enqueue_style( 'vt-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'vt_styles' );

/**
 * Регистрация скриптов.
 */
function vt_scripts() {
	wp_enqueue_script( 'vt-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'vt-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_register_script('main-scripts', get_template_directory_uri() . '/public/js/main.js', array(), '', true);
	wp_enqueue_script('main-scripts');

	/*Скрипты страницы HOME*/
	if(is_page('home')){
		wp_register_script('vt_home', get_template_directory_uri() . '/public/js/partials/spec_home.js', array(), '', true);
		wp_enqueue_script('vt_home');
	}
	/*Скрипты страницы ПОРТФОЛИО*/
	if(is_page('portfolio')){
		wp_register_script('vt_portfolio', get_template_directory_uri() . '/public/js/partials/spec_portfolio.js', array(), '', true);
		wp_enqueue_script('vt_portfolio');
	}
	/*Скрипты страницы prices*/
	if(is_page('prices')){
		wp_register_script('vt_prices', get_template_directory_uri() . '/public/js/partials/spec_prices.js', array(), '', true);
		wp_enqueue_script('vt_prices');
	}
	/*Скрипты страницы contacts*/
	if(is_page('contacts')){
		wp_register_script('vt_contacts', get_template_directory_uri() . '/public/js/partials/spec_contacts.js', array(), '', true);
		wp_enqueue_script('vt_contacts');
	}
	/*Скрипты страницы news*/
	if(is_page('news') || is_singular('news') ){
		wp_register_script('vt_news', get_template_directory_uri() . '/public/js/partials/spec_news.js', array(), '', true);
		wp_enqueue_script('vt_news');
	}
}
add_action( 'wp_enqueue_scripts', 'vt_scripts' );