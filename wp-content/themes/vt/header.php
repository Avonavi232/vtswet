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
    <link rel="icon" href="<?php echo home_url() . '/favicon.ico' ?>" type="image/x-icon">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="main-wrap" class="mainWrap">
    <header style="height: 95px" id="header">
        <div class="container">

					<?php
					$logo_url = ot_get_option( 'vt_logo' );
					if ( ! $logo_url ) {
						$logo_url = get_template_directory_uri() . '/public/img/logo.png';
					}
					?>

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="navbar-brand header__logo">
                    <a href="<?php echo home_url() ?>">
                        <img src="<?php echo $logo_url ?>" alt="logo">
                    </a>
                </div>

	            <?php
	            wp_nav_menu( array(
		            'theme_location'  => 'main_menu',
		            'menu'            => '',
		            'container'       => 'div',
		            'container_class' => 'header__nav collapse navbar-collapse',
		            'container_id'    => 'bs4navbar',
		            'menu_class'      => 'navbar-nav',
		            'menu_id'         => '',
		            'fallback_cb'     => 'bs4navwalker::fallback',
		            'depth'           => 2,
		            'walker'          => new bs4navwalker()
	            ) );
	            ?>

                <div class="header__contacts">
			            <?php
			            if ( ot_get_option( 'vt_tel' ) ) {
				            $tel           = ot_get_option( 'vt_tel' );
				            $tel_formatted = str_replace( array( ' ', '(', ')', '-' ), '', $tel );
			            }
			            if ( ot_get_option( 'vt_email' ) ) {
				            $email = ot_get_option( 'vt_email' );
			            }
			            ?>
                    <p class="contacts__tel"><a href="tel:<?php echo $tel_formatted ?>"><?php echo $tel ?></a></p>
                    <p class="contacts__email">
                        <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
                    </p>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar"
                        aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
    </header>
    <div style="height: 95px" class="header__overlay"></div>
