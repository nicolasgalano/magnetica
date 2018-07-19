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

<?php get_footer(); ?>
