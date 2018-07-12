<?php get_header(); ?>


<div class="section-row section-row--portfolio">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

				<!-- section -->
				<section>

					<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

					<?php get_template_part('loop'); ?>

					<?php get_template_part('pagination'); ?>

				</section>
				<!-- /section -->

			</div>
		</div>
	</div>
</div>

<?php include 'templates/partials/partial-contact.php'; ?>

<?php get_footer(); ?>
