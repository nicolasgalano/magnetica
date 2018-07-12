<?php get_header(); ?>

<?php
    if (have_posts()): while (have_posts()) : the_post();
    $section2_activo = get_field('section2_activo', $post->ID);
    $section3_activo = get_field('section3_activo', $post->ID);
?>

<div class="section-row section-row--section1" style="background-image:url(<?php the_field('background_section_1', $post->ID) ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="cont-text wow fadeInLeft" data-wow-offset="200" data-wow-delay=".1s"><span><?php the_field('fecha', $post->ID) ?></span>
                    <h2><?php the_field('titulo_section_1', $post->ID) ?></h2><b></b>
                    <p><?php the_field('texto_section_1', $post->ID) ?></p>
                    <a href="<?php the_field('site_url', $post->ID) ?>" target="_blank" class="btn btn-detail">Go To Site</a>
                </div>
            </div>
            <div class="col-md-7"><img class="wow fadeInRight" data-wow-offset="200" data-wow-delay=".1s" src="<?php the_field('imagen_section_1', $post->ID) ?>"></div>
        </div>
    </div>
</div>

<div class="section-row section-row--section2">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="info-item wow fadeInUp" data-wow-offset="200">
                    <div class="icon-holder"><i class="fa <?php the_field('lista_item_1_icono', $post->ID) ?> fa-3x"></i></div>
                    <div class="info-title"><?php the_field('lista_item_1_titulo', $post->ID) ?></div>
                    <p><?php the_field('lista_item_1_texto', $post->ID) ?></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="info-item wow fadeInUp" data-wow-offset="200" data-wow-delay=".1s">
                    <div class="icon-holder"><i class="fa <?php the_field('lista_item_2_icono', $post->ID) ?> fa-3x"></i></div>
                    <div class="info-title"><?php the_field('lista_item_2_titulo', $post->ID) ?></div>
                    <p><?php the_field('lista_item_2_texto', $post->ID) ?></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="info-item wow fadeInUp" data-wow-offset="200" data-wow-delay=".2s">
                    <div class="icon-holder"><i class="fa <?php the_field('lista_item_3_icono', $post->ID) ?> fa-3x"></i></div>
                    <div class="info-title"><?php the_field('lista_item_3_titulo', $post->ID) ?></div>
                    <p><?php the_field('lista_item_3_texto', $post->ID) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($section2_activo){ ?>
<div class="section-row section-row--section3" style="
        background: -webkit-linear-gradient(<?php the_field('background_section_2_degrade_1', $post->ID) ?>, <?php the_field('background_section_2_degrade_2', $post->ID) ?>);
        background: -o-linear-gradient(<?php the_field('background_section_2_degrade_1', $post->ID) ?>, <?php the_field('background_section_2_degrade_2', $post->ID) ?>);
        background: -moz-linear-gradient(<?php the_field('background_section_2_degrade_1', $post->ID) ?>, <?php the_field('background_section_2_degrade_2', $post->ID) ?>);
        background: linear-gradient(<?php the_field('background_section_2_degrade_1', $post->ID) ?>, <?php the_field('background_section_2_degrade_2', $post->ID) ?>);
        ">
    <div class="container" style="background-image:url(<?php the_field('imagen_section_2', $post->ID) ?>);">
        <div class="row">
            <div class="col-md-7"></div>
            <div class="col-md-5">
                <div class="cont-text wow fadeInRight" data-wow-offset="200" data-wow-delay=".1s">
                    <h2><?php the_field('titulo_section_2', $post->ID) ?></h2><b></b>
                    <p><?php the_field('texto_section_2', $post->ID) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php if($section3_activo){ ?>
<div class="section-row section-row--section4" style="
                background: -webkit-linear-gradient(<?php the_field('background_section_3_degrade_1', $post->ID) ?>, <?php the_field('background_section_3_degrade_2', $post->ID) ?>);
                background: -o-linear-gradient(<?php the_field('background_section_3_degrade_1', $post->ID) ?>, <?php the_field('background_section_3_degrade_2', $post->ID) ?>);
                background: -moz-linear-gradient(<?php the_field('background_section_3_degrade_1', $post->ID) ?>, <?php the_field('background_section_3_degrade_2', $post->ID) ?>);
                background: linear-gradient(<?php the_field('background_section_3_degrade_1', $post->ID) ?>, <?php the_field('background_section_3_degrade_2', $post->ID) ?>);
                ">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="cont-text wow fadeInLeft" data-wow-offset="200" data-wow-delay=".1s">
                    <h2><?php the_field('titulo_section_3', $post->ID) ?></h2><b></b>
                    <p><?php the_field('texto_section_3', $post->ID) ?></p>
                </div>
            </div>
            <div class="col-md-7"><img class="wow fadeInRight" data-wow-offset="200" data-wow-delay=".1s" src="<?php the_field('imagen_section_3', $post->ID) ?>"></div>
        </div>
    </div>
</div>
<?php } ?>

<?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article>

        <h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

    </article>
    <!-- /article -->

<?php endif; ?>

<?php get_footer(); ?>
