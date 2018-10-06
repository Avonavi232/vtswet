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

    <h1 class="headings headings_news"><?php the_title();?></h1>
    <div id="news" class="wrapper">
        <section class="news-container">
            <div class="news">
                <article class="news-item">
                    <p class="news-item__date"><?php the_date('j F Y')?></p>
                    <h2 class="news-item__title news-item__title_link_not"><?php the_title();?></h2>
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
        </section>
        <?php
        get_sidebar();
        ?>
    </div>

<?php

get_footer();
