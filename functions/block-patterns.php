<?php
// Add support for block patterns
function mexclusive2_add_block_patterns() {
	register_block_pattern(
		'mexclusive2/custom-pattern-1',
		array(
			'title'       => __( 'Sample list', 'mexclusive2' ),
			'description' => __( 'Description of Custom Pattern 1.', 'mexclusive2' ),
			'content'     => sprintf(
				'<div class="custom-pattern">
                    <h2 class="custom-pattern-heading">%1$s</h2>
                    <p class="custom-pattern-paragraph">%2$s</p>
                    <blockquote class="custom-pattern-blockquote">
                        <p class="custom-pattern-blockquote-text">%3$s</p>
                    </blockquote>
                    <ul class="custom-pattern-list">
                        <li class="custom-pattern-list-item">%4$s</li>
                        <li class="custom-pattern-list-item">%5$s</li>
                        <li class="custom-pattern-list-item">%6$s</li>
                    </ul>
                </div>',
				esc_html__( 'mexclusive2 Custom Pattern Heading', 'mexclusive2' ),
				esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'mexclusive2' ),
				esc_html__( 'This is a custom blockquote.', 'mexclusive2' ),
				esc_html__( 'List item 1', 'mexclusive2' ),
				esc_html__( 'List item 2', 'mexclusive2' ),
				esc_html__( 'List item 3', 'mexclusive2' )
			),
			'categories'  => array( 'text' ),
			'keywords'    => array( 'custom', 'pattern', 'text' ),
		)
	);

	// You can register more custom block patterns as needed
}

add_action( 'init', 'mexclusive2_add_block_patterns' );