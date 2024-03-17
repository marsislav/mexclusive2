<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mexclusive2
 */
?>
<footer>
    <section>
        <div class="container">
            <div class="row">Footer widgets</div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <nav class="footer-menu">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'footer_menu'
                    )); ?>
            </nav>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row">Footer Copyright</div>
        </div>
    </section>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>