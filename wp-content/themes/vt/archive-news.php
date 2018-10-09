<?php
/**
 * The template for displaying home page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vtswet
 * Template name: News
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



/*<?php echo $tel?>*/
?>
    <section id="news-section" class="news-section">
        <div class="container">
            <h1 class="news-section__title">Новости</h1>
            <div class="news-section__content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="news-section__news news">
							            <?php
							            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							            $args = array(
								            'post_type' => 'news',
							            );
							            $query = new WP_Query($args);
							            $elements = array();

							            if ($query -> have_posts()):
								            while($query -> have_posts()):
									            $query->the_post();
									            $elements[] = '<a href="'. get_the_permalink() . '">' . get_the_title() . '</a>';
									            ?>
                                <article class="news-item">
                                    <p class="news-item__date"><?php echo get_the_date('j F Y')?></p>
                                    <h2 class="news-item__title"><a href="<?php the_permalink()?>"><?php the_title() ?></a></h2>
                                    <div class="news-item__image">
                                        <a href="<?php the_permalink()?>">
                                            <img src="<?php echo get_post_meta($post->ID,'vt_news_img', true); ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="news-item__excerpt">
													            <?php the_excerpt()?>
                                    </div>
                                    <div class="news-item__readmore">
                                        <a href="<?php the_permalink()?>">Read more</a>
                                    </div>
                                </article>
									            <?php
								            endwhile;
							            endif;

							            ?>

                        </div>
                    </div>
                    <div class="col-md-4">
					            <?php
					            get_sidebar();
					            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
