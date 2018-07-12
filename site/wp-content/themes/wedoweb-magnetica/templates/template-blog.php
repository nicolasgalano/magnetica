<?php
/* Template Name: Blog */
get_header();
?>

<div class="section-row section-row--blog">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <h1 class="title">Blog</h1>
            </div>

            <div class="col-sm-12 blog-list">

                <article>

            		<?php // Display blog posts on any page @ https://m0n.co/l
            		$temp = $wp_query; $wp_query= null;
            		$wp_query = new WP_Query(); $wp_query->query('posts_per_page=-1' . '&paged='.$paged);
            		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                    <a class="content-link" href="<?php the_permalink(); ?>" title="Read more">
                        <?php
                            if(has_post_thumbnail()) {
                                ?>
                                <div class="thumbnail" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'large') ?>);" ></div>
                        <?php
                            }
                        ?>
                        <div class="content-wrapper">
                            <div class="subline"></div>
                            <div class="misc-container">
                                <span class="misc-data"><?php echo format_date(get_the_date(), 'F jS, Y');?></span><span class="div">|</span>
                                <span class="misc-data"><?php echo get_the_author();?></span>
                            </div>
                            <h2><?php the_title(); ?></h2>
                            <p>
                                <?php the_excerpt(); ?>
                            </p>
                        </div>
                    </a>


            		<?php endwhile; ?>

            		<?php if ($paged > 1) { ?>

            		<nav id="nav-posts">
            			<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
            			<div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
            		</nav>

            		<?php } else { ?>

            		<nav id="nav-posts">
            			<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
            		</nav>

            		<?php } ?>

            		<?php wp_reset_postdata(); ?>

            	</article>


            </div>

        </div>
    </div>
</div>

<?php include 'partials/partial-contact.php'; ?>

<?php get_footer(); ?>
