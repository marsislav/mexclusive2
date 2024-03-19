<?php
/**
 * mExclusive2 functions and definitions
 * @link https://developer.wordpress.org/themers/basivs/theme-functions
 * @package mExclusive2
 */

require_once('functions/dynamic-meta.php');
require_once('functions/class-wp-bootstrap-navwalker.php');
require_once('functions/customizer.php');
require_once('functions/sidebars.php');


//Leave it here

function mexclusive2_sanitize_footer_bg( $input ) {
	$valid = array('light', 'dark');
	if( in_array($input, $valid, true) ) {
		return $input;
	}
	return 'dark';
}




function mexclusive2_scripts() {
	wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap');

	wp_register_style('fontAwesome', get_template_directory_uri() . '/assets/css/fa.css');
	wp_enqueue_style('fontAwesome');

	wp_register_style('mexclusive2_style', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_style('mexclusive2_style');

	// Scripts
	wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true);
	if (is_home()) {
    wp_register_script('mexclusive2_slider', get_template_directory_uri() . '/assets/js/slider.js', array('jquery'), false, true);
	wp_enqueue_script('mexclusive2_slider');
    }
	wp_register_script('mexclusive2-js', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), false, true);

	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap');

	wp_enqueue_script('mexclusive2-js');
}

add_action('wp_enqueue_scripts', 'mexclusive2_scripts');

function mexclusive2_config() {
	register_nav_menus(
		array(
			'main_menu' => __('Main Menu', 'mexclusive2'),
			'footer_menu' => __('Footer Menu', 'mexclusive2'),
		)
	);

	// WooCommerce compatible
	if (class_exists('WooCommerce')) {
		add_theme_support('woocommerce', array(
			'thumbnail_image_width' => 150,
			'single_image_width' => 300,
			'product_grid' => array(
				'default_rows' => 3,
				'min_rows' => 2,
				'max_rows' => 8,
				'default_columns' => 4,
				'min_columns' => 4,
				'max_columns' => 4,
			),
		));
		add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt', 1);

		add_filter('woocommerce_add_to_cart_fragments', 'mexclusive2_woocommerce_header_add_to_cart_fragment');
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');
	}
		add_theme_support('custom-logo', array('height' => 85, 'width' => 180, 'flex-height' => true, 'flex-width' => true));
		add_image_size('mexclusive2-slider', 1920, 800, array('center', 'center'));
		add_theme_support('post-thumbnails');
		add_theme_support('title-tag');



	if (!isset($content_width)) {
		$content_width = 600;
	}
}

add_action('after_setup_theme', 'mexclusive2_config', 0);

// WooCommerce Cart Fragment
function mexclusive2_woocommerce_header_add_to_cart_fragment($fragments) {
	global $woocommerce;

	ob_start();
	?>
    <span class="items"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
	<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}


function display_last_ten_posts_in_current_category() {
	// Get the current post's categories
	$categories = get_the_category();

	// If the post has categories
	if ( $categories ) {
		// Get the first category slug
		$category_slug = $categories[0]->slug;

		// Define arguments for the query to get the last ten posts in the current category
		$args = array(
			'posts_per_page' => 10,
			'post_type'      => 'post',
			'category_name'  => $category_slug,
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		// Perform the query
		$query = new WP_Query( $args );

		// Check if there are any posts
		if ( $query->have_posts() ) {
			echo '<ul class="last-ten-posts">';
			while ( $query->have_posts() ) {
				$query->the_post();
				echo '<li>';
				// Display post title with link
				echo '<a href="' . get_permalink() . '">' . the_post_thumbnail( 'thumbnail', array( 'class' => 'xs-small rounded-circle' ) ) . get_the_title() . '</a>';
				echo '</li>';
			}
			echo '</ul>';
			// Restore original post data
			wp_reset_postdata();
		} else {
			echo esc_html__( 'No posts found in this category.', 'mexclusive' );
		}
	} else {

		echo esc_html__( 'This post does not have any categories.', 'mexclusive' );
	}
}


function display_popular_tags() {
	// Get the top 10 popular tags
	$tags = get_terms( array(
		'taxonomy' => 'post_tag',
		'orderby'  => 'count',
		'order'    => 'DESC',
		'number'   => 10,
	) );

	// Output the tags
	if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) {
		echo '<ul class="nav nav-pills d-inline-flex text-center mb-4">';
		foreach ( $tags as $tag ) {
			echo '<li class="nav-item mb-3"><a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="d-flex py-2 bg-light rounded-pill me-2"> <span class="text-dark link-hover" style="width: 90px;">' . $tag->name . '</span></a></li>';
		}
		echo '</ul>';
	} else {
		echo '<p>' . esc_html__( 'No tags found.', 'mexclusive' ) . '</p>';
	}
}