<?php get_header(); ?>

<?php
    if (have_posts()): while (have_posts()) : the_post();
    $categories = get_the_category($post->ID);
?>

<!--FICHA DE PROYECTO-->
<div class="section-row row-ficha">
    <div class="container"><a class="arrow arrow-left" href="#">Left</a><a class="arrow arrow-right" href="#">Right</a>
        <div class="row">
            <div class="col-xs-12">

                <h3><?php the_field('trabajos_cliente', $post->ID) ?> - <?php the_field('trabajos_nombre', $post->ID) ?></h3>

                <div class="icons clearfix">
                    <?php foreach ($categories as $category) { ?>
                        <div class="cat-icon cat-<?=$category->name?>"><?=$category->name?></div>
                    <?php } ?>
                </div>

                <?php the_content(); ?>

                <iframe src="<?php the_field('trabajos_video_promo', $post->ID); ?>?title=0&byline=0&portrait=0&transparent=0&autoplay=1" id="player_11" width="100%" height="640" frameborder="0" allowfullscreen></iframe>

                <!--
                <div class="images">
                    <img class="item-multimedia" src="images/dummie/img-ficha1.jpg">
                    <img class="item-multimedia" src="images/dummie/img-ficha2.jpg">
                    <img class="item-multimedia" src="images/dummie/img-ficha3.jpg">
                </div>
                -->

            </div>
        </div>
    </div>
</div>


<?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article>

        <h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

    </article>
    <!-- /article -->

<?php endif; ?>

<?php get_footer(); ?>
