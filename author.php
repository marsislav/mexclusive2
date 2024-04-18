<?php get_header(); ?>
<div class="container py-5">
    <div class="row">
        <div class="col-2">
            <?php 
            $author_id = get_the_author_meta('ID');
            $author_avatar = get_avatar($author_id, 200); // Change desired size in pixels
            echo $author_avatar;
            ?>
        </div>
        <div class="col-10">
            <?php 
            $author_id = get_the_author_meta('ID');
            $author_description = get_the_author_meta('description', $author_id);
            $author_name = get_the_author_meta('display_name', $author_id);?>
            <h4><?php esc_html_e('Author name:', 'mexclusive2'); ?> <?php echo esc_html($author_name); ?></h4>
            <?php echo esc_html($author_description);?>
        </div>
    </div>
    <div class="row py-5">
        <div class="col-12">
            <h3><?php _e('Here you can see all posts by this author:', 'mexclusive2');?></h3>
        </div>
    </div>

    <?php
    $author_id = get_the_author_meta('ID');

    $args = array(
        'author' => $author_id,
        'post_type' => 'post',
        'posts_per_page' => 10, // Limit posts per page
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1 // Use current page number
    );

    $author_posts_query = new WP_Query($args);

    if ($author_posts_query->have_posts()) :
        while ($author_posts_query->have_posts()) : $author_posts_query->the_post();?>
            <div class="row card-body mb-5" >
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
            <div class="col-md-8">
                
                    <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <div class="d-flex justify-content-between post-info mb-2 mt-3">
                    <i class="fa fa-clock"></i> <?php display_reading_time();?>
                    <?php mexclusive2_postedOn(); ?>
                    <i class="fa fa-eye"></i> 
                    <?php
                        $views = mexclusive2_display_post_views();
                        printf(
                            _n('%d преглед', '%d прегледа', $views, 'mexclusive2'),
                            $views );
                    ?>
                    <a href="<?php the_permalink();?>#comments" class="text-dark link-hover me-3">
                        <?php 
                            printf(
                                _n(
                                    '%s comment',
                                    '%s comments',
                                    get_comments_number(),
                                    'mexclusive2'
                                ),
                                number_format_i18n(get_comments_number())
                            ); 
                        ?>
                    </a>
                    
                </div>
                    <div class="card-text"><?php the_excerpt(); ?></div>
                
            </div> 
        </div>
    <?php
        endwhile;
        wp_reset_postdata();
    else :
        // No posts found
        echo esc_html__('No publications found by this author.', 'mexclusive2');
    endif;
    ?>

    <div class="row">
        <div class="col-12">
            <div class="pagination-container">
            <?php
            $paginate_args = array(
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'format'       => '?paged=%#%',
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'total'        => $author_posts_query->max_num_pages,
                'prev_text'    => __( '&laquo;', 'mexclusive2' ),
                'next_text'    => __( '&raquo;', 'mexclusive2' ),
                'type'         => 'list',
            );

            echo paginate_links( $paginate_args );
            ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>