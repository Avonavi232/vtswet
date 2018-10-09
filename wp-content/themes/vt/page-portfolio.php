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
if ( ot_get_option( 'vt_portfolio_title' ) ) {
	$vt_portfolio_title = ot_get_option( 'vt_portfolio_title' );
} else {
	$vt_portfolio_title = 'Мои работы';
}

$args  = array(
	'post_type' => array( 'portfolio_categories' ),
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) {
	$i              = 0;
	$meta_container = array();
	while ( $query->have_posts() ) {
		$query->the_post();
		$meta_container[ $i ]['images'] = get_post_meta( $post->ID, 'vt_portfolio_images', true );
		$meta_container[ $i ]['title']  = get_the_title();
		$i ++;
	}
}
wp_reset_postdata();

?>
    <div id="gallery">
        <div class="container">
            <div class="gallery__main-flex-container">
                <div class="gallery__leftcol">
                    <ul class="gallery__categories">
											<?php
											foreach ( $meta_container as $item ):
												?>
                          <li class="gallery__category"><?php echo $item['title']; ?></li>
												<?php
											endforeach;
											?>
                    </ul>
                </div>
                <div class="gallery__rightcol">
									<?php
									foreach ( $meta_container as $item ):
										foreach ( $item['images'] as $image ):
											?>
                        <div class="slick_slider__item slick_slider__item_hidden"
                             data-categoryid="<?php echo $item['title'] ?>">
                            <img style="max-width: 768px; height: auto;" src="<?php echo $image['vt_portfolio_img'] ?>"
                                 alt="gallery_1">
                            <h2 class="slick_slider__item__title"><?php echo $image['vt_portfolio_title'] ?></h2>
                            <p class="slick_slider__item__text"><?php echo $image['vt_portfolio_text'] ?></p>
                        </div>
											<?php
										endforeach;
									endforeach;
									?>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
