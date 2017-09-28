<?php
/**
 * vtswet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vtswet
 */

/**
 * OptionTree
 * */
add_filter( 'ot_theme_mode', '__return_true' );
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
add_filter( 'ot_show_new_layout', '__return_false' );
function theme_options_parent($parent){
    $parent = '';
    return $parent;
}
add_filter('ot_theme_options_parent_slug', 'theme_options_parent', 20);
require get_template_directory() . '/functions/vt-meta-boxes.php';
require get_template_directory() . '/functions/vt-theme-options.php';

if ( ! function_exists( 'vt_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function vt_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on vtswet, use a find and replace
		 * to change 'vt' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'vt', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'vt_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'vt_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vt_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vt' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'vt' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vt_widgets_init' );

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
    if(is_page('news')){
        wp_register_script('vt_news', get_template_directory_uri() . '/public/js/partials/spec_news.js', array(), '', true);
        wp_enqueue_script('vt_news');
    }
}
add_action( 'wp_enqueue_scripts', 'vt_scripts' );

/**
 * Некоторые кастомные функции
 */
require get_template_directory() . '/inc/template-functions.php';

add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
    register_nav_menu( 'main_menu', 'Main Menu' );
}

/*Регистрация кастомных типово постов*/
add_action('init', 'register_post_types');
function register_post_types(){
    /*Страница Портфолио - записи*/
    register_post_type('portfolio_categories', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Portfolio categories', // основное название для типа записи
            'singular_name'      => 'Portfolio category', // название для одной записи этого типа
            'add_new'            => 'Add portfolio category', // для добавления новой записи
            'add_new_item'       => 'Add portfolio category', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Edit portfolio category', // для редактирования типа записи
            'new_item'           => 'New portfolio category', // текст новой записи
            'view_item'          => 'View portfolio category', // для просмотра записи этого типа.
            'search_items'       => 'Search portfolio category', // для поиска по этим типам записи
            'not_found'          => 'Portfolio categories are not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Portfolio categories are not found in recyclebin', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Портфолио', // название меню
        ),
        'description'         => 'my description',
        'public'              => true,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => array('title'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array(),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ) );
}








