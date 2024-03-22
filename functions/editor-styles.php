<?php
function mexclusive2_add_editor_styles() {
// Add custom editor styles
add_editor_style('/assets/css/editor-styles.css');
}
add_action('admin_init', 'mexclusive2_add_editor_styles');
