<?php
/*
 *
 * mExclusive2 functions and definitions
 *@link https://developer.wordpress.org/themers/basivs/theme-functions
 * @package mExclusive2
 */
require_once('functions/dynamic-meta.php');
  function mexclusive2_scripts(){
      wp_register_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
      wp_enqueue_style( 'bootstrap' );

      wp_register_style( 'mexclusive2_style', get_template_directory_uri().'/assets/css/style.css');
      wp_enqueue_style( 'mexclusive2_style' );

}

//Scripts

wp_register_script( 'bootstrap',get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true );



wp_enqueue_script( 'jquery' );
wp_enqueue_script( 'bootstrap');



add_action( 'wp_enqueue_scripts', 'mexclusive2_scripts' );