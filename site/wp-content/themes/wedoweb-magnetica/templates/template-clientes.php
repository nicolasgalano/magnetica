<?php
/* Template Name: Clientes */
get_header();
?>

<!--CONTACTO-->
<div class="section-row row-clientes">
    <div class="container">
        <div class="slider-clientes">
            <ul class="slides">

                <?php

                $args = array( 'post_type' => 'clientes', 'posts_per_page' => -1, 'order' => 'DESC' );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();

                $categories = get_terms();

                $item_href = get_field('site_url', $post->ID);

                if($categories[0]->name == 'argentina'){

                ?>

                <li>
                    <a href="<?=$item_href; ?>" target="_blank">
                        <div class="helper"></div>
                        <img src="<?php the_field('logo_cliente', $post->ID) ?>">
                    </a>
                </li>

                <?php } endwhile; wp_reset_postdata(); ?>

            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>
