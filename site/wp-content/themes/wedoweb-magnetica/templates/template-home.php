<?php
/* Template Name: Home */
get_header();
/*
TODO:
- Crear el custom post type de los proyectos con la info necesaria
- Llenar dinamicamente la información en la HOME
- Llenar/cargar el single-portfolio con la info dinamica necesaria para la Ficha
- Crear el custom post types de Clientes
- Cargar info dinamica de Clientes
- Cargar info dinamica de Contacto(footer)
- Cargar info dinamica de Nosotros
- QA del sitio
- Presentación en vivo al cliente para ajustes
*/
?>

<!--SLIDER-->
<div class="section-row row-slider">
    <div class="container">
        <div class="flexslider">
            <ul class="slides">
                <!--
					li
                		iframe(src="https://player.vimeo.com/video/271081511?api=1&title=1&portrait=0&transparent=0&autoplay=1&byline=1&player_id=player_1", id="player_1",width="100%", height="641", frameborder="0", allowfullscreen)
            	-->
	            <li>
	                <div class="inner-slide">
	                    <div class="overlay">
	                        <div class="inner">
	                            <div class="text">
	                                <p>Producimos Comediante! / Nueva serie web</p>
	                                <div class="icons">
	                                    <div class="cat-icon cat-contenidos"></div>
	                                    <div class="cat-icon cat-eventos"></div>
	                                </div>
	                            </div>
	                            <div class="type pic"></div>
	                        </div>
	                    </div>
	                    <div class="multimedia" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/dummie/img-home.jpg);"></div>
	                </div>
	            </li>
	            <li>
	                <div class="inner-slide">
	                    <div class="overlay">
	                        <div class="inner">
	                            <div class="text">
	                                <p>Producimos Comediante! / Nueva serie web</p>
	                                <div class="icons">
	                                    <div class="cat-icon cat-contenidos"></div>
	                                </div>
	                            </div>
	                            <div class="type vid"></div>
	                        </div>
	                    </div>
	                    <div class="multimedia" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/dummie/img-ficha2.jpg);">
	                        <iframe src="https://player.vimeo.com/video/271081511?api=1&amp;title=0&amp;portrait=0&amp;transparent=0&amp;autoplay=1&amp;byline=0&amp;player_id=player_11" id="player_11" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
	                    </div>
	                </div>
	            </li>
	        </ul>
	    </div>
	</div>
</div>

<!--PROYECTOS-->
<div class="section-row row-proyectos">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="proyecto">
                    <div class="type pic"></div>
                    <div class="overlay">
                        <div class="inner">
                            <div class="text">
                                <p>Fiesta de disfraces <br> BRAHMA</p>
                                <div class="icons">
                                    <div class="cat-icon cat-contenidos"></div>
                                    <div class="cat-icon cat-diseno"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="multimedia"><img src="<?php echo get_template_directory_uri(); ?>/images/dummie/img-prod1.jpg"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="proyecto">
                    <div class="type vid"></div>
                    <div class="overlay">
                        <div class="inner">
                            <div class="text">
                                <p>Fiesta de disfraces <br> BRAHMA</p>
                                <div class="icons">
                                    <div class="cat-icon cat-contenidos"></div>
                                    <div class="cat-icon cat-creatividad"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="multimedia"><img src="<?php echo get_template_directory_uri(); ?>/images/dummie/img-prod2.jpg"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="proyecto">
                    <div class="type vid"></div>
                    <div class="overlay">
                        <div class="inner">
                            <div class="text">
                                <p>Fiesta de disfraces <br> BRAHMA</p>
                                <div class="icons">
                                    <div class="cat-icon cat-contenidos"></div>
                                    <div class="cat-icon cat-diseno"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="multimedia"><img src="<?php echo get_template_directory_uri(); ?>/images/dummie/img-prod1.jpg"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="proyecto">
                    <div class="type pic"></div>
                    <div class="overlay">
                        <div class="inner">
                            <div class="text">
                                <p>Fiesta de disfraces <br> BRAHMA</p>
                                <div class="icons">
                                    <div class="cat-icon cat-contenidos"></div>
                                    <div class="cat-icon cat-diseno"></div>
                                    <div class="cat-icon cat-eventos"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="multimedia"><img src="<?php echo get_template_directory_uri(); ?>/images/dummie/img-prod1.jpg"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="proyecto">
                    <div class="type vid"></div>
                    <div class="overlay">
                        <div class="inner">
                            <div class="text">
                                <p>Fiesta de disfraces <br> BRAHMA</p>
                                <div class="icons">
                                    <div class="cat-icon cat-contenidos"></div>
                                    <div class="cat-icon cat-creatividad"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="multimedia"><img src="<?php echo get_template_directory_uri(); ?>/images/dummie/img-prod2.jpg"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="proyecto">
                    <div class="type pic"></div>
                    <div class="overlay">
                        <div class="inner">
                            <div class="text">
                                <p>Fiesta de disfraces <br> BRAHMA</p>
                                <div class="icons">
                                    <div class="cat-icon cat-contenidos"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="multimedia"><img src="<?php echo get_template_directory_uri(); ?>/images/dummie/img-prod2.jpg"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="proyecto">
                    <div class="type vid"></div>
                    <div class="overlay">
                        <div class="inner">
                            <div class="text">
                                <p>Fiesta de disfraces <br> BRAHMA</p>
                                <div class="icons">
                                    <div class="cat-icon cat-contenidos"></div>
                                    <div class="cat-icon cat-diseno"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="multimedia"><img src="<?php echo get_template_directory_uri(); ?>/images/dummie/img-prod1.jpg"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="proyecto">
                    <div class="type vid"></div>
                    <div class="overlay">
                        <div class="inner">
                            <div class="text">
                                <p>Fiesta de disfraces <br> BRAHMA</p>
                                <div class="icons">
                                    <div class="cat-icon cat-contenidos"></div>
                                    <div class="cat-icon cat-creatividad"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="multimedia"><img src="<?php echo get_template_directory_uri(); ?>/images/dummie/img-prod1.jpg"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="proyecto">
                    <div class="type pic"></div>
                    <div class="overlay">
                        <div class="inner">
                            <div class="text">
                                <p>Fiesta de disfraces <br> BRAHMA</p>
                                <div class="icons">
                                    <div class="cat-icon cat-contenidos"></div>
                                    <div class="cat-icon cat-diseno"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="multimedia"><img src="<?php echo get_template_directory_uri(); ?>/images/dummie/img-prod1.jpg"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
