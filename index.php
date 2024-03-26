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
 * @package mexclusive2
 */

get_header(); ?>
    <div class="content-area">
        <main>
            <section class="slider">
                <div class="container">
                    <div class="row"><?php _e('Slider', 'mexclusive2'); ?></div>
                </div>
            </section>
            <section class="popular-products">
                <div class="container">
                    <div class="row"><?php _e('Popular Products', 'mexclusive2'); ?></div>
                </div>
            </section>
            <section class="new-arrivals">
                <div class="container">
                    <div class="row"><?php _e('New Arrivals', 'mexclusive2'); ?></div>
                </div>
            </section>
            <section class="deal-of-the-week">
                <div class="container">
                    <div class="row"><?php _e('Deal of the week', 'mexclusive2'); ?></div>
                </div>
            </section>
            <section class="blog" id="primary">
                <div class="container">
                    <div class="row">
						<?php if (have_posts()):
							while (have_posts()):the_post();?>
                                <article>
                                    <h2><?php the_title(); ?></h2>
                                    <div><?php the_excerpt();?></div>
                                </article>
							<?php
							endwhile;
						else :?>
                            <p><?php _e('Nothing found', 'mexclusive2'); ?></p>
						<?php endif;
						?>
                    </div>
                </div>
            </section>
        </main>
    </div>
<?php get_footer(); ?>