<?php
/**
 * Template for displaying search form in mexclusive2
 * @package mexclusive2
 */
?><?php /*
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group">
        <input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'mexclusive2' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
        <button type="submit" class="btn btn-outline-secondary"><?php echo esc_html_x( 'Search', 'submit button', 'mexclusive2' ); ?></button>
		<?php if (class_exists('WooCommerce')) {?>
            <input type="hidden" value="product" name="post_type" id="post_type">
		<?php }?>
    </div>
</form>
 <?php */ ?>
<div id="search">
    <button type="button" class="close">×</button>
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="search" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'mexclusive2' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>