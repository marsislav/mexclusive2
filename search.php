<?php get_header(); ?>
<div class="container py-5">
    <div class="row">
        <div class="col-12" id="primary">
            <h1><?php printf(esc_html__('Search results for: %s', 'mexclusive2'), get_search_query());?> </h1>
        </div>
    </div>
    
    <?php if (have_posts()) : ?>
        <div class="row card-body">
            <?php while (have_posts()) : the_post(); ?>

                <div class="col-4">
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
                    <i class="fa fa-clock"></i> <?php display_reading_time();?>
                    <?php mexclusive2_postedOn(); ?>
                    <i class="fa fa-eye"></i> 
                    <?php
                        $views = mexclusive2_display_post_views();
                        printf(
                            _n('%d View', '%d Views', $views, 'mexclusive2'),
                            $views );
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
                    <?php mexclusive2_authorInfo();?>
                </div>
                    <div><?php the_excerpt(); ?></div>
                </div>
        </div>
            <div class="row py-5">

	    <?php endwhile; ?>
        <div class="col-12">
            <div class="pagination-container">
			    <?php get_template_part( 'template-parts/stuff/pagination' ); ?>
            </div>
        </div>
        </div>

    <?php else : ?>
        <div class="row py-5">
            <div class="col-12">
                 <p><?php esc_html_e('Sorry, no results were found.', 'mexclusive2'); ?></p>
            </div>
        </div>
       
    <?php endif; ?>
</div>


<?php get_footer(); ?>