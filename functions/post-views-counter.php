<?php // Post views counter
function mexclusive2_increment_post_views() {
	if (is_single() && !is_admin()) {
		global $post;
		$views = get_post_meta($post->ID, 'post_views', true);
		$views = $views ? $views : 0;
		$views++;
		update_post_meta($post->ID, 'post_views', $views);
	}
}

// Hook into WordPress
add_action('template_redirect', 'mexclusive2_increment_post_views');


// Function to display post views count
function mexclusive2_display_post_views() {
	global $post;
	$views = get_post_meta($post->ID, 'post_views', true);
	$views = $views ? $views : 0;
	return $views;
}