<?php
/**
 * mexclusive2 functions and definitions
 * @link https://developer.wordpress.org/themers/basivs/theme-functions
 * @package mexclusive2
 */

require_once( 'functions/dynamic-meta.php' );
require_once( 'functions/class-wp-bootstrap-navwalker.php' );
require_once( 'functions/customizer.php' );
require_once( 'functions/sidebars.php' );
require_once( 'functions/reading-time.php' );
require_once( 'functions/posted-on.php' );
require_once( 'functions/post-views-counter.php' );
require_once( 'functions/get-author.php' );
require_once( 'functions/last-ten-posts-in-category.php' );
require_once( 'functions/custom-background.php' );
require_once( 'functions/random-order.php' );
require_once( 'functions/woocommerce-support.php' );
require_once( 'functions/editor-styles.php' );
require_once( 'functions/popular-tags.php' );
require_once( 'functions/block-patterns.php' );
require_once( 'functions/enqueue.php' );


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

// WooCommerce Cart Fragment
function mexclusive2_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();
	?>
    <span class="items"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
	<?php
	$fragments['span.items'] = ob_get_clean();

	return $fragments;
}


