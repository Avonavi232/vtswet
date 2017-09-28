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
if (ot_get_option('vt_tel')){
    $vt_tel = ot_get_option('vt_tel');
    $vt_tel_formatted = str_replace(array(' ', '(', ')', '-'), '', $vt_tel);
} else $vt_tel = '+7 (911) 836-00-75';

if (ot_get_option('vt_email')){
    $vt_email = ot_get_option('vt_email');
} else $vt_email = 'vasya.tswetkow@yandex.ru';

if (ot_get_option('vt_vk')){
    $vt_vk = ot_get_option('vt_vk');
} else $vt_vk = 'razrisyem';

if (ot_get_option('vt_instagram')){
    $vt_instagram = ot_get_option('vt_instagram');
} else $vt_instagram = 'tswet_art';

if (ot_get_option('vt_contacts_title')){
    $vt_contacts_title = ot_get_option('vt_contacts_title');
} else $vt_contacts_title = 'Контакты';

if (ot_get_option('vt_contacts_img')){
    $vt_contacts_img = ot_get_option('vt_contacts_img');
} else $vt_contacts_img = ' ';

if (ot_get_option('vt_contacts_cities')){
    $vt_contacts_cities = ot_get_option('vt_contacts_cities');
} else $vt_contacts_cities[] = 'Санкт-Петербург';

?>

<section id="contacts">
    <div class="wrapper">
        <h2 class="contacts__title"><?php echo $vt_contacts_title?></h2>
        <div class="contacts__flex">
            <div class="contacts__description">
                <p class="contacts__description__text">Если Вам удобно, Вы можете написать (позвонить) мне: </p>
                <ul class="contacts__list">
                    <li><i class="fa fa-check" aria-hidden="true"></i><a class="contacts__fromcontacts__item" href="tel:<?php echo $vt_tel_formatted?>"><?php echo $vt_tel?></a></li>
                    <li><i class="fa fa-check" aria-hidden="true"></i><a class="contacts__fromcontacts__item" href="mailto:<?php echo $vt_email?>"><?php echo $vt_email?></a></li>
                    <li><i class="fa fa-check" aria-hidden="true"></i><a class="contacts__fromcontacts__item" href="https://vk.com/<?php echo $vt_vk?>" target="_blank">Вконтакте</a></li>
                    <li><i class="fa fa-check" aria-hidden="true"></i><a class="contacts__fromcontacts__item" href="https://instagram.com/<?php echo $vt_instagram?>" target="_blank">Инстаграм</a></li>
                </ul>

                <p class="contacts__description__text margin-top text">При заказе граффити или художественного оформления работа будет выполнена в ближайшие сроки, если это города:</p>
                <ul class="contacts__description__list">
                    <?php
                    foreach ($vt_contacts_cities as $city):
                        ?>
                        <li><?php echo $city ?></li>
                        <?php
                    endforeach;
                    ?>
                </ul>
                <p class="contacts__description__text text">Также возможен выезд в любые города РФ
                    и за рубеж.</p>
            </div>
            <div class="contacts__pic">
                <img src="<?php echo $vt_contacts_img?>" alt="background_pic">
            </div>
        </div>
        <p class="contacts__minimal">Подписывайтесь на меня в социальный сетях!</p>
        <div class="contacts__socials">
            <a class="contacts__socials__icon" href="https://instagram.com/<?php echo $vt_instagram?>/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a class="contacts__socials__icon" href="https://vk.com/<?php echo $vt_vk?>"><i class="fa fa-vk" aria-hidden="true"></i></a>
        </div>
    </div>
</section>


<?php
get_footer();
