<?php
//Get the author

function mexclusive2_authorInfo() {?>
	<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="text-dark link-hover"><i class="fa fa-user"></i> <?php echo esc_html(get_the_author());?> </a>
	<?php
}
?>