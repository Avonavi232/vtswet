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
if (ot_get_option('vt_btn')){
    $vt_btn = ot_get_option('vt_btn');
}
if (ot_get_option('vt_h1')){
    $vt_h1= ot_get_option('vt_h1');
}
if (ot_get_option('vt_about_title')){
    $vt_about_title= ot_get_option('vt_about_title');
}
if (ot_get_option('vt_about_text')){
    $vt_about_text= ot_get_option('vt_about_text');
}
?>
    <section id="main">
        <div class="wrapper">
            <div class="headerBottom">
                <h1 class="headerBottom__title"><?php echo $vt_h1?></h1>
                <a class="btn" href="#"><?php echo $vt_btn?></a>
            </div>
        </div>
    </section>
    <section id="about">
        <div class="wrapper">
            <h2 class="headings"><?php echo $vt_about_title?></h2>
            <div class="about__flex">
                <img class="about__me" src="<?php echo get_template_directory_uri()?>/public/img/about.jpg" alt="Me">
                <div class="about__text">
                    <?php
                        if ($vt_about_text != ''){
                            ?>
                            <p class="text"><?php echo $vt_about_text?></p>
                            <?php
                        } else {
                            ?>
                            <p class="text">Меня зовут Вася Цвет. Работаю в сфере оформления
                                и дизайна. За непродолжительный срок сделал большое количество работ в различных стилях
                                и направлениях. Предоставляю услуги по художественной росписи интерьеров, экстерьеров, аэрография на авто.</p>
                            <p class="text"> Если вам нужно граффити в Санкт-Петербурге, Москве или Костроме, то ваш заказ можно сделать в быстрые сроки. Если же нет, то не переживайте, я без труда могу посетить любую точку РФ и зарубежья.
                                Все делаю в минимальные сроки и с максимальным качеством.  </p>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section id="benefits">
        <div class="wrapper">
            <h2 class="headings">почему со мной выгодно сотрудничать:</h2>
            <div class="benefits__items">
                <?php
                if ( ot_get_option( 'vt_benefits_list' ) ) {
                    $offer_items = ot_get_option( 'vt_benefits_list', array() );
                    if ( ! empty( $offer_items ) ) {
                        foreach($offer_items as $item) {
                            ?>
                            <div class="benefits__item">
                                <img src="<?php echo $item['vt_benefits_img']?>" alt="" class="benefits__item__img">
                                <p class="benefits__item__title"><?php echo $item['vt_benefits_text']?></p>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <section id="video">
        <div class="wrapper">
            <div class="video_container">
                <div class="ratio"></div>
                <iframe  src="https://www.youtube.com/embed/LoxERKuuENU" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    <section id="portfolio">
        <div class="wrapper">
            <h2 class="headings">Портфолио</h2>
            <div class="fotorama"
                 data-height="90%"
                 data-ratio="16/9"
                 data-arrows="always"
                 data-nav="thumbs"
                 data-autoplay="3000"
            >
                <?php
                if ( ot_get_option( 'vt_main_gallery_list' ) ) {
                    $offer_items = ot_get_option( 'vt_main_gallery_list', array() );
                    if ( ! empty( $offer_items ) ) {
                        foreach($offer_items as $item) {
                            ?>
                            <img src="<?php echo $item['vt_main_gallery_img'] ?>">
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>


    </section>
    <section id="proposal">
        <div class="wrapper">
            <h2 class="headings">Предлагаю оформить:</h2>
            <div class="proposal__items">
                <?php
                if ( ot_get_option( 'vt_offer_list' ) ) {
                    $offer_items = ot_get_option( 'vt_offer_list', array() );
                    if ( ! empty( $offer_items ) ) {
                        foreach($offer_items as $item) {
                            ?>
                            <div class="proposal__item">
                                <div class="view view-tenth">
                                    <img src="<?php echo $item['vt_offer_img'] ?>" alt="<?php $item['vt_offer_img_descr'] ?>">
                                    <div class="mask">
                                        <h2><?php echo $item['vt_offer_title'] ?></h2>
                                        <a class="more" href="gallery.html">Портфолио >></a>
                                    </div>
                                </div>
                                <h3><?php echo $item['vt_offer_title'] ?></h3>
                                <p class="text"><?php echo $item['vt_offer_text'] ?></p>
                            </div>
                            <?php
                        }
                    }
                }
                ?>


            </div>
            <div class="textAlignCenter">
                <a class="btn" href="price.html"><?php echo $vt_btn?></a>
            </div>
        </div>
    </section>


<?php
get_footer();
