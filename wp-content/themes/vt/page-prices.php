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

<section id="prices" class="prices">
    <div class="container">
        <h1 class="prices__title"><?php echo $vt_prices_title ?></h1>

        <div class="row">
            <div class="col-md-6">
                <div class="prices__description">
                    <p class="prices__description__title text"><?php echo $vt_prices_text?></p>
                    <ul class="prices__list">
					            <?php
					            foreach ($vt_prices_list as $item):
						            ?>
                          <li class="prices__list__item">
                              <h3 class="prices__list__title"><?php echo $item['vt_list_item_title']?></h3>
                              <p class="prices__list__text text"><?php echo $item['vt_list_item_text']?></p>
                          </li>
						            <?php
					            endforeach;
					            ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="prices__pic">
                    <img src="<?php echo $vt_prices_img?>" alt="background_pic">
                </div>
            </div>
        </div>
        <p class="prices__minimal">Минимальная стоимость - от <span><?php echo $vt_prices_minprice ?> руб/м2</span></p>
        <div class="prices__btn-container">
            <button
                    class="btn"
                    data-toggle="modal"
                    data-target="#modalForm"
            >Рассчитать стоимость</button>
        </div>
    </div>
</section>

<div id="modalForm" class="modal price__form" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <?php echo do_shortcode('[contact-form-7 id="87" title="Контактная форма 1" html_class="price_form"]') ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
