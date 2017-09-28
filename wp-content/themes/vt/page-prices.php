<?php
/**
 * The template for displaying home page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vtswet
 */
get_header(); ?>

<?php
if (ot_get_option('vt_prices_title')){
    $vt_prices_title = ot_get_option('vt_prices_title'); //Заголовок страницы
} else $vt_prices_title = 'Цены на услуги';

if (ot_get_option('vt_prices_text')){
    $vt_prices_text = ot_get_option('vt_prices_text'); //Общий текст в левом столбце
} else $vt_prices_text = 'Ввиду уникальности каждого рисунка, нет конкретной цены на художественную роспись. Но есть факторы, которые определяют конечную цену:';

if (ot_get_option('vt_prices_list')){
    $vt_prices_list = ot_get_option('vt_prices_list'); //Перечень факторов ценообразования
} else $vt_prices_list[] = '(чем больше суммарная площадь будущей работы, тем меньше цена за метр квадратный):' ;

if (ot_get_option('vt_prices_img')){
    $vt_prices_img = ot_get_option('vt_prices_img'); //Картинка в правом блоке
} else $vt_prices_img = get_template_directory_uri() . '/public/img/bg4.jpg' ;

if (ot_get_option('vt_prices_minprice')){
    $vt_prices_minprice = ot_get_option('vt_prices_minprice'); //Мин.цена
} else $vt_prices_minprice = '500';

?>

<section id="prices">
    <div class="wrapper">
        <h2 class="prices__title">цены на услуги</h2>
        <div class="prices__flex">
            <div class="prices__description">
                <p class="prices__description__title text"><?php echo $vt_prices_text?></p>
                <ul class="prices__list">
                    <?php
                    foreach ($vt_prices_list as $item):
                    ?>
                        <li class="prices__list__item">
                            <h3 class="prices__list__title"><i class="fa fa-check" aria-hidden="true"></i><?php echo $item['vt_list_item_title']?></h3>
                            <p class="prices__list__text text"><?php echo $item['vt_list_item_text']?></p>
                        </li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            </div>
            <div class="prices__pic">
                <img src="<?php echo $vt_prices_img?>" alt="background_pic">
            </div>
        </div>
        <p class="prices__minimal">Минимальная стоимость - от <span><?php echo $vt_prices_minprice ?> руб/м2</span></p>
        <div class="prices__btn-container">
            <button class="btn">Рассчитать стоимость</button>
        </div>
    </div>
</section>
<div id="price-modal" title="Рассчитать стоимость">
    <form class="price_form">

        <!-- Hidden required inputs -->
        <input type="hidden" name="project_name" value="VTSWET.RU">
        <input type="hidden" name="admin_email" value="alex-1994.94@mail.ru">
        <input type="hidden" name="form_subject" value="Цены">
        <!-- Hidden required inputs -->

        <label for="price__form_name">Ваше имя</label>
        <input type="text" name="name" id="price__form_name" placeholder="Введите текст">

        <label for="price__form_phone">Ваш телефон</label>
        <input type="text" name="phone" id="price__form_phone" placeholder="+7 (ххх) ххх-хх-хх">

        <label for="price__form_email">Ваш e-mail</label>
        <input type="text" name="email" id="price__form_email" placeholder="ivanovivan@mail.ru">

        <label for="price__form_more">Расскажите подробнее о заказе</label>
        <textarea type="text" name="more" id="price__form_more" placeholder="Введите текст"></textarea>
        <div class="btn_container">
            <input class="btn" type="submit" value="Отправить заявку">
        </div>
    </form>
</div>


<?php
get_footer();
