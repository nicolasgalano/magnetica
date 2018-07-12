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
		            <ul class="pais">
		                <li class="ar"><span>.AR</span><a href="#"></a></li>
		                <li class="py"><span>.PY</span><a href="#"></a></li>
		            </ul>
		            <ul class="redes">
		                <li class="facebook"><a href="#"></a></li>
		                <li class="instagram"><a href="#"></a></li>
		                <li class="youtube"><a href="#"></a></li>
		                <li class="vimeo"><a href="#"></a></li>
		            </ul>
		        </div>
				<!--
				<?php
					display_navigation();
				?>
				-->

				<ul class="nav">
		            <li><a href="index.html">Trabajos</a></li>
		            <li><a href="nosotros.html">Nosotros</a></li>
		            <li><a href="contacto.html">Contacto</a></li>
		            <li><a href="clientes.html">Clientes</a></li>
		        </ul>
				
		    </div>
		</nav>
