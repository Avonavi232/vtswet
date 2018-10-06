<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vtswet
 */

?>
<section id="footer">
    <header id="header_in_footer">
        <div class="wrapper">
            <div class="header">
                <div class="header__logo">
                    <a href="<?php echo site_url()?>"><img src="<?php echo get_template_directory_uri()?>/public/img/logo.png" alt="logo" ></a>
                </div>
<!--                <nav class="header__nav">-->
<!--                    <ul class="nav__list">-->
<!--                        <li><a class="nav__list__item" href="index.html">Главная</a></li>-->
<!--                        <li><a class="nav__list__item" href="gallery.html">Портфолио</a></li>-->
<!--                        <li><a class="nav__list__item" href="price.html">Цены</a></li>-->
<!--                        <li><a class="nav__list__item" href="contacts.html">Контакты</a></li>-->
<!--                    </ul>-->
<!--                </nav>-->
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'main_menu',
                    'menu'            => '',
                    'container'       => 'nav',
                    'container_class' => 'header__nav',
                    'container_id'    => '',
                    'menu_class'      => 'nav__list',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => '',
                ) );
                ?>
                <div class="header__contacts">
                    <?php
                    if (ot_get_option('vt_tel')){
                        $tel = ot_get_option('vt_tel');
                        $tel_formatted = str_replace(array(' ', '(', ')', '-'), '', $tel);
                    }
                    if (ot_get_option('vt_email')){
                        $email = ot_get_option('vt_email');
                    }
                    if (ot_get_option('vt_vk')){
                        $vk_id= ot_get_option('vt_vk');
                    }
                    if (ot_get_option('vt_instagram')){
                        $inst_id = ot_get_option('vt_instagram');
                    }
                    ?>
                    <p class="contacts__tel"><a href="tel:<?php echo $tel_formatted?>"><?php echo $tel?></a></p>
                    <p class="contacts__email">
                        <a href="mailto:<?php echo $email?>"><?php echo $email?></a>
                    </p>
                </div>
            </div>
        </div>
    </header>
    <footer>
        <div class="wrapper">
            <p class="owner">&copy Василий Цветков, 2017</p>
            <div class="link_container">
                <a class="link" href="https://instagram.com/<?php echo $inst_id?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a class="link" href="https://vk.com/<?php echo $vk_id?>"><i class="fa fa-vk" aria-hidden="true"></i></a>
            </div>

            <div class="develop_container">
                <h2 class="develop_title">Разработка сайта:</h2>
                <a class="develop_item" href="https://vk.com/liubov_yakymchuk">Любовь Якимчук</a>
                <a class="develop_item" href="https://vk.com/id94132474">Александр Иванов</a>
            </div>
        </div>
    </footer>
</section>
</div> <!-- .mainWrap close -->
<?php wp_footer(); ?>
</body>
</html>


