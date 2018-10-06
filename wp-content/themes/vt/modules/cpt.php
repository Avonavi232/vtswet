<?php
/**
 * Created by PhpStorm.
 * User: ALEX
 * Date: 06.10.2018
 * Time: 17:50
 */


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

	/*Страница Новостей - записи*/
	register_post_type('news', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Новости', // основное название для типа записи
			'singular_name'      => 'Новость', // название для одной записи этого типа
			'add_new'            => 'Добавить новость', // для добавления новой записи
			'add_new_item'       => 'Добавить новость', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактировать новость', // для редактирования типа записи
			'new_item'           => 'Добавить новость2', // текст новой записи
			'view_item'          => 'Просмотреть новость', // для просмотра записи этого типа.
			'search_items'       => 'Поиск новостей', // для поиска по этим типам записи
			'not_found'          => 'Новостей не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Новостей не найдено (в корзине)', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Новости', // название меню
		),
		'description'         => 'my description',
		'public'              => true,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title', 'editor'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}
