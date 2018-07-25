<?php get_header(); ?>

<?php
    if (have_posts()): while (have_posts()) : the_post();

    $categories = get_the_category($post->ID);

    $next_post_id = get_adjacent_post(false,'',false)->ID;
    $next_post_url = ($next_post_id) ? get_permalink( $next_post_id ) : false ;

    $previous_post_id = get_adjacent_post(false,'',true)->ID;
    $previous_post_url = ($previous_post_id) ? get_permalink( $previous_post_id ) : false ;
?>

<!--FICHA DE PROYECTO-->
<div class="section-row row-ficha">
    <div class="container">
        <?php if($previous_post_url){ ?><a class="arrow arrow-left" href="<?= $previous_post_url ?>">Left</a><?php } ?>
        <?php if($next_post_url){ ?><a class="arrow arrow-right" href="<?= $next_post_url ?>">Right</a><?php } ?>
        <div class="row">
            <div class="col-xs-12">

                <h3><?php the_field('trabajos_cliente', $post->ID) ?><?php if( get_field('trabajos_cliente') && get_field('trabajos_nombre') ){ ?> - <?php } ?><?php the_field('trabajos_nombre', $post->ID) ?></h3>

                <div class="icons clearfix">
                    <?php foreach ($categories as $category) { ?>
                        <div class="cat-icon cat-<?=$category->name?>"><?php if($category->name == 'diseno'){ echo 'diseño'; } else { ?><?=$category->name?><?php } ?></div>
                    <?php } ?>
                </div>

                <?php the_content(); ?>

                <div class="images">

                    <iframe class="item-multimedia" src="<?php the_field('trabajos_video_promo', $post->ID); ?>?title=0&byline=0&portrait=0&transparent=0&autoplay=1" id="player_11" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>

                    <?php if( have_rows('trabajos_imagenes') ): ?>

                        <?php while ( have_rows('trabajos_imagenes') ) : the_row(); ?>

                            <img class="item-multimedia" src="<?php the_sub_field('trabajos_imagen'); ?>">

                        <?php endwhile; ?>

                    <?php endif; ?>

                </div>

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
