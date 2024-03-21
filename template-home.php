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
            <?php if (class_exists('WooCommerce')):?>
            <section class="popular-products">
                <div class="container">
                    <?php
                    $popular_limit=get_theme_mod('set_popular_max_num',4);
                    $popular_col=get_theme_mod('set_popular_max_col',4);
                    $arrivals_limit=get_theme_mod('set_new_arrivals_max_num',4);
                    $arrivals_col=get_theme_mod('set_new_arrivals_max_col',4);

                    ?>

                   <h2>Popular Products</h2>
                    <?php echo do_shortcode('[products limit=" '. $popular_limit .' " columns="'. $popular_col .'" orderby="popularity"]');?>
                </div>
            </section>
            <section class="new-arrivals">
                <div class="container">
                    <h2>New Arrivals</h2>
	                <?php echo do_shortcode('[products limit="'. $arrivals_limit .'" columns="'. $arrivals_col .'" orderby="date"]');?>
                </div>
            </section>
            <?php
            $showdeal= get_theme_mod('set_deal_show', 0);
            $deal= get_theme_mod('set_deal');
            $currency=get_woocommerce_currency_symbol();
            $regular= get_post_meta( $deal, '_regular_price', 'true' );
            $sale=get_post_meta( $deal, '_sale_price', 'true' );

            if($showdeal==1 && (!empty($deal))) :
                $discount_percentage= absint(100- ($sale/$regular)*100);
            ?>
            <section class="deal-of-the-week">
                <div class="container">

                    <div class="row d-flex align-items-center">
                        <div class="deal-img col-md-6 col-12 ms-auto text-center">
                            <?php
                                echo get_the_post_thumbnail($deal, 'large', array ('class'=>'img-fluid'));
                            ?>
                        </div>
                        <div class="deal-desc col-md-4 col-12 me-auto text-center">
                            <h2><?php _e('Deal of the weeek', 'mexclusive2');?></h2>
                            <?php if(!empty($sale)):?>
                            <span class="discount">

                                <?php echo '- '. $discount_percentage . '%';?>
                            </span>
                            <?php endif;?>
                            <h3>
                                <a href="<?php echo  get_permalink('deal');?>"><?php echo get_the_title('deal');?></a>
                            </h3>
                            <p>
                                <?php echo get_the_excerpt($deal); ?>
                            </p>
                            <div class="prices">
                                <span class="regular">
                                    <?php echo $currency; echo $regular;?>
                                </span>
                                <?php if(!empty($sale)):?>
                                    <span class="sale">
                                        <?php echo $currency; echo $sale;?>
                                    </span>
                                <?php endif;?>
                            </div>
                            <a href="<?php echo esc_url('?add-to-cart=' . $deal);?>" class="add_to_cart_home"><?php _e('Add to cart', 'mexclusive2');?></a>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif;?>
            <?php endif;?>
            <section class="blog">
                <div class="container">
                    <div class="row">
						<?php if (have_posts()):
							while (have_posts()):the_post();?>
                                <article class="col-12 col-md-6">
                                    <a href="<?php the_permalink();?>">
                                    <?php if (has_post_thumbnail()) {
	                                    the_post_thumbnail( 'full', array( 'class' => 'img-fluid' ) );
                                    }
                                    ?>
                                    </a>
                                    <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                    <div class="excerpt"><?php the_excerpt();?></div>
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