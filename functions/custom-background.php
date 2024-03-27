<?php
// Add support for custom backgrounds
function mexclusive2_custom_background_setup() {
$args = array(
'default-color'          => 'ffffff',
'default-image'          => '',
'default-repeat'         => 'repeat',
'default-position-x'     => 'left',
'default-position-y'     => 'top',
'default-size'           => 'auto',
'default-attachment'     => 'scroll',
'wp-head-callback'       => '_custom_background_cb',
'admin-head-callback'    => '',
'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $args );
}

add_action( 'after_setup_theme', 'mexclusive2_custom_background_setup' );
