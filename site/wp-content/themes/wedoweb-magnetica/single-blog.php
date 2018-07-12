<?php get_header(); ?>

<div class="section-row section-row--blog-post">
    <div class="container-fluid">
        <div class="row">

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- post title -->
			<div class="col-sm-12 featured-image-container">
                <?php if ( has_post_thumbnail()) {?>
<!--                    <img src="--><?php //echo get_the_post_thumbnail_url($post->ID) ?><!--" class="featuredImage" />-->
                    <div class="featured-image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID) ?>);" ></div>
                <?php } ?>

            </div>
			<!-- /post title -->

            <div class="col-sm-12">

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <a href="<?php echo esc_url(home_url('/blog')) ?>" class="blog-back-btn"><i class="fa fa-angle-left"></i> Back</a>
                    <h1 class="title"><?php the_title(); ?></h1>
                    <div class="subline"></div>
                    <div class="misc-container">
                        <span class="misc-data"><?php echo format_date(get_the_date(), 'F jS, Y');?></span><span class="div">|</span>
                        <span class="misc-data"><?php echo get_the_author();?></span>
                    </div>
                    <div class="post-container">
                        <?php the_content(); // Dynamic Content ?>

                    </div>

				</article>
				<!-- /article -->

			</div>

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

				</article>
				<!-- /article -->

			<?php endif; ?>

		</div>
	</div>
</div>

<?php include 'templates/partials/partial-contact.php'; ?>

<?php get_footer(); ?>
