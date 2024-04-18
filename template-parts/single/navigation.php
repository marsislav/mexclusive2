<?php
$prev = get_previous_post();
$next = get_next_post();
?>
<?php if ($prev || $next) {?>
    <nav class="bg-light rounded my-4 p-4" role="navigation">
        <h2 class="screen-reader-text">
			<?php esc_attr_e('Navigate through post', 'mexclusive2'); ?>
        </h2>
        <h4 class="mb-4"><?php _e('This may be of interest to you', 'mexclusive2'); ?></h4>
        <div class="row g-4">
			<?php if ($prev) { ?>
                <div class="col-lg-6">
                    <div class="d-flex align-items-center p-3 bg-white rounded">
						<?php if (has_post_thumbnail($prev->ID)) { ?>
							<?php $prev_image = get_the_post_thumbnail_url($prev->ID, 'thumbnail'); ?>
                            <img src="<?php echo esc_url($prev_image); ?>" class="img-fluid rounded" alt="">
						<?php } else { ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/img/default-thumbnail.jpg'); ?>" class="img-fluid rounded" alt="">
						<?php } ?>
                        <div class="ms-3">
                            <a href="<?php echo esc_url(get_permalink($prev->ID)); ?>" class="h5 mb-2"><?php echo esc_html($prev->post_title); ?></a>
                            <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> <?php echo esc_html(get_the_date('', $prev->ID)); ?></p>
                        </div>
                    </div>
                </div>
			<?php }
			if ($next) {
			?>
            <div class="col-lg-6">
                <div class="d-flex align-items-center p-3 bg-white rounded">
					<?php if (has_post_thumbnail($next->ID)) { ?>
						<?php $next_image = get_the_post_thumbnail_url($next->ID, 'thumbnail'); ?>
                        <img src="<?php echo esc_url($next_image); ?>" class="img-fluid rounded" alt="">
					<?php } else { ?>
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/img/default-thumbnail.jpg'); ?>" class="img-fluid rounded" alt="">
					<?php } ?>
                    <div class="ms-3">
                        <a href="<?php echo esc_url(get_permalink($next->ID)); ?>" class="h5 mb-2"><?php echo esc_html($next->post_title); ?></a>
                        <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> <?php echo esc_html(get_the_date('', $next->ID)); ?></p>
                    </div>
                </div>
            </div>


		<?php } ?>
        </div>
    </nav>

<?php } ?>
