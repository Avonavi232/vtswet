<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function custom_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
	return false;

  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
	'contextual_help' => array(
	  'content'       => array(
		array(
		  'id'        => 'option_types_help',
		  'title'     => __( 'Option Types', 'theme-text-domain' ),
		  'content'   => '<p>' . __( 'Help content goes here!', 'theme-text-domain' ) . '</p>'
		)
	  ),
	  'sidebar'       => '<p>' . __( 'Sidebar content goes here!', 'theme-text-domain' ) . '</p>'
	),
	'sections'        => array(
        array(
            'id'          => 'logo',
            'title'       => 'Логотип'
        ),
        array(
            'id'          => 'text',
            'title'       => 'Текст'
        ),
        array(
            'id'          => 'benefits',
            'title'       => 'Выгоды сотрудничества'
        ),
        array(
            'id'          => 'prices',
            'title'       => 'Страница "Цены"'
        ),
        array(
			'id'          => 'contacts',
			'title'       => 'Страница "Контакты"'
		),
        array(
            'id'          => 'gallery',
            'title'       => 'Галерея на главной'
        ),
        array(
            'id'          => 'offer',
            'title'       => 'Предлагаю оформить'
        )
	),
	'settings'        => array(

	    /**Страница "Контакты"**/
        array(
            'id'          => 'vt_contacts_title',
            'label'       => 'Заголовок',
            'desc'        => 'Введи заголовок страницы (отображается на странице)',
            'std'         => 'Контакты',
            'type'        => 'text',
            'section'     => 'contacts',
        ),
        array(
            'id'          => 'vt_contacts_img',
            'label'       => 'Картинка в правом блоке',
            'desc'        => 'Загрузи картинку подходящего размера',
            'std'         => '',
            'type'        => 'upload',
            'section'     => 'contacts',
        ),
        array(
            'id'          => 'vt_tel',
            'label'       => 'Телефон',
            'desc'        => 'Введи телефон (в любом формате), и он будет использоваться везде на сайте',
            'std'         => '+7 (911) 836-00-75',
            'type'        => 'text',
            'section'     => 'contacts',
        ),
        array(
            'id'          => 'vt_email',
            'label'       => 'E-mail',
            'desc'        => 'Введи адрес электронной почты, и он будет использоваться везде на сайте',
            'std'         => 'vasya.tswetkow@yandex.ru',
            'type'        => 'text',
            'section'     => 'contacts',
        ),
        array(
            'id'          => 'vt_vk',
            'label'       => 'Вконтакте',
            'desc'        => 'Введи ID Вконтакте, и он будет использоваться везде на сайте',
            'std'         => 'razrisyem',
            'type'        => 'text',
            'section'     => 'contacts',
        ),
        array(
            'id'          => 'vt_instagram',
            'label'       => 'Instagram',
            'desc'        => 'Введи ID инстаграмма, и он будет использоваться везде на сайте',
            'std'         => 'tswet_art',
            'type'        => 'text',
            'section'     => 'contacts',
        ),
        array(
            'id'          => 'vt_contacts_cities',
            'label'       => 'Города:',
            'desc'        => 'Здесь можно добавить город в список обслуживаемых:',
            'type'        => 'list-item',
            'section'     => 'contacts',
            'settings'    => array(
                array(
                    'id'          => 'benefits_descr',
                    'label'       => '',
                    'desc'        => 'Подсказка: <code>Title</code> выше - просто заголовок создаваемой тобой записи. Он не выводится на странице, а служит лишь для удобства редактирования и поиска записей.',
                    'std'         => '',
                    'type'        => 'textblock',
                ),
                array(
                    'id'          => 'vt_contacts_city',
                    'label'       => 'Название города',
                    'desc'        => 'Название будет отображаться в списке',
                    'std'         => 'Санкт-Петербург',
                    'type'        => 'text',
                )
            )
        ),

        /**Логотип**/
        array(
            'id'          => 'vt_logo',
            'label'       => 'Логотип сайта',
            'desc'        => 'Загрузи сюда свой логотип (размер придется подобрать),<br> и он будет отображаться в шапке и подвале сайта, <br> или оставь пустым - будет использоваться стандартный',
            'std'         => '',
            'type'        => 'upload',
            'section'     => 'logo',
        ),

        /**Текст**/
        array(
            'id'          => 'vt_h1',
            'label'       => 'Основной заголовок',
            'desc'        => 'Текст, отображающийся на главном баннере сайта. Используй тег br (в угловых скобках <бр>) для переноса в нужных местах',
            'std'         => 'ГРАФФИТИ ОФОРМЛЕНИЕ,<br>ХУДОЖЕСТВЕННАЯ РОСПИСЬ',
            'type'        => 'text',
            'section'     => 'text',
        ),
        array(
            'id'          => 'vt_btn',
            'label'       => 'Текст на кнопке',
            'desc'        => 'Текст, отображающийся на кнопке.',
            'std'         => 'Узнать стоимость',
            'type'        => 'text',
            'section'     => 'text',
        ),
        array(
            'id'          => 'vt_about_title',
            'label'       => 'Заголовок "обо мне"',
            'desc'        => 'Заголовок',
            'std'         => 'Обо мне',
            'type'        => 'text',
            'section'     => 'text',
        ),
        array(
            'id'          => 'vt_about_text',
            'label'       => 'Текст "обо мне"',
            'desc'        => 'Текст',
            'std'         => '',
            'type'        => 'text',
            'section'     => 'text',
        ),

        /**Страница "Цены"**/
        array(
            'id'          => 'vt_prices_title',
            'label'       => 'Заголовок',
            'desc'        => 'Введи заголовок страницы (отображается на странице)',
            'std'         => 'Цены на услуги',
            'type'        => 'text',
            'section'     => 'prices',
        ),
        array(
            'id'          => 'vt_prices_img',
            'label'       => 'Картинка в правом блоке',
            'desc'        => 'Загрузи картинку подходящего размера',
            'std'         => '',
            'type'        => 'upload',
            'section'     => 'prices',
        ),
        array(
            'id'          => 'vt_prices_minprice',
            'label'       => 'Минимальная стоимость услуг',
            'desc'        => 'Введи здесь минимальную стоимость услуг (отображается внизу страницы)',
            'std'         => '500',
            'type'        => 'text',
            'section'     => 'prices',
        ),
        array(
            'id'          => 'vt_prices_text',
            'label'       => 'Текст',
            'desc'        => 'Введи общий текст, оставь стандартным, или сделай пустым, если хочешь удалить его',
            'std'         => 'Ввиду уникальности каждого рисунка, нет конкретной цены на художественную роспись. Но есть факторы, которые определяют конечную цену:',
            'type'        => 'text',
            'section'     => 'prices',
        ),
        array(
            'id'          => 'vt_prices_list',
            'label'       => 'Факторы ценообразования',
            'desc'        => 'Здесь можно вывести перечисление в формате: <br>*Заголовок_элемента_списка<br>текст_элемента_списка',
            'type'        => 'list-item',
            'section'     => 'prices',
            'settings'    => array(
                array(
                    'id'          => 'prices_descr',
                    'label'       => '',
                    'desc'        => 'Подсказка: <code>Title</code> выше - просто заголовок создаваемой тобой записи. Он не выводится на странице, а служит лишь для удобства редактирования и поиска записей.',
                    'std'         => '',
                    'type'        => 'textblock',
                    'section'     => 'prices',
                ),
                array(
                    'id'          => 'vt_list_item_title',
                    'label'       => 'Заголовок фактора',
                    'desc'        => 'Заголовок отображается жирным шрифтом. Перед заголовком автоматически ставится маркер.',
                    'std'         => 'Объем работы:',
                    'type'        => 'text',
                    'section'     => 'prices',
                ),
                array(
                    'id'          => 'vt_list_item_text',
                    'label'       => 'Текст фактора',
                    'desc'        => 'Введи текст',
                    'std'         => '(чем больше суммарная площадь будущей работы, тем меньше цена за метр квадратный):',
                    'type'        => 'text',
                    'section'     => 'prices',
                ),
            )
        ),

        /**Преимущества**/
        array(
            'id'          => 'vt_benefits_list',
            'label'       => 'Элементы блока:',
            'desc'        => 'Здесь можно добавить элемент в список "почему со мной выгодно сотрудничать"',
            'type'        => 'list-item',
            'section'     => 'benefits',
            'settings'    => array(
                array(
                    'id'          => 'benefits_descr',
                    'label'       => '',
                    'desc'        => 'Подсказка: <code>Title</code> выше - просто заголовок создаваемой тобой записи. Он не выводится на странице, а служит лишь для удобства редактирования и поиска записей.',
                    'std'         => '',
                    'type'        => 'textblock',
                    'section'     => 'benefits',
                ),
                array(
                    'id'          => 'vt_benefits_img',
                    'label'       => 'Картинка элемента',
                    'desc'        => 'Загрузи картинку в формате .png подходящего размера',
                    'std'         => '',
                    'type'        => 'upload',
                    'section'     => 'benefits',
                ),
                array(
                    'id'          => 'vt_benefits_text',
                    'label'       => 'Текст',
                    'desc'        => 'Опиши здесь преимущество, и оно будет отображаться',
                    'std'         => 'KFC! So good!',
                    'type'        => 'text',
                    'section'     => 'benefits',
                )
            )
        ),

        /**Галерея на главной**/
        array(
            'id'          => 'vt_main_gallery_list',
            'label'       => 'Элементы галереи:',
            'desc'        => 'Здесь можно добавить картинку в галерею на главной странице',
            'type'        => 'list-item',
            'section'     => 'gallery',
            'settings'    => array(
                array(
                    'id'          => 'benefits_descr',
                    'label'       => '',
                    'desc'        => 'Подсказка: <code>Title</code> выше - просто заголовок создаваемой тобой записи. Он не выводится на странице, а служит лишь для удобства редактирования и поиска записей.',
                    'std'         => '',
                    'type'        => 'textblock',
                    'section'     => 'benefits',
                ),
                array(
                    'id'          => 'vt_main_gallery_img',
                    'label'       => 'Картинка галереи',
                    'desc'        => 'Загрузи картинку',
                    'std'         => '',
                    'type'        => 'upload',
                    'section'     => 'gallery',
                ),
            )
        ),

        /**Предлагаю оформить**/
        array(
            'id'          => 'vt_offer_list',
            'label'       => 'Элементы:',
            'desc'        => 'Здесь можно добавить элементы. Четное количество предпочтительно<br>Картинки лучше грузить одинакового разрешения (размер, пропорции), тогда элементы получатся ровными, как в макете.',
            'type'        => 'list-item',
            'section'     => 'offer',
            'settings'    => array(
                array(
                    'id'          => 'benefits_descr',
                    'label'       => '',
                    'desc'        => 'Подсказка: <code>Title</code> выше - просто заголовок создаваемой тобой записи. Он не выводится на странице, а служит лишь для удобства редактирования и поиска записей.',
                    'std'         => '',
                    'type'        => 'textblock',
                    'section'     => 'offer',
                ),
                array(
                    'id'          => 'vt_offer_img',
                    'label'       => 'Картинка предложения',
                    'desc'        => 'Загрузи картинку',
                    'std'         => '',
                    'type'        => 'upload',
                    'section'     => 'offer',
                ),
                array(
                    'id'          => 'vt_offer_img_descr',
                    'label'       => 'Описание картика',
                    'desc'        => 'Кратко опиши, что на картинке (полезно для SEO), или оставь пустым',
                    'std'         => '',
                    'type'        => 'text',
                    'section'     => 'benefits',
                ),
                array(
                    'id'          => 'vt_offer_title',
                    'label'       => 'Заголовок',
                    'desc'        => 'Напиши здесь заголовок, который будет отображаться под картинкой',
                    'std'         => '',
                    'type'        => 'text',
                    'section'     => 'benefits',
                ),
                array(
                    'id'          => 'vt_offer_text',
                    'label'       => 'Описание',
                    'desc'        => 'Опиши здесь предложение, и оно будет отображаться',
                    'std'         => '',
                    'type'        => 'text',
                    'section'     => 'benefits',
                )
            )
        ),
	)
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
	update_option( ot_settings_id(), $custom_settings );
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}