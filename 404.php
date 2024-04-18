<?php get_header(); ?>

        <div class="container-fluid py-5">
            <div class="container py-5 text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <i class="bi bi-exclamation-triangle display-1 text-secondary"></i>
                        <h1 class="display-1"><?php _e('404', 'mexclusive2'); ?></h1>
                        <h1 class="mb-4"> <h1 class="mb-4"><?php _e('Not found!', 'mexclusive2'); ?></h1>
                        <p class="mb-4"><p><?php _e('Maybe it is better to use the search engine?', 'mexclusive2'); ?></p>
                        <a class="btn link-hover border border-primary rounded-pill py-3 px-5" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php _e('Back to home', 'mexclusive2'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

<?php get_footer();?>