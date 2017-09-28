<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $my_meta_box = array(
        'id'          => 'demo_meta_box',
        'title'       => __( 'Demo Meta Box', 'theme-text-domain' ),
        'desc'        => '',
        'pages'       => array( 'post' ),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'       => __( 'Conditions', 'theme-text-domain' ),
                'id'          => 'demo_conditions',
                'type'        => 'tab'
            ),
            array(
                'label'       => __( 'Show Gallery', 'theme-text-domain' ),
                'id'          => 'demo_show_gallery',
                'type'        => 'on-off',
                'desc'        => sprintf( __( 'Shows the Gallery when set to %s.', 'theme-text-domain' ), '<code>on</code>' ),
                'std'         => 'off'
            ),
            array(
                'label'       => '',
                'id'          => 'demo_textblock',
                'type'        => 'textblock',
                'desc'        => __( 'Congratulations, you created a gallery!', 'theme-text-domain' ),
                'operator'    => 'and',
                'condition'   => 'demo_show_gallery:is(on),demo_gallery:not()'
            ),
            array(
                'label'       => __( 'Gallery', 'theme-text-domain' ),
                'id'          => 'demo_gallery',
                'type'        => 'gallery',
                'desc'        => sprintf( __( 'This is a Gallery option type. It displays when %s.', 'theme-text-domain' ), '<code>demo_show_gallery:is(on)</code>' ),
                'condition'   => 'demo_show_gallery:is(on)'
            ),
            array(
                'label'       => __( 'More Options', 'theme-text-domain' ),
                'id'          => 'demo_more_options',
                'type'        => 'tab'
            ),
            array(
                'label'       => __( 'Text', 'theme-text-domain' ),
                'id'          => 'demo_text',
                'type'        => 'text',
                'desc'        => __( 'This is a demo Text field.', 'theme-text-domain' )
            ),
            array(
                'label'       => __( 'Textarea', 'theme-text-domain' ),
                'id'          => 'demo_textarea',
                'type'        => 'textarea',
                'desc'        => __( 'This is a demo Textarea field.', 'theme-text-domain' )
            )
        )
    );

    $vt_portfolio_category = array(
        'id'          => 'vt_portfolio_category',
        'title'       => 'Настройки категории портфолио',
        'desc'        => 'Здесь ты можешь редактировать настройки выбранной категории. Название категории записывается в самом верхнем поле. Оно будет отображаться на кнопке (напр.:интерьеры)',
        'pages'       => array( 'portfolio_categories' ),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'id'          => 'vt_portfolio_images',
                'label'       => 'Картинки в категории',
                'desc'        => 'Здесь можно добавлять картинки в выбранную категорию. Для добавления новой нажми Add New. в Title можешь писать порядковый номер. Поле ни на что не влияет, но оно обязательно должно быть.',
                'type'        => 'list-item',
                'settings'    => array(
                    array(
                        'id'          => '',
                        'label'       => '',
                        'desc'        => 'Подсказка: <code>Title</code> выше - просто заголовок создаваемой тобой записи. Он не выводится на странице, а служит лишь для удобства редактирования и поиска записей.',
                        'std'         => '',
                        'type'        => 'textblock',
                        'section'     => 'portfolio',
                    ),
                    array(
                        'id'          => 'vt_portfolio_img',
                        'label'       => 'Картинка',
                        'desc'        => 'Загрузи картинку',
                        'std'         => '',
                        'type'        => 'upload',
                        'section'     => 'portfolio',
                    ),
                    array(
                        'label'       => 'Заголовок картинки',
                        'id'          => 'vt_portfolio_title',
                        'type'        => 'text',
                        'desc'        => 'Введи название картинки',
                        'section'     => 'portfolio'
                    ),
                    array(
                        'label'       => 'Описание картинки',
                        'id'          => 'vt_portfolio_text',
                        'type'        => 'textarea',
                        'desc'        => 'Опиши здесь свою картинку',
                        'section'     => 'portfolio'
                    )
                )
            ),
        )
    );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $my_meta_box );
    ot_register_meta_box( $vt_portfolio_category );

}