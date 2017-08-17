<?php
/**
 * default search form
 */
?>
<form role="search" method="get" id="search-form" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
  <?php if (!is_search()): ?>
    <p class="icon-search"></p>
	<?php endif; ?>
  <label for="search">
    <span class="screen-reader-text"><?php _e('Search for:', 'presentation'); ?></span>
    <input type="search" placeholder="<?php echo esc_attr('Search', 'presentation'); ?>" 
      name="s" id="search-input" value="<?php echo esc_attr(get_search_query()); ?>" />
  </label>
  <input type="submit" id="search-submit" value="Search" />
</form>