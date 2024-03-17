<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package exclusive2
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
    <header>
        <section class="search">
            <div class="container">
                <div class="row">Search</div>
            </div>
        </section>
        <section class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="brand col-md-3 col-12 col-lg-2 text-center text-md-left">
                        logo
                    </div>
                    <div class="second-column col-md-9  col-12 col-lg-10">
                        <div class="row">
                            <div class="account col-12">
                                Account
                            </div>
                            <div class="col-12">
                                <nav class="navbar navbar-expand-md navbar-light main-menu" role="navigation">

                                    <!-- Toggler/collapsible Button -->
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <!-- Navbar links -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <?php
                                        wp_nav_menu( array(
                                            'theme_location'    => 'main_menu',
                                            'depth'             => 2,
                                            'container'         => false,
                                            'menu_class'        => 'navbar-nav me-auto mb-2 mb-md-0', // Adjusted menu class
                                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                            'walker'            => new WP_Bootstrap_Navwalker(),
                                            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>', // Added items_wrap to wrap menu items in <ul>
                                        ) );
                                        ?>
                                    </div>
                                </nav>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </section>
        <div class="loader-wrapper">
            <div class="loader"></div>
        </div>
    </header>