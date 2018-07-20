<?php

if (is_singular('trabajos')) {

    get_template_part( 'single', 'trabajo' );

}else{

    get_template_part( 'single', 'blog' );

}
?>
