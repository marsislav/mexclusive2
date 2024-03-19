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
            <div class="row"><?php _e('Footer widgets', 'mexclusive2'); ?></div>
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
            <div class="row">
                <p>
					<?php echo esc_html(get_theme_mod('set_copyright', __('Copyright - X. All rights reserved.', 'mexclusive2'))); ?>
                </p>
            </div>
        </div>
    </section>
    <section>
	    <?php get_template_part( 'template-parts/footer/widgets' ); ?>
    </section>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
