<?php get_header(); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h1><?php printf(esc_html__('All posts in category: %s', 'mexclusive2'), single_cat_title('', false)); ?></h1>
        </div>
    </div>
    
    <?php 
    $category = get_queried_object(); // Get the current category
    $category_id = $category->term_id; // Get the category ID
    
    $args = array(
        'cat' => $category_id, // Specify the category ID
        'posts_per_page' => -1 // Retrieve all posts in the category
    );
    $category_posts_query = new WP_Query($args);
    
    if ($category_posts_query->have_posts()) : ?>
        
            <?php while ($category_posts_query->have_posts()) : $category_posts_query->the_post(); ?>
            <div class="row card-body mb-5">
                <div class="col-4">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <img class="card-img-top" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                        </a>
                    <?php endif; ?>
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
                    <?php get_template_part('template-parts/stuff/pagination'); ?>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="row py-5">
            <div class="col-12">
                <p><?php esc_html_e('No posts found in this category.', 'mexclusive2'); ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>