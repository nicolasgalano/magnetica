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

                $categories = get_the_category($post->ID);

                $item_href = get_field('site_url', $post->ID);

                //$show_client = false;
                //foreach ($categories as $category) {
                    //if( ($category->name=='argentina' && $_SESSION['pais']=='AR') || ($category->name=='paraguay' && $_SESSION['pais']=='PY') ){
                        $show_client = true;
                    //}
                //}
                if( $show_client ){
                ?>

                <li>
                    <a href="<?=$item_href; ?>" target="_blank">
                        <div class="helper"></div>
                        <img src="<?php the_field('logo_cliente', $post->ID) ?>">
                    </a>
                </li>

                <?php } ?>

                <?php endwhile; wp_reset_postdata(); ?>

            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>
