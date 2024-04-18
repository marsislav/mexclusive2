<?php
// Function to dynamically generate meta keywords and description
function custom_meta_tags() {
    global $post;

    $keywords = '';
    $description = '';

    if (is_singular()) {
        // Get post tags and concatenate them for keywords
        $post_tags = get_the_tags($post->ID);
        if ($post_tags) {
            foreach ($post_tags as $tag) {
                $keywords .= $tag->name . ', ';
            }
        }

        // Get post excerpt or content for description
        $description = get_the_excerpt($post->ID);
        if (empty($description)) {
            $description = wp_strip_all_tags(get_the_content($post->ID));
            $description = substr($description, 0, 160); // Limit to 160 characters
        }
    } else {
        // For other pages, you can provide default keywords and description
        $keywords = 'mExclusive2, WordPress, Theme, Responsive, Blog';
        $description = 'Wordpress theme for news agency, shop  or just for personal blog';
    }

    // Output meta tags
    echo '<meta name="keywords" content="' . esc_attr($keywords) . '">';
    echo '<meta name="description" content="' . esc_attr($description) . '">';
}

// Hook into wp_head to output custom meta tags
add_action('wp_head', 'custom_meta_tags');
