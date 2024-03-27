<?php
function mexclusive2_config() {
register_nav_menus(
array(
'main_menu'   => __( 'Main Menu', 'mexclusive2' ),
'footer_menu' => __( 'Footer Menu', 'mexclusive2' ),
)
);


add_theme_support( 'custom-logo', array(
'height'      => 85,
'width'       => 180,
'flex-height' => true,
'flex-width'  => true
) );
add_image_size( 'mexclusive2-slider', 1920, 800, array( 'center', 'center' ) );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support('customize-selective-refresh-widgets');
add_theme_support( 'responsive-embeds' );
add_theme_support( 'automatic-feed-links' );
add_theme_support("wp-block-styles");
add_theme_support( 'html5', array(
'search-form',
'comment-list',
'comment-form',
'gallery',
'caption',
'admin-bar'
) );


if ( ! isset( $content_width ) ) {
$content_width = 600;
}
}

add_action( 'after_setup_theme', 'mexclusive2_config', 0 );