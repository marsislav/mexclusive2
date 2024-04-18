<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mExlusive2
 */

get_header(); ?>

    <div class="content-area">
        <main>
            
			


              
            <section class="blog">
                <div class="container">
                    <div class="row">
						<?php if ( have_posts() ):
							while ( have_posts() ):the_post(); ?>
                                <article class="col-12 col-md-6 home-img position-relative mb-30">
									<?php
									$categories = get_the_category();
									if ( ! empty( $categories ) ) {
										$first_category = $categories[0]; // Get the first category
									}
									?>
									<?php if ( has_category() ) { ?>
                                        <div class="position-absolute px-4 py-2 bg-primary rounded"
                                             style="top: 20px; right: 20px;">
                                            <a href="<?php echo esc_url( get_category_link( $first_category ) ); ?>"><?php echo esc_html( $first_category->name ); ?></a>
                                        </div>
									<?php } ?>


                                    <a href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail() ) {
											the_post_thumbnail( 'full', array( 'class' => 'img-fluid rounded' ) );
										}
										?>
                                    </a>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="excerpt"><?php the_excerpt(); ?></div>
                                </article>

							<?php
							endwhile;
						else :?>
                            <p><?php _e( 'Nothing found', 'mexclusive2' ); ?></p>
						<?php endif;
						?>
                    </div>
                </div>
                <!-- Add pagination here -->

                <div class="pagination mb-5">
					<?php the_posts_pagination( array(
						'prev_text' =>  __( '&laquo;', 'mexclusive2' ),
						'next_text' => __( '&raquo;', 'mexclusive2' ),
					) ); ?>
                </div>

            </section>





        </main>
    </div>
<?php get_footer(); ?>