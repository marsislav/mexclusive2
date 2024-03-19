<?php
$footer_layout = sanitize_text_field(get_theme_mod('mexclusive2_footer_layout', '3,3,3,3'));
$footer_layout = preg_replace('/\s+/', '', $footer_layout);
$columns = explode(',', $footer_layout);
$footer_bg = mexclusive2_sanitize_footer_bg(get_theme_mod( 'mexclusive2_footer_bg', 'dark' ));
$widgets_active = false;
foreach ($columns as $i => $column) {
	if( is_active_sidebar( 'footer-sidebar-' . ($i + 1) )) {
		$widgets_active = true;
	}
}
?>
<?php if($widgets_active) { ?>
	<div class="c-footer c-footer--<?php echo $footer_bg; ?>">
		<div class="container">
			<div class="row">
				<?php
				// Count the total number of columns
				$total_columns = count($columns);
				// Calculate the width class for each column
				switch($total_columns) {
					case 1:
						$column_class = 'col-12';
						break;
					case 2:
						$column_class = 'col-md-6';
						break;
					case 3:
						$column_class = 'col-md-4';
						break;
					case 4:
						$column_class = 'col-md-3';
						break;
					default:
						$column_class = 'col-md-3'; // Set a default column class
				}
				foreach($columns as $i => $column) { ?>
					<div class="<?php echo $column_class; ?> column-<?php echo $i+1; ?>">
						<?php if(is_active_sidebar( 'footer-sidebar-' . ($i + 1) )) {
							dynamic_sidebar( 'footer-sidebar-' . ($i + 1) );
						} ?>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
<?php } ?>