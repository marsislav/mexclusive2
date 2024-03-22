<?php
function enqueue_comment_reply_script() {
if (is_singular() && comments_open() && get_option('thread_comments')) {
// Enqueue the 'comment-reply' script
wp_enqueue_script('comment-reply');
}
}
add_action('wp_enqueue_scripts', 'enqueue_comment_reply_script');


