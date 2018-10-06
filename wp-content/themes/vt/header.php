<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vtswet
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png">
    <link rel="manifest" href="manifest.json">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="main-wrap" class="mainWrap">
    <header id="header" >
        <div class="wrapper">
            <div class="header">
                <div class="header__logo">
                    <a href="<?php echo site_url()?>"><img src="<?php
                        if (ot_get_option('vt_logo')){
                            echo ot_get_option('vt_logo');
                        } else echo get_template_directory_uri() . '/public/img/logo.png';
                        ?>" alt="logo" ></a>
                </div>
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
                    ?>
                    <p class="contacts__tel"><a href="tel:<?php echo $tel_formatted?>"><?php echo $tel?></a></p>
                    <p class="contacts__email">
                        <a href="mailto:<?php echo $email?>"><?php echo $email?></a>
                    </p>
                </div>
            </div>
            <div class="menu_mobile">
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'main_menu',
                    'menu'            => '',
                    'container'       => 'nav',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'mobile__list',
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
                <div class="menuToggle">
                    <i class="menuToggle_icon fa fa-bars" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </header>
    <div class="header__absoluteFix"></div>
    <!--&lt;!&ndash; блок кладется с помощью js ровно под header, чтоб контент не залазил под абсолютный хедер &ndash;&gt;-->
