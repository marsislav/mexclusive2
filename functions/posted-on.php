<?php function mexclusive2_postedOn() { ?>
    <i class="fa fa-calendar"></i>
	<?php _e( 'Posted on', 'mexclusive2' ); ?> <span class="text-dark me-3">
        <time datetime="<?php echo esc_attr( get_the_date() ); ?>">
			<?php echo esc_html( get_the_date() ); ?>
        </time>
    </span>
<?php } ?>