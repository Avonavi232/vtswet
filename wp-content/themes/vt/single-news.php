<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vtswet
 *
 */

get_header(); ?>
<?php
get_post($post->ID);
the_post();

?>

<section id="news-single" class="news-single">
    <div class="container">
        <h1 class="news-single__title"><?php the_title();?></h1>
        <div class="news-single__content">
            <div class="row">
                <div class="col-md-8">
                    <div class="news-single__news news">
                        <article class="news-item">
                            <p class="news-item__date"><?php the_date('j F Y')?></p>
                            <h2 class="news-item__title"><?php the_title();?></h2>
                            <div class="news-item__image">
                                <img src="<?php echo get_post_meta($post->ID,'vt_news_img', true); ?>" alt="">
                            </div>
                            <div class="news-item__excerpt">
							                <?php
							                the_content();
							                ?>
                            </div>
                            <div class="news-item__readmore">

                                <a href="javascript:history.back()">Назад</a>
                            </div>
                        </article>
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
