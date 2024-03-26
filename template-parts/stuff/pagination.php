<?php
global $wp_query;

$paginate_args = array(
	'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
	'total'        => $wp_query->max_num_pages,
	'current'      => max( 1, get_query_var( 'paged' ) ),
	'format'       => '?paged=%#%',
	'show_all'     => false,
	'end_size'     => 1,
	'mid_size'     => 2,
	'prev_next'    => true,
	'prev_text'    => __( '&laquo;', 'mexclusive' ),
	'next_text'    => __( '&raquo;', 'mexclusive' ),
	'type'         => 'list',
	'add_args'     => false,
	'add_fragment' => '',
);

echo paginate_links( $paginate_args );
?>