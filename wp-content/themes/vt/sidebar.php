<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vtswet
 */
?>
<aside id="sidebar">
    <h2 class="sidebar__title">Популярные:</h2>
    <?php
    if(is_page_template('archive-news.php')){
    global $elements;
    foreach ($elements as $el){ ?>
        <div class="sidebar__item">
            <?php echo $el?>
        </div>
    <?php }
    } else {
        $args = array(
            'post_type' => 'news',
        );
        $query = new WP_Query($args);
        if ($query -> have_posts()):
            while($query -> have_posts()):
            $query->the_post();?>

                <div class="sidebar__item">
                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                </div>

            <?php endwhile;
        endif;
    } ?>


</aside>