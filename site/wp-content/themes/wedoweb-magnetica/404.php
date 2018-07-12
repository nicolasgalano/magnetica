<?php get_header(); ?>


<div class="section-row section-row--portfolio">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">


        		<!-- section -->
        		<section>

        			<!-- article -->
        			<article id="post-404">

        				<h1><?php _e( 'This page does not exist :(', 'html5blank' ); ?></h1>
        				<h2>
        					<a href="<?php echo home_url('/portfolio'); ?>"><?php _e( 'Checkout our work!', 'html5blank' ); ?></a>
        				</h2>

        			</article>
        			<!-- /article -->

        		</section>
        		<!-- /section -->


			</div>
		</div>
	</div>
</div>

<?php include 'templates/partials/partial-contact.php'; ?>

<?php get_footer(); ?>
