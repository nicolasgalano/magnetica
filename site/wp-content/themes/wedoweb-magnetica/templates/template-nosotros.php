<?php
/* Template Name: Nosotros */
get_header();

?>

<!--NOSOTROS-->
<div class="section-row row-nosotros">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="images">
                    <video class="item-multimedia" width="100%" controls="" poster="<?php the_field('nosotros_placeholder', $post->ID); ?>">
                    <source src="<?php the_field('nosotros_video', $post->ID); ?>" type="video/mp4">Your browser does not support HTML5 video.
                    </video>
                </div>
                <h3><?php the_field('nosotros_titulo', $post->ID); ?></h3>
                <p><?php echo get_post_field('post_content', $post->ID); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="section-row row-servicios">
    <div class="container">
        <div class="row">

            <div class="col-xs-12">

                <div class="item">
                    <h3 class="cat-creatividad">Creatividad</h3>
                    <ul>
                        <?php if( have_rows('nosotros_creatividad') ): ?>
                            <?php while ( have_rows('nosotros_creatividad') ) : the_row(); ?>
                                <li>- <?php the_sub_field('nosotros_item_creatividad'); ?></li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="item">
                    <h3 class="cat-diseno">Diseño</h3>
                    <ul>
                        <?php if( have_rows('nosotros_diseno') ): ?>
                            <?php while ( have_rows('nosotros_diseno') ) : the_row(); ?>
                                <li>- <?php the_sub_field('nosotros_item_diseno'); ?></li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="item">
                    <h3 class="cat-eventos">Eventos</h3>
                    <ul>
                        <?php if( have_rows('nosotros_eventos') ): ?>
                            <?php while ( have_rows('nosotros_eventos') ) : the_row(); ?>
                                <li>- <?php the_sub_field('nosotros_item_eventos'); ?></li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="item">
                    <h3 class="cat-contenidos">Contenidos</h3>
                    <ul>
                        <?php if( have_rows('nosotros_contenidos') ): ?>
                            <?php while ( have_rows('nosotros_contenidos') ) : the_row(); ?>
                                <li>- <?php the_sub_field('nosotros_item_contenidos'); ?></li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="item">
                    <h3 class="cat-experiencias">Experiencias</h3>
                    <ul>
                        <?php if( have_rows('nosotros_experiencias') ): ?>
                            <?php while ( have_rows('nosotros_experiencias') ) : the_row(); ?>
                                <li>- <?php the_sub_field('nosotros_item_experiencias'); ?></li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
