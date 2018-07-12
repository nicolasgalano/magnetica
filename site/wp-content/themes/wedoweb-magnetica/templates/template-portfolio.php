<?php
/* Template Name: Portfolio */
get_header();
//<?php echo get_template_directory_uri();
?>

<div class="section-row section-row--portfolio">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="title">Checkout our work!</h1>
            </div>
            <div class="col-sm-12 portfolio-list">

                <?php

                $args = array( 'post_type' => 'portfolio', 'posts_per_page'   => -1 );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                $categories = wp_get_post_terms($post->ID, 'portfolio_category');
                $active_detail = get_field('detalle_activo', $post->ID);
                //$list_text = get_field('texto_lista', $post->ID);
                if($active_detail){
                    $item_href = get_the_permalink();
                }else{
                    $item_href = get_field('site_url', $post->ID);
                }
                ?>

                <a class="portfolio-item" href="<?php echo $item_href; ?>" <?php if(!$active_detail){ ?>target="_blank"<?php } ?>>
                    <img src="<?php the_post_thumbnail_url(); ?>">
                    <span><?php the_field('fecha', $post->ID); ?></span>
                    <h3><?php echo get_the_title(); ?></h3>
                    <b></b>
                    <p><?php the_field('texto_lista', $post->ID); ?></p>
                </a>

                <?php endwhile; wp_reset_postdata(); ?>
                <!--
                <a class="portfolio-item" href="http://gdadevelopments.com" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/gda.png">
                    <span>FEBRERO - 2018</span>
                    <h3>GD/A</h3>
                    <b></b>
                    <p>Static Lading Page Development. <br>  #html #css <br> (Design by Asís)</p>
                </a>

                <a class="portfolio-item" href="http://franckmenichetti.com" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/fm.png">
                    <span>ENERO - 2018</span>
                    <h3>Franck Menichetti</h3>
                    <b></b>
                    <p>Wordpress Development. <br>  #wordpress #themes <br> (Design by Asís)</p>
                </a>

                <a class="portfolio-item" href="http://meltaim.com.ar/" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/meltaim.png">
                    <span>ENERO - 2018</span>
                    <h3>Melta&iacute;m</h3>
                    <b></b>
                    <p>Static Lading Page Development. <br>  #html #css <br> (Design by Asís)</p>
                </a>

                <a class="portfolio-item" href="http://advancedradartechnologies.com" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/art.png">
                    <span>DICIEMBRE - 2017</span>
                    <h3>Advanced Radar Technologies</h3>
                    <b></b>
                    <p>Wordpress Development. <br>  #wordpress #themes <br> (Design by Asís)</p>
                </a>

                <a class="portfolio-item" href="http://sittios.com.ar" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/sittios.png">
                    <span>OCTUBRE - 2017</span>
                    <h3>Sittios</h3>
                    <b></b>
                    <p>Wordpress Development. <br>  #wordpress #themes</p>
                </a>

                <a class="portfolio-item" href="http://pulsion.hemobaires.org.ar" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/pulsion.jpg">
                    <span>MAYO - 2017</span>
                    <h3>Pulsi&oacute;n</h3>
                    <b></b>
                    <p>Front-end Development. <br>  #html #css #php #wordpress <br> (Design by Asís)</p>
                </a>

                <a class="portfolio-item" href="http://getfoton.com" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/foton.jpg">
                    <span>MAYO - 2016</span>
                    <h3>FOTON</h3>
                    <b></b>
                    <p>Front-end Development. <br> #html #css</p>
                </a>

                <a class="portfolio-item" href="http://barcode.com.ar" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/barcode.jpg">
                    <span>FEBRERO - 2015</span>
                    <h3>BarCode</h3>
                    <b></b>
                    <p>Front-end & Back-end Developments. <br> #html #css #php <br> (Design by Asís)</p>
                </a>-->

            </div>
        </div>
    </div>
</div>

<?php include 'partials/partial-contact.php'; ?>

<?php get_footer(); ?>
