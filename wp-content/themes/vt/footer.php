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
<footer id="footer" class="page-footer page__footer">
    <div class="container">
        <div class="page-footer__flex">
            <div class="page-footer__logo">
                <a href="<?php echo site_url() ?>">
                    <img
                            src="<?php echo get_template_directory_uri() ?>/public/img/logo.png" alt="logo"
                    >
                </a>
            </div>

            <div class="page-footer__copyright">
                <p class="owner">&copy Василий Цветков, 2017</p>
            </div>

            <div class="page-footer__contacts contact-fields">
							<?php
							if ( ot_get_option( 'vt_tel' ) ) {
								$tel           = ot_get_option( 'vt_tel' );
								$tel_formatted = str_replace( array( ' ', '(', ')', '-' ), '', $tel );
							}
							if ( ot_get_option( 'vt_email' ) ) {
								$email = ot_get_option( 'vt_email' );
							}
							if ( ot_get_option( 'vt_vk' ) ) {
								$vk_id = ot_get_option( 'vt_vk' );
							}
							if ( ot_get_option( 'vt_instagram' ) ) {
								$inst_id = ot_get_option( 'vt_instagram' );
							}
							?>
                <p class="contact-fields__item"><a href="tel:<?php echo $tel_formatted ?>"><?php echo $tel ?></a></p>
                <p class="contact-fields__item">
                    <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
                </p>
            </div>


            <div class="page-footer__socials socials">
                <a class="socials__item" href="https://instagram.com/<?php echo $inst_id ?>">
                    <span class="icon-instagram"></span>
                </a>
                <a class="socials__item" href="https://vk.com/<?php echo $vk_id ?>">
                    <span class="icon-vk"></span>
                </a>
            </div>
        </div>
    </div>
</footer>
</div> <!-- .mainWrap close -->
<?php wp_footer(); ?>
</body>
</html>


