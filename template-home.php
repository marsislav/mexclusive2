<?php
`/**
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
`
get_header(); ?>
    <div class="content-area">
        <main>
            <section class="slider">

                <div id="mainSlider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
			            <?php
			            // Loop through each slider page
			            for ($i = 1; $i <= 3; $i++) {
				            // Get slider page settings
				            $page_id = get_theme_mod('set_slider_page' . $i);
				            $button_text = get_theme_mod('set_slider_button_text' . $i);
				            $button_url = get_theme_mod('set_slider_url' . $i);

				            // Output carousel item
				            $active_class = $i === 1 ? 'active' : ''; // Add 'active' class to the first item
				            ?>
                            <div class="carousel-item <?php echo $active_class; ?>">
					            <?php if ($page_id) : ?>
                                    <a href="<?php echo esc_url(get_permalink($page_id)); ?>">
							            <?php echo get_the_post_thumbnail($page_id, 'large', array('class' => 'd-block w-100', 'alt' => get_the_title($page_id))); ?>
                                    </a>
						            <?php if ($button_text && $button_url) : ?>
                                        <div class="carousel-caption">
                                            <h5><?php echo esc_html(get_the_title($page_id)); ?></h5>
                                            <p><?php echo esc_html(get_the_excerpt($page_id)); ?></p>
                                            <a href="<?php echo esc_url($button_url); ?>" class="btn btn-primary"><?php echo esc_html($button_text); ?></a>
                                        </div>
						            <?php endif; ?>
					            <?php endif; ?>
                            </div>
			            <?php } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>
            <section class="popular-products">
                <div class="container">
                    <div class="row">Popular Products</div>
                </div>
            </section>
            <section class="new-arrivals">
                <div class="container">
                    <div class="row">New Arrivals</div>
                </div>
            </section>
            <section class="deal-of-the-week">
                <div class="container">
                    <div class="row">Deal of the week</div>
                </div>
            </section>
            <section class="blog">
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
                            <p>Nothing found</p>
						<?php endif;
						?>
                    </div>
                </div>
            </section>
        </main>
    </div>
<?php get_footer(); ?>