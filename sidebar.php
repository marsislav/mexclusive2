<div class="p-3 rounded border">
				<?php if (is_active_sidebar('primary-sidebar')) {
					dynamic_sidebar('primary-sidebar');
				}?>
				<h4 class="mb-4"><?php _e('Popular blog categories', 'mexclusive2');?></h4>

						<ul class="category-list">
							<?php
							$categories = get_categories(array(
								'orderby' => 'count',
								'order' => 'DESC',
								'number' => 10
							));
							foreach ($categories as $category) {
								echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' .'<span class="post-counter">' .$category->count. '</span>' . $category->name . '</a> </li>';
							}
							?>
						</ul>

				<h4 class="my-4"><?php _e('New articles in this category', 'mexclusive2');?></h4>

						<?php  display_last_ten_posts_in_current_category();?>

						<h4 class="mb-4"><?php _e('Popular tags', 'mexclusive2');?></h4>

					<?php display_popular_tags(); ?>
</div>