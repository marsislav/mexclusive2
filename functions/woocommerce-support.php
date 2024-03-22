<?php
// WooCommerce compatible
if ( class_exists( 'WooCommerce' ) ) {
add_theme_support( 'woocommerce', array(
'thumbnail_image_width' => 150,
'single_image_width'    => 300,
'product_grid'          => array(
'default_rows'    => 3,
'min_rows'        => 2,
'max_rows'        => 8,
'default_columns' => 4,
'min_columns'     => 4,
'max_columns'     => 4,
),
) );
add_action( 'woocommerce_after_shop_loop_item_title', 'the_excerpt', 1 );

add_filter( 'woocommerce_add_to_cart_fragments', 'mexclusive2_woocommerce_header_add_to_cart_fragment' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
add_theme_support("align-wide");
add_theme_support( 'custom-header', array(
'default-image'          => '',
'width'                  => 1000,
'height'                 => 250,
'flex-height'            => true,
'flex-width'             => true,
'header-text'            => true,
'uploads'                => true,
'video'                  => false,
'wp-head-callback'       => '',
'admin-head-callback'    => '',
'admin-preview-callback' => '',
) );
}