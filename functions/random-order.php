<?php
// Add random sorting option to WooCommerce sort menu
add_filter( 'woocommerce_catalog_orderby', 'custom_add_random_sorting_option' );

function custom_add_random_sorting_option( $options ) {
$options['random'] = __( 'Random', 'mexclusive2' );

return $options;
}

// Handle sorting based on user selection
add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_handle_random_sorting' );

function custom_handle_random_sorting( $args ) {
if ( isset( $_GET['orderby'] ) && $_GET['orderby'] == 'random' ) {
$args['orderby'] = 'rand';
}

return $args;
}