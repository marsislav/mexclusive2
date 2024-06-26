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
            <section class="page" id="primary">
                <div class="container">
                    <div class="row">
                        <?php if (have_posts()):
                            while (have_posts()):the_post();?>
                                <article>
                                    <h1><?php the_title(); ?></h1>
                                    <div><?php the_content();?></div>
                                </article>
                            <?php
                            endwhile;
                        else :?>
                            <p><?php _e('Nothing found', 'mexclusive2');?></p>
                        <?php endif;
                        ?>
                    </div>
                </div>
            </section>
        </main>
    </div>
<?php get_footer(); ?>