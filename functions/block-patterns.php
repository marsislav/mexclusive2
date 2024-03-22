<?php
// Add support for block patterns
function mexclusive2_add_block_patterns() {
register_block_pattern(
'mexclusive2/custom-pattern-1',
array(
'title'       => __( 'Sample list', 'mexclusive2' ),
'description' => __( 'Description of Custom Pattern 1.', 'mexclusive2' ),
'content'     => '<div class="custom-pattern">
	<h2 class="custom-pattern-heading">mExclusive2 Custom Pattern Heading</h2>
	<p class="custom-pattern-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	<blockquote class="custom-pattern-blockquote">
		<p class="custom-pattern-blockquote-text">This is a custom blockquote.</p>
	</blockquote>
	<ul class="custom-pattern-list">
		<li class="custom-pattern-list-item">List item 1</li>
		<li class="custom-pattern-list-item">List item 2</li>
		<li class="custom-pattern-list-item">List item 3</li>
	</ul>
</div>',
'categories'  => array( 'text' ),
'keywords'    => array( 'custom', 'pattern', 'text' ),
)
);

// You can register more custom block patterns as needed
}

add_action( 'init', 'mexclusive2_add_block_patterns' );