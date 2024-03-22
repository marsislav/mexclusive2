<?php
function mexclusive2_scripts() {
wp_register_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
wp_enqueue_style( 'bootstrap' );

wp_register_style( 'fontAwesome', get_template_directory_uri() . '/assets/css/fa.css' );
wp_enqueue_style( 'fontAwesome' );

wp_register_style( 'mexclusive2_style', get_template_directory_uri() . '/assets/css/style.css' );
wp_enqueue_style( 'mexclusive2_style' );

// Scripts
wp_register_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), false, true );

wp_register_script( 'mexclusive2-js', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery' ), false, true );

wp_enqueue_script( 'jquery' );
wp_enqueue_script( 'bootstrap' );
if ( is_home() ) {
wp_register_script( 'mexclusive2_slider', get_template_directory_uri() . '/assets/js/slider.js', array( 'jquery' ), false, true );
wp_enqueue_script( 'mexclusive2_slider' );
}
wp_enqueue_script( 'mexclusive2-js' );
}

add_action( 'wp_enqueue_scripts', 'mexclusive2_scripts' );