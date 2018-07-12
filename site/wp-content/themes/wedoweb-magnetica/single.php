<?php

if (is_singular('portfolio')) {

    get_template_part( 'single', 'portfolio' );

}else{

    get_template_part( 'single', 'blog' );

}
?>
