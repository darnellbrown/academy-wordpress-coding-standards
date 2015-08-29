<?php

add_action( 'wp_enqueue_style', 'google_roboto_style');
function google_roboto_style() {
    wp_register_style( 'googlefont', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300');
    wp_enqueue_style( 'googlefont' );
}

?>