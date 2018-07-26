<?php

/* Template Name: Home */
get_header();
/*
TODO:
- Logica de reproduccion de videos en slider
- Crear documento
- QA del sitio
- Presentación en vivo al cliente para ajustes (ya mande mail)
*/
?>

<!--SLIDER-->
<div class="section-row row-slider">
    <div class="container">
        <div class="flexslider">
            <ul class="slides">

                <?php
                $video_count = 0;
                $args = array( 'post_type' => 'trabajos', 'posts_per_page' => -1, 'order' => 'DESC' );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();

                $video_count = $video_count+1;

                $destado = get_field('trabajos_destacado', $post->ID);

                if($destado[0] == 'true'){

                    $categories = get_the_category($post->ID);
                ?>

                <li>
	                <div class="inner-slide">
	                    <div class="overlay">
	                        <div class="inner">
	                            <div class="text">
	                                <p><?php the_field('trabajos_cliente', $post->ID) ?><?php if( get_field('trabajos_cliente') && get_field('trabajos_nombre') ){ ?> - <?php } ?><?php the_field('trabajos_nombre', $post->ID) ?></p>
	                                <div class="icons">
	                                    <?php foreach ($categories as $category) { ?>
                                            <div class="cat-icon cat-<?=$category->name?>"></div>
                                        <?php } ?>
	                                </div>
	                            </div>
	                            <div class="type <?php the_field('trabajos_icono', $post->ID); ?>"></div>
	                        </div>
	                    </div>
                        <!-- <div class="multimedia" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/dummie/img-home.jpg);"></div> -->
	                    <div class="multimedia">
                            <div class="super-overlay"></div>
	                        <iframe <?php if($video_count!==0){ ?>allow="autoplay"<?php } ?> src="<?php the_field('trabajos_video_promo', $post->ID); ?>?api=1&title=0&portrait=0&transparent=0&autoplay=0&byline=0&controls=1&sidedock=0&player_id=player_<?=$video_count?>" id="player_<?=$video_count?>" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen data-ready="true"></iframe>
	                    </div>
	                </div>
	            </li>

                <?php } endwhile; wp_reset_postdata(); ?>

	        </ul>
	    </div>
	</div>
</div>

<!--PROYECTOS-->
<div class="section-row row-proyectos">
    <div class="container">
        <div class="row">

            <?php
            $args = array( 'post_type' => 'trabajos', 'posts_per_page' => -1, 'order' => 'DESC' );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();

            $categories = get_the_category($post->ID);

            $show = false;
            foreach ($categories as $category) {
                if( ($category->name=='argentina' && $_SESSION['pais']=='AR') || ($category->name=='paraguay' && $_SESSION['pais']=='PY') ){
                    $show = true;
                }
            }
            if( $show ){
            ?>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="<?=get_permalink($post->ID) ?>" class="proyecto">
                    <div class="type <?php the_field('trabajos_icono', $post->ID); ?>"></div>
                    <div class="overlay">
                        <div class="inner">
                            <div class="text">
                                <p><?php the_field('trabajos_nombre', $post->ID) ?><?php if( get_field('trabajos_cliente') && get_field('trabajos_nombre') ){ ?><br><?php } ?><?php the_field('trabajos_cliente', $post->ID) ?></p>
                                <div class="icons">
                                    <?php foreach ($categories as $category) { ?>
                                        <div class="cat-icon cat-<?=$category->name?>"></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="multimedia"><img src="<?php the_field('trabajos_gif', $post->ID) ?>"></div>
                </a>
            </div>

            <?php } endwhile; wp_reset_postdata(); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>
