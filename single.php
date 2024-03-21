<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no template-home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mExlusive2
 */

get_header(); ?>
    <div class="content-area">
        <main>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ol class="breadcrumb justify-content-start mb-4">
                            <li class="breadcrumb-item"><a
                                        href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'mexclusive2' ); ?></a>
                            </li>
							<?php
							$categories = get_the_category();
							if ( ! empty( $categories ) ) {
								$first_category = $categories[0]; // Get the first category
								?>
                                <li class="breadcrumb-item"><a
                                            href="<?php echo esc_url( get_category_link( $first_category ) ); ?>"><?php echo esc_html( $first_category->name ); ?></a>
                                </li>
							<?php } ?>
                            <li class="breadcrumb-item active text-dark"><?php the_title(); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
            <section id="post-<?php the_ID(); ?>" <?php post_class('blog'); ?>>
                <div class="container">
                    <div class="row">
                        <div class="col-8">
							<?php if ( have_posts() ):
								while ( have_posts() ):the_post(); ?>
                                    <article>
                                        <h1><?php the_title(); ?></h1>
	                                    <div class="position-relative mb-2">
                                        <?php if (has_post_thumbnail()) {
		                                    the_post_thumbnail( 'full', array( 'class' => 'img-fluid rounded' ) );
	                                    }
	                                    ?>
		                                    <?php if (has_category()) {?>
                                                <div class="position-absolute px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">
                                                    <a href="<?php echo esc_url(get_category_link($first_category)); ?>"><?php echo esc_html($first_category->name); ?></a>
                                                </div>
		                                    <?php } ?>
                                        </div>
                                        <div class="d-flex justify-content-between post-info mb-5">
                                            <i class="fa fa-clock"></i> <?php display_reading_time();?>
		                                    <?php mexclusive2_postedOn(); ?>
                                            <i class="fa fa-eye"></i>
		                                    <?php
		                                    $views = mexclusive2_display_post_views();
		                                    printf(
			                                    _n('%d View', '%d Views', $views, 'mexclusive2'),
			                                    $views );
		                                    ?>
                                            <a href="#comments" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i>
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
                                        <div>
                                            <?php the_content(); ?>
                                        </div>
                                        <div class="pagination-container">
		                                    <?php wp_link_pages( array(
			                                    'before'      => '<div class="pagination"><span class="page-links-title">' . __( 'Pages:', 'mexclusive2' ) . '</span>',
			                                    'after'       => '</div>',
			                                    'link_before' => '<span class="page-number">',
			                                    'link_after'  => '</span>',
			                                    'next_or_number' => 'number',
			                                    'nextpagelink' => __( 'Next page', 'mexclusive2' ),
			                                    'previouspagelink' => __( 'Previous page', 'mexclusive2' ),
		                                    ) );?>
                                        </div>
                                        <hr>
	                                    <?php if (has_tag()) {?>
                                            <div class="tab-class ">
                                                <div class="d-flex justify-content-between border-bottom mb-4">
                                                    <ul class="nav-pills d-inline-flex text-center">
                                                        <li class="mb-3 ">
                                                            <h5 class="mt-2 me-3 mb-0"><?php _e('Tags', 'mexclusive2') ?>:</h5>
                                                        </li>
					                                    <?php
					                                    // Get tags for current post
					                                    $tags = get_the_tags();
					                                    if ($tags) {
						                                    // Loop through each tag
						                                    foreach ($tags as $tag) {?>
                                                                <li class="nav-item mb-3">
                                                                    <a class="d-flex py-2 bg-light rounded-pill me-2" href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                                                        <span class="text-dark" style="width: 100px;">
                                                            <?php echo $tag->name; ?>
                                                        </span>
                                                                    </a>
                                                                </li>
						                                    <?php }
					                                    } ?>
                                                    </ul>
                                                </div>
                                            </div>
	                                    <?php } ?>
                                        <hr>
	                                    <?php get_template_part('/template-parts/single/about-the-author'); ?>
	                                    <?php get_template_part('/template-parts/single/navigation'); ?>
	                                    <?php if (comments_open()) {comments_template();}?>

                                    </article>
								<?php
								endwhile;
							else :?>
                                <p>Nothing found</p>
							<?php endif;
							?>
                        </div>
                        <div class="col-4">
							<?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
<?php get_footer(); ?>