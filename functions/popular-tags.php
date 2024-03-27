<?php
function display_popular_tags() {
// Get the top 10 popular tags
$tags = get_terms(array(
'taxonomy' => 'post_tag',
'orderby'  => 'count',
'order'    => 'DESC',
'number'   => 10,
));

// Output the tags
if (!empty($tags) && !is_wp_error($tags)) {
echo '<ul class="nav nav-pills d-inline-flex text-center mb-4">';
	foreach ($tags as $tag) {
	echo '<li class="nav-item mb-3"><a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="d-flex py-2 bg-light rounded-pill me-2"> <span class="text-dark link-hover" style="width: 90px;">' . esc_html($tag->name) . '</span></a></li>';
	}
	echo '</ul>';
} else {
echo '<p>' . esc_html__('No tags found.', 'mexclusive2') . '</p>';
}
}
