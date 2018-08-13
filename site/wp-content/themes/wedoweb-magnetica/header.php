<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<nav>
		    <div class="container">

		        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-header.png"></a></h1>
		        <div class="top-links clearfix">
					<!--
					<ul class="pais">
		                <li class="ar <?= ($_SESSION['pais']=='AR')?'activo':'' ?>"><span>.AR</span><a href="?pais=AR"></a></li>
		                <li class="py <?= ($_SESSION['pais']=='PY')?'activo':'' ?>"><span>.PY</span><a href="?pais=PY"></a></li>
		            </ul>
					-->
		            <ul class="redes">
		                <li class="facebook"><a href="https://es-la.facebook.com/Magnetica.Producciones/" target="_blank"></a></li>
		                <li class="instagram"><a href="https://www.instagram.com/magnetica_producciones/" target="_blank"></a></li>
		                <li class="youtube"><a href="https://www.youtube.com/channel/UCYsvtHUtY05_8e6yYlJS4oQ" target="_blank"></a></li>
		                <li class="vimeo"><a href="https://vimeo.com/user70389527" target="_blank"></a></li>
		            </ul>
		        </div>

				<div class="mobile-menu-icon" onclick="myFunction(this)">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</div>

				<script>
					function myFunction(x) {
						x.classList.toggle("change");
						$('.navbar-nav').toggleClass('open');
						$('body').toggleClass('open-mobile-menu');
					}
				</script>

				<?php
					display_navigation();
				?>

		    </div>
		</nav>
