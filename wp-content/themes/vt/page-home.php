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
        <div class="container">
            <div class="headerBottom">
                <h1 class="headerBottom__title"><?php echo $vt_h1?></h1>
                <a class="btn" href="<?php echo site_url();?>/prices"><?php echo $vt_btn?></a>
            </div>
        </div>
    </section>
    <section id="about" class="about">
        <div class="container">
            <h2 class="about__title"><?php echo $vt_about_title?></h2>
            <div class="about__content">
                <div class="row">
                    <div class="col-md-6">
                        <img class="about__image" src="<?php echo get_template_directory_uri()?>/public/img/about.jpg" alt="Me">
                    </div>
                    <div class="col-md-6">
                        <div class="about__description">
	                        <?php if (have_posts()) :
		                        the_post();
		                        the_content();
	                        endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="benefits" class="benefits">
        <div class="container">
            <h2 class="benefits__title">почему со мной выгодно сотрудничать:</h2>
            <div class="benefits__items">
                <?php
                if ( ot_get_option( 'vt_benefits_list' ) ) {
                    $offer_items = ot_get_option( 'vt_benefits_list', array() );
                    if ( ! empty( $offer_items ) ) {
                        foreach($offer_items as $item) {
                            ?>
                            <div class="benefits__item">
                                <img src="<?php echo $item['vt_benefits_img']?>" alt="" class="benefits__item-img">
                                <p class="benefits__item-title"><?php echo $item['vt_benefits_text']?></p>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </section>



<!--    <section id="portfolio">-->
<!--        <div class="container">-->
<!--            <h2 class="headings">Портфолио</h2>-->
<!--            <div class="fotorama"-->
<!--                 data-maxheight="768px"-->
<!--                 data-arrows="always"-->
<!--                 data-nav="thumbs"-->
<!--                 data-autoplay="3000"-->
<!--            >-->
<!--                --><?php
//                if ( ot_get_option( 'vt_main_gallery_list' ) ) {
//                    $offer_items = ot_get_option( 'vt_main_gallery_list', array() );
//                    if ( ! empty( $offer_items ) ) {
//                        foreach($offer_items as $item) {
//                            ?>
<!--                            <img src="--><?php //echo $item['vt_main_gallery_img'] ?><!--">-->
<!--                            --><?php
//                        }
//                    }
//                }
//                ?>
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

    <section id="proposal" class="proposal">
        <div class="container">
            <h2 class="proposal__title">Предлагаю оформить:</h2>
            <div class="video_container proposal__video">
                <div class="ratio"></div>
                <iframe  src="https://www.youtube.com/embed/LoxERKuuENU" allowfullscreen></iframe>
            </div>
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
                                        <a class="more" href="<?php echo site_url();?>/portfolio">Портфолио >></a>
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
            <div class="btn_container">
                <a class="btn" href="<?php echo site_url();?>/prices"><?php echo $vt_btn?></a>
            </div>
        </div>
    </section>


<?php
get_footer();
