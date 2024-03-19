<div class="tab-content author-info">
	<div id="tab-1" class="tab-pane fade show active">
		<h2 class="screen-reader-text">
			<?php esc_attr_e('About the author', 'mexclusive2'); ?>
		</h2>

		<?php
		$author_id=get_the_author_meta('ID');
		$author_posts=get_the_author_posts();
		$author_display=get_the_author();
		$author_posts_url=get_author_posts_url($author_id);
		$author_description=get_the_author_meta('user_description');
		$author_website=get_the_author_meta('user_url');

		?>

		<div class="row g-4 align-items-center">
			<div class="col-3">
				<?php echo get_avatar($author_id, '');?>
			</div>
			<div class="col-9">
				<?php if ($author_website) { ?>
					<a href="<?php echo esc_url($author_website);?>" target="_blank"><h3><?php echo $author_display; ?></h3></a>
				<?php } else { ?> <h3><?php echo $author_display; ?></h3> <?php }?>
				<div class="author_posts">
					<a href="<?php echo esc_url($author_posts_url);?>"><?php printf(esc_html(_n('%s post', '%s posts', $author_posts, 'mexclusive2')), number_format_i18n($author_posts));?></a>
				</div>
				<p class="mb-0"><?php echo esc_html( $author_description);?>
				</p>
			</div>
		</div>
	</div>
</div>


