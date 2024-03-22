<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mexclusive2
 */
?>

<?php
function display_last_post_in_random_categories() {
	// Get random categories
	$categories = get_categories( array(
		'orderby' => 'rand',
		'number'  => 4
	) );

	// Start the features section
	$output = '<!-- Features Start -->
    <div class="container-fluid features mb-2">
        <div class="container py-5">
            <div class="row g-4">';

	// Loop through each random category
	foreach ( $categories as $category ) {
		// Define arguments for the query to get the last post in the category
		$args = array(
			'posts_per_page' => 1,
			'post_type'      => 'post',
			'category__in'   => array( $category->term_id ),
			'orderby'        => 'rand', // Order randomly
		);

		// Perform the query
		$query = new WP_Query( $args );

		// Get total post count in the category
		$category_post_count = $category->count;

		// Check if there are any posts
		if ( $query->have_posts() ) {
			// Start the features item
			$output .= '<div class="col-md-6 col-lg-6 col-xl-3">
                <div class="row g-4 align-items-center features-item">';

			// Display category name and total post count
			$output .= '<h6 class="text-uppercase mb-3"><span class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white " style="top: 10%; right: -10px;">' . $category_post_count . '</span>' . $category->name . '</h6>';

			// Display the last post title
			while ( $query->have_posts() ) {
				$query->the_post();
				$output .= '
                <div class="col-8">
                    <div class="features-content d-flex flex-column">
                        <a href="' . get_permalink() . '" class="h6">' . get_the_title() . '</a>
                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i>' . get_the_date() . '</small>
                    </div>
                </div>';
			}

			// End the features item
			$output .= '</div></div>';

			// Restore original post data
			wp_reset_postdata();
		} else {
			$output .= sprintf(
				esc_html__( 'No posts found in category %s', 'mexclusive2' ),
				$category->name
			);
		}
	}

	// Close the row and container
	$output .= '</div></div></div><!-- Features End -->';

	// Output the generated HTML
	echo $output;
}

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
	<?php wp_head(); ?>
    <style>
        /* Style for the focused menu item */
        .focused {
            background-color: #f0f0f0; /* Change the background color as needed */
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <header>
		<?php
		// Get the latest post
		$latest_post = get_posts( array(
			'posts_per_page' => 1,
			'orderby'        => 'date',
			'order'          => 'DESC',
		) );

		// Check if there's any post
		if ( $latest_post ) :
			// Loop through each post
			foreach ( $latest_post as $post ) :
				setup_postdata( $post );

				// Display the post title
				?>
                <div class="latest-post">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-1">
                                <i class="fa-solid fa-cloud-bolt text-white"></i>
	                            <?php _e( 'New:', 'mexclusive2' ); ?>
                            </div>
                            <div class="col-11">
                                <div class="scrolling-wrapper">
                                    <div class="content d-flex align-items-center">
										<?php
										// Display the post thumbnail if available
										if ( has_post_thumbnail() ) :
											the_post_thumbnail( 'thumbnail', array( 'class' => 'me-3 img-fluid rounded-circle border border-3 border-primary me-2 small' ) ); // Adjust thumbnail size as needed
										endif;
										?>
                                        <p><?php the_title(); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			<?php
			endforeach;

			// Restore global post data
			wp_reset_postdata();
		else :
			// If no posts found
			?>
            <p><?php _e('No posts found.', 'mexclusive2');?></p>
		<?php endif; ?>

	    <?php get_template_part( 'template-parts/header/header-image' ); ?>
        <section class="search">
            <div class="container">
                <div class="row"><?php get_search_form(); ?></div>
            </div>
        </section>
        <section class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <div class="brand text-center text-md-left">

							<?php if ( has_custom_logo() ) {
								the_custom_logo();
							} else {
								echo esc_html( get_bloginfo( 'name' ) );
								echo esc_html( get_bloginfo( 'description' ) );
							} ?>

                        </div>
                    </div>
                    <div class="col-8">


                        <nav class="navbar navbar-expand-md navbar-light main-menu" role="navigation">
                            <!-- Toggler/collapsible Button -->
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#bs-example-navbar-collapse-1"
                                    aria-controls="bs-example-navbar-collapse-1" aria-expanded="false"
                                    aria-label="<?php esc_attr_e( 'Toggle navigation', 'mexclusive2' ); ?>">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <!-- Navbar links -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'main_menu',
									'depth'          => 2,
									'container'      => false,
									'menu_class'     => 'navbar-nav me-auto mb-2 mb-md-0',
									// Adjusted menu class
									'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
									'walker'         => new WP_Bootstrap_Navwalker(),
									'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									// Added items_wrap to wrap menu items in <ul>
								) );
								?>
                            </div>
                        </nav>
                    </div>
                    <div class="col-2">
						<?php if ( class_exists( 'WooCommerce' ) ) { ?>
                        <div class="cart text-end">

							<?php if ( is_user_logged_in() ) { ?>

                                <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>"><?php _e( 'My account', 'mexclusive2' ); ?></a> /

                                <a href="<?php echo esc_url( wp_logout_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ); ?>"
                                ><?php _e( 'Logout', 'mexclusive2' ); ?></a>
							<?php } else { ?>

                                    <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>"
                                    ><?php _e( 'Login/Register', 'mexclusive2' ); ?></a>

							<?php }
							} ?>

                            <div class="d-flex justify-content-end mt-3">
                                <a href="#search"><i class="fa-solid fa-magnifying-glass"></i></a>
	                            <?php if ( class_exists( 'WooCommerce' ) ) { ?>
                                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><i
                                            class="fa-solid fa-cart-shopping"></i></a>
                                <span class="items"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?> </span>
                                <?php }?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>
    </header>
</div>

<section class="container-fluid features mb-2">
	<?php display_last_post_in_random_categories(); ?>
</section>

<div class="loader-wrapper">
    <div class="loader"></div>
</div>
