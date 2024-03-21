<?php get_header(); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h1><?php printf(esc_html__('All posts with tag: %s', 'mexclusive2'), single_tag_title('', false)); ?></h1>
        </div>
    </div>
    
    <?php 
    $tag = get_queried_object(); // Get the current tag
    $tag_id = $tag->term_id; // Get the tag ID
    
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; // Get current page number
    
    $args = array(
        'tag__in' => array($tag_id), // Specify the tag ID
        'posts_per_page' => 10, // Retrieve 10 posts per page
        'paged' => $paged // Pagination parameter
    );
    $tag_posts_query = new WP_Query($args);
    
    if ($tag_posts_query->have_posts()) : ?>
        
            <?php while ($tag_posts_query->have_posts()) : $tag_posts_query->the_post(); ?>
            <div class="row card-body mb-5">
            <div class="col-md-4">
                    <div class="position-relative">
                    <?php if (has_category()) {?>
                        <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">                                                       
                        <?php $categories = get_the_category();
                            if (!empty($categories)) {
                            $first_category = $categories[0]; // Get the first category
                            ?>
                                <a href="<?php echo esc_url(get_category_link($first_category)); ?>"><?php echo esc_html($first_category->name); ?></a>
                            <?php } ?>         
                        </div> 
                        <?php } ?>
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <img class="card-img-top" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                        </a>
                    <?php endif; ?>
                </div>
            </div>
                <div class="col-8">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="d-flex justify-content-between post-info mb-2">
                        <i class="fa fa-clock"></i> <?php display_reading_time(); ?>
                        <?php mexclusive2_postedOn(); ?>
                        <i class="fa fa-eye"></i>
                        <?php
                        $views = mexclusive2_display_post_views();
                        printf(
                            _n('%d View', '%d Views', $views, 'mexclusive2'),
                            $views
                        );
                        ?>
                        <a href="<?php the_permalink();?>#comments" class="text-dark link-hover me-3">
                            <?php
                            printf(
                                _n(
                                    '%s Comment',
                                    '%s Comments',
                                    get_comments_number(),
                                    'mexclusive2'
                                ),
                                number_format_i18n(get_comments_number())
                            );
                            ?>
                        </a>
                        <?php mexclusive2_authorInfo(); ?>
                    </div>
                    <div><?php the_excerpt(); ?></div>
                </div>
            </div>
            <?php endwhile; ?>
        
        <div class="row py-5">
            <div class="col-12">
                <div class="pagination-container">
                    <?php
                    $paginate_args = array(
                        'base'         => get_pagenum_link(1) . '%_%',
                        'format'       => '/page/%#%', // Pagination structure
                        'current'      => $paged, // Current page number
                        'total'        => $tag_posts_query->max_num_pages, // Total number of pages
                        'prev_text'    => __( '&laquo;', 'mexclusive2' ),
                        'next_text'    => __( '&raquo;', 'mexclusive2' ),
                        'type'         => 'list',
                    );

                    echo paginate_links( $paginate_args );
                    ?>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="row py-5">
            <div class="col-12">
                <p><?php esc_html_e('No posts found with this tag.', 'mexclusive2'); ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>